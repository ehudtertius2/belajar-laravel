<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('asset_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('asset_admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <div class="text-center mb-4">
                                @error('email')
                                <span class="bg-danger text-white p-2 rounded">{{$message}}</span>

                                @enderror

                            </div>
                            <form class="user" method="post" action="{{ route('register.action')}}">
                                @csrf
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="fname" type="text" class="form-control form-control-user" id="fname"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" required>

                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password" required>
                                            <small id="password-warning" class="form-text text-danger" style="display: none;">Password minimal 6</small>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repeat" class="form-control form-control-user"
                                            id="repeat" placeholder="Repeat Password" required>
                                            <small id="repeat-warning" class="form-text text-danger" style="display: none;">Password tidak sama</small>
                                    </div>
                                </div>
                                <button type="submit" id="submit-btn" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script>
        const passwordInput = document.getElementById('password');
        const warningText = document.getElementById('password-warning');
        const repeatInput = document.getElementById('repeat');
        const repeatWarningText = document.getElementById('repeat-warning');
        const submitBtn = document.getElementById('submit-btn');
        submitBtn.disabled = true; // Nonaktifkan tombol submit saat halaman dimuat
        passwordInput.addEventListener('input', function(){
            if (this.value.length > 0 && this.value.length < 6) {
                warningText.style.display = 'inline';
                submitBtn.disabled = true; // Nonaktifkan tombol submit jika kurang dari 6 karakter tampilkan peringatan
            } else {
                submitBtn.disabled = true; //Nonaktifkan tombol submit jika 6+ karakter / kosong
                warningText.style.display = 'none'; //sembunyikan jika sudah 6+ karakter atau kosong
            }
        });
        repeatInput.addEventListener('input', function(){
            if (this.value !== passwordInput.value ) {
                repeatWarningText.style.display = 'inline';
                submitBtn.disabled = true; // Nonaktifkan tombol submit jika kurang dari 6 karakter tampilkan peringatan
            } else {
                submitBtn.disabled = false; //Nonaktifkan tombol submit jika 6+ karakter / kosong
                repeatWarningText.style.display = 'none'; //sembunyikan jika sudah 6+ karakter atau kosong
            }
        });
    </script>
    <script src="{{asset('asset_admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('asset_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('asset_admin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
