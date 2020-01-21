@extends('masterLayouts.welcomeML')
@section('head')
    <title>Welcome to DIU help desk</title>
@endsection
@section('page-content')

    <!-- services -->
    <section id="services-section">
        <div class="container pt-lg-5">
            <div class="wthree-row  py-lg-5">
                <div class="about-w3sec py-sm-5 pt-3 pb-5">
                    <div class="text-center wthree-title pb-sm-5 pb-3">
                        <h4 class="w3l-sub">services we offer</h4>
                        <h5 class="sub-title py-3">DIU Student Help Desk will gives following services to you</h5>
                        <span></span>
                    </div>
                    <div class="row  pt-md-3 text-white">
                        <div class="col-lg-4 col-md-6 my-md-0 my-5 ">
                            <div class="abt-block bg-info">
                                <h3>Virtual Classroom</h3>
                                <p class=" p-2">In this section user can create or join virtual classroom. Virtual classroom will help the user to solve their dailylife study problems
                                    by making an arrangement of group study. every skilled user can create this classroom and the moderator will approve or denay
                                    this classroom by verifying the skills of the user </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-md-0 mt-5">
                            <div class="abt-block bg-secondary">
                                <h3>Problem Solving Forum</h3>
                                <p class=" p-2">user can create Forum post based on their Study problems or Errors. In fact this is the alternate section of
                                    Virtual Classroom. here user will get solutions of his/her problems.this forum section will be keep tracked by admin/moderator and
                                    they can verify each and every post and also can take necessary steps </p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-lg-0 mt-5 mx-auto service-grid-3">
                            <div class="abt-block mt-md-0 mt-5 bg-primary">
                                <h3>Project Guideline Zone</h3>
                                <p class=" p-2 pb-4">User will get all project releted guidelines and informations to complete a full project form the beginner level.
                                Project guideline zone will provide a brief introduction about each and every sector of project to the user to help the user to select
                                their final year project.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //sevices -->
    <!-- contact -->
    <section id="user-contact-section" class="main-sec-w3 pb-lg-5">
        <div class="container py-sm-5  pb-5">
            <div class="wthree-inner-sec">
                <div class="text-center wthree-title pb-sm-5 pb-3">
                    <h4 class="w3l-sub">contact</h4>
                    <h5 class="sub-title py-3">Please give us your feedback to improve our services.</h5>
                    <span></span>
                </div>
                <div class="row pt-lg-5 pt-lg-5">
                    <div class="col-lg-3">
                        <div class="address">
                            <address>
                                <p class="contact-title">DIU Main Campus</p>
                                <p class="c-txt">4/2, Sobhanbag
                                    <br>Mirpur Rd, Dhaka 1207
                                    <br> +8801681941159
                                </p>
                            </address>
                        </div>
                        <div class="address">
                            <address>
                                <p class="contact-title">DIU Permanent Campus</p>
                                <p class="c-txt">Ashulia
                                    <br>Savar, Dhaka
                                    <br> +8801681941159
                                </p>
                            </address>
                        </div>
                    </div>
                    <div class="col-lg-9 pl-lg-5">
                        <div class="form-wrapper">
                            <form action="#" method="post">
                                <div class="d-flex flex-column">
                                    <label>Your Name:</label>
                                    <input class="text-input" type="text" name="text1" id="text1" required>
                                </div>
                                <div class="d-flex flex-column my-sm-5 my-3">
                                    <label>Your Email Address:</label>
                                    <input class="text-input" type="email" name="email" id="email" required>
                                </div>
                                <div class="d-flex flex-column my-sm-5 my-3">
                                    <div class="message">
                                        <h6>Add Your Message</h6>
                                    </div>
                                    <textarea name="t1" id="t1" required></textarea>
                                </div>
                                <input class="submit" type="submit" value="Send">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
@endsection

