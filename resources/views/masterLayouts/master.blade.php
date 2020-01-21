<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom Theme files -->
    <link href="{{ asset('css/sty.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/w3.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- //Custom Theme files -->

    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- //online-fonts -->

    <style>
        /* Stackoverflow preview fix, please ignore */
        .navbar{
            width: 100vw;
            height: 90px;
            background: #1e2d3a;
            grid-template-columns: 1fr 1fr;
            position: fixed;
            top:0;
            z-index: 10;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            overflow: visible;

        }
        .navbar-nav {
            flex-direction: row;
        }
        .nav-link {
            padding-right: .5rem !important;
            padding-left: .5rem !important;
        }

        /* Fixes dropdown menus placed on the right side */
        .ml-auto .dropdown-menu {
            left: auto !important;
            right: 0px;
        }

        /* For side Navbar*/
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 90%;
            width: 21%;
            position: fixed;
            z-index: 1;
            left: 0;
            background-color: #E9ECFE;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            top: 90px;
        }

        .sidenav a {
            padding: 3px 3px 3px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        /* //For side Navbar*/
    </style>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
            @if (Session::get('success'))
                $('#userMessageModal').modal('show');//For Success Message
            @endif

        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

</head>
<body>
@if((Auth::user()->roles->first()->name)=='Admin')
    @include('masterLayouts.adminNavbar')
@else
    @include('masterLayouts.userNavbar')
@endif
<!--Main Area-->
    <section id="main-section">
        <div class="container-fluid " style="min-height: 600px; margin-top: 110px;">

            @if((Auth::user()->roles->first()->name)=='Admin')
                <div class="clearfix">
                    <div class="float-left" style="width: 21%">
                        @include('masterLayouts.adminSidebar')
                    </div>
                    <div class="float-right" style="width: 79%;" id="main">
                        @yield('page-content')
                    </div>
                </div>
            @else
                <div class="clearfix">
                    <div class="float-left" style="width: 23%">
                        @include('masterLayouts.userSidebar')
                    </div>
                    <div class="float-right" style="width: 75%">
                        @yield('page-content')
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--//Main Area-->

    <!-- footer -->
    <div class="cpy-right text-center py-3" style="background: #E9ECFE">
        <h5 class="w3-text-black">
                © 2018 Daffodil International University | Developed by
                <a href="http://tnstechnologiesbd.com" class="text-info"> Think Different</a>
        </h5>
    </div>
    <!-- //footer -->

<!-- Create Virtual Classroom-->
<div class="modal fade" id="createClassRoomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createClassRoomModal">Create Virtual Classroom</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-5" style="">
                <form action="{{ url('Create-Virtual-Classroom') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="topics" class="col-form-label">Topics</label>
                        <input type="text" class="form-control border" placeholder="" name="topics" id="topics" required="">
                    </div>
                    <div class="form-group">
                        <label for="department_dropdown" class="col-form-label">Department</label>
                        <select class="form-control" id="department_dropdown"  disabled required>
                            <option value="{{ Auth::user()->department->id }}">{{ Auth::user()->department->name }}</option>
                        </select>
                        <input type="hidden" value="{{ Auth::user()->department->id }}" name="department_id">
                    </div>
                    <div class="form-group">
                        <label for="subject_lists" class="col-form-label">Subject</label>
                        <select required id="subject_lists" name="subject_id"  class="group_member form-control">
                            @forelse(Auth::user()->department->subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_code }} - {{ $subject->name }}</option>
                            @empty
                                <option value="">No subject found !</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="datepicker" class="col-form-label">Select Date</label>
                        <input type="date" id="myDate" name="datepicker" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="location" class="col-form-label">Location</label>
                        <input type="text" id="location" name="location" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="timepicker" class="col-form-label">Select Start Time</label>
                        <input type="time" id="timepicker" name="timepicker" class="form-control" required/>
                    </div>
                    <div class="right-w3l mt-4">
                        <input type="submit" class="form-control border text-white btn-theme" value="Create Now">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //Create Virtual Classroom -->


    <script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {

            //For Hint a text to the user
            $('[data-toggle="tooltip"]').tooltip();

            //For Table search

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
                //For Div
                $("#myDIV").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


            /* for Dropdown
            $("#first").change(function(){
               $("#second").val($(this).val());
               $("#third").val($(this).val());
            });
            $("#first").change(function(){
               $(".group_member").val($(this).val());
           });*/

            //For Department and Subject DropDown

            $('#department_dropdown').on('change', function(){
                $('#subject_lists').html('');
                if($('#department_dropdown').val()=='CSE'){

                    $('#subject_lists').append('<option value="CSE112 - Computer Fundamentals">CSE112 - Computer Fundamentals</option>');
                }
            });

            // End Department and Subject DropDown

            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.js') }}">
    </script>
    <!-- //Bootstrap Core JavaScript -->
</body>
</html>
