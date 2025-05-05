<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="auth-container">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf

            <label for="username">
                Username:
                <input type="text" name="username" id="username" placeholder="Enter Username" required>
            </label>

            <br>

            <label for="password">
                Password:
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
            </label>    

            <br>

            <button type="submit">Submit</button>
            <button type="reset">Reset</button>
        </form>
    </div>
</body>
</html>
