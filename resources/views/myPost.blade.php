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

@include('nevigation')

<div>
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{session()->get('message')}}
      <button type="button" class="btn-close" data-dissmis="alert" aria-label="Close"></button>
  </div>
  @endif
</div>
   
<div class="container mt-3">
    @foreach($data as $posts)
    
 <div class="card" style="width: 50rem;">
     <div class="card-body">
       <h5 class="card-title">{{$posts->title}}</h5>
       <p class="card-text">{{$posts->description}}</p>
       <a href="{{'/post-comment/'.$posts->id}}" class="card-link"><button type="button" class="btn btn-outline-primary">Read Comment</button></a>
       <a href="{{'/edit-post/'.$posts->id}}" class="card-link"><button type="button" class="btn btn-outline-primary">Update Post</button></a>
     </div>
   </div>
   <br>
   @endforeach
</div>

    
</body>
</html>
