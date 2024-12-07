<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $uri = '';
    include('src/Presentation/Views/Templates/cdn.php');
    $loginPage = "$uri/login";
    $registerURL = "$uri/api/auth/register";
    ?>

    <title>Auth | Sign Up</title>

    <link rel="stylesheet" href="src/Presentation/Views/Templates/auth/css/register.css">
</head>

<body>
    <div class="container">
        <?php include('src/Presentation/Views/Components/navbar.php') ?>

        <div class="content-container">
            <div class="content">
                <div class="card">
                    <div class="card-title">
                        <img src="src/Presentation/Assets/img/banisaleh-logo.jpeg" alt="">
                    </div>
                    <?php include('src/Presentation/Views/Components/divider.php') ?>
                    <span style="display: flex; justify-content: center; font-size: 25px; font-weight: bold; margin-bottom: 15px;">Sign Up</span>
                    <div class="card-body">
                        <div class="form-control">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="form-control">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address">
                        </div>
                        <div class="form-control">
                            <label for="id_number">ID Number (KTP)</label>
                            <input type="text" id="id_number" name="id_number">
                        </div>
                        <div class="form-control">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="form-control">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number">
                        </div>
                        <div class="form-control">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email">
                        </div>
                        <div class="form-control">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <div class="form-control">
                            <label for="password_repeat">Repeat Password</label>
                            <input type="password" id="password_repeat" name="password_repeat">
                        </div>
                        <button type="button" class="register-button">Sign Up</button>
                    </div>
                    <a href=<?= $loginPage; ?> style="justify-content: center; display: flex; color: black;">Already have an account? Login</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const LOGIN_PAGE = "<?= $loginPage; ?>";
        const REGISTER_URL = "<?= $registerURL; ?>";
    </script>
    <script src="src/Presentation/Views/Templates/auth/js/register.js"></script>
</body>

</html>