<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Portal</title>

    <link rel="stylesheet" href="{{ asset('css/registerStyle.css') }}">
</head>
<body>
    <form action="{{ route('auth.register.post') }}" method="POST">
        @csrf

        <h1>Register Your Account</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="username">
            Username:
            <input type="text" name="username" id="username" placeholder="Enter your Username" value="{{ old('username') }}" required>
        </label>

        <label for="password">
            Password:
            <input type="password" name="password" id="password" placeholder="Enter your Password" required>
        </label>
        <label for="confirm_password">
            Confirm Password:
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your Password" required>
        </label>
        <button type="submit">Submit</button>
        <button type="reset">Reset</button>
        <p>Already have an account? <a href="{{ route('auth.login') }}">Login</a></p>
    </form>
</body>
<script src="{{ asset('js/registerValidation.js') }}"></script>
</html>