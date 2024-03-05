<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Gallerium | {{$title}}</title>
        <link rel="icon" type="png" size="45x45" href="../img/paus.png" />

        <!-- Custom fonts for this template-->
        <link
            href="vendor/fontawesome-free/css/all.min.css"
            rel="stylesheet"
            type="text/css"
        />
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet"
        />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet" />
        <style>
            .background {
                background: url("img/jellyfish.jpeg");
                width: 100%;
                height: 100%;
                background-position: center;
                background-size: cover;
            }
        </style>
    </head>

    <body class="" style="background-color: #24293e">
        {{-- @if($errors->any())
        @foreach($errors->all() as $r)
        {{$r}}
        @endforeach --}}
                          {{-- @endif --}}
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                  @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
             


                    @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('loginError')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div
                            class="card-body p-0"
                            style="background-color: #2f3651"
                        >
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div
                                    class="col-lg-6"
                                    style="
                                        background: url('img/jellyfish.jpeg');
                                    "
                                ></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-white-900 mb-4">
                                                Welcome Back To Gallerium !
                                            </h1>
                                        </div>
                                        <form class="user" action="{{ route('login.authenticate') }}" method="post">
    @csrf
    <div class="form-group">
        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter your email" autofocus required value="{{ old ('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Enter your password" required autofocus>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button class="btn btn-user btn-block" style="background-color: #8ebbff; color: #24293e;">Login</button>
</form>

                                        <hr />
                                        <div class="text-center">
                                            <a
                                                class="small"
                                                href="forgot-password.html"
                                                >Forgot Password?</a
                                            >
                                        </div>
                                        <div class="text-center">
                                            <a
                                                class="small"
                                                href="/register"
                                                >Create an Account!</a
                                            >
                                        </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    </body>
</html>
