<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Seat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        .cinema-layout {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Jarak antara ROW 1 dan ROW 2 */
        }

        .seat-row {
            display: flex;
            align-items: center;
            gap: 10px; /* Jarak antar kursi */
        }

        .seat-label {
            font-weight: bold;
            margin-right: 15px; /* Jarak label dengan kursi */
            font-size: 16px;
        }

        .seat {
            width: 40px;
            height: 40px;
            background-color: #e0e0e0;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #333;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .seat:hover {
            background-color: #6c757d;
            color: #fff;
            transform: scale(1);
        }

        .seat.selected {
            background-color: #d95f20;
            color: #fff;
            transform: scale(1);
        }
    </style>
</head>
<body>
    <div class="cinema-layout">
        <!-- ROW 1 -->
        <div style="display: flex; flex-direction: column; gap: 5px;">
            <div class="seat-row">
                <div class="seat" data-seat="1A"></div>
                <div class="seat" data-seat="1B"></div>
                <div class="seat" data-seat="1C"></div>
                <div class="seat" data-seat="1D"></div>
                <div class="seat" data-seat="1A"></div>
                <div class="seat" data-seat="1B"></div>
                <div class="seat" data-seat="1C"></div>
                <div class="seat" data-seat="1D"></div>
                <div class="seat" data-seat="1C"></div>
                <div class="seat" data-seat="1D"></div>
            </div>
            <div class="seat-row">
                <div class="seat" data-seat="1A"></div>
                <div class="seat" data-seat="1B"></div>
                <div class="seat" data-seat="1C"></div>
                <div class="seat" data-seat="1D"></div>
                <div class="seat" data-seat="1A"></div>
                <div class="seat" data-seat="1B"></div>
                <div class="seat" data-seat="1C"></div>
                <div class="seat" data-seat="1D"></div>
                <div class="seat" data-seat="1C"></div>
                <div class="seat" data-seat="1D"></div>
            </div>
        </div>

        <div style="display: flex; flex-direction: column; gap: 5px;">
            <!-- ROW 2 -->
            <div class="seat-row">
                <div class="seat" data-seat="2A"></div>
                <div class="seat" data-seat="2B"></div>
                <div class="seat" data-seat="2C"></div>
                <div class="seat" data-seat="2D"></div>
                <div class="seat" data-seat="2A"></div>
                <div class="seat" data-seat="2B"></div>
                <div class="seat" data-seat="2C"></div>
                <div class="seat" data-seat="2D"></div>
                <div class="seat" data-seat="2C"></div>
                <div class="seat" data-seat="2D"></div>
            </div>
            <div class="seat-row">
                <div class="seat" data-seat="2A"></div>
                <div class="seat" data-seat="2B"></div>
                <div class="seat" data-seat="2C"></div>
                <div class="seat" data-seat="2D"></div>
                <div class="seat" data-seat="2A"></div>
                <div class="seat" data-seat="2B"></div>
                <div class="seat" data-seat="2C"></div>
                <div class="seat" data-seat="2D"></div>
                <div class="seat" data-seat="2C"></div>
                <div class="seat" data-seat="2D"></div>
            </div>
        </div>
    </div>

    <script>
        const seats = document.querySelectorAll('.seat');

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                console.log(seat.attributes.getNamedItem('data-seat').value);
                seat.classList.toggle('selected'); // Toggle selected class on click
            });
        });
    </script>
</body>
</html>
