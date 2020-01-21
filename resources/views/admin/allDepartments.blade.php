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
                    <input class="form-control" id="myInput" type="text" placeholder="Search Departments">
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
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-2 bg-info text-white rounded"><h4 class="p-0 m-0"> <a  href="#createPostCategory" data-toggle="modal"><i class="text-white mr-2 fas fa-plus-square"></i></a> All Departments</h4></div>
                @if(Auth::user()->roles->first()->name == 'Admin')
                    <div class="p-2 ml-auto"></div>
                @endif
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead class="thead-light">
                <th>Initial</th>
                <th>Code</th>
                <th>Department Name</th>
                <th>Actions</th>
                </thead>
                <tbody id="myTable">
                @foreach($departments as $department)
                    <tr>
                        <td><a class="text-info" href="{{ url('view-department') }}/{{ encrypt($department->id) }}">{{ $department->initial }}</a></td>
                        <td>{{ $department->department_code }}</td>
                        <td>{{ $department->name }}<span class="text-info"> ({{ $department->subjects->count() }})</span></td>
                        <td>
                            <div class="btn-group">
                                <button class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="btn btn-warning dropdown-item" href="{{ url('edit-department') }}/{{ encrypt($department->id) }}"><i class=" btn btn-warning far fa-edit"> Modify</i></a>
                                    <a class="btn btn-danger dropdown-item" href="{{ url('remove-department') }}/{{ encrypt($department->id) }}"><i class="btn btn-danger far fa-trash-alt"> Remove</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
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
                    <h5 class="modal-title" id="createClassRoomModal">Add New Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-5 px-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('add-department') }}" method="post">
                        {{ csrf_field() }}
                        <div class="clearfix pt-3">
                            <div class="float-left w-100">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="department_name" placeholder="Enter department name" required></input>
                                </div>
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="department_initial" placeholder="Enter department initial (Example: CSE)" required></input>
                                </div>
                                <div class="form-group">
                                    <input  type="number" class="form-control" name="department_code" placeholder="Enter department code (Example: 15)" required></input>
                                </div>
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
