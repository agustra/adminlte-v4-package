<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 4 | Register Page Example</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte-css.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body class="register-page bg-body-secondary">
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ route('dashboard') }}"><b>Admin</b>LTE</a>
        </div>
        
        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Register a new membership</p>

                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full Name">
                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password">
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-facebook me-2"></i> Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-google me-2"></i> Sign up using Google+
                    </a>
                </div>

                <p class="mb-0">
                    <a href="{{ route('examples.login') }}" class="text-center">
                        I already have a membership
                    </a>
                </p>
            </div>
        </div>
        
        <div class="alert alert-info mt-3">
            <h5><i class="icon bi bi-info-circle"></i> Demo Page!</h5>
            This is a demo register page. Form actions are disabled for demonstration purposes.
            <br><a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-info mt-2">Back to Dashboard</a>
        </div>
    </div>
    
    <script src="{{ asset('vendor/adminlte/js/adminlte.js') }}"></script>
</body>
</html>