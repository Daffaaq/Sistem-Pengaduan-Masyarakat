<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Login - Your Website</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'>
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
                                <button type="submit" class="btn btn-blue text-center">Login</button>
                            </div>
                            <div class="row mb-4 px-3">
                                <small class="font-weight-bold">Don't have an account? <a class="text-danger"
                                        href="{{ route('register') }}">Register</a></small>
                            </div>
                            <div class="row mb-4 px-3">
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
</body>

</html>
