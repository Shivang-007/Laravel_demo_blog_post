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
   @include('nevigation')
   
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
      @if(auth()->user()->id == $comment->user_id)
      <a href="/edit-comment/{{$comment->id}}"><button type="submit" class="btn btn-primary">Update</button></a>
      @endif
      <p class="card-text">{{$comment->comment}}</p>
      <hr>
      
    </div>
    @endforeach
  </div> 
</div>

    
</body>
</html>