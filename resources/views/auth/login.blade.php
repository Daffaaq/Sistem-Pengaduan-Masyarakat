<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login - Your Website</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href='/css/login.css' rel='stylesheet'>
</head>

<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
            <div class="card card0 border-0">
                <div class="row d-flex">
                    <div class="col-lg-6">
                        <div class="card1 pb-5">
                            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                                <img src="{{ asset('assets/img/why-us.png') }}" class="img-fluid animated">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card2 card border-0 px-4 py-5">
                            <div class="row px-3">
                                <h3 class="mb-0 mr-4 mt-2">Sign in</h3>
                            </div>
                            <hr>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>
                            <script>
                                function togglePasswordVisibility() {
                                    var passwordInput = document.getElementById("password-input");
                                    var eyeIcon = document.getElementById("eye-icon");

                                    if (passwordInput.type === "password") {
                                        passwordInput.type = "text";
                                        eyeIcon.classList.remove("fa-eye");
                                        eyeIcon.classList.add("fa-eye-slash");
                                    } else {
                                        passwordInput.type = "password";
                                        eyeIcon.classList.remove("fa-eye-slash");
                                        eyeIcon.classList.add("fa-eye");
                                    }
                                }
                            </script>

                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <div class="input-group">
                                    <input type="password" id="password-input" name="password"
                                        placeholder="Enter password">
                                    <button type="button" id="toggle-password" onclick="togglePasswordVisibility()">
                                        <i id="eye-icon" class="fa fa-eye"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="row px-3 mb-4">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input id="remember" type="checkbox" name="remember"
                                        {{ old('remember') ? 'checked' : '' }} class="custom-control-input">
                                    <label for="remember" class="custom-control-label text-sm">Remember me</label>
                                </div>
                            </div>
                            <div class="row mb-3 px-3">
                                <small class="font-weight-bold">Belum Punya Akun? <a class="text-danger mr-3"
                                        href="{{ route('register') }}">Register</a></small>
                                <small class="font-weight-bold">Lupa?<a href="#" class="text-danger"
                                        data-toggle="modal" data-target="#forgotModal"> Forgot</a>
                                </small>
                            </div>
                            <div class="row mb-4 px-3">
                                <button type="submit" class="btn btn-blue text-center mr-2">Login</button>
                                <a href="{{ route('beranda') }}" class="btn btn-danger font-weight-bold">Back To Landing
                                    Page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
    </script> --}}

    <!-- Modal -->
    <div class="modal fade" id="forgotModal" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotModalLabel">Forgot Something?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please choose one of the options below:
                </div>
                <div class="modal-footer">
                    <a href="{{ route('password.forgot') }}" class="btn btn-primary d-block mx-auto">Forgot Password</a>
                    <a href="{{ route('email.forgot') }}" class="btn btn-secondary d-block mx-auto">Forgot
                        Email</a>
                    <a href="{{ route('identity.verifyForm') }}" class="btn btn-info d-block mx-auto">Change
                        Email</a>
                    <!-- New Button -->
                </div>
            </div>
        </div>
    </div>


</body>

</html>
