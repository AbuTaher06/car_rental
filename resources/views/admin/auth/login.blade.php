<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="https://your-cdn-path/assets/img/favicon/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .btn-primary {
            background: #2575fc;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #1a5fd6;
        }

        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h4 class="mb-4">Sign In</h4>

        <!-- Error Message Example -->
        @if(session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif


        <!-- Login Form -->
        <form id="formAuthentication" action="{{ route('submit.login') }}" method="post">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>

            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    <span class="input-group-text toggle-password"><i class="fas fa-eye"></i></span>
                </div>
            </div>

            <div class="mb-3 form-check text-start">
                <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
                <label class="form-check-label" for="remember-me">Remember Me</label>
            </div>

            <div class="mb-3 text-end">
                <a href="auth-forgot-password-basic.html" class="text-decoration-none">Forgot Password?</a>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <script>
        // Toggle Password Visibility
        document.querySelector(".toggle-password").addEventListener("click", function () {
            let passwordInput = document.getElementById("password");
            let icon = this.querySelector("i");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        });
    </script>

</body>
</html>
