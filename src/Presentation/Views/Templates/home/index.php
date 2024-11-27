<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Metro Express</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,600;1,700&display=swap" rel="stylesheet" />

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="src/Presentation/Assets/css/style.css">
    <link rel="stylesheet" href="src/Presentation/Assets/css/auth.css">
</head>

<body>
    <!-- navbar start-->
    <nav class="navbar">
        <a class="navbar-logo">BanG<span> Dream.</span></a>
        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Roselia</a>
            <a href="#menu">Poppin'Party</a>
            <a href="#produk">Raise A Suilen</a>
            <a href="#contact">Tiket</a>
        </div>
        <div class="navbar-ekstra">
            <a href="#" id="user-button">
                <i data-feather="user"></i>
            </a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- navbar end-->

    <!-- Hero section start -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Metro <br><span><i>Express</i></span></h1>
            <!-- <p>
                Konser Vtuber yang menghadirkan Roselia, Poppin's Party, dan Wali
            </p>
            <a href="#" class="cta">Beli Sekarang</a> -->
        </main>
    </section>
    <!-- Hero section end-->


    <!-- about section start -->
    <section id="about" class="about">
        <h2>The<span> Dreamer</span> </h2>

        <div class="row">
            <div class="about-img">
                <img src="src/Presentation/Assets/img/tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Siapakah Mereka?</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reprehenderit odio a quos. Voluptate,
                    incidunt dolor.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur eligendi, voluptatum fugit vel
                    quidem voluptatibus optio eveniet eos quisquam amet?</p>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- menu section start -->
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum dolore, quaerat quos perferendis expedita
            vero!</p>
        <div class="row">
            <div class="menu-card">
                <img src="src/Presentation/Assets/img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p class="menu-card-price">IDR 15k</p>
            </div>
            <div class="menu-card">
                <img src="src/Presentation/Assets/img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p class="menu-card-price">IDR 15k</p>
            </div>
            <div class="menu-card">
                <img src="src/Presentation/Assets/img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p class="menu-card-price">IDR 15k</p>
            </div>
            <div class="menu-card">
                <img src="src/Presentation/Assets/img/menu/1.jpg" alt="Espresso" class="menu-card-img">
                <h3 class="menu-card-title">- Espresso -</h3>
                <p class="menu-card-price">IDR 15k</p>
            </div>
        </div>
    </section>
    <!-- menu section end -->

    <!-- produk section awal  -->
    <section class="produk" id="produk">
        <h2><span>Produk Unggulan</span> Kami</h2>
    </section>
    <!-- produk section akhir  -->

    <!-- kontak section start -->
    <section id="contact" class="contact">
        <h2><span>Pesan</span> Tiket</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Repellendus quaerat ad velit voluptatum architecto officiis.
        </p>

        <div class="container">
            <form action="">
                <div class="input-group input-group-icon">
                    <input type="text" id="judul" name="judul" placeholder="Nama Film" required>
                    <div class="input-icon">
                        <i class="fa fa-film"></i>
                    </div>
                </div>

                <div class="input-group input-group-icon">
                    <input type="text" id="kategori" name="kategori" placeholder="Kategori Film" required>
                    <div class="input-icon">
                        <i class="fa fa-smile"></i>
                    </div>
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
    </section>
    <!-- kontak section end -->

    <!-- footer start -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by
                <a href="">Dwis</a>. | &copy; 2024.
            </p>
        </div>
    </footer>
    <!-- footer end -->

    <!-- feather icon -->
    <script>
        feather.replace();

        document.getElementById('ticket-link').addEventListener('click', function(event) {
            const user = JSON.parse(localStorage.getItem('user'));
            if (!user) {
                event.preventDefault();
                showAuthDialog();
            }
        });

        document.getElementById('ticket-form').addEventListener('submit', function(event) {
            event.preventDefault();
            Swal.fire({
                icon: 'success',
                title: 'Tiket Dipesan!',
                text: 'Terima kasih telah memesan tiket.',
                timer: 1500
            });
        });
    </script>
    <script src="src/Presentation/Views/Templates/home/js/script.js"></script>
    <script src="src/Presentation/Views/Templates/home/js/auth.js"></script>
</body>

</html>