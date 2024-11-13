<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #224abe;
        }

        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
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
        
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        
        @keyframes fadeOut {
            from {opacity: 1; transform: translateY(0);}
            to {opacity: 0; transform: translateY(-20px);}
        }

        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
        }

        .card-header {
            background: var(--primary-color);
            padding: 1.5rem !important;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 14px;
            border: 2px solid #e1e5f2;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78,115,223,0.25);
        }

        .input-group-text {
            border-radius: 8px;
            background: #f8f9fc;
            border: 2px solid #e1e5f2;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .btn-primary {
            background: var(--primary-color);
            border: none;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(78,115,223,0.4);
        }

        .login-brand {
            font-size: 2rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .input-group:hover .input-group-text,
        .input-group:hover .form-control {
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .col-md-4 {
                padding: 0 15px;
            }
            
            .login-card {
                margin: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <h1 class="login-brand text-white mb-3">Admin Panel</h1>
                    <p class="text-white-50">Please login to continue</p>
                </div>
                
                <div class="card login-card">
                    <div class="card-header text-white text-center">
                        <h4 class="mb-0">
                            <i class="fas fa-user-shield me-2"></i>Secure Login
                        </h4>
                    </div>
                    <div class="card-body p-4">
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

                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label text-muted">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user text-primary"></i>
                                    </span>
                                    <input type="text" name="username" class="form-control" required 
                                           placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-muted">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock text-primary"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control" required
                                           placeholder="Enter your password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>Login to Dashboard
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animasi notifikasi
        setTimeout(function() {
            const notifications = document.getElementsByClassName('notification');
            for(let notification of notifications) {
                notification.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html> 