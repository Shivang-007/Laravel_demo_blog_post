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

<div class="card m-auto mt-5" style="width:60%">

      
    <div class="card-body">
      <form action="/create-comment" method="post">
        @csrf
        <div>
          <input type="hidden" name='post_id' value={{$id}}>
        </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment" placeholder="Enter Comment here.."></textarea>
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
          </div>
    </div>
</form>
  </div>
</body>
</html>



