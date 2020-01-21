<!-- User Menu -->
<div class="shadow-lg p-4 mb-4 mt-0 mx-auto" style="position: fixed; top: 110px; width: 23%; background-color: #1E2D3A; min-height:300px; border-radius:7px;  color:#fff;">
    <div  style="padding-left:30px">
        @if(Auth::user()->avatar == null)
            @if(Auth::user()->gender == 'Male')
                <img src="{{asset('assets/avatars/avatar-male.png')}}"  class="rounded-circle" alt="Cinque" width="110px" height="100px">
            @else
                <img src="{{ asset('assets/avatars/avatar-female.png') }}" class="rounded-circle" alt="Cinque" width="110px" height="100px">
            @endif
        @else
            <img src="{{URL::asset('assets/avatars/' . Auth::user()->avatar)}}" class="rounded-circle" alt="Cinque" width="110px" height="100px">
        @endif
    </div>
    <hr>
    <h4 style="margin-left:16px;">
            @if(isset(Auth::user()->name))
                <strong>{{ Auth::user()->name }}</strong>
            @endif
    </h4>
    <div class="panel-body">
        <ul>
            <li class="active"><a  href="{{ url('profile') }}/{{ encrypt(Auth::user()->id) }}"><span class="fas fa-user-tie p-2 ml-3"></span>My Profile</a></li>
            <li class="active"><a href="{{ url('edit-profile') }}/{{ encrypt(Auth::user()->id) }}"><span class="fas fa-user-edit p-2 ml-3"></span>Update Profile</a></li>
            <li class="active"><a  data-toggle="modal" href="#createClassRoomModal"><span class="fas fa-book-reader p-2 ml-3"></span>Create Classroom</a></li>
            @if((Auth::user()->roles->first()->name)=='Moderator')
                <li class="active"><a  href="{{ url('pending-classrooms') }}"><span class="fas fa-book-open p-2 ml-3"></span>Pending Classroom</a></li>
            @endif
            <li class="active"><a href="#"><span class="fas fa-unlock-alt p-2 ml-3"></span>Change Password</a></li>
            <li class="active"><a href="{{ url('user-logout') }}"><span class="fas fa-sign-out-alt p-2 ml-3"></span>Logout</a></li>
        </ul>
    </div>
</div>
<!--// User Menu -->
