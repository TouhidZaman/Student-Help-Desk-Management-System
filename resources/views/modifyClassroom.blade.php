@extends('masterLayouts.master')
@section('head')
    <title>Update Classroom</title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 2% 2% 2% 0%;
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
    <!--Edit Classroom header-->
    <div class="card w-100 mt-0 pb-2">
        <img src="{{ asset('assets\images\classroom-cover.jpg') }}" height="170px" alt="Avatar" style="width:100%;">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-50">
                    <h4><b>{{ $classroom->subject->subject_code }} - {{ $classroom->subject->name }}</b></h4>

                </div>
                <div class="float-left w-25">
                    <h5 class="float-right mr-2">
                        <b>Created by:</b>
                    </h5>
                </div>
                <div class="float-right w-25">

                    <h5>
                        @if(\App\User::find($classroom->user_id)->avatar == null)
                            @if(\App\User::find($classroom->user_id)->gender == 'Male')
                                <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" class="rounded-circle mr-2" height="30px" width="30px" alt="Avatar">
                            @else
                                <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle mr-2" height="30px" width="30px" alt="Avatar">
                            @endif
                        @else
                            <img src="{{URL::asset('assets/avatars/' . \App\User::find($classroom->user_id)->avatar)}}" class="rounded-circle mr-2" height="30px" width="30px" alt="Avatar">
                        @endif
                        <b>
                            <span class="text-success">
                                <a class="text-info" href="{{ url('profile') }}/{{ encrypt($classroom->user_id) }}">{{ \App\User::find($classroom->user_id)->name }}</a>
                            </span>
                        </b>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <!--//Edit Classroom header-->
    <div class="card w-100 mt-0">
        <div class="container">
            <div class="container">
                <div class="row m-y-2">
                    <!-- edit form column -->
                    <div class="col-lg-4 text-lg-left">
                        <h2>Edit Classroom</h2>
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
                        <form role="form" method="post" action="{{ url('update-classroom') }}">
                            <input type="hidden" value="{{ $classroom->id }}" name="classroom_id">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label form-control-label">Topic</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="topics" type="text" value="{{ $classroom->topics }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label form-control-label">Date</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="date" type="date" value="{{ $classroom->date }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label form-control-label">Location</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="location" type="text" value="{{ $classroom->location }}"  />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label form-control-label">StartTime</label>
                                <div class="col-lg-10">
                                    <input class="form-control" name="start_time" type="time" value="{{ $classroom->start_time }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label form-control-label"></label>
                                <div class="col-lg-10">
                                    <input type="reset" class="btn btn-secondary" value="Cancel" />
                                    <input type="submit" class="btn btn-primary" value="Save Changes" />
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="col-lg-4 pull-lg-8 text-xs-center">

                    </div>
                </div>
            </div>
            <hr />
        </div>
    </div>
    <!-- // Edit Classroom -->
@endsection
