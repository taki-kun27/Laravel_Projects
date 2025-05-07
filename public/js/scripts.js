document.addEventListener('DOMContentLoaded', function() {
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    function showError(input, message) {
        let error = input.parentElement.querySelector('.error-message');

        if (!error) {
            error = document.createElement('span');
            error.classList.add('error-message');
            error.style.color = 'red';
            error.style.fontSize = '14px';
            error.style.marginTop = '5px';
            input.parentElement.appendChild(error);
        }
        error.textContent = message;
    }

    function removeError(input) {
        const error = input.parentElement.querySelector('.error-message');
        if (error) {
            error.remove();
        }
    }

    function validateUsername(input) {
        const value = input.value.trim();
        const usernameRegex = /^[a-zA-Z0-9_]+$/;

        if (value === '') {
            showError(input, 'Username is required.');
        } else if (value.length < 4) {
            showError(input, 'Username must be at least 4 characters.');
        } else if (!usernameRegex.test(value)) {
            showError(input, 'Username can only contain letters, numbers, and underscores.');
        } else {
            removeError(input);
        }
    }

    function validatePassword(input) {
        const value = input.value.trim();
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

        if (value === '') {
            showError(input, 'Password is required.');
        } else if (!passwordRegex.test(value)) {
            showError(input, 'Password must be at least 6 characters, and include letters and numbers.');
        } else {
            removeError(input);
        }
    }

    // 👉 Real-time validation
    username.addEventListener('input', function() {
        validateUsername(username);
    });

    password.addEventListener('input', function() {
        validatePassword(password);
    });

    // Also validate again on form submit to be sure
    document.querySelector('form').addEventListener('submit', function(event) {
        validateUsername(username);
        validatePassword(password);

        if (
            username.parentElement.querySelector('.error-message') ||
            password.parentElement.querySelector('.error-message')
        ) {
            event.preventDefault();
        }
    });
});
