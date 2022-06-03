<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    //
    public function index(Request $req)
    {
        if(auth()->user()->isAdmin==0)
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
        
        return view('home',compact('data'));

    }else{
         return redirect('/admin/home');
    }
}

}


