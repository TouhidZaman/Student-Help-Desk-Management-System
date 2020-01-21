@extends('masterLayouts.master')
@section('head')
    <title>User Virtual Classs Room</title>
@endsection
@section('page-content')

    <!-- show class room section -->
    <section id="about-section">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-25">
                    <input class="form-control my-1" id="myInput" type="text" placeholder="Search Classrooms">
                    <br>
                </div>
                <div class="float-right w-75">
                    <a href="#createClassRoomModal" data-toggle="modal" class="btn btn-info my-1 float-right"><i class="fas fa-plus-square"> Create Classroom</i></a>
                </div>
            </div>
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-2 bg-info text-white rounded">Available Class Rooms</div>
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead class="thead-light">
                <th>Topics</th>
                <th>Department</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Seats</th>
                <th>Location</th>
                <th>Your_Actions</th>
                </thead>
                <tbody id="myTable">
                @foreach($class_rooms as $class_room)
                    <tr>
                        <form action="{{ url('join-classroom') }}" method="post">
                            <input type="hidden" name="class_id" value="{{ $class_room->id }}">
                            <td><a class="text-info" href="{{ url('view-classroom') }}/{{ encrypt($class_room->id) }}">{{ $class_room->topics }}</a></td>
                            <td>{{ $class_room->department->initial }}</td>
                            <td>{{ $class_room->subject->subject_code }} - {{ $class_room->subject->name }}</td>
                            <td>{{ date('M j, Y', strtotime($class_room->date))}}</td>
                            <td>{{ $class_room->available_seats }}</td>
                            <td>{{ $class_room->location }}</td>
                            {{ csrf_field() }}
                            <td>
                                @if($class_room->user_id == Auth::user()->id)
                                    <div class="btn-group">
                                        <button type="button" class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="btn btn-warning dropdown-item" href="{{ url('edit-classroom') }}/{{ encrypt($class_room->id) }}"><i class="btn btn-warning far fa-edit"> Edit</i></a>
                                            <a class="btn btn-danger dropdown-item" href="{{ url('remove-classroom') }}/{{ encrypt($class_room->id) }}"><i class="btn btn-danger fas fa-trash"> Delete</i></a>
                                        </div>
                                    </div>
                                @elseif($class_room->users()->find(Auth::user()->id))
                                    <a href="{{ url('unroll-classroom') }}/{{ encrypt($class_room->id) }}" class="btn py-1 px-2 btn-warning rounded"><b>Unroll</b></a>
                                @else
                                    <button type="submit" class="btn py-1 px-2 btn-info rounded">Enroll</button>
                                @endif
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- //show class room section -->


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
