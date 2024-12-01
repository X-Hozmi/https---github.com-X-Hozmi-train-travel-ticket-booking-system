<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
        include("src/Presentation/Views/Templates/cdn.php");
    ?>

    <title>Auth | Sign Up</title>

    <style>
        .content-container {
            height: calc(100vh - 80px);
            background-color: aliceblue;
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center; /* Horizontal centering */
            justify-content: center; /* Vertical centering */
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            width: 30rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-title img {
            height: 100px;
            width: auto;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .card-body button {
            font-size: 16px;
            height: 2.5rem;
            border-radius: 4px;
            background-color: #174592;
            color: white;
        }

        .form-control {
            display: flex;
            flex-direction: column;
            gap: 5px;
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
            border-color: #ccc; /* Warna border default */
            background-color: white; /* Background default */
            box-shadow: none; /* Menghilangkan shadow saat tidak fokus */
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
                        <img src="src/Presentation/Assets/img/banisaleh-logo.jpeg" alt="">
                    </div>
                    <?php include("src/Presentation/Views/Components/divider.php") ?>
                    <span style="display: flex; justify-content: center; font-size: 25px; font-weight: bold; margin-bottom: 15px;">Sign Up</span>
                    <div class="card-body">
                        <div class="form-control">
                            <label for="username">Username</label>
                            <input type="text" id="username">
                        </div>
                        <div class="form-control">
                            <label for="password">Password</label>
                            <input type="password" id="password">
                        </div>
                        <button type="button">Sign Up</button>
                        <a href="travel-ticket/register" style="justify-content: center; display: flex; color: black;">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
