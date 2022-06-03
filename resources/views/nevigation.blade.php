<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blog Post</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('add-post')}}">Add Post</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/category/php">PHP</a></li>
              <li><a class="dropdown-item" href="/category/python">Python</a></li>
              <li><a class="dropdown-item" href="/category/laravel">Laravel</a></li>
              <li><a class="dropdown-item" href="/category/java">Java</a></li>

            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/my-post">My Post</a>
          </li>
        <li>
        <form class="d-flex" action="/search-post" method="post">
          @csrf
          <input type="text" class="form-control me-2" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </li>
        <ul>
          <li style="float:right;">
          @if (auth()->id())
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="nav-right">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        this.closest('form').submit(); " role="button">
                <i class="fas fa-sign-out-alt"></i>


                {{ __('Log Out') }}
            </a>
        </div>
    </form>
    @endif
{{-- @else
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}" role="button">
            <i class="fas fa-sign-in-alt"></i>
            Login
        </a>
    </li>
@endif
          </li> --}}
        </li>
        </ul>
       
      
        {{-- @if(Route::has('login'))

        @auth
        
        <x-app-layout>
        </x-app-layout>
                
        @endauth
     
        @endif --}}
        
      </div>
    
    </div>

  </nav>