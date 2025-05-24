document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');

    // Validate on input
    username.addEventListener('input', function () {
        removeError(username);
        if (!username.value.trim()) {
            showError(username, 'Username is required.');
        }
    });

    password.addEventListener('input', function () {
        removeError(password);
        if (password.value.length < 6) {
            showError(password, 'Password must be at least 6 characters.');
        }
    });

    confirmPassword.addEventListener('input', function () {
        removeError(confirmPassword);
        if (password.value !== confirmPassword.value) {
            showError(confirmPassword, 'Passwords do not match.');
        }
    });

    form.addEventListener('submit', function (e) {
        // Remove previous error messages
        [username, password, confirmPassword].forEach(removeError);

        let valid = true;

        if (!username.value.trim()) {
            showError(username, 'Username is required.');
            valid = false;
        }
        if (password.value.length < 6) {
            showError(password, 'Password must be at least 6 characters.');
            valid = false;
        }
        if (password.value !== confirmPassword.value) {
            showError(confirmPassword, 'Passwords do not match.');
            valid = false;
        }

        if (!valid) {
            e.preventDefault();
        }
    });

    function showError(input, message) {
        removeError(input);
        const error = document.createElement('div');
        error.className = 'js-error';
        error.style.color = 'red';
        error.style.fontSize = '13px';
        error.style.marginTop = '4px';
        error.textContent = message;
        input.parentNode.appendChild(error);
    }

    function removeError(input) {
        const error = input.parentNode.querySelector('.js-error');
        if (error) error.remove();
    }
});