<!DOCTYPE html>
<html lang="en">


<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"  >

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    

</head>

<body  >


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-9 shadow-lg my-5 bg-gradient-danger">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="../img/paijo2.png" style="height: 600px; width: 500px"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-white-900 mb-4" style="color: white">LOGIN</h1>
                                    </div>
                                    <form class="user" action="{{route('proses-login')}}" method="post">
                                       {{csrf_field()}}

                                          <div class="form-group">
                                            <label for="email" style="color: white">Email</label>
                                           <input type="email" class="form-control" name="email" placeholder="" oninvalid="this.setCustomValidity('Masukkan Email Anda')" oninput="setCustomValidity('') " required="">
                                            
                                          </div>
                                          <div class="form-group">
                                            <label for="password" style="color: white">Password</label>
                                            <input type="password" max="8" class="form-control" name="password" placeholder="" oninvalid="this.setCustomValidity('Masukkan Password Anda')" oninput="setCustomValidity('')" required="">
                                          </div>
                                          <div style="color: white">
                                            <input type="checkbox" name="remember"> Ingat Saya !
                                          </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-light" style="color: red">Login</button>
                                                 @include('sweet::alert')
                                            </div>
                                        <hr><br>
                                         <div class="text-center">
                                                <a class="small" href="{{ route('password.request') }}" style="color: white">Lupa Password?</a>
                                        </div>
                                        <br>
                                        <div class="text-center">
                                                <a class="small" href="{{ route('register-kader') }}" style="color: white">Belum Punya Akun? Register</a>
                                        </div>
                                    </form>
                                    <hr>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>