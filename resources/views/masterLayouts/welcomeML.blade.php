<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom Theme files -->
    <link href="{{ asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/sty.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- //Custom Theme files -->

    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- //online-fonts -->

    <style type="text/css">
        .first-column {
            width: 48%;
            float: left;
        }

        .second-column {
            width: 48%;
            float: right;
        }
    </style>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
            @if (Session::get('success'))
                $('#userMessageModal').modal('show');//For Success Message
            @endif
            @if(Session::get('error'))
                $('#userLoginModal').modal('show'); //For Login Error Message
            @endif
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

</head>
<body>
<!-- header -->
<header class="index-banner">
    <!-- nav -->
    <nav class="main-header">
        <div id="brand">
            <div id="logo">
                <a  href="{{ url('/')  }}">
                   <!-- <i class="fab fa-ethereum"></i> -->
                    <img src="{{ asset('assets/images/daffodil-logo.png') }}" alt="DIU">
                </a>
            </div>
            <div id="word-mark">
                <h1>
                    <a href="{{ url('/')  }}">Help Desk</a>
                </h1>
            </div>
        </div>
        <div id="menu">
            <div id="menu-toggle">
                <div id="menu-icon">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
            <ul class="text-center text-capitalize nav-agile">
                <li>
                    <a href="{{ url('/') }}" class="active">home</a>
                </li>
                <li>
                    <a href="#about-section">about</a>
                </li>
                <li>
                    <a href="#services-section">services</a>
                </li>
                <li>
                    <a href="#user-contact-section">contact</a>
                </li>
                <li>
                    <button type="button" class="btn w3ls-btn" data-toggle="modal" aria-pressed="false" data-target="#userLoginModal">
                        Login
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <!-- //nav -->


    <!-- banner -->
    <div id="hero-section">
        <!-- banner text responsive slider -->
        <div class="banner-text">
            <div class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="slider-info">
                            <h3>Virtual Class Room</h3>
                            <p>User Can Create or join Virtual Classroom.</p>
                        </div>
                    </li>
                    <li>
                        <div class="slider-info">
                            <h3>Project Support Zone</h3>
                            <p>User will get all project releted updates here.</p>
                        </div>
                    </li>
                    <li>
                        <div class="slider-info">
                            <h3>Problem Solving Forum</h3>
                            <p>will help the indivudals to solve their problems</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- banner text responsive slider -->
    </div>
    <!-- //banner -->
</header>
<!-- //header -->

@yield('page-content')


<!-- footer -->
<div class="footer">
    <div class="footer-dot">
        <div class="container">
            <div class="contact-center">
                <div class="footer-logo my-sm-5 mb-sm-5 mb-3 text-center">
                    <h2>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/daffodil-logo.png') }}" alt="DIU" height="60px" width="60px"></i>  Help Desk
                        </a>
                    </h2>
                    <p class="px-lg-5 pt-lg-5 pt-3 text-white"></p>
                </div>
                <div class="row border-top">
                    <div class="col-lg-6 footer-grid">
                        <div class="justify-content-center contact-g2 mx-auto">
                            <h6 class="footer-wthree">Follow us</h6>
                            <div class="address-grid">
                                <ul class="social-icons3">
                                    <li>
                                        <a href="#" class="s-iconfacebook">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="s-icontwitter">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="s-icondribbble">
                                            <span class="fab fa-dribbble"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="s-iconbehance">
                                            <span class="fab fa-behance"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 border-left footer-grid">
                        <div class="subscribe-grid">
                            <h6 class="footer-wthree">Signup to our Help Desk.</h6>
                            <form action="#" method="post" class="form-inline">
                                <input type="email" placeholder="Your Email" name="Subscribe" required="">
                                <button class="btn1">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- footer -->
<div class="cpy-right text-center py-4">
    <p class="text-white">© 2018 Daffodil International University. All rights reserved | Developed by
        <a href="http://tnstechnologiesbd.com" class="text-white">Think Different</a>
    </p>
</div>
<!-- //footer -->

<!-- User Message-->
<div class="modal fade" id="userMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userMessageModal">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-block" style="overflow: hidden">
                        @if(is_array(Session::get('success')))
                            <ul>
                                @foreach(Session::get('success') as $msg)
                                    <li><strong>{!! $msg !!}</strong></li>
                                @endforeach
                            </ul>
                        @else
                            <strong>{!! Session::get('success') !!}</strong>

                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- //User Message -->

<!-- Login modal -->
<div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (Session::get('error'))
                <div class="alert alert-danger alert-block" style="overflow: hidden">
                    @if(is_array(Session::get('error')))
                        <ul>
                            @foreach(Session::get('error') as $msg)
                                <li><strong>{!! $msg !!}</strong></li>
                            @endforeach
                        </ul>
                    @else
                        <strong>{!! Session::get('error') !!}</strong>

                    @endif
                </div>
            @endif
            <div class="modal-body">
                <form action="{{ url('verify-user') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control border" placeholder="example@diu.edu.bd" name="student_login_email" id="recipient-email" required="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control border" placeholder=" " name="student_login_password" id="password" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control border text-white btn-theme" value="Login">
                    </div>
                    <div class="row sub-w3l my-3">
                        <div class="col sub-agile">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1" class="text-muted">
                                <span></span>Remember me?</label>
                        </div>
                        <div class="col forgot-w3l text-right text-dark">
                            <a href="#" class="text-white">Forgot Password?</a>
                        </div>
                    </div>
                    <p class="text-center">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#userRegisterModa1" class="text-secondary font-weight-bold">
                            Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //Login modal -->
<!-- Register modal -->
<div class="modal fade" id="userRegisterModa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" style="padding:0rem 3rem 3rem 3rem">
                <form action="{{ url('save-user-data') }}" method="post">
                    {{ csrf_field() }}
                    <!--First Column-->
                    <div class="first-column">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control border" placeholder=" " name="name" id="recipient-rname" required="">
                        </div>

                        <div class="form-group">
                            <label for="recipient-studentId" class="col-form-label">Student ID</label>
                            <input type="text" class="form-control border" placeholder=" " name="student_id" id="recipient-studentId" required="">
                        </div>

                        <div class="form-group">
                            <label for="recipient-department" class="col-form-label">Department</label>
                            <select class="form-control" name="department_id" id="recipient-department" required>
                                <option value="">--Select Department--</option>
                                @foreach(App\Department::all() as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-gender" class="col-form-label">Gender</label>
                            <select class="form-control" name="gender" id="recipient-gender" required>
                                <option value="">--Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Email</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="" name="email" value="{{ old('email') }}" id="recipient-email" required="">
                                <div class="input-group-append">
                                    <span class="input-group-text">@diu.edu.bd</span>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                    </div>
                    <!--//First Column-->

                    <!--Second Column-->
                    <div class="second-column">
                        <div class="form-group">
                            <label for="recipient-mobile" class="col-form-label">Mobile</label>
                            <input type="text" class="form-control border" placeholder=" " name="mobile" id="recipient-mobile" required="">
                        </div>

                        <div class="form-group">
                            <label for="password1" class="col-form-label">Password</label>
                            <input type="password" class="form-control border" placeholder=" " name="password" id="password1" required="">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="col-form-label">Repeat Password</label>
                            <input type="password" class="form-control border" placeholder=" " name="Confirm Password" id="password2" required="">
                        </div>

                        <div class="form-group">
                            <label for="recipient-address" class="col-form-label">Address</label>
                            <textarea class="form-control" name="address" id="recipient-address" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="checkbox" id="brand2"  value=""><label for="brand2" class="text-muted">I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                    <!--//Second Column-->
                    <div class="right-w3l" style="margin-top: 1rem">
                        <input type="submit" class="form-control btn-theme text-white" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // Register modal -->
<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
<!-- Banner Responsiveslides -->
<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- // Banner Responsiveslides -->
<!-- Flexslider-js for-testimonials -->
<script src="js/jquery.flexisel.js"></script>
<script>
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 1,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 1
                }
            }
        });

    });
</script>
<!-- //Flexslider-js for-testimonials -->
<!-- sticky nav bar-->
<script>
    $(() => {

        //On Scroll Functionality
        $(window).scroll(() => {
            var windowTop = $(window).scrollTop();
            windowTop > 100 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
            windowTop > 100 ? $('ul.nav-agile').css('top', '50px') : $('ul.nav-agile').css('top', '160px');
        });

        //Click Logo To Scroll To Top
        $('#logo').on('click', () => {
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });

        //Smooth Scrolling Using Navigation Menu
        $('a[href*="#"]').on('click', function (e) {
            $('html,body').animate({
                scrollTop: $($(this).attr('href')).offset().top - 100
            }, 500);
            e.preventDefault();
        });

        //Toggle Menu
        $('#menu-toggle').on('click', () => {
            $('#menu-toggle').toggleClass('closeMenu');
            $('ul').toggleClass('showMenu');

            $('li').on('click', () => {
                $('ul').removeClass('showMenu');
                $('#menu-toggle').removeClass('closeMenu');
            });
        });

    });
</script>
<!-- //sticky nav bar -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
         var defaults = {
           containerID: 'toTop', // fading element id
           containerHoverID: 'toTopHover', // fading element hover id
           scrollSpeed: 1200,
           easingType: 'linear'
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="{{ asset('js/SmoothScroll.min.js') }}"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- start-smooth-scrolling -->
<script src="{{ asset('js/move-top.js') }}"></script>
<script src="{{ asset('js/easing.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- script for password match -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- script for password match -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.js') }}">
</script>
<!-- //Bootstrap Core JavaScript -->
</body>
</html>
