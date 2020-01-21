@extends('masterLayouts.master')
@section('head')
    <title>User Roles</title>
@endsection
@section('page-content')

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
            <div class="px-3 py-2 bg-info text-white rounded">Update User Roles</div>
        </div>
        <table class="table table-responsive-md mb-5 xm-auto">
            <thead class="thead-light">
            <th>Name</th>
            <th>E-Mail</th>
            <th>User</th>
            <th>Moderator</th>
            <th>Admin</th>
            <th>Action</th>
            </thead>
            <tbody id="myTable">
            @foreach($users as $user)
                <tr>
                    <form action="{{ url('assign-roles') }}" method="post">
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
                            </a>
                        </td>
                        <td>{{ $user->email }}<input type="hidden" name="email" value="{{ $user->email }}"></td>
                        <td style="text-align: center;"><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                        <td style="text-align: center;"><input type="checkbox" {{ $user->hasRole('Moderator') ? 'checked' : '' }} name="role_moderator"></td>
                        <td style="text-align: center;"><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                        {{ csrf_field() }}
                        <td><button type="submit" class="btn py-1 px-2 btn-info rounded">update</button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
