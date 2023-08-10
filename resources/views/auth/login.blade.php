<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smart Learning System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend/lib2/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib2/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend/css2/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend/css2/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>LearnSmart</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
						<form method="POST" action="{{ route('login') }}">
                         @csrf
                        <div class="form-floating mb-3">
                            <input  type="email" id="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input  type="password" id="passowrd" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input  type="checkbox" id="basic_checkbox_1" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="basic_checkbox_1">Check me out</label>
                            </div>
							<a href="{{Route('password.request')}}" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
						<p class="mt-15 mb-0 text-white">Don't have an account? <a href="{{Route('register')}}" class="text-info ml-5">Sign Up</a></p>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
	</form>		


    <!-- JavaScript Libraries -->
    <script src="{{ asset('backend/js2/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('backend/js2/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/chart/chart.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('backend/lib2/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend/js2/main.js') }}"></script>

   

</body>

</html>
