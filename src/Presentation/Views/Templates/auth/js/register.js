document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('signup-form');

    const validators = {
        name: (value) => value.trim().length > 0,
        id_number: (value) => /^\d{10,20}$/.test(value),
        username: (value) => value.trim().length >= 3 && /^[a-zA-Z0-9_]+$/.test(value),
        email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
        password: (value) => value.length >= 8,
        password_repeat: (value) => value === document.getElementById('password').value
    };

    const errorMessages = {
        name: 'Name is required',
        id_number: 'ID Number must be between 10-20 digits',
        username: 'Username must be at least 3 characters, alphanumeric or underscore',
        email: 'Invalid email format',
        password: 'Password must be at least 8 characters',
        password_repeat: 'Passwords do not match'
    };

    function validateField(input) {
        const value = input.value.trim();
        const validator = validators[input.name];
        const errorSpan = input.nextElementSibling || document.createElement('span');
        
        if (!validator(value)) {
            input.classList.add('error-input');
            errorSpan.textContent = errorMessages[input.name];
            errorSpan.classList.add('error-message');
            if (!errorSpan.parentNode) {
                input.parentNode.insertBefore(errorSpan, input.nextSibling);
            }
            return false;
        } else {
            input.classList.remove('error-input');
            if (errorSpan && errorSpan.classList.contains('error-message')) {
                errorSpan.remove();
            }
            return true;
        }
    }

    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('blur', () => validateField(input));
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const inputs = form.querySelectorAll('input');
        let isValid = true;

        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (isValid) {
            const formData = Object.fromEntries(new FormData(form));
            
            fetch(REGISTER_URL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(errorData => {
                        throw new Error(errorData.message || 'Registration failed');
                    });
                }
                return response.json();
            })
            .then(data => {
                const successMessage = document.createElement('div');
                successMessage.textContent = 'Registration successful! Redirecting...';
                successMessage.style.color = 'green';
                successMessage.classList.add('error-message');
                form.insertBefore(successMessage, form.firstChild);

                setTimeout(() => {
                    window.location.href = LOGIN_PAGE;
                }, 2000);
            })
            .catch(error => {
                const errorDiv = document.createElement('div');
                errorDiv.textContent = error.message || 'An unexpected error occurred';
                errorDiv.style.color = 'red';
                errorDiv.classList.add('error-message');
                form.insertBefore(errorDiv, form.firstChild);
            });
        }
    });
});