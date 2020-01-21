@extends('masterLayouts.master')
@section('head')
    <title>User dashborad</title>
@endsection
@section('page-content')

    <!-- Enrolled classroom section -->
    <section id="enrolled-classroom-section">
        <div class="container">
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-2 bg-info text-white rounded">Enrolled Classrooms</div>
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead class="thead-light">
                <th>Topics</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Location</th>
                <th>Start_Time</th>
                <th>Created_By</th>
                <th>Your_Action</th>
                </thead>
                <tbody>
                @foreach($user->classrooms as $enrolled_classroom)
                    <tr>
                        <td><a class="text-info" href="{{ url('view-classroom') }}/{{ encrypt($enrolled_classroom->id) }}">{{ $enrolled_classroom->topics }}</a></td>
                        <td>{{ $enrolled_classroom->subject->subject_code }} - {{ $enrolled_classroom->subject->name }}</td>
                        <td>{{ date('M j, Y', strtotime($enrolled_classroom->date))}}</td>
                        <td>{{ $enrolled_classroom->location }}</td>
                        <td>{{ date('h:ia', strtotime($enrolled_classroom->start_time))}}</td>
                        <td><a class="text-info" href="{{ url('profile') }}/{{ encrypt($enrolled_classroom->user_id) }}">{{ \App\User::find($enrolled_classroom->user_id)->name }}</a></td>
                        <td><a href="{{ url('unroll-classroom') }}/{{ encrypt($enrolled_classroom->id) }}" class="btn py-1 px-2 btn-warning rounded"><b>Unroll</b></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </section>
    <!-- //Enrolled classroom section -->


    <!-- My classrooms Section -->
    <section id="my-classroom-section">
        <div class="container-fluid">
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-2 bg-info text-white rounded">My Classrooms</div>
            </div>
            <table class="table table-responsive-md">
                <thead class="thead-light">
                    <th>Topics</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Start_Time</th>
                    <th>Seats</th>
                    <th>Status</th>
                    <th>Your_Action</th>
                </thead>
                <tbody>
                @foreach($class_rooms as $classroom)
                    <tr>
                        <td><a class="text-info" href="{{ url('view-classroom') }}/{{ encrypt($classroom->id) }}">{{ $classroom->topics }}</a></td>
                        <td>{{ $classroom->subject->subject_code }} - {{ $classroom->subject->name }}</td>
                        <td>{{ date('M j, Y', strtotime($classroom->date))}}</td>
                        <td>{{ $classroom->location }}</td>
                        <td>{{ date('h:ia', strtotime($classroom->start_time))}}</td>
                        <td>{{ $classroom->available_seats }}</td>
                        <td>{!! $classroom->active_status ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Pending</span>'!!}</td>
                        {{ csrf_field() }}
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="btn btn-warning dropdown-item" href="{{ url('edit-classroom') }}/{{ encrypt($classroom->id) }}"><i class="btn btn-warning far fa-edit"> Edit</i></a>
                                    <a class="btn btn-danger dropdown-item" href="{{ url('remove-classroom') }}/{{ encrypt($classroom->id) }}"><i class="btn btn-danger fas fa-trash"> Delete</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- //My classrooms Section -->


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


@endsection
