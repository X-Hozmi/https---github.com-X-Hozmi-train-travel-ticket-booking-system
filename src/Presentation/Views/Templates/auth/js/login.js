document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const errorDiv = document.createElement('div');
        errorDiv.style.color = 'red';
        errorDiv.style.textAlign = 'center';
        errorDiv.style.marginBottom = '10px';

        // Remove any existing error messages
        const existingError = document.querySelector('.error-message');
        if (existingError) existingError.remove();

        // Basic client-side validation
        if (!usernameInput.value.trim()) {
            errorDiv.textContent = 'Username cannot be empty';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        if (!passwordInput.value.trim()) {
            errorDiv.textContent = 'Password cannot be empty';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
            return;
        }

        const formData = {
            username: usernameInput.value,
            password: passwordInput.value,
        };

        fetch(LOGIN_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(errorData => {
                    throw new Error(errorData.message || 'Login failed');
                });
            }
            return response.json();
        })
        .then(data => {
            localStorage.setItem('access_token', data.data.access_token);
            localStorage.setItem('refresh_token', data.data.refresh_token);
            localStorage.setItem('user', JSON.stringify(data.data.user));

            window.location.href = DASHBOARD_PAGE;
        })
        .catch(error => {
            errorDiv.textContent = error.message || 'An unexpected error occurred';
            errorDiv.classList.add('error-message');
            this.insertBefore(errorDiv, this.firstChild);
        });
    });
});