document.addEventListener('DOMContentLoaded', function () {
    checkSeats();
    const seats = document.querySelectorAll('.seat');
    const selectedSeatsDisplay = document.getElementById('selectedSeatsDisplay');
    const errorContainer = document.getElementById('errorContainer');
    const errorMessage = document.getElementById('errorMessage');
    let bookedSeats = [];
    let selectedSeats = [];

    const trainData = JSON.parse(localStorage.getItem('selectedTrain'));
    const MAX_SEATS = trainData ? (trainData.adults + trainData.infants) : 1;

    seats.forEach(seat => {
        if (!seat.classList.contains('booked')) {
            seat.addEventListener('click', () => {
                const seatId = seat.getAttribute('data-seat');

                if (seat.classList.contains('selected')) {
                    seat.classList.remove('selected');
                    selectedSeats = selectedSeats.filter(id => id !== seatId);
                } else {
                    if (selectedSeats.length >= MAX_SEATS) {
                        errorMessage.textContent = `Maksimal ${MAX_SEATS} kursi yang dapat dipilih sesuai jumlah penumpang`;
                        errorContainer.style.display = 'block';
                        return;
                    }

                    seat.classList.add('selected');
                    selectedSeats.push(seatId);
                }

                errorContainer.style.display = 'none';

                selectedSeats.sort();
                selectedSeatsDisplay.textContent = selectedSeats.length > 0 ?
                    selectedSeats.join(', ') :
                    '-';

                const seatsUpdatedEvent = new CustomEvent('seatsUpdated', {
                    detail: { selectedSeats: selectedSeats }
                });
                document.dispatchEvent(seatsUpdatedEvent);
            });
        }
    });

    function checkSeats() {
        const token = localStorage.getItem('access_token');
        const trainData = JSON.parse(localStorage.getItem('selectedTrain'));

        const formData = {
            train_id: trainData.trainId,
            date_reservation: trainData.departureDate,
        };

        fetch('/api/orders/schedule', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(formData)
        })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || 'Check seats failed');
                    });
                }
                return response.json();
            })
            .then(data => {
                const seatsData = data.data?.seats || []; 
                bookedSeats = seatsData;
            
                seatsData.forEach(seatId => {
                    const seat = document.querySelector(`.seat[data-seat="${seatId}"]`);
                    if (seat) {
                        seat.classList.add('booked');
                        seat.style.pointerEvents = 'none';
                    }
                });
            })
            .catch(error => {
                const errorDiv = document.createElement('div');
                errorDiv.textContent = error.message || 'An unexpected error occurred';
                errorDiv.classList.add('error-message');
                document.body.insertBefore(errorDiv, document.body.firstChild);
            });
    }
});