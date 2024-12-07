document.addEventListener('DOMContentLoaded', () => {
    const processButton = document.querySelector('.process-button');
    const processContainer = document.querySelector('.process');
    const trainData = JSON.parse(localStorage.getItem('selectedTrain'));
    const selectedSeatsDisplay = document.getElementById('selectedSeatsDisplay');
    const token = localStorage.getItem('access_token');
    let order_id = '';

    processButton.addEventListener('click', () => {

        const dataValidator = {
            user_id: document.getElementById('id_user').value,
            train_id: document.getElementById('id_train').value,
            seats: selectedSeatsDisplay.textContent
                .split(', ')
                .filter(seat => seat !== '-')
                .join(', '),
            adult_passenger: trainData.adults,
            child_passenger: trainData.infants,
            total_amount: document.getElementById('totalPrice').value,
            title: document.getElementById('title').value,
            nama_pemesan: document.getElementById('nama_pemesan').value,
            tipe_identitas: document.getElementById('tipe_identitas').value,
            nomor_identitas: document.getElementById('nomor_identitas').value,
            nomor_hp: document.getElementById('nomor_hp').value,
            email: document.getElementById('email').value,
            alamat: document.getElementById('alamat').value
        };

        const requiredFields = ['nama_pemesan', 'nomor_identitas', 'nomor_hp', 'email'];
        const missingFields = requiredFields.filter(field => !dataValidator[field]);

        if (missingFields.length > 0 || dataValidator.seats.length === 0) {
            alert('Harap lengkapi semua data dan pilih setidaknya satu kursi.');
            return;
        }

        const formData = {
            user_id: document.getElementById('id_user').value,
            train_id: document.getElementById('id_train').value,
            seats: selectedSeatsDisplay.textContent
                .split(', ')
                .filter(seat => seat !== '-')
                .join(', '),
            adult_passenger: trainData.adults,
            child_passenger: trainData.infants,
            date_reservation: trainData.departureDate,
            total_amount: document.getElementById('totalPrice').value,
        };

        console.log(formData);

        fetch('/api/orders', {
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
                    throw new Error(errorData.message || 'Failed to process the order');
                });
            }
            return response.json();
        })
        .then(data => {
            order_id = data.data.order_id;
            console.log(order_id);

            const printOrderButton = document.createElement('button');
            printOrderButton.type = 'button';
            printOrderButton.className = 'print-button';
            printOrderButton.textContent = 'Cetak Pesanan';
            
            printOrderButton.addEventListener('click', () => {
                window.location.href = `/invoice/${order_id}`;
            });

            processContainer.appendChild(printOrderButton);

            processButton.disabled = true;
        })
        .catch(error => {
            console.error('Error:', error.message);
            alert(`Gagal memproses pesanan`);
        });
    });
});