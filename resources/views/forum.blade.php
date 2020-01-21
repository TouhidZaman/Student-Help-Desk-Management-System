@extends('masterLayouts.master')
@section('head')
    <title>Forum - post your problems here !!</title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 0% 0 3% 2%;
            width: 45%;

        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
    </style>
@endsection
@section('page-content')
    <div class="float-left" style="min-height: 770px; width: 60%;">
        @if($posts->isEmpty())
            <center>
                <h1 class="text-secondary mt-5">No Posts Available !</h1>
            </center>
        @endif
        <table id="myTable">
            <!-- Forum post Example 2-->
            @foreach($posts as $post)
            <tr>
                <td>
                    <div class="card w-100 mt-0 p-0" id="">
                        <div class="container px-4">
                            <div class="clearfix w-100 my-2">
                                <div class="float-left w-75">
                                    <div >
                                        <table>
                                            <tr>
                                                <td rowspan="2">
                                                    @if($post->user->avatar == null)
                                                        @if($post->user->gender == 'Male')
                                                            <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" class="rounded-circle" height="45px" width="45px" alt="Avatar">
                                                        @else
                                                            <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle" height="45px" width="45px" alt="Avatar">
                                                        @endif
                                                    @else
                                                        <img src="{{URL::asset('assets/avatars/' . $post->user->avatar)}}" class="rounded-circle" height="45px" width="45px" alt="Avatar">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('profile') }}/{{ encrypt($post->user->id) }}" class="text-info"><h4 class="pb-0 mb-0 ml-2">{{ $post->user->name }}</h4> </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> <span class="ml-2 text-secondary">{{ date('M j', strtotime($post->created_at))}} at {{ date('h:ia', strtotime($post->created_at))}}</span> </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="float-right w-25">
                                    <h4 class="float-right">
                                        <div class="btn-group">
                                            <i  data-toggle="dropdown" class="fas fa-ellipsis-h text-secondary"></i>
                                            <div class="dropdown-menu dropdown-menu-right" >
                                                @if($post->user_id == Auth::user()->id)
                                                    <a class="dropdown-item text-secondary" href="{{ url('edit-post') }}/{{ encrypt($post->id) }}"><i class="far fa-edit"> </i>Edit</a>
                                                    <a class="dropdown-item text-secondary" href="{{ url('remove-post') }}/{{ encrypt($post->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
                                                @elseif(Auth::user()->roles->first()->name == 'Admin')
                                                    <a class="dropdown-item text-secondary" href="{{ url('remove-post') }}/{{ encrypt($post->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
                                                    <a data-toggle="tooltip" data-placement="top" title="Warning ! this action will remove the user and all activates related to this user !" class="dropdown-item text-secondary" href="{{ url('remove-user') }}/{{ encrypt($post->user->id) }}"><i class="fas fa-user-tie"></i> Delete User</a>
                                                @else
                                                    <a class="dropdown-item text-secondary" href="{{ url('report-post') }}/{{ encrypt($post->id) }}"><i class="far fa-edit"> </i>Report</a>
                                                @endif
                                            </div>
                                        </div>
                                    </h4>
                                </div>
                            </div>
                            <div class="w-100">
                                {{ $post->post }}
                            </div>
                            @if($post->picture != null)
                                <div class="w-100 pt-2">
                                    <img src="{{URL::asset('assets/posts/' . $post->picture)}}" alt="Reload Please" style="width:100%;">
                                </div>
                            @endif
                            <hr>
                            <div class="w-75 mx-auto mb-3 clearfix">
                                <div class="float-left">
                                    <form id="myForm" action="{{ url('add-like') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
                                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                        <button type="submit" class="btn btn-block"><i class="fas fa-heart text-danger"><span style="color: black"> React</span> <span style="color: green">({{ $post->likes->count() }})</span></i></button>
                                    </form>
                                </div>
                                <div class="float-right">
                                    <button type="button" data-toggle="collapse" data-target="#comments{{ $post->id }}" class="btn btn-block"><i class="far fa-comments"><span style="color: black"> Comments ({{ $post->comments->count() }})</span></i></button>
                                </div>
                            </div>
                            <div id="comments{{ $post->id }}" class="collapse">
                                <hr>
                                <div class="container p-3 pl-4">
                                    <div class="w-100 pb-3 clearfix">
                                        <div class="float-left" style="width: 10%">
                                            @if(Auth::user()->avatar == null)
                                                @if(Auth::user()->gender == 'Male')
                                                    <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" class="rounded-circle" height="45px" width="45px" alt="Avatar">
                                                @else
                                                    <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle" height="45px" width="45px" alt="Avatar">
                                                @endif
                                            @else
                                                <img src="{{URL::asset('assets/avatars/' . Auth::user()->avatar)}}" class="rounded-circle" height="45px" width="45px" alt="Avatar">
                                            @endif
                                        </div>
                                        <div class="float-right" style="width: 90%">
                                            <form enctype="multipart/form-data" action="{{ url('add-comment') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="post_id" value="{{ encrypt($post->id) }}">
                                                <div class="input-group clearfix">
                                                    <div class="float-left" style="width: 99%">
                                                        <input type="text" name="comment" class="form-control" placeholder="Add a comment...">
                                                    </div>
                                                    <div class="float-right" style="width: 1%">
                                                        <div class="custom-file">
                                                            <input  type="file" class="custom-file-input rounded-circle" name="comment-picture" id="comment-picture">
                                                            <label class="custom-file-label" for="comment-picture"></label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    @foreach($post->comments as $comment)
                                        <hr class="p-0 m-2">

                                        <div class="container w-100 clearfix">
                                            <div class="float-left" style="width: 95%">
                                                <table>
                                                    <tr>
                                                        <td rowspan="2">
                                                            @if($comment->user->avatar == null)
                                                                @if($comment->user->gender == 'Male')
                                                                    <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" class="rounded-circle" height="40px" width="40px" alt="Avatar">
                                                                @else
                                                                    <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle" height="40px" width="40px" alt="Avatar">
                                                                @endif
                                                            @else
                                                                <img src="{{URL::asset('assets/avatars/' . $comment->user->avatar)}}" class="rounded-circle" height="40px" width="40px" alt="Avatar">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ url('profile') }}/{{ encrypt($comment->user->id) }}" class="text-info"><h5 class="pb-0 mb-0 ml-2">{{ $comment->user->name }}</h5> </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <span class="ml-2 text-secondary">{{ date('M j', strtotime($comment->created_at))}} at {{ date('h:ia', strtotime($comment->created_at))}}</span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span class="ml-2">
                                                            {{ $comment->comment }}<br>
                                                            @if($comment->picture != null)
                                                                <div class="w-100 pt-2">
                                                                    <img src="{{URL::asset('assets/comments/' . $comment->picture)}}" height="250px" alt="Reload Please" style="width:100%;">
                                                                </div>
                                                            @endif
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="float-right" style="width: 5%">
                                                <h4 class="float-right">
                                                    <div class="btn-group">
                                                        <i  data-toggle="dropdown" class="fas fa-ellipsis-h text-secondary"></i>
                                                        <div class="dropdown-menu dropdown-menu-right" >
                                                            @if($comment->user_id == Auth::user()->id)
                                                                <a class="dropdown-item text-secondary" href="{{ url('edit-comment') }}/{{ encrypt($comment->id) }}"><i class="far fa-edit"> </i>Edit</a>
                                                                <a class="dropdown-item text-secondary" href="{{ url('remove-comment') }}/{{ encrypt($comment->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
                                                            @elseif(Auth::user()->roles->first()->name == 'Admin')
                                                                <a class="dropdown-item text-secondary" href="{{ url('remove-comment') }}/{{ encrypt($comment->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
                                                                <a data-toggle="tooltip" data-placement="top" title="Warning ! this action will remove the user and all activates related to this user !" class="dropdown-item text-secondary" href="{{ url('remove-user') }}/{{ encrypt($comment->user->id) }}"><i class="fas fa-user-tie"></i> Delete User</a>
                                                            @else
                                                                <a class="dropdown-item text-secondary" href="{{ url('edit-comment') }}/{{ encrypt($comment->id) }}"><i class="far fa-edit"> </i>Report</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </h4>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <!-- // Forum post Example -->
    </div>
    <div class="float-right" style="width: 36%;">
        <div class="mr-5" style="position: fixed; top: 110px;">
            <div class="card w-100 p-0 mb-3">
                <div class="d-flex flex-row bg-secondary rounded-top">
                    <div class="px-3 py-2 bg-info text-white rounded">Your Actions</div>
                </div>
                <div class="container  pt-4 px-3">
                    <div class="clearfix">
                        <div class="float-left w-50">
                            <a href="#createForumPost" data-toggle="modal" class="btn btn-info my-1 px-2 float-left"><i class="fas fa-plus-square"> Create new Post</i></a>
                        </div>
                        <div class="float-right w-50">
                            <input class="form-control rounded my-1" id="myInput" type="text" placeholder="Search here">
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card w-100 p-0">
                <div class="d-flex flex-row bg-secondary rounded-top">
                    <div class="px-3 py-2 bg-info text-white rounded">Browse Post By Category</div>
                    @if(Auth::user()->roles->first()->name == 'Admin')
                        <div class="p-2 ml-auto"><h4 class="p-0 m-0"> <a  href="#createPostCategory" data-toggle="modal"><i class="text-white mr-2 fas fa-plus-square"></i></a> </h4></div>
                    @endif
                </div>
                <div class="container  pt-4 px-3">
                    <table class="table">
                        @foreach($post_category as $category)
                        <tr>
                            <td>
                                <h5 class="text-info my-0"><a href="{{ url('forum') }}/{{ $category->category }}"> <i class="fas fa-angle-double-right text-secondary"></i> {{ $category->category }} ({{ $category->posts->count() }})</a></h5>
                            </td>
                            @if(Auth::user()->roles->first()->name == 'Admin')
                                <td>
                                    <div class="btn-group">
                                        <i  data-toggle="dropdown" class="fas fa-ellipsis-h text-secondary"></i>
                                        <div class="dropdown-menu dropdown-menu-right" >
                                            <a class="dropdown-item text-secondary" href="{{ url('edit-category') }}/{{ encrypt($category->id) }}"><i class="far fa-edit"> </i>Edit</a>
                                            <a data-toggle="tooltip" data-placement="top" title="Warning ! this action will remove all posts and comments related to this category" class="dropdown-item text-secondary" href="{{ url('remove-category') }}/{{ encrypt($category->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Create New Forum Post-->
    <div class="modal fade" id="createForumPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassRoomModal">Create New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-5 px-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('create-post') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group pt-0">
                            <label for="text" class="col-form-label">Write Your Text Here</label>
                            <textarea class="form-control" rows="4" name="post" required></textarea>
                        </div>
                        <div class="clearfix">
                            <div class="float-left w-50">
                                <div class="form-group mr-3">
                                    <select class="form-control" id="category" name="category" required>
                                        <option>Select Category</option>
                                        @foreach($post_category as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="float-right w-50">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="picture" id="picture">
                                    <label class="custom-file-label" for="picture">Choose Picture</label>
                                </div>
                            </div>
                        </div>
                        <div class="right-w3l mt-2">
                            <input type="submit" class="form-control border text-white btn-info" value="Create Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //Create New Forum Post -->

    <!-- Create New Category-->
    <div class="modal fade" id="createPostCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassRoomModal">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-5 px-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('add-category') }}" method="post">
                        {{ csrf_field() }}
                        <div class="clearfix pt-3">
                            <div class="float-left w-75">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="category" placeholder="Enter new Category" required></input>
                                </div>
                            </div>
                            <div class="float-right w-25">
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
    <!-- //Create New Category -->
@endsection
