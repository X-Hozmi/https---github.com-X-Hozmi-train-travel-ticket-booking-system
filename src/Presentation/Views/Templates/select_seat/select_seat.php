<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seat</title>

    <link rel="stylesheet" href="src/Presentation/Views/Templates/select_seat/css/style.css">
</head>

<body>
    <div class="cinema-container">

        <div id="errorContainer" class="error-container" style="display: none;">
            <p id="errorMessage"></p>
        </div>

        <div class="cinema-layout">
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <div class="seat-row">
                    <div class="seat" data-seat="1A">1A</div>
                    <div class="seat" data-seat="1B">1B</div>
                    <div class="seat" data-seat="1C">1C</div>
                    <div class="seat" data-seat="1D">1D</div>
                    <div class="seat" data-seat="1E">1E</div>
                    <div class="seat" data-seat="1F">1F</div>
                    <div class="seat" data-seat="1G">1G</div>
                    <div class="seat" data-seat="1H">1H</div>
                    <div class="seat" data-seat="1I">1I</div>
                    <div class="seat" data-seat="1J">1J</div>
                </div>
                <div class="seat-row">
                    <div class="seat" data-seat="2A">2A</div>
                    <div class="seat" data-seat="2B">2B</div>
                    <div class="seat" data-seat="2C">2C</div>
                    <div class="seat" data-seat="2D">2D</div>
                    <div class="seat" data-seat="2E">2E</div>
                    <div class="seat" data-seat="2F">2F</div>
                    <div class="seat" data-seat="2G">2G</div>
                    <div class="seat" data-seat="2H">2H</div>
                    <div class="seat" data-seat="2I">2I</div>
                    <div class="seat" data-seat="2J">2J</div>
                </div>
            </div>

            <div style="display: flex; flex-direction: column; gap: 5px;">
                <div class="seat-row">
                    <div class="seat" data-seat="3A">3A</div>
                    <div class="seat" data-seat="3B">3B</div>
                    <div class="seat" data-seat="3C">3C</div>
                    <div class="seat" data-seat="3D">3D</div>
                    <div class="seat" data-seat="3E">3E</div>
                    <div class="seat" data-seat="3F">3F</div>
                    <div class="seat" data-seat="3G">3G</div>
                    <div class="seat" data-seat="3H">3H</div>
                    <div class="seat" data-seat="3I">3I</div>
                    <div class="seat" data-seat="3J">3J</div>
                </div>
                <div class="seat-row">
                    <div class="seat" data-seat="4A">4A</div>
                    <div class="seat" data-seat="4B">4B</div>
                    <div class="seat" data-seat="4C">4C</div>
                    <div class="seat" data-seat="4D">4D</div>
                    <div class="seat" data-seat="4E">4E</div>
                    <div class="seat" data-seat="4F">4F</div>
                    <div class="seat" data-seat="4G">4G</div>
                    <div class="seat" data-seat="4H">4H</div>
                    <div class="seat" data-seat="4I">4I</div>
                    <div class="seat" data-seat="4J">4J</div>
                </div>
            </div>
        </div>

        <div class="selected-seats">
            Kursi terpilih: <span id="selectedSeatsDisplay">-</span>
        </div>
    </div>

    <script src="src/Presentation/Views/Templates/select_seat/js/seat.js"></script>
    <script>
        // Communicate selected seats to parent window
        document.addEventListener('seatsUpdated', function(event) {
            const selectedSeats = event.detail.selectedSeats;

            // Update total passengers in parent window
            const totalPassengerSpan = parent.document.querySelector('.total-passanger');
            if (totalPassengerSpan) {
                totalPassengerSpan.textContent = `${selectedSeats.length} DEWASA`;
            }
        });
    </script>
</body>

</html>