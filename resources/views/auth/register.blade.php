<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"><img src="../img/ilustrasi.png" style="width: 500px; height: 600px" ></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">REGISTER dari auth</h1>
                            </div>
                            <form action="{{route('proses-register')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								 <div class="form-group">
								    <label for="name">Nama Lengkap</label>
								   	<input type="name" class="form-control" name="name" placeholder="" required=""  oninvalid="this.setCustomValidity('Masukkan Nama Lengkap Anda')" oninput="setCustomValidity('')">				    
								  </div>

								  <div class="form-group">
								    <label for="email">Email address</label>
								   	<input type="email" class="form-control" name="email" placeholder="" required=""  oninvalid="this.setCustomValidity('Masukkan Email Anda')" oninput="setCustomValidity('')">				    
								  </div>

								  <div class="form-group">
								    <label for="password">Password</label>
								    <input type="password" class="form-control" name="password" placeholder="" required=""  oninvalid="this.setCustomValidity('Masukkan Password Anda')" oninput="setCustomValidity('')">
								  </div>

								   <div class="form-group">
								    <label for="repassword">Konfirmasi Password</label>
								    <input type="password" class="form-control" name="repassword" placeholder="" required=""  oninvalid="this.setCustomValidity('Masukkan Konfirmasi Password Anda')" oninput="setCustomValidity('')">
								  </div>

                                    <div class="form-group">
                                        <label> Pilih Nama Posyandu</label>
                                            <select name="id_posyandu" class="form-control">
                                                
                                            </select>
                                    </div>

								 	<div>
								 		<input type="checkbox" name="syarat" required=""  oninvalid="this.setCustomValidity('Centang syarat dan ketentuan')" oninput="setCustomValidity('')"> Saya menyetujui syarat dan ketentuan yang berlaku.
								 	</div>
								 	<br>
								  <button type="submit" class="btn btn-primary">Register</button>
							</form>
                            <hr>
                          <br>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Sudah Punya Akun? Login!</a>
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















