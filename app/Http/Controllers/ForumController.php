<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use App\User;
use Illuminate\Http\Request;
use App\PostCategory;
use App\Post;
use Auth;
use Image;

class ForumController extends Controller
{
    //Forum section

    public function getForum(){
        $post_category = PostCategory::all()->sortByDesc('created_at');
        $posts = Post::all()->sortByDesc('created_at');
        return View('forum',['post_category'=>$post_category, 'posts'=>$posts]);
    }


    public function addCategory(Request $request){
        if(PostCategory::all()->where('category', $request->get('category'))->first()){
            return back();
        }else{
            $category = new PostCategory();
            $category->category = $request->get('category');
            if($category->save()){
                return back()->with('success', 'Category has been added successfully');
            }
        }
    }
    public function removeCategory($id){
        $category_id =  decrypt($id);
        $category = PostCategory::find($category_id);
        $posts =  $category->posts()->get();
        foreach ($posts as $post){
            $post->comments()->Delete();
            $post->likes()->Delete();
        }
        $category->posts()->Delete();
        if($category->Delete()){
            return back();
        }
    }

    public function getForumByCategory($selected_category){
        $post_category = PostCategory::all()->sortByDesc('created_at');
        $selected_category = PostCategory::all()->where('category', $selected_category)->first();
        $posts = Post::all()->where('post_category_id', $selected_category->id)->sortByDesc('created_at');
        return View('forum',['post_category'=>$post_category, 'posts'=>$posts]);
    }

    public function createPost(Request $request){
        $user_id = Auth::user()->id;
        $post = new Post();
        try{
            if($request->hasFile('picture')){
                $picture = $request->file('picture');
                $filename = time().'.'.$picture->getClientOriginalExtension();
                Image::make($picture)->resize(1200,720)->save( public_path('/assets/posts/'.$filename));
                $post->picture = $filename;
            }
            $post->post = $request->get('post');
            $post->user_id = $user_id;
            $post->post_category_id = $request->get('category');
            if($post->save()){
                return back()->with('success', 'Post Successfully Created !!');
            }else{
                return back()->with('success', 'Failed to save data !!');
            }
        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }

    public function removePost($id){
        $post_id = decrypt($id);
        $post = Post::find($post_id);
        $post->comments()->Delete();
        $post->likes()->Delete();
        if($post->Delete()){
            return back()->with('success', 'Post has been deleted');
        }
    }


    public function addComment(Request $request){
        $comment = new Comment();
        try{
            if($request->hasFile('comment-picture')){
                $picture = $request->file('comment-picture');
                $filename = time().'.'.$picture->getClientOriginalExtension();
                Image::make($picture)->resize(1200,720)->save( public_path('/assets/comments/'.$filename));
                $comment->picture = $filename;

            }
            $comment->comment = $request->get('comment');
            $comment->user_id = Auth::user()->id;
            $comment->post_id = decrypt($request->get('post_id'));
            if($comment->save()){
                return back();
            }else{
                return back();
            }

        }catch (Exception $exception){
            return $exception->getMessage();
        }
    }

    public function removeComment($id){
        $comment_id = decrypt($id);
        $comment = Comment::find($comment_id);
        if($comment->Delete()){
            return back()->with('success', 'Comment has been deleted');
        }

    }

    public function addLike(Request $request){
        $user = User::find($request->get('user_id'));
        if($user->likes()->where('post_id', $request->get('post_id'))->first()){
            return back();
        }else{
            $like = new Like();
            $like->post_id = $request->get('post_id');
            $like->user_id = $request->get('user_id');
            if ($like->save()){
                return back();
            }else{
                return 'Some internal problem has occur , please contact with admin';
            }
        }

    }
}
