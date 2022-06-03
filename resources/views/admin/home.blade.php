<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('links')
    <title>Document</title>
</head>
<body>
   @include('admin.nevigation')
   <div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert">x</button>
    </div>
    @endif
</div>
   
   <div class="container mt-3">
       @foreach($data as $posts)
    <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h5 class="card-title">{{$posts->title}}</h5>
          
          <hr>
          <p class="card-text">{{$posts->description}}</p>
          {{-- @if(auth()->user()->id != $posts->user_id)
          <a href="{{'/add-comment/'.$posts->id}}" class="card-link"><button type="button" class="btn btn-primary">Add Comment</button></a>
          @endif --}}
          {{-- @endcan --}}
          <a href="{{'/admin/delete-post/'.$posts->id}}" class="card-link"><button type="button" class="btn btn-danger">Delete Post</button></a>
         <a href="{{'/admin/post-comment/'.$posts->id}}" class="card-link"><button type="button" class="btn btn-primary">Read Comment</button></a>
          {{-- @foreach($comment as $comments)
          <div class="card">
            <div class="card-body">
              {{auth()->user()->name}}:{{$comments->comment}}
            </div>
          </div>
          @endforeach --}}
        </div>
      </div>
      <br>
      @endforeach
   </div>
   <br>
<div class="container">
   {{$data->links()}}
  </div>
    
</body>
</html>