<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include('src/Presentation/Views/Templates/cdn.php');
    ?>

    <title>Dashboard</title>

    <link rel="stylesheet" href="src/Presentation/Views/Templates/dashboard/css/style.css">
</head>

<body>
    <div class="container">
        <?php include('src/Presentation/Views/Components/navbar.php') ?>

        <div class="content-container">
            <div class="content">
                <div class="card">
                    <div class="card-title">
                        <span class="title">Pemesanan Tiket</span>
                        <span class="date-title">1 Desember 2024</span>
                    </div>
                    <div class="card-body">
                        <!-- Form inputs -->
                        <div class="form-control half">
                            <label for="source">Stasiun Asal</label>
                            <input type="text" id="source" class="input-field" required>
                        </div>
                        <div class="form-control half">
                            <label for="destination">Stasiun Tujuan</label>
                            <input type="text" id="destination" class="input-field" required>
                        </div>
                        <div class="form-control third">
                            <label for="departure_date">Tanggal Keberangkatan</label>
                            <input type="date" id="departure_date" class="input-field" required>
                        </div>
                        <div class="form-control third">
                            <label for="adults">Dewasa</label>
                            <input type="number" id="adults" class="input-field" min="0" required>
                        </div>
                        <div class="form-control half">
                            <label for="infants">Bayi kurang dari tiga tahun</label>
                            <input type="number" id="infants" class="input-field" min="0">
                        </div>
                    </div>
                    <button type="button" class="search-button">Cari tiket</button>
                </div>

                <div class="ticket-container">
                    <!-- Header dengan format tabel -->
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
                    </div>

                    <!-- Tickets dengan format tabel -->
                    <div class="tickets">
                        <table class="ticket-table">
                            <tbody>
                                <tr>
                                    <!-- Kolom Kereta -->
                                    <td>
                                        <div class="train">
                                            <span class="train-name">MATARAM (90)</span>
                                            <span class="train-type">Eksekutif (AC)</span>
                                        </div>
                                    </td>

                                    <!-- Kolom Berangkat -->
                                    <td>
                                        <div class="timetable">
                                            <span class="timetable-station">BEKASI</span>
                                            <span class="timetable-hour">22:32</span>
                                            <span class="timetample-date">20 Desember 2024</span>
                                        </div>
                                    </td>

                                    <!-- Kolom Durasi -->
                                    <td class="duration">
                                        <span>7 JAM 24 MENIT</span>
                                    </td>

                                    <!-- Kolom Tiba -->
                                    <td>
                                        <div class="timetable">
                                            <span class="timetable-station">BEKASI</span>
                                            <span class="timetable-hour">05:56</span>
                                            <span class="timetample-date">21 Desember 2024</span>
                                        </div>
                                    </td>

                                    <!-- Kolom Harga -->
                                    <td>
                                        <div class="ticket-info">
                                            <span class="price">Rp 500.000,-</span>
                                            <span class="ticket-status">TERSEDIA</span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchButton = document.querySelector('.search-button');
            const sourceInput = document.getElementById('source');
            const destinationInput = document.getElementById('destination');
            const departureDateInput = document.getElementById('departure_date');
            const adultsInput = document.getElementById('adults');
            const infantsInput = document.getElementById('infants');

            const ticketContainer = document.querySelector('.ticket-container');

            ticketContainer.style.display = 'none';

            function validateInputs() {
                let isValid = true;
                const requiredInputs = [{
                        element: sourceInput,
                        message: 'Stasiun Asal tidak boleh kosong.'
                    },
                    {
                        element: destinationInput,
                        message: 'Stasiun Tujuan tidak boleh kosong.'
                    },
                    {
                        element: departureDateInput,
                        message: 'Tanggal Keberangkatan tidak boleh kosong.'
                    },
                    {
                        element: adultsInput,
                        message: 'Jumlah Dewasa tidak boleh kosong.'
                    }
                ];

                const existingErrors = document.querySelectorAll('.error-message');
                existingErrors.forEach(error => error.remove());

                requiredInputs.forEach(input => {
                    if (!input.element.value.trim()) {
                        const errorDiv = document.createElement('div');
                        errorDiv.textContent = input.message;
                        errorDiv.style.color = 'red';
                        errorDiv.style.marginTop = '5px';
                        errorDiv.classList.add('error-message');
                        input.element.insertAdjacentElement('afterend', errorDiv);
                        isValid = false;
                    }
                });

                return isValid;
            }

            function validateUserAuthentication() {
                const accessToken = localStorage.getItem('access_token');
                const refreshToken = localStorage.getItem('refresh_token');
                const user = localStorage.getItem('user');

                return !!(accessToken && refreshToken && user);
            }

            function showLoginAlert() {
                Swal.fire({
                    title: 'Login Required',
                    text: 'Please login to continue with your ticket reservation.',
                    icon: 'warning',
                    confirmButtonText: 'Go to Login',
                    confirmButtonColor: '#3085d6',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                    cancelButtonColor: '#d33'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/login';
                    }
                });
            }

            function handleTicketSelection(ticket, trainData) {
                ticket.addEventListener('click', () => {
                    if (!validateUserAuthentication()) {
                        showLoginAlert();
                        return;
                    }

                    const ticketInfo = {
                        trainName: trainData.name,
                        trainId: trainData.id,
                        trainClass: trainData.class,
                        source: ticket.querySelector('.timetable-station[data-type="source"]').textContent,
                        destination: ticket.querySelector('.timetable-station[data-type="destination"]').textContent,
                        departureTime: ticket.querySelector('.timetable-hour[data-type="departure"]').textContent,
                        arrivalTime: ticket.querySelector('.timetable-hour[data-type="arrival"]').textContent,
                        duration: ticket.querySelector('.duration span').textContent,
                        price: trainData.price,
                        status: ticket.querySelector('.ticket-status').textContent,
                        departureDate: departureDateInput.value,
                        adults: adultsInput.value,
                        infants: infantsInput.value
                    };

                    localStorage.setItem('selectedTrain', JSON.stringify(ticketInfo));

                    window.location.href = '/reservation';

                    console.log('Selected Ticket:', ticketInfo);
                });
            }

            searchButton.addEventListener('click', function(e) {
                e.preventDefault();

                if (!validateInputs()) {
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

                                const calculateDuration = (arrival, departure) => {
                                    const [arriveHour, arriveMin] = arrival.substring(0, 5).split(':').map(Number);
                                    const [departHour, departMin] = departure.substring(0, 5).split(':').map(Number);

                                    let totalMinutes = (arriveHour * 60 + arriveMin) - (departHour * 60 + departMin);

                                    if (totalMinutes < 0) {
                                        totalMinutes += 24 * 60;
                                    }

                                    const hours = Math.floor(totalMinutes / 60);
                                    const minutes = totalMinutes % 60;

                                    return `${hours} JAM ${minutes} MENIT`;
                                };

                                const duration = train.departure && train.arrival ?
                                    calculateDuration(train.arrival, train.departure) :
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
                                            <span class="timetable-station" data-type="source">${data.data.route.source}</span>
                                            <span class="timetable-hour" data-type="arrival">${train.arrival.substring(0, 5)}</span>
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
                                            <span class="timetable-station" data-type="destination">${data.data.route.destination}</span>
                                            <span class="timetable-hour" data-type="departure">${train.departure.substring(0, 5)}</span>
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
                        ticketContainer.style.display = 'none';

                        alert(error.message);
                    });
            });
        });
    </script>
</body>

</html>