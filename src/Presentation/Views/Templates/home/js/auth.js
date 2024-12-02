async function handleAuthRequest(endpoint, data) {
    try {
        const response = await fetch(`api/auth/${endpoint}`, {
            method: endpoint == 'logout' ? 'DELETE' : 'POST',
            headers: {
                'Content-Type': 'application/json',
                ...(localStorage.getItem('access_token') ? {
                    'Authorization': `Bearer ${localStorage.getItem('access_token')}`
                } : {})
            },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (endpoint === 'login' && result.status === 'success') {
            localStorage.setItem('access_token', result.data.access_token);
            localStorage.setItem('refresh_token', result.data.refresh_token);
            localStorage.setItem('user', JSON.stringify(result.data.user));
        }

        return result;
    } catch (error) {
        return {
            status: 'error',
            message: 'Network error: ' + error.message
        };
    }
}

function showLoginForm() {
    Swal.fire({
        title: 'Login',
        html: `
            <div class="custom-form">
                <div class="form-group">
                    <input type="text" id="login-username" class="swal2-input" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" id="login-password" class="swal2-input" placeholder="Password">
                </div>
            </div>
        `,
        confirmButtonText: 'Sign In',
        showCancelButton: true,
        cancelButtonText: 'Back',
        focusConfirm: false,
        preConfirm: async () => {
            const username = document.getElementById('login-username').value;
            const password = document.getElementById('login-password').value;

            if (!username || !password) {
                Swal.showValidationMessage('Please enter both username and password');
                return false;
            }

            const result = await handleAuthRequest('login', { username, password });

            if (result.status !== 'success') {
                Swal.showValidationMessage(result.message);
                return false;
            }

            return result;
        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.cancel) {
            showAuthDialog();
        } else if (result.value && result.value.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Logged In Successfully!',
                text: `Welcome back, ${result.value.data.user.username}!`,
                timer: 1500
            }).then(() => {
                window.location.reload();
            });
        }
    });
}

function showRegisterForm() {
    Swal.fire({
        title: 'Create Account',
        html: `
            <div class="custom-form">
                <div class="form-group">
                    <input type="text" id="register-name" class="swal2-input" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="text" id="register-id-number" class="swal2-input" placeholder="ID Number (KTP)">
                </div>
                <div class="form-group">
                    <input type="text" id="register-username" class="swal2-input" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" id="register-email" class="swal2-input" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" id="register-password" class="swal2-input" placeholder="Password">
                </div>
            </div>
        `,
        confirmButtonText: 'Register',
        showCancelButton: true,
        cancelButtonText: 'Back',
        focusConfirm: false,
        preConfirm: async () => {
            const name = document.getElementById('register-name').value;
            const idNumber = document.getElementById('register-id-number').value;
            const username = document.getElementById('register-username').value;
            const email = document.getElementById('register-email').value;
            const password = document.getElementById('register-password').value;

            if (!name || !idNumber || !username || !email || !password) {
                Swal.showValidationMessage('Please fill in all fields');
                return false;
            }

            const result = await handleAuthRequest('register', {
                name,
                id_number: idNumber,
                username,
                email,
                password
            });

            if (result.status !== 'success') {
                Swal.showValidationMessage(result.message);
                return false;
            }

            return result;
        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.cancel) {
            showAuthDialog();
        } else if (result.value && result.value.status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful!',
                text: 'You can now login with your credentials.',
                timer: 2000
            }).then(() => {
                showLoginForm();
            });
        }
    });
}

function showAuthDialog() {
    Swal.fire({
        title: 'Welcome!',
        text: 'Please choose an option to continue',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Login',
        cancelButtonText: 'Register',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#28a745',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            showLoginForm();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            showRegisterForm();
        }
    });
}

async function handleLogout() {
    try {
        const result = await handleAuthRequest('logout', {});
        
        if (result.status === 'success') {
            localStorage.removeItem('access_token');
            localStorage.removeItem('refresh_token');
            localStorage.removeItem('user');
            
            Swal.fire({
                icon: 'success',
                title: 'Logged Out Successfully!',
                text: 'See you again!',
                timer: 1500
            }).then(() => {
                window.location.reload();
            });
        }
    } catch (error) {
        console.error('Logout error:', error);
        Swal.fire({
            icon: 'error',
            title: 'Logout Failed',
            text: 'An error occurred during logout'
        });
    }
}

// Check authentication status on page load
document.addEventListener('DOMContentLoaded', () => {
    const user = JSON.parse(localStorage.getItem('user'));
    const userButton = document.getElementById('user-button');
    
    if (user) {
        userButton.innerHTML = `<i data-feather="log-out"></i> ${user.username}`;
        userButton.onclick = handleLogout;
    } else {
        userButton.innerHTML = '<i data-feather="user"></i>';
        userButton.onclick = showAuthDialog;
    }
    
    // Re-run Feather icons
    feather.replace();
});