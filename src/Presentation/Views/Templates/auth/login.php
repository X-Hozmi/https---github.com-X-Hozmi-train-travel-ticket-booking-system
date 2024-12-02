<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $uri = '';
    include('src/Presentation/Views/Templates/cdn.php');
    $registerPage = "$uri/register";
    $loginURL = "$uri/api/auth/login";
    $dashboardPage = "$uri/dashboard";
    ?>

    <title>Auth | Sign In</title>

    <link rel="stylesheet" href="src/Presentation/Views/Templates/auth/css/login.css">
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
                    <span style="display: flex; justify-content: center; font-size: 25px; font-weight: bold; margin-bottom: 15px;">Sign In</span>
                    <form>
                        <div class="card-body">
                            <div class="form-control">
                                <label for="username">Username</label>
                                <input type="text" id="username">
                            </div>
                            <div class="form-control">
                                <label for="password">Password</label>
                                <input type="password" id="password">
                            </div>
                            <button type="submit">Sign In</button>
                    </form>
                    <a href=<?= $registerPage; ?> style="justify-content: center; display: flex; color: black;">Register</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        const REGISTER_PAGE = "<?= $registerPage; ?>";
        const LOGIN_URL = "<?= $loginURL; ?>";
        const DASHBOARD_PAGE = "<?= $dashboardPage; ?>";
    </script>
    <script src="src/Presentation/Views/Templates/auth/js/login.js"></script>
</body>

</html>