<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT Ebliethos Digital Indonesia - Register Page</title>
    <link rel="icon" href="images/Group 2 (2).svg" type="image/x-icon">
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
    <style>
        body {
            background: linear-gradient(to right, #ffff, #A8D8E4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }
        .register-card {
            background-color: white;
            border-radius: 30px;
            padding: 30px;
            text-align: center;
            position: relative;
            width: 480px;
        }
        .register-card img {
            width: 100px;
            margin-bottom: 20px;
        }
        .register-card h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .register-card .form-control {
            border-radius: 10px;
            transition: border-color 0.3s;
        }
        .register-card .form-control:focus {
            border-color: #A8D8E4; /* Change focus border color to match the gradient */
            box-shadow: 0 0 5px rgba(168, 216, 228, 0.5);
        }
        .register-card .btn-primary {
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
        .register-card .btn-primary:hover {
            background: linear-gradient(45deg, #A8D8E4, #E5F3FD);
            transform: translateY(-2px);
        }
        .background-decor {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
        }
        .background-decor.red {
            background-color: #d32f2f;
        }
        .background-decor.yellow {
            background-color: #fbc02d;
        }
        .background-decor.top-left {
            top: 0;
            left: 0;
        }
        .background-decor.bottom-right {
            bottom: 0;
            right: 0;
        }
        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }
        .register-link a {
            color: #007bff;
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

    <div class="register-card">
        <div>
            <img alt="Logo" src="images/Logo Ebliethos.png"/>
        </div>
        <img alt="Logo" src="images/Group (7).svg"/>
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age" placeholder="Age" value="{{ old('age') }}">
                @if ($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo') }}">
                @if ($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Register">
            </div>
        </form>
        <div class="register-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
        </div>
    </div>
</body>
</html>