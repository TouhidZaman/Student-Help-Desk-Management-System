<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #1E2D3A;">
    <a class="navbar-brand" style="margin-left: 20px; padding: 10px;" href="{{ url('user-dashboard') }}"><img class="logo" height="60px" width="60px" src="{{ asset('assets/images/daffodil-logo.png') }}"/><span style="margin-left: 10px">Help Desk</span> </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('user-dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('user-virtual-classroom') }}">Virtual Classroom</a>
        </li>
        <li class="nav-item active">
            <a href="{{ url('forum') }}" class="nav-link">Forum</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link">Project Guideline Zone</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if((Auth::user()->roles->first()->name)=='Moderator')
                    <strong><span class="text-info">Moderator : </span> </strong>
                @else
                    <strong><span class="text-info">User : </span> </strong>
                @endif
                @if(Auth::user()->avatar == null)
                    @if(Auth::user()->gender == 'Male')
                        <img src="{{URL::asset('assets/avatars/avatar-male.png')}}"  class="rounded-circle p-2 mb-1" alt="Cinque" width="40" height="40">
                    @else
                         <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle p-2 mb-1" alt="Cinque" width="40" height="40">
                    @endif
                @else
                    <img src="{{URL::asset('assets/avatars/' . Auth::user()->avatar)}}" class="rounded-circle p-2 mb-1" alt="Cinque" width="40" height="40">
                @endif
                <strong> {{ Auth::user()->name }}</strong>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('user-logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<!-- //header -->
