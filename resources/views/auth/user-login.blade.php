<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
        }

        body {
            background: #f5f6fa;
            min-height: 100vh;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px;
            border-radius: 8px;
            animation: fadeIn 0.5s, fadeOut 0.5s 2.5s;
            z-index: 1000;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .login-wrapper {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 30px rgba(0,0,0,0.1);
        }

        .login-left {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 4rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right {
            padding: 4rem;
        }

        .welcome-text {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 2px solid #eee;
        }

        .btn-custom {
            background: var(--primary-color);
            border: none;
            padding: 12px;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(46,204,113,0.4);
        }

        .feature-item {
            margin-bottom: 1rem;
        }

        .feature-icon {
            background: rgba(255,255,255,0.2);
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-bottom: 0.5rem;
        }

        @media (max-width: 768px) {
            .login-left {
                padding: 2rem;
            }
            
            .login-right {
                padding: 2rem;
            }

            .welcome-text {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="login-wrapper">
                        <div class="row g-0">
                            <div class="col-md-6 login-left">
                                <div>
                                    <h1 class="welcome-text">Welcome Back!</h1>
                                    <p class="mb-4">Access your account and explore our features</p>
                                    
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <h5>Secure Access</h5>
                                        <p class="text-white-50">Your data is protected with enterprise-grade security</p>
                                    </div>
                                    
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-sync"></i>
                                        </div>
                                        <h5>Real-time Updates</h5>
                                        <p class="text-white-50">Stay updated with instant notifications</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6 login-right">
                                <h4 class="mb-4">Login to Your Account</h4>
                                
                                @if(session('error'))
                                    <div class="notification bg-danger text-white">
                                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="notification bg-success text-white">
                                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                    </div>
                                @endif

                                <form action="{{ route('user.login.submit') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control" required
                                               placeholder="Enter your email">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required
                                               placeholder="Enter your password">
                                    </div>
                                    <div class="mb-4 form-check">
                                        <input type="checkbox" class="form-check-input" id="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    <button type="submit" class="btn btn-custom w-100">
                                        Sign In
                                    </button>
                                    <div class="text-center mt-4">
                                        <a href="#" class="text-muted">Forgot password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            const notifications = document.getElementsByClassName('notification');
            for(let notification of notifications) {
                notification.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html> 