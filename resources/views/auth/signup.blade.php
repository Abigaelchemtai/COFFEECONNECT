<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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

        .registration-container {
            background-color: #4e342e;
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .registration-container h2 {
            color: #a5d6a7;
            margin-bottom: 20px;
        }

        .registration-container label {
            display: block;
            color: #ffffff;
            margin-bottom: 5px;
            text-align: left;
        }

        .registration-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .registration-container button {
            background-color: #388e3c;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .registration-container button:hover {
            background-color: #2e7d32;
        }

        .login-link {
            margin-top: 15px;
            color: #ffffff;
        }

        .login-link a {
            color: #a5d6a7;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="registration-container">
        <h2>Register</h2>
    <form action="{{route('register-user')}}" method="post">
        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif

        @csrf

        <label for="UserName">Username</label>
        <input type="text" id="UserName" name="UserName" required>
        <span class="text.danger">@error('UserName') {{$message}} @enderror</span>

        <label for="FirstName">First Name</label>
        <input type="text" id="FirstName" name="FirstName" required>
        <span class="text.danger">@error('FirstName') {{$message}} @enderror</span>

        <label for="LastName">Last Name</label>
        <input type="text" id="LastName" name="LastName" required>
        <span class="text.danger">@error('LastName') {{$message}} @enderror</span>

        <label for="Role">Role</label>
        <select id="Role" name="Role" required>
            <option value="">Select your role</option>
            <option value="farmer">Farmer</option>
            <option value="investor">Investor</option>
        </select>
        <span class="text.danger">@error('Role') {{$message}} @enderror</span>

        <label for="Email">Email</label>
        <input type="email" id="Email" name="Email" required>
        <span class="text.danger">@error('Email') {{$message}} @enderror</span>

        <label for="Password">Password</label>
        <input type="password" id="Password" name="Password" required>
        <span class="text.danger">@error('Password') {{$message}} @enderror</span>

        <button type="submit">Register</button>
    </form>

        <p class="login-link">Already have an account? <a href="login">Login here</a></p>
    </div>
</body>
</html>
