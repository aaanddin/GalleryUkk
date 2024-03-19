<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gallerium | {{$title}}</title>
    <link rel="icon" type="png" size="45x45" href="../img/paus.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="" style="background-color: #24293e">
 
     <div class="container">
 
         <div class="card o-hidden border-0 shadow-lg my-5">
             <div class="card-body p-0" style="background-color: #2f3651">
                 <!-- Nested Row within Card Body -->
                 <div class="row">
                     <div class="col-lg-5 d-none d-lg-block" style="background: url('img/hiu.jpeg'); background-position: center; background-size: cover;"></div>
                     <div class="col-lg-7">
                         <div class="p-5">
                             <div class="text-center">
                                 <h1 class="h4 mb-4">Create Gallerium Account!</h1>
                             </div>
                             <form class="user" action="{{route('register.store')}}" method="post">
                                 @csrf
                                 
                                 <div class="form-group">
                                     <input type="email" class="form-control form-control-user @error('email')is-invalid @enderror" name="email" id="email"
                                         placeholder="Email" required value="{{old('email')}}">
                                         @error('email')
                                         <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control form-control-user @error('username')is-invalid @enderror" name="username" id="username"
                                         placeholder="username" required value="{{old('username')}}">
                                         @error('username')
                                         <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control form-control-user @error('namalengkap')is-invalid @enderror" name="namalengkap" id="namalengkap"
                                         placeholder="Full Name" required value="{{old('namalengkap')}}">
                                         @error('namalengkap')
                                         <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                 </div>
                                 <div class="form-group">
                                     <input type="text" class="form-control form-control-user @error('alamat')is-invalid @enderror" name="alamat" id="alamat"
                                         placeholder="Address" required value="{{old('alamat')}}">
                                         @error('alamat')
                                         <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                 </div>
                                 <div class="form-group">
                                     <input type="password" class="form-control form-control-user @error('password')is-invalid @enderror" name="password" id="password"
                                         placeholder="Password" required value="{{old('password')}}">
                                         @error('password')
                                         <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                 </div>
                                 <button href="" class="btn btn-primary btn-user btn-block" type="submit">
                                     Register Account
                                 </button>
                                 
                             </form>
                             <hr>
                             <div class="text-center">
                                 <a class="small" href="forgot-password.html">Forgot Password?</a>
                             </div>
                             <div class="text-center">
                                 <a class="small" href="/login">Already have an account? Login!</a>
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