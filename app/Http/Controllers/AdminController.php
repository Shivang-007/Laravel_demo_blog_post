<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class AdminController extends Controller
{
    //
    public function Home(Request $req)
    {
        if(auth()->user())
        {
            $search = $req->search;
    
            if($search != "")
            {
                $data = Post::where('title','like','%'.$search.'%')->get();
            }
            else
            {
                $data = Post::orderBy('created_at','desc')->paginate(5);
            }
            return view('admin.home',compact('data'));
        }
    }

    public function deletePost($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->back()->with('message','Post deleted Successfully');
    }

    public function postComment($id)
    {
       // $post = Post::find($id)->get();
        $comment = Post::where('id',$id)->with('comments')->first();
        // return response()->json([
        //     'message'=>$comment
        // ]);
        
        return view('admin.postComment',compact('comment'));
        
    }

    public function deleteComment($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect()->back()->with('message','Comment deleted Successfully');
    }

    public function category($name)
    {
        $data = Post::where('title','LIKE','%'.$name.'%')->paginate(5);
        return view('admin.home',compact('data'));
    }


}
