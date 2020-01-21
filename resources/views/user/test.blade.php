<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="http://www.bobmazzo.com/wp-content/uploads/2009/07/bobmazzoCD.jpg" width="30" height="30" >
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Patients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Reports</a>
                </li>

            </ul>

            <form id="searchForm" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            <ul class="navbar-nav ">
                <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                        <a class="dropdown-item" href="#">Preferences</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>

</nav>

<div class="container">
    <form class="form-group w-50 mx-auto mt-5" method="post" action="{{ url('nothing') }}" >

        {{ csrf_field() }}
        <div class="form-control">
            <label for="userId">User Id</label>
            <input type="number" class="form-control"  name="user_id" id="userId">
        </div>

        <div class="form-control">
            <label for="department">Department</label>
            <input type="text" class="form-control" name="department" id="department">
        </div>

        <div class="form-control">
            <label for="Subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="Subject">
        </div>

        <div class="form-control">
            <label for="Topic">Topic</label>
            <input type="text" class="form-control" name="topics" id="Topic">
        </div>

        <div class="form-control">
            <label for="Location">Location</label>
            <input type="text" class="form-control" name="location" id="Location">
        </div>

        <div class="form-control">
            <input type="submit" class="btn btn-info mx-auto">
        </div>


    </form>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>


