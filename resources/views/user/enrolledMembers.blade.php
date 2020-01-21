@extends('masterLayouts.master')
@section('head')
    <title>Enrolled Members</title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 0% 2% 2% 0%;
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
    <!--View Classroom header -->
    <div class="card w-100 mt-0">
        <img src="{{ asset('assets\images\classroom-cover.jpg') }}" height="170px" alt="Avatar" style="width:100%;">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-50">
                    <h4><b>{{ $classroom->subject->subject_code }} - {{ $classroom->subject->name }}</b></h4>
                    <p>
                        Topic: <span class="text-info">{{ $classroom->topics }}</span>  <br>
                        Location: <span class="text-info">{{ $classroom->location }}</span>  <br>
                    </p>
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
                    <p class="ml-5">
                        Time: <span class="text-info">{{ date('h:ia', strtotime($classroom->start_time))}}</span>  <br>
                        Date: <span class="text-info">{{ date('M j, Y', strtotime($classroom->date))}}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- // View Classroom header -->

    <!--Classroom members -->
        @foreach($classroom->users as $user)
            <div class="card float-left">
                @if($user->avatar == null)
                    @if($user->gender == 'Male')
                        <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" alt="Avatar" style="width:15%; margin-left: 3%">
                    @else
                        <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" alt="Avatar" style="width:15%; margin-left: 3%">
                    @endif
                @else
                    <img src="{{URL::asset('assets/avatars/' . $user->avatar)}}" class="rounded-circle" alt="Avatar" style="width:15%; margin-left: 3%">
                @endif
                <div class="container">
                    <h4><b><a class="text-info" href="{{ url('profile') }}/{{ encrypt($user->id) }}">{{ $user->name }}</a></b></h4>
                    <p>
                        ID: {{ $user->student_id }} <br>
                        {{ $user->email }}
                    </p>

                </div>
            </div>
        @endforeach
    <!--//Classroom members -->
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
