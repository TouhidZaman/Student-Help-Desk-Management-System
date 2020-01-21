@extends('masterLayouts.master')
@section('head')
    <title>Recent Classroom updates</title>
@endsection
@section('page-content')

    <!-- show All registered users -->
    <section id="about-section">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-25">
                    <input class="form-control" id="myInput" type="text" placeholder="Search User">
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
                <div class="px-3 py-2 bg-info text-white rounded">All Registered Users</div>
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead class="thead-light">
                <th>Name</th>
                <th>Student_ID</th>
                <th>Department</th>
                <th>Email</th>
                <th>Your_Actions</th>
                </thead>
                <tbody id="myTable">
                @foreach(\App\User::all() as $user)
                    <tr>
                        <td><a class="text-info" href="{{ url('profile') }}/{{ encrypt($user->id) }}">
                                @if($user->avatar == null)
                                    @if($user->gender == 'Male')
                                        <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" class="rounded-circle mr-1" height="40px" width="40px" alt="Avatar">
                                    @else
                                        <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle mr-1" height="40px" width="40px" alt="Avatar">
                                    @endif
                                @else
                                    <img src="{{URL::asset('assets/avatars/' . $user->avatar)}}" class="rounded-circle mr-1" height="40px" width="40px" alt="Avatar">
                                @endif
                                {{ $user->name }}
                            </a></td>
                        <td>{{ $user->student_id }}</td>
                        <td>{{ $user->department->initial }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="btn btn-warning dropdown-item" href="{{ url('edit-user') }}/{{ encrypt($user->id) }}"><i class=" btn btn-warning far fa-edit"> Modify</i></a>
                                    <a data-toggle="tooltip" data-placement="top" title="Warning ! this action will remove the user and all activates related to this user !" class="btn btn-danger dropdown-item" href="{{ url('remove-user') }}/{{ encrypt($user->id) }}"><i class="btn btn-danger far fa-trash-alt"> Remove</i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- //show All registered users -->
@endsection
