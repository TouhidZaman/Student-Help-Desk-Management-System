<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn w3-bar-item" onclick="closeNav()">&times;</a>
    <a href="{{ url('profile') }}/{{ encrypt(Auth::user()->id) }}" class="w3-bar-item  w3-border-bottom text-info rounded "> <span class="fas fa-user p-2 ml-1"></span>Profile</a>
    <a href="{{ url('edit-profile') }}/{{ encrypt(Auth::user()->id) }}" class="w3-bar-item  w3-border-bottom text-info rounded "> <span class="fas fa-user-edit p-2 ml-1"></span>Update Profile</a>
    <a href="{{ url('all-users') }}" class="w3-bar-item w3-border-bottom text-info rounded"><span class="fas fa-users p-2 ml-1"></span>All Users</a>
    <a href="{{ url('all-departments') }}" class="w3-bar-item w3-border-bottom text-info rounded"><span class="fas fa-users p-2 ml-1"></span>Departments</a>
    <a href="{{ url('pending-classrooms') }}" class="w3-bar-item  w3-border-bottom text-info rounded"><span class="fas fa-book-open p-2 ml-1"></span>Pending Classroom</a>
    <a href="#" class="w3-bar-item  w3-border-bottom text-info rounded"><span class="fas fa-cog p-2 ml-1"></span>Settings</a>
    <a href="{{ url('user-logout') }}" class="w3-bar-item  w3-border-bottom text-info rounded"><span class="fas fa-sign-out-alt p-2 ml-1"></span>Logout</a>
</div>

<!-- <div id="main">
        <h2>Sidenav Push Example</h2>
        <p>Click on the element below to open the side navigation menu, and push this content to the right.</p>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    </div> -->

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "20%";
        document.getElementById("main").style.width = "80%";
        document.getElementById("main").style.marginLeft = "0";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "6%";
        document.getElementById("main").style.width = "94%";
    }
</script>
