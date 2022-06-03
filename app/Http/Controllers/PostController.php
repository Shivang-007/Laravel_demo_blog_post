<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function addPost()
    {
        return view('addPost');
    }
    public function createPost(Request $req)
    {
        //dd($req->all());
        $req->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        
       $post=new Post;
       $post->title = $req->title;
       $post->description = $req->description;
       $post->user_id = auth()->user()->id;
       $post->save();
       return redirect('/home')->with('message','post created successsfully');
    }
    public function myPost()
    {
        $data = Post::where('user_id',auth()->user()->id)
                    ->orderBy('created_at','desc')->get();
        return view('myPost',compact('data'));
    }
    public function addComment($id)
    {

        return view('addComment',['id'=>$id]);
    }
    public function createComment(Request $req)
    {
        $req->validate([
            'comment' => 'required'
        ]);
        $comment = new Comment;
        $comment->comment = $req->comment;
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $req->post_id;
        $comment->save();
        //$comment = Comment::find('id',$req->post_id);
        return redirect('/home');
    }
    public function postComment($id)
    {
       // $post = Post::find($id)->get();
        $comment = Post::where('id',$id)->with('comments')->first();
        // return response()->json([
        //     'message'=>$comment
        // ]);
        
        return view('postComment',compact('comment'));
        
    }

    public function category($name)
    {
        $data = Post::where('title','LIKE','%'.$name.'%')->paginate(5);
        return view('home',compact('data'));
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('editPost',compact('post'));
    }
    public function updatePost(Request $req)
    {
        $post = Post::find($req->id);
        $post->title = $req->title;
        $post->description = $req->description;
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/my-post')->with('message','Post Updated Successfully');
    }
    public function editComment($id)
    {
        $comment = Comment::find($id);
        return view('editComment',compact('comment'));
    }
    public function updateComment(Request $req)
    {
        $comment = Comment::find($req->id);
        //dd($comment);
        $comment->comment = $req->comment;
        // $comment->post_id = $req->post_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return redirect('/post-comment/'.$comment->post_id)->with('message','comment Updated Successfully');
    }

}
