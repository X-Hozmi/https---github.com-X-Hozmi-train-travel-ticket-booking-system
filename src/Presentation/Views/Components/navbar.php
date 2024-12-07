<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>KAI Navbar</title>
    <style>
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #f8f8f8;
        }

        .navs {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .navs span {
            font-size: 20px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navs span:hover {
            color: #007bff;
        }

        .logout-btn {
            margin-left: 15px;
            cursor: pointer;
            color: red;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <img src="src/Presentation/Assets/img/banisaleh-logo.jpeg" alt="Logo KAI">
        <div class="navs" id="authSection">
            <span id="loginLink">Login</span>
            <span>|</span>
            <span id="registerLink">Register</span>
        </div>
    </nav>

    <script>
        function checkAuthState() {
            const user = JSON.parse(localStorage.getItem('user'));
            const authSection = document.getElementById('authSection');

            if (user) {
                authSection.innerHTML = '';

                const userSpan = document.createElement('span');
                userSpan.textContent = user.name;
                userSpan.style.fontWeight = 'bold';
                authSection.appendChild(userSpan);

                const separator = document.createElement('span');
                separator.textContent = ' | ';
                authSection.appendChild(separator);

                const logoutSpan = document.createElement('span');
                logoutSpan.textContent = 'Logout';
                logoutSpan.classList.add('logout-btn');
                logoutSpan.addEventListener('click', () => {
                    localStorage.clear();
                    // window.location.reload();
                    window.location.href = '/';
                });
                authSection.appendChild(logoutSpan);
            }
        }

        document.getElementById('loginLink').addEventListener('click', () => {
            window.location.href = '/login';
        });

        document.getElementById('registerLink').addEventListener('click', () => {
            window.location.href = '/register';
        });

        document.addEventListener('DOMContentLoaded', checkAuthState);
    </script>
</body>

</html>