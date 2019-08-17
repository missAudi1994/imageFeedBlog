<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title> </title>

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/style.css') }}">
<!-- <script src="{{asset('js/jquery-3.2.1.slim.min.js') }}"></script>
<script src="{{asset('js/popper.min.js') }}"></script> -->
<script src="{{asset('js/bootstrap.min.js') }}"></script>

</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ url('/posts')}}">Hello World!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/posts')}}">Home <span class="sr-only">(current)</span></a>
      </li>

      

      @guest  <!-- to make options if the user is not registerd -->

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/register') }}">Register</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">Login</a>
      </li>

      @else   <!-- if the user logged in then there is only logout option -->

      <li class="nav-item">
        <a href="" class="nav-link">  {{ Auth::user()->name }} </a>
      </li> <!-- this line is for displaying the user name on the top of the page if he is logged in -->

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/addpost') }}">Create Post</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
      </li>
     
      @endguest


      
    </ul>
    
  </div>
</nav>





  @yield("content")


</body>
</html>