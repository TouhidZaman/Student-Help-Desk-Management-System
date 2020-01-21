@extends('masterLayouts.master')
@section('head')
    <title>Recent Classroom updates</title>
@endsection
@section('page-content')

    <!-- show class room section -->
    <section id="about-section">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-25">
                    <input class="form-control" id="myInput" type="text" placeholder="Search Classrooms">
                    <br>
                </div>
                <div class="float-right w-75">
                    <a href="#createClassRoomModal" data-toggle="modal" class="btn btn-info float-right" hidden><i class="fas fa-plus-square"> Create Classroom</i></a>
                </div>
            </div>
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-2 bg-info text-white rounded">Recent Classroom Updates</div>
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead class="thead-light">
                <th>Topics</th>
                <th>Department</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Created_By</th>
                <th>Status</th>
                <th>Your_Actions</th>
                </thead>
                <tbody id="myTable">
                @foreach($class_rooms as $classroom)
                    <tr>
                        <td><a class="text-info" href="{{ url('view-classroom') }}/{{ encrypt($classroom->id) }}">{{ $classroom->topics }}</a></td>
                        <td>{{ $classroom->department->initial }}</td>
                        <td>{{ $classroom->subject->subject_code }} - {{ $classroom->subject->name }}</td>
                        <td>{{ date('M j, Y', strtotime($classroom->date))}}</td>
                        <td><a class="text-info" href="{{ url('profile') }}/{{ encrypt($classroom->user_id) }}">{{ \App\User::find($classroom->user_id)->name }}</a></td>
                        <td>{!! $classroom->active_status ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Pending</span>'!!}</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="btn btn-warning dropdown-item" href="{{ url('edit-classroom') }}/{{ encrypt($classroom->id) }}"><i class=" btn btn-warning far fa-edit"> Modify</i></a>
                                    @if($classroom->active_status == false)
                                        <a class="btn btn-warning dropdown-item" href="{{ url('approve-classroom') }}/{{ encrypt($classroom->id) }}"><i class=" btn btn-success fas fa-check">Approve</i></a>
                                    @endif
                                    <a class="btn btn-danger dropdown-item" href="{{ url('remove-classroom') }}/{{ encrypt($classroom->id) }}"><i class="btn btn-danger far fa-trash-alt"> Remove</i></a>
                                </div>
                            </div>
                        </td>
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
