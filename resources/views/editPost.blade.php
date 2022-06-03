<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  @include('links')
</head>
<body>

@include('nevigation')


<div class="card m-auto mt-5" style="width:60%">

      
    <div class="card-body">
      <form action="/update-post" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$post->id}}">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="Enter Title" value="{{$post->title}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Enter Post description here">{{$post->description}}</textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Update Post</button>
          </div>
    </div>
</form>
  </div>

  
</body>
</html>



