
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pet2Stay - Pet Hotel </title>
	 <!-- Customized Bootstrap Stylesheet -->
	 	 <!-- JavaScript Libraries -->
	 	 <link href="{{asset('public')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('public/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('public/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('public/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('public/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('public/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>

	<link href="{{asset('public/bs5/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('public/bs5/style.css')}}" rel="stylesheet"/>
    


	<script type="text/javascript" src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/bs5/bootstrap.bundle.min.js')}}"></script>

	  <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon"/>

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"/> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>

    <!-- Flaticon Font -->
    <link href="{{asset('public/lib/flaticon/font/flaticon.css')}}" rel="stylesheet"/>

    <!-- Libraries Stylesheet -->
    <link href="{{asset('public/lib/owlcarousel/assets/owl.carousel.min.css')}}"  rel="stylesheet"/>
    <link href="{{asset('public/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

</head>


  <body background="{{asset('public/img/cat2.jpeg')}}" > 
   <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5" >
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse" >
            	<img src="{{asset('public/img/Picture1.png')}}" width="80" height="80" style="padding-right: 3" /> 
            	<a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize" href="{{url('/')}}"style="color: white"><span class="text-primary">Pet2</span>Stay</h1>
                </a>
                <div class="navbar-nav mr-auto py-0" >
                    <a href="{{url('/')}}" class="nav-item nav-link ">Home</a>
                    <a href="{{url('/#about')}}" class="nav-item nav-link">About</a>
                    <a href="{{url('/#services')}}" class="nav-item nav-link">Services</a>
                    <a href="{{url('/#rooms')}}" class="nav-item nav-link">Rooms</a>
                    <a href="{{url('page/contact-us')}}" class="nav-item nav-link" >Contact</a>
                    <a class="nav-item nav-link" href="{{url('register')}}">Register</a> 
                    <a class="nav-item nav-link " style="color:orange" href="{{url('login')}}">Login</a>

                    <div>
                </div>
                 
            </div>
        </nav>
    </div>

    <!-- Navbar End -->

    <div class="container" >
        <!-- Outer Row -->
        <div class="row justify-content-center" style="min-height: 600px !important;">

            <div class="col-xl-10 col-lg-12 my-5">

                <!-- <div class="card o-hidden border-0 shadow-lg my-5"> -->
                    <!-- <div class="card-body p-0"> -->
                        <!-- Nested Row within Card Body -->
                        <div class="row my-3">
                            <div class="col-md-12" style="background:#FAD7A0; border-radius: 20px;">
                                <div class="row p-3">
                                    <div class="col-12 text-center">
                                        @if(Session::has('success'))
                                        <p class="text-success">{{session('success')}}</p>
                                        @endif
                                        @if(Session::has('failed'))
                                        <p class="text-success">{{session('failed')}}</p>
                                        @endif
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                    </div>
                                </div>
                                <form action="{{route('cust.submit_reset')}}" method="POST">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <div class="col-4 align-items-center d-flex" style="background:#FEF5E7;">
                                            <label for="email" class="form-label" style="margin-bottom:0px !important;">Your Full Name </label>
                                        </div>
                                        <div class="col-5" style="background:#FEF5E7;">
                                            <input type="text" name="cust_id" class="form-control" value="{{$cust->id}}" hidden>
                                            <input type="text" name="full_name" class="form-control" value="{{$cust->full_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-4 align-items-center d-flex" style="background:#FEF5E7;">
                                            <label for="email" class="form-label" style="margin-bottom:0px !important;">Your Email </label>
                                        </div>
                                        <div class="col-5" style="background:#FEF5E7;">
                                            <input type="text" name="email" class="form-control" value="{{$cust->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-4 align-items-center d-flex" style="background:#FEF5E7;">
                                            <label for="email" class="form-label" style="margin-bottom:0px !important;">Please Enter Your New Password </label>
                                        </div>
                                        <div class="col-5" style="background:#FEF5E7;">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mb-5 mt-3">
                                        <div class="col-5" style="text-align:center;">
                                            <input type="submit" class="btn btn-success" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->

            </div>

        </div>

    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet2</span>Stay</h1>
                <p class="m-0">Ipsum amet sed vero et lorem stet eos ut, labore sed sed stet sea est ipsum ut. Volup amet ea sanct ipsum, dolore vero lorem no duo eirmod. Eirmod amet ipsum no ipsum lorem clita ut. Ut sed sit lorem ea lorem sed, amet stet sit sea ea diam tempor kasd kasd. Diam nonumy etsit tempor ut sed diam sed et ea</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>No.2, Jalan Seri Mas</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+018 258 5261</p>
                        <p><i class="fa fa-envelope mr-2"></i>pet2Stayofficial@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Team</a>
                            <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0" placeholder="Your Email" required="required" />
                            </div>
                            <div>
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">
                    &copy; <a class="text-white font-weight-bold" href="#">Pet2Stay</a>. All Rights Reserved. 
                    
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed by <a class="text-white font-weight-bold" href="https://htmlcodex.com">Pet2Stay Sdn Bhd</a>
                </p>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">FAQs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="#">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->
	


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
