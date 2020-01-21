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
        <!--View Classroom header -->
        <div class="card w-100 mt-0 p-0">
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
                            <img src="{{URL::asset('assets/avatars/'.$user->avatar) }}" class="rounded-circle" height="200px" alt="Avatar" style="width:90%;">
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
        <!-- // View Classroom header -->


        <div class="card w-100 mt-0">
            <div class="container">
                <div class="container">
                    <form enctype="multipart/form-data" method="post" action="{{ url('update-profile') }}">
                        {{ csrf_field() }}
                    <div class="row m-y-2">
                        <!-- edit form column -->
                        <div class="col-lg-4 text-lg-left">
                            <h2>Edit Profile</h2>
                            <br>
                        </div>
                        <div class="col-lg-8">
                            @if (Session::get('success'))
                                <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>
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

                        <div class="col-lg-8 push-lg-4 personal-info">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Full name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="name" value="{{ $user->name }}" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Gender</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" name="gender" id="recipient-gender">
                                            <option @if($user->gender == 'Male') selected @endif value="Male">Male</option>
                                            <option @if($user->gender == 'Female') selected @endif value="Female">Female</option>
                                            <option @if($user->gender == 'Others') selected @endif value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Student ID</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="student_id" value="{{ $user->student_id }}" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" name="email" value="{{ $user->email }}" disabled/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Mobile</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="mobile" name="mobile" value="{{ $user->mobile }}" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="street" value="{{ $user->address }}" placeholder="Street" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="city" value="" placeholder="City" />
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" type="text" name="state" value="" placeholder="State" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Bio</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Add your bio here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Skills</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" placeholder="Add your skills here" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel" />
                                        <input type="submit" class="btn btn-primary" value="Save Changes" />
                                    </div>
                                </div>
                        </div>
                        <div class="col-lg-4 pull-lg-8 text-xs-center">
                            <div class="ml-3">
                                <img @if($user->avatar == null)
                                     @if($user->gender == 'Male')
                                     src="{{URL::asset('assets/avatars/avatar-male.png')}}"
                                     @else
                                     src="{{URL::asset('assets/avatars/avatar-female.png')}}"
                                     @endif
                                     @else
                                     src="{{URL::asset('assets/avatars/'.$user->avatar) }}"
                                     @endif style="width: 170px; height: 150px; border-radius: 50%;" alt="avatar" />
                                <h6 class="m-t-2">Upload a different photo</h6>
                                <label class="custom-file">
                                    <input type="file" name="avatar" id="file">
                                </label>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <hr />
            </div>
        </div>
@endsection
