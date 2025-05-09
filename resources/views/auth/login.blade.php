<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Ebliethos Digital Indonesia - Login Page</title>
    <link rel="icon" href="images/Group 2 (2).svg" type="image/x-icon">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(to right, #ffff, #A8D8E4);
            /* Adjusted gradient to start with #E5F3FD and transition to a complementary color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            background-color: white;
            border-radius: 30px;
            padding: 40px;
            text-align: center;
            position: relative;
            width: 480px;
        }

        .login-card img {
            width: 120px;
            margin-bottom: 20px;
        }

        .login-card h2 {
            font-size: 25px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .login-card .form-label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        .login-card .form-control {
            margin-bottom: 20px; /* Increased margin for better spacing */
            border-radius: 15px;
            transition: border-color 0.3s;
            padding: 12px; /* Added padding for better button aesthetics */
        }

        .login-card .form-control:focus {
            border-color: #A8D8E4; /* Change focus border color to match the gradient */
            box-shadow: 0 0 5px rgba(168, 216, 228, 0.5);
        }

        .login-card .btn-primary {
            width: 100%;
            margin-top: 10px; /* Added margin-top for spacing above the button */
            margin-bottom: 20px; /* Increased margin below the button */
            border-radius: 15px;
            background: linear-gradient(45deg, #E5F3FD, #A8D8E4);
            border: none;
            color: #333;
            padding: 12px; /* Added padding for better button aesthetics */
            transition: background 0.3s, transform 0.2s;
        }

        .login-card .btn-primary:hover {
            background: linear-gradient(45deg, #A8D8E4, #E5F3FD);
            transform: translateY(-2px);
        }

        .register-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .register-link a {
            color: #2575fc;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .svg-decor-top-right,
        .svg-decor-bottom-left {
            position: absolute;
            z-index: -1; /* Send decorations behind the card */
        }

        .svg-decor-top-right {
            top: 0;
            right: 0;
        }

        .svg-decor-bottom-left {
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="svg-decor-top-right">
        <img alt="Logo" src="images/Graphic1 1 (1).svg" />
    </div>
    <div class="svg-decor-bottom-left">
        <img alt="Logo" src="images/Graphic2 1 (1).svg" />
    </div>
    <div class="login-card">
        <div>
            <img alt="Logo" src="images/Logo Ebliethos.png" />
        </div>
        <img alt="Logo" src="images/Group (7).svg" />
        <h2>Selamat Datang</h2>
        <form action="{{ route('authenticate') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" placeholder="Email Address" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
        <div class="register-link">
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
        </div>
    </div>
</body>

</html>