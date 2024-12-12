{{-- <body>
    <!-- Tombol Kembali -->
    <a href="{{ url('/') }}" class="back-button">
        <i class="fas fa-chevron-left"></i>
    </a>

    <!-- Login Card -->
    <div class="login-card">
        <h2 class="text-center login-title">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    <button type="button" class="btn btn-outline-secondary position-absolute top-0 end-0 border-0 rounded-0" id="togglePassword" style="z-index: 1;">
                        <i class="fas fa-eye-slash" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WeruhTani</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: url('{{ asset('images/gambarsawah.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            border-radius: 10px;
            background: rgba(0, 0, 0, 0.3); /* Transparansi */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .login-title {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 20px;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
            border-color: #2575fc;
        }
        .form-label {
            color: #ffffff;
        }
        .toggle-password {
            cursor: pointer;
        }
        .input-group .form-control {
            border-radius: 0.375rem 0 0 0.375rem; /* Membuat sisi kiri input lebih halus */
        }
        .input-group .btn {
            border-radius: 0 0.375rem 0.375rem 0; /* Membuat sisi kanan tombol lebih halus */
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
            color: white;
            text-decoration: none;
            background: rgba(0, 0, 0, 0.3);
            padding: 8px 18px;
            border-radius: 50%;
            transition: background 0.3s;
        }
        .back-button:hover {
            background: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>
    <!-- Tombol Kembali -->
    <a href="{{ url('/') }}" class="back-button">
        <i class="fas fa-chevron-left"></i>
    </a>

    <!-- Login Card -->
    <div class="login-card">
        <h2 class="text-center login-title">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    <button type="button" class="btn btn-outline-secondary position-absolute top-0 end-0 border-0 rounded-0" id="togglePassword" style="z-index: 1;">
                        <i class="fas fa-eye-slash" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;

            eyeIcon.classList.toggle('fa-eye-slash');
            eyeIcon.classList.toggle('fa-eye');
        });
    </script>
</body>
</html>
