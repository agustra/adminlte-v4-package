@extends('adminlte::layouts.app')

@section('title', 'Register Example')
@section('content-header', 'Register Page Example')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>Admin</b>LTE</h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" required>
                        <div class="input-group-text">
                            <span class="bi bi-person-fill"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" required>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Retype password" required>
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agreeTerms" required>
                                <label class="form-check-label" for="agreeTerms">
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

                <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="bi bi-facebook me-2"></i> Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="bi bi-google me-2"></i> Sign up using Google+
                    </a>
                </div>

                <a href="{{ route('examples.login') }}" class="text-center">I already have a membership</a>
            </div>
        </div>

        <div class="alert alert-info mt-3">
            <h5><i class="icon bi bi-info-circle"></i> Demo Page!</h5>
            This is a demo register page. Form actions are disabled for demonstration purposes.
        </div>
    </div>
</div>
@endsection