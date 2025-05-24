<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="auth-container">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf


            <h1>Login to Your Account</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <label for="username">
                Username:
                <input type="text" name="username" id="username" placeholder="Username" required>
            </label>

            <br>

            <label for="password">
                Password:
                <input type="password" name="password" id="password" placeholder="Password" required>
            </label>    

            <br>

            <button type="submit">Submit</button>
            <button type="reset">Reset</button>

            <p>Don't have an account? <a href="{{ route('auth.register') }}">Register</a></p>
        </form>
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
