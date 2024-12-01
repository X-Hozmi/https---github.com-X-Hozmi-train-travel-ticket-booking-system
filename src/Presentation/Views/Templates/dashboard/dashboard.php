<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
        include("src/Presentation/Views/Templates/cdn.php");
    ?>

    <title>Auth | Sign In</title>

    <style>
        .content-container {
            /* height: calc(100vh - 80px); */
            background-color: aliceblue;
            background-size: cover; /* Agar gambar menutupi seluruh area */
            background-position: center; /* Agar gambar terpusat di tengah */
            background-repeat: no-repeat; /* Agar gambar tidak diulang */
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Horizontal centering */
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card {
            padding: 20px;
            border-radius: 8px;
            width: 70rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: #174592;
            color: white;            
        }

        .card-title {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .title {
            font-size: 30px;
        }

        .date-title {
            font-size: 20px;
        }

        .card-title img {
            height: 100px;
            width: auto;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-wrap: wrap; /* Membungkus elemen jika tidak cukup ruang */
            gap: 20px; /* Jarak antar elemen */
        }

        .search-button {
            font-size: 16px;
            height: 2.5rem;
            border-radius: 4px;
            background-color: #eb6923; /* Warna kuning-oranye utama */
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease; /* Transisi halus untuk perubahan warna */
        }

        .search-button:hover {
            background-color: #d95f20; /* Warna kuning-oranye sedikit lebih gelap saat hover */
        }

        .search-button:active {
            background-color: #c4541c; /* Warna kuning-oranye lebih gelap saat diklik */
        }


        .form-control {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-control.half { /* Setara dengan col-6 */
            flex: 1 1 calc(50% - 20px); /* 50% lebar kartu dikurangi gap */
        }

        .form-control.third { /* Setara dengan col-3 */
            flex: 1 1 calc(33.333% - 20px); /* 33.33% lebar kartu dikurangi gap */
        }

        .form-control.full { /* Setara dengan col-12 */
            flex: 1 1 100%; /* Lebar penuh */
        }

        input {
            width: 100%; /* Pastikan ukurannya sesuai */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
            height: 40px;
            transition: all 0.3s ease;
        }        

        input:focus {
            border-color: #007bff; /* Warna biru pada border */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Efek shadow halus */
        }

        input:not(:focus) {
            border-color: white; /* Warna border default */
            background-color: white; /* Background default */
            box-shadow: none; /* Menghilangkan shadow saat tidak fokus */
        }

        .destination {
            display: flex;
            align-items: center;
            background-color: #eb6923;
            color: white;
            margin-top: 10px;
            width: 100%;
            justify-content: center;
            border-radius: 8px;
            height: 60px;
            flex-direction: column;
            padding: 0 30px;
        }

        .station {
            color: white;
            font-size: 25px;
            font-weight: bold;
        }

        .ticket-container {
            margin-top: 20px;
            width: 100%;
        }

        /* Header Table */
        .ticket-header {
            background-color: #174592;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 10px;
            color: white;
        }

        .ticket-header .ticket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ticket-header th {
            text-align: left;
            padding: 10px;
            color: white;
            font-size: 16px;
        }

        /* Tickets Table */
        .tickets {
            background-color: #007bff;
            border-radius: 8px;
            padding: 10px;
            color: white;
            margin: 20px 0;
            cursor: pointer;
        }

        .tickets .ticket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .tickets td {
            padding: 10px;
            vertical-align: top;
        }

        /* Train Details */
        .train {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .train-name {
            font-size: 16px;
            font-weight: bold;
        }

        .train-type {
            font-size: 14px;
        }

        /* Timetable Details */
        .timetable {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .timetable-station {
            font-weight: bold;
        }

        .timetable-hour {
            font-size: 16px;
            font-weight: bold;
        }

        .timetample-date {
            font-size: 14px;
            color: white;
        }

        /* Duration */
        .duration {
            text-align: center;
            font-weight: bold;
        }

        /* Ticket Info */
        .ticket-info {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .price {
            font-size: 20px;
            font-weight: bold;
            color: orange;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .ticket-status {
            font-size: 14px;
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="container">
        <?php include("src/Presentation/Views/Components/navbar.php") ?>

        <div class="content-container">
            <div class="content">
                <div class="card">
                    <div class="card-title">
                        <span class="title">Pemesanan Tiket</span>
                        <span class="date-title">1 Desember 2024</span>
                    </div>
                    <div class="card-body">
                        <!-- Dua elemen berdampingan, masing-masing setara dengan col-6 -->
                        <div class="form-control half">
                            <label for="stasiun_asal">Stasiun Asal</label>
                            <input type="text" id="stasiun_asal" class="input-field">
                        </div>
                        <div class="form-control half">
                            <label for="stasiun_tujuan">Stasiun Tujuan</label>
                            <input type="text" id="stasiun_tujuan">
                        </div>

                        <!-- Dua elemen berdampingan, masing-masing setara dengan col-3 -->
                        <div class="form-control third">
                            <label for="tanggal_keberangkatan">Tanggal Keberangkatan</label>
                            <input type="text" id="tanggal_keberangkatan">
                        </div>
                        <div class="form-control third">
                            <label for="dewasa">Dewasa</label>
                            <input type="text" id="dewasa">
                        </div>
                        
                        <!-- Satu elemen lebih besar, setara dengan col-6 -->
                        <div class="form-control half">
                            <label for="bayi">Bayi kurang dari tiga tahun</label>
                            <input type="text" id="bayi">
                        </div>

                    </div>

                    <button type="button" class="search-button" >Cari tiket</button>

                </div>
                <div class="destination">
                    <span class="station">BEKASI > SOLO BALAPAN</span>
                    <span class="date-ticket">20 Desember 2024</span>
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
</body>
</html>
