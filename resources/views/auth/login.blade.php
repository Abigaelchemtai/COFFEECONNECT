<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

<style>
        body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f0f0f0;
    }

    .login-container {
        background-color: #4e342e;
        padding: 20px 40px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 300px;
    }

    .login-container h2 {
        color: #a5d6a7;
        margin-bottom: 20px;
    }

    .login-container label {
        display: block;
        color: #ffffff;
        margin-bottom: 5px;
        text-align: left;
    }

    .login-container input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .login-container button {
        background-color: #388e3c;
        color: #ffffff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    .login-container button:hover {
        background-color: #2e7d32;
    }

    .social-login {
        margin-top: 20px;
    }

    .social-login p {
        color: #ffffff;
        margin-bottom: 10px;
    }

    .social-btn {
        background-color: #ffffff;
        color: #4e342e;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .social-btn.google {
        background-color: #db4437;
        color: #ffffff;
    }

    .social-btn.facebook {
        background-color: #3b5998;
        color: #ffffff;
    }

    .social-btn:hover {
        opacity: 0.9;
    }

    .register-link {
        margin-top: 20px;
    }

    .register-link a {
        color: #a5d6a7;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

</style>

</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="{{route('login-user')}}" method="post">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif    
        @csrf
            <label for="loginInput">Username or Email</label>
            <input type="text" id="loginInput" name="loginInput" value="{{ old('loginInput') }}" required>
            <span class="text-danger">@error('loginInput') {{ $message }} @enderror</span>


            <label for="Password">Password</label>
            <input type="Password" id="Password" name="Password" value="{{old('Password')}}" required>
            <span class="text.danger">@error('Password') {{$message}} @enderror</span>

            <button type="submit">Login</button>
        </form>
        <div class="social-login">
            <p>Or login with:</p>
            <button class="social-btn google">Google</button>
            <button class="social-btn facebook">Tando</button>
        </div>
        <p class="register-link">Don't have an account? <a href="signup">Register here</a></p>
    </div>
</body>
</html>
