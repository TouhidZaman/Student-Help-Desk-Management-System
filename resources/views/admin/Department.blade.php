@extends('masterLayouts.master')
@section('head')
    <title>All departments</title>
@endsection
@section('page-content')

    <!-- show all departments section -->
    <section id="about-section">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-25">
                    <input class="form-control" id="myInput" type="text" placeholder="Search subjectss">
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
                        @if (Session::get('danger'))
                            <div class="alert alert-danger alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>
                                @if(is_array(Session::get('danger')))
                                    <ul>
                                        @foreach(Session::get('danger') as $msg)
                                            <li><strong>{!! $msg !!}</strong></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <strong>{!! Session::get('danger') !!}</strong>
                                @endif
                            </div>
                        @endif
                </div>
            </div>
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-2 bg-info text-white rounded"><h4 class="p-0 m-0"> <a  href="#createPostCategory" data-toggle="modal"><i class="text-white mr-2 fas fa-plus-square"></i></a> All subjects of {{ $department->name }}</h4></div>
                @if(Auth::user()->roles->first()->name == 'Admin')
                    <div class="p-2 ml-auto"></div>
                @endif
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead class="thead-light">
                <th>Subject Code</th>
                <th>Subject title</th>
                <th>Actions</th>
                </thead>
                <tbody id="myTable">
                @forelse($department->subjects as $subject)
                    <tr>
                        <td>{{ $subject->subject_code }}</td>
                        <td>{{ $subject->name }}</td>
                        <td><a href="{{ url('remove-subject') }}/{{ encrypt($subject->id) }}" class="btn btn-danger rounded">Delete</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3"><h4>No subjects Found !!</h4></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </section>
    <!-- //show all departments section -->


    <!-- Create New Department-->
    <div class="modal fade" id="createPostCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassRoomModal">Add New Subject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-5 px-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('add-subject') }}" method="post">
                        {{ csrf_field() }}
                        <div class="clearfix pt-3">
                            <div class="float-left w-100">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="subject_name" placeholder="Enter subject name" required></input>
                                </div>
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="subject_code" placeholder="Enter subject code (Example: CSE111)" required></input>
                                </div>
                                <input type="hidden" value="{{ $department->id }}" name="department_id">
                                <div class="right-w3l">
                                    <input type="submit" class="form-control border text-white btn-info" value="Add Now">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //Create New Department -->
@endsection
