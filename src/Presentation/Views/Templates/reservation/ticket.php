<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
        include("src/Presentation/Views/Templates/cdn.php");
    ?>

    <title>Dashboard</title>

    <style>
        .content-container {
            background-color: aliceblue;
            padding: 10px;
            display: flex;
            justify-content: center; /* Horizontal centering */
        }

        .content {
            display: flex;
            gap: 20px;
        }

        .card {
            padding: 20px;
            border-radius: 8px;
            width: 50rem;
            display: flex;
            flex-direction: column;
            gap: 20px;
            border: 1px solid #174592;
            background-color: white;
            color: #174592;            
        }

        .pricetag {
            border: 1px solid #eb6923;
            border-radius: 8px;
            height: 25rem;
            width: 25rem;
            background-color: white;
        }

        .pricetag-title {
            background-color: #eb6923;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .pricetag-info {
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .process {
            display: flex;
            width: 100%;
            justify-content: center;
            gap: 20px;
        }

        .train-destination {
            display: block;  
            margin-top: 20px;  
        }

        .train-table {
            width: 100%;
            border-collapse: collapse; /* Agar border table tidak terpisah */

        }

        .left, .right {
            width: 30%; /* Kolom kiri dan kanan memiliki lebar sama */
        }

        .center {
            width: 10%; /* Kolom tengah memiliki lebar sedikit lebih besar */
            text-align: center;
        }

        .table-left-train {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .tag {
            font-size: 30px;
            font-weight: 500;
            color: white;
        }

        .card-title {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .card-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
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

        .process-button {
            font-size: 16px;
            height: 2.5rem;
            border-radius: 4px;
            background-color: #1a4d87; /* Warna biru tua */
            color: white;
            border: none;
            cursor: pointer;
            width: 10rem;
            transition: background-color 0.3s ease; /* Transisi halus untuk perubahan warna */
        }

        .process-button:hover {
            background-color: #1e3c6b; /* Biru sedikit lebih gelap saat hover */
        }

        .process-button:active {
            background-color: #163c5c; /* Biru lebih gelap saat diklik */
        }

        .cancel-button {
            font-size: 16px;
            height: 2.5rem;
            border-radius: 4px;
            background-color: #e74c3c; /* Warna merah utama */
            color: white;
            border: none;
            cursor: pointer;
            width: 10rem;
            transition: background-color 0.3s ease; /* Transisi halus untuk perubahan warna */
        }

        .cancel-button:hover {
            background-color: #c0392b; /* Warna merah sedikit lebih gelap saat hover */
        }

        .cancel-button:active {
            background-color: #b03a2e; /* Warna merah lebih gelap saat diklik */
        }


        .card-body {
            display: flex;
            flex-wrap: wrap; /* Membungkus item ke baris baru jika tidak cukup ruang */
            gap: 20px; /* Jarak antar elemen form */
        }

        .form-control {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-control.col-5 { /* Setara dengan col-5 */
            flex: 1 1 calc(41.666% - 165px); /* 5/12 = 41.666% lebar */
        }

        .form-control.col-7 { /* Setara dengan col-7 */
            flex: 1 1 calc(58.333% - 20px); /* 7/12 = 58.333% lebar */
        }

        .form-control.third { /* Jika ingin 3 elemen dalam satu baris */
            flex: 1 1 calc(33.333% - 20px);
        }

        .form-control.full { /* Untuk elemen lebar penuh */
            flex: 1 1 100%;
        }


        input, select {
            width: 100%; /* Pastikan ukurannya sesuai */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
            height: 40px;
            transition: all 0.3s ease;
        }     

        /* Mengubah warna placeholder */
        input::placeholder {
            color: #999; /* Warna abu-abu lebih pudar */
            opacity: 0.7; /* Transparansi */
        }
   

        select:focus,input:focus {
            border-color: #007bff; /* Warna biru pada border */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Efek shadow halus */
        }

        select:not(:focus), input:not(:focus) {
            border-color: #ccc; /* Warna border default */
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

        /* Train Details */
        .train {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .train-name {
            font-size: 20px;
            font-weight: bold;
        }

        .train-type {
            font-size: 17px;
        }

        .passanger {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .passanger-info {
            display: flex;
            align-items: center;
        }

        .seat {
            margin-left: auto;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 500;
            color: white;
            background-color:#d95f20;
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
                <!-- Form Card -->
                <div class="card-column">
                    <div class="card">
                        <div class="card-title">
                            <span class="title">Pemesanan</span>
                            <span class="date-title">Data Pemesanan</span>
                        </div>
                        <div class="card-body">
                            <!-- Form kiri (col-5) -->
                            <div class="form-control col-5">
                                <label for="title">Title</label>
                                <select id="title" class="input-field">
                                    <option value="TUAN">TUAN</option>
                                    <option value="NYONYA">NYONYA</option>
                                </select>
                            </div>
                            <!-- Form kanan (col-7) -->
                            <div class="form-control col-7">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" id="nama_pemesan" placeholder="Nama sesuai NIK / Paspor">
                            </div>
    
                            <!-- Baris berikutnya -->
                            <div class="form-control col-5">
                                <label for="tipe_identitas">Tipe Identitas</label>
                                <select id="tipe_identitas" class="input-field">
                                    <option value="NIK">NIK</option>
                                    <option value="PASPOR">PASPOR</option>
                                </select>
                            </div>
                            <div class="form-control col-7">
                                <label for="nomor_identitas">Nomor Identitas</label>
                                <input type="text" id="nomor_identitas" placeholder="No Identitas sesuai NIK / Paspor">
                            </div>
    
                            <!-- Form baru -->
                            <div class="form-control col-5">
                                <label for="nomor_hp">No. HP Pemesan</label>
                                <input type="text" id="nomor_hp" placeholder="08xxxxxxx">
                            </div>
                            <div class="form-control col-7">
                                <label for="email">Email</label>
                                <input type="email" id="email" placeholder="example@gmail.com">
                            </div>
    
                            <!-- Alamat -->
                            <div class="form-control">
                                <label for="alamat">Alamat</label>
                                <input type="text" id="alamat" placeholder="Nama Daerah">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-title">
                            <span style="font-weight: bold;">Data Penumpang 1</span>
                        </div>
                        <div class="card-body">
                            <!-- Form kiri (col-5) -->
                            <div class="form-control col-5">
                                <label for="title">Title</label>
                                <select id="title" class="input-field">
                                    <option value="TUAN">TUAN</option>
                                    <option value="NYONYA">NYONYA</option>
                                </select>
                            </div>
                            <!-- Form kanan (col-7) -->
                            <div class="form-control col-7">
                                <label for="nama_pemesan">Nama Pemesan</label>
                                <input type="text" id="nama_pemesan" placeholder="Nama sesuai NIK / Paspor">
                            </div>
    
                            <!-- Baris berikutnya -->
                            <div class="form-control col-5">
                                <label for="tipe_identitas">Tipe Identitas</label>
                                <select id="tipe_identitas" class="input-field">
                                    <option value="NIK">NIK</option>
                                    <option value="PASPOR">PASPOR</option>
                                </select>
                            </div>
                            <div class="form-control col-7">
                                <label for="nomor_identitas">Nomor Identitas</label>
                                <input type="text" id="nomor_identitas" placeholder="No Identitas sesuai NIK / Paspor">
                            </div>
    
                        </div>
                    </div>
                    <button type="button" class="search-button">PESAN</button>
                </div>
                
                <!-- Price Summary -->
                <div class="pricetag">
                    <div class="pricetag-title">
                        <span class="tag">Total Rp. 100.000</span>
                    </div>
                    <div class="pricetag-info">
                        <div class="train">
                            <span class="train-name">Gajayana Luxury (56L)</span>
                            <span class="train-type">Eksekutif - AA</span>
                        </div>
                        <?php include("src/Presentation/Views/Components/divider.php") ?>
                        <span class="total-passanger">1 DEWASA</span>
                        <div class="passanger">
                            <div class="passanger-info">
                                <span class="person">Budiono Siregar</span>
                                <span class="seat">LUX-1 , 2B</span>
                            </div>
                        </div>
                        <div class="train-destination">
                            <table class="train-table">
                                <tr>
                                    <td class="left">
                                        <div class="table-left-train">
                                            <span>BEKASI</span>
                                            <span>22:00</span>
                                            <span>3 Desember 2024</span>
                                        </div>
                                    </td>
                                    <td class="center">TO</td>
                                    <td class="right">
                                        <div class="table-left-train">
                                            <span>BEKASI</span>
                                            <span>22:00</span>
                                            <span>3 Desember 2024</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php include("src/Presentation/Views/Components/divider.php") ?>
                        <div class="process">
                            <button type="button" class="process-button">Proses Pesanan</button>
                            <button type="button" class="cancel-button">Batalkan Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
