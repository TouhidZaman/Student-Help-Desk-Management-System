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
                <input class="form-control my-1" id="myInput" type="text" placeholder="Type here to search">
                <br>
            </div>
            <div class="float-left w-25"></div>
            <div class="float-right w-50">
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
        </div>
        <div class="d-flex flex-row bg-secondary">
            <div class="px-3 py-2 bg-info text-white">Pending Classrooms</div>
        </div>
        <table class="table table-responsive-md xm-auto">
            <thead class="thead-light">
            <th>Topics</th>
            <th>Department</th>
            <th>Subject</th>
            <th>Date</th>
            <th>Location</th>
            <th>Created_By</th>
            <th>Status</th>
            <th>Your_Actions</th>
            </thead>
            <tbody id="myTable">
            @foreach($class_rooms as $classroom)
            <tr>
                <td>{{ $classroom->topics }}</td>
                <td>{{ $classroom->department->initial }}</td>
                <td>{{ $classroom->subject->subject_code }} - {{ $classroom->subject->name }}</td>
                <td>{{ date('M j, Y', strtotime($classroom->date))}}</td>
                <td>{{ $classroom->location }}</td>
                <td><a class="text-info" href="{{ url('profile') }}/{{ encrypt($classroom->user_id) }}">{{ \App\User::find($classroom->user_id)->name }}</a></td>
                <td>{!! $classroom->active_status ? '<span class="text-success">Approved</span>' : '<span class="text-danger">Pending</span>'!!}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="btn btn-warning dropdown-item" href="{{ url('approve-classroom') }}/{{ encrypt($classroom->id) }}"><i class=" btn btn-success fas fa-check">Approve</i></a>
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


@endsection
