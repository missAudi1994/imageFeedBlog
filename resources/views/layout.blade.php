<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title> Picgram </title>

<link rel="stylesheet" href="{{asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/style.css') }}">
<!-- <script src="{{asset('js/jquery-3.2.1.slim.min.js') }}"></script>
<script src="{{asset('js/popper.min.js') }}"></script> -->
<script src="{{asset('js/bootstrap.min.js') }}"></script>
<style>


body{
  background-color:#f8f9fa;
}


</style>
</head>
<body>



<nav class="navbar navbar-expand-lg  navbar-light bg-light">
  
   <img src="{{ asset('logo.png') }}" width="90" height="auto" class="d-inline-block align-top" alt="">
   <a class="navbar-brand" href="{{ route('posts')}}">
   <h4 class="brand brand-name ">
 
  Picgram </h4>
  </a>
   
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item ">
        <a class="nav-link" href="{{ route('posts')}}" >Timeline <span class="sr-only">(current)</span></a>
      </li>
     </ul>

      

      @guest  <!-- to make options if the user is not registerd -->
     <ul class="nav navbar-nav navbar-right">
      <li class="nav-item" >
        <a  class="nav-link"  href="{{ url('/register') }}" >Get Started</a>
      </li>
     
      <li class="nav-item " >
        <a class="nav-link" href="{{ url('/login') }}">Login</a>
      </li>
     </ul>
      @else   <!-- if the user logged in then there is only logout option -->
      <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a href=" {{ route('userposts' , Auth::user()->id) }} " class="nav-link"> Welcome  {{ Auth::user()->name }} </a>
      </li> <!-- this line is for displaying the user name on the top of the page if he is logged in -->

      <li class="nav-item">
        <a class="nav-link" href="{{ route('addpost') }}">Create Post</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
     
      @endguest


      
    </ul>

  </div>

</nav>


  @yield("content")





</body>

<style type="text/css">
#footer {
   position:fixed;
   bottom:0;
   width:100%;
   height:50px;   /* Height of the footer */
  }
</style>


<footer id="footer" class="py-2 bg-dark text-white-50">

  <div class="footer-copyright text-center py-3">
    <small>
    &copy;2019 Picgram
  </small>
   
  </div>
 

</footer>

</html>
