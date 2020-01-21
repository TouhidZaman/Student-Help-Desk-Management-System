@extends('masterLayouts.master')
@section('head')
    <title>Profile</title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 0% 2% 2% 1%;
            width: 45%;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
    </style>
@endsection
@section('page-content')
    <div style="min-height: 770px;">
        <!--View Profile header -->
        <div class="card w-100 p-0">
            <img src="{{ asset('assets\images\profile-cover.jpg') }}" height="170px" alt="Avatar" style="width:100%">
            <div class="container">
                <div class="clearfix" style="margin-bottom: 2%">
                    <div class="float-left w-25"  style="margin-top: -8%;">
                        @if($user->avatar == null)
                            @if($user->gender == 'Male')
                                <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" class="rounded-circle" height="200px" alt="Avatar" style="width:90%;">
                            @else
                                <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle" height="200px" alt="Avatar" style="width:90%;">
                            @endif
                        @else
                            <img src="{{URL::asset('assets/avatars/' . $user->avatar)}}" class="rounded-circle" height="200px" alt="Avatar" style="width:90%;">
                        @endif
                    </div>
                    <div class="float-left w-75">
                        <h3><b>{{ $user->name }}</b></h3>
                        <div class="clearfix">
                            <div class="float-left w-75">
                                <p>
                                    <b>Department of  {{ $user->department->name }}</b> <br>
                                    <b>Daffodil International University</b>
                                </p>
                            </div>
                            <div class="float-left w-25">
                                <div class="address-grid">
                                    <ul class="social-icons3">
                                        <li>
                                            <a href="#" class="s-iconbehance">
                                                <span class="fab fa-linkedin-in"></span>
                                            </a>
                                        </li>
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

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // View Profile header -->

        <!--Profile Content -->

        <div class="card bg-light  p-0 w-100">
            <div class="card-header"><h4 class="py-0 text-info my-0">Personal Information</h4></div>
            <div class="card-body col-md-6">
                <h5>
                    <table class="table">
                        <tr>
                            <td><b>Full Name:</b> </td>
                            <td>{{ $user->name }} </td>
                        </tr>
                        <tr>
                            <td><b>Gender:</b> </td>
                            <td>{{ $user->gender }} </td>
                        </tr>
                        <tr>
                            <td><b>Department:</b></td>
                            <td>{{ $user->department->name }}</td>
                        </tr>
                        <tr>
                            <td><b>Student ID:</b> </td>
                            <td>{{ $user->student_id }}</td>
                        </tr>

                    </table>
                </h5>
            </div>
        </div>

        <div class="card bg-light  p-0 mb-5 w-100">
            <div class="card-header"><h4 class="py-0 text-info my-0">Contact Information</h4></div>
            <div class="card-body col-md-6">
                <h5>
                    <table class="table">
                        <tr>
                            <td><b>E-Mail:</b> </td>
                            <td>{{ $user->email }} </td>
                        </tr>
                        @if(Auth::user()->id == $user->id )
                            <tr>
                                <td><b>Mobile:</b> </td>
                                <td>{{ $user->mobile }} </td>
                            </tr>
                        @endif
                        <tr>
                            <td><b>Address:</b> </td>
                            <td>{{ $user->address }}</td>
                        </tr>

                    </table>
                </h5>
            </div>
        </div>
        <!-- // View Classroom header -->

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

    </div>
@endsection
