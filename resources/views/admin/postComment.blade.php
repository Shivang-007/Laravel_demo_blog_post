<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('links')
    <style>
      button{
        float:right;
      }
    </style>
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
    <div class="card" style="width: 50rem;">
        <div class="card-body">
          <h5 class="card-title">{{$comment->title}}</h5>
          <hr>
          <p class="card-text">{{$comment->description}}</p>
        </div>
      </div>
   </div>
  <div class="container">
   <div class="card" style="width: 50rem;">
    <div class="card-header">
      Comments
    </div>
    @foreach($comment->comments as $comment)
    <div class="card-body">
      <h5 class="card-title">{{$comment->user->name}}</h5>
      <a href="/admin/delete-comment/{{$comment->id}}"><button type="submit" class="btn btn-danger">Delete</button></a>
      <p class="card-text">{{$comment->comment}}</p>
      <hr>
      
    </div>
    @endforeach
  </div> 
</div>

    
</body>
</html>