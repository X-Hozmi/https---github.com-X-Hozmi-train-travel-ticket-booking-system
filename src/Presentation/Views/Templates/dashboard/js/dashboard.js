document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const sourceInput = document.getElementById('source');
    const destinationInput = document.getElementById('destination');
    const departureDateInput = document.getElementById('departure_date');
    const adultsInput = document.getElementById('adults');
    const infantsInput = document.getElementById('infants');

    const ticketContainer = document.querySelector('.ticket-container');
    const stationElement = document.querySelector('.station');
    const dateTicketElement = document.querySelector('.date-ticket');

    ticketContainer.style.display = 'none';

    function handleTicketSelection(ticket, trainData) {
        ticket.style.cursor = 'pointer';
        ticket.addEventListener('click', () => {
            const ticketInfo = {
                trainName: ticket.querySelector('.train-name').textContent,
                trainId: ticket.querySelector('.train-name').textContent.match(/\((\d+)\)/)[1],
                trainClass: ticket.querySelector('.train-type').textContent,
                source: ticket.querySelectorAll('.timetable-station')[0].textContent,
                destination: ticket.querySelectorAll('.timetable-station')[1].textContent,
                departureTime: ticket.querySelectorAll('.timetable-hour')[1].textContent,
                arrivalTime: ticket.querySelectorAll('.timetable-hour')[0].textContent,
                duration: ticket.querySelector('.duration span').textContent,
                price: ticket.querySelector('.price').textContent,
                status: ticket.querySelector('.ticket-status').textContent
            };

            console.log('Selected Ticket:', ticketInfo);
            // Add your custom logic here
        });
    }

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const errorDiv = document.createElement('div');
        errorDiv.style.color = 'red';
        errorDiv.style.textAlign = 'center';
        errorDiv.style.marginBottom = '10px';

        const existingError = document.querySelector('.error-message');
        if (existingError) existingError.remove();

        // Validation checks
        if (!sourceInput.value.trim()) {
            errorDiv.textContent = 'Stasiun Asal tidak boleh kosong';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        if (!destinationInput.value.trim()) {
            errorDiv.textContent = 'Stasiun Tujuan tidak boleh kosong';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        if (!departureDateInput.value.trim()) {
            errorDiv.textContent = 'Tanggal Keberangkatan tidak boleh kosong';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        if (!adultsInput.value.trim() || adultsInput.value < 0) {
            errorDiv.textContent = 'Jumlah dewasa harus valid';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        if (!infantsInput.value.trim() || infantsInput.value < 0) {
            errorDiv.textContent = 'Jumlah bayi harus valid';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        const formData = {
            source: sourceInput.value,
            destination: destinationInput.value,
        };

        const token = localStorage.getItem('access_token');
        fetch('/api/routes/check', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to fetch route data');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);

                ticketContainer.style.display = 'block';
                stationElement.textContent = `${data.data.route.source} > ${data.data.route.destination}`;
                dateTicketElement.textContent = new Date(departureDateInput.value).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                const ticketSection = document.querySelector('.ticket-container');
                ticketSection.innerHTML = `
                    <div class="ticket-header">
                        <table class="ticket-table">
                            <thead>
                                <tr>
                                    <th>Kereta</th>
                                    <th>Berangkat</th>
                                    <th>Durasi</th>
                                    <th>Tiba</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                        </table>
                    </div>`;

                data.data.kereta.forEach(train => {
                    const ticketsDiv = document.createElement('div');
                    ticketsDiv.classList.add('tickets');

                    const duration = train.duration ? 
                        (train.duration.includes(':') ? 
                            train.duration : 
                            `${Math.floor(train.duration / 60)} JAM ${train.duration % 60} MENIT`) : 
                        'Tidak Tersedia';

                    ticketsDiv.innerHTML = `
                        <table class="ticket-table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="train">
                                            <span class="train-name">${train.name} (${train.id})</span>
                                            <span class="train-type">${train.class}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="timetable">
                                            <span class="timetable-station">${data.data.route.source}</span>
                                            <span class="timetable-hour">${train.arrival}</span>
                                            <span class="timetample-date">${new Date(departureDateInput.value).toLocaleDateString('id-ID', {
                                                day: '2-digit',
                                                month: 'long',
                                                year: 'numeric'
                                            })}</span>
                                        </div>
                                    </td>
                                    <td class="duration">
                                        <span>${duration}</span>
                                    </td>
                                    <td>
                                        <div class="timetable">
                                            <span class="timetable-station">${data.data.route.destination}</span>
                                            <span class="timetable-hour">${train.departure}</span>
                                            <span class="timetample-date">${new Date(departureDateInput.value).toLocaleDateString('id-ID', {
                                                day: '2-digit',
                                                month: 'long',
                                                year: 'numeric'
                                            })}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ticket-info">
                                            <span class="price">Rp ${parseFloat(train.price).toLocaleString('id-ID', { style: 'decimal', minimumFractionDigits: 0 })},-</span>
                                            <span class="ticket-status">${train.status === 'active' ? 'TERSEDIA' : 'TIDAK TERSEDIA'}</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    `;

                    ticketSection.appendChild(ticketsDiv);
                    handleTicketSelection(ticketsDiv, train);
                });
            } else {
                throw new Error(data.message || 'Unknown error occurred');
            }
        })
        .catch(error => {
            errorDiv.textContent = error.message;
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
        });
    });
});