<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include('src/Presentation/Views/Templates/cdn.php');
    ?>

    <title>Reservation</title>

    <link rel="stylesheet" href="src/Presentation/Views/Templates/reservation/css/style.css">
</head>

<body>
    <div class="container">
        <?php include('src/Presentation/Views/Components/navbar.php') ?>

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
                            <input type="hidden" id="id_train" name="id_train" value="0">
                            <input type="hidden" id="id_user" name="id_user" value="0">
                            <input type="hidden" id="totalPrice" name="totalPrice" value="0">
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

                    <div class="seat-grid" style="display: flex; justify-content: center;">
                        <?php include('src/Presentation/Views/Templates/select_seat/select_seat.php') ?>
                    </div>
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
                        <?php include('src/Presentation/Views/Components/divider.php') ?>
                        <span class="total-passanger">1 DEWASA</span>
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
                        <?php include('src/Presentation/Views/Components/divider.php') ?>
                        <div class="process">
                            <button type="button" class="process-button">Proses Pesanan</button>
                            <button type="button" class="cancel-button">Batalkan Pesanan</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="src/Presentation/Views/Templates/reservation/js/ticket.js"></script>
    <script src="src/Presentation/Views/Templates/reservation/js/order.js"></script>
</body>

</html>