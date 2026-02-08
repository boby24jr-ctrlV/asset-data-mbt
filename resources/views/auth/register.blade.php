<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-card {
            max-width: 450px;
            width: 100%;
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            text-align: center;
            color: white;
        }

        .brand-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            margin: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .brand-icon i {
            font-size: 30px;
            color: #667eea;
        }

        .card-body {
            padding: 40px 30px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 15px 12px 45px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="card-header">
        <div class="brand-icon">
            <i class="fas fa-user-plus"></i>
        </div>
        <h4>Register Student</h4>
        <p>Buat akun baru</p>
    </div>

    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('student.register.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="name" class="form-control" placeholder="Nama lengkap" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <div class="input-wrapper">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-control" placeholder="email@student.com" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>

            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <div class="input-wrapper">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                </div>
            </div>

            <button class="btn-login">
                <i class="fas fa-user-plus me-1"></i> Register
            </button>
        </form>

        <hr>

        <p class="text-center">
            Sudah punya akun?  
            <a href="{{ route('student.login') }}">Login di sini</a>
        </p>

        <p class="text-center">
            <a href="{{ route('login') }}">Login sebagai Admin</a>
        </p>
    </div>
</div>

</body>
</html>
