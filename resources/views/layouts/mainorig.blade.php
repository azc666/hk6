
<!doctype html>
<html>
<head>
    <title>ARH Order Portal</title>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script> --}}
    
    <link href="css/carousel.css" rel="stylesheet">
     
    <link rel="stylesheet" href="css/user.css">
  <link rel="stylesheet" href="css/screen.css">
</head>
<body> 
    <header>
    <h1 class="logo"><img src="assets/header.gif" alt="ARH Logo" > </h1>
    <link href="css/coolMenu.css" rel="stylesheet" type="text/css" media="screen"/>
<!-- <script type="text/javascript" src="../library/js/modernizr-1.6.min.js"></script> -->

@include('partials/_navbar')
<div class="noprint">
<!-- <nav> -->
  <ul id="coolMenu">
    <li><a href="index.php">Home</a></li>
    <li><a href="changepasswd.php">Change Password</a></li>
    <li><a href="changeacctinfo.php">Change Account Info</a></li>
    <li><a href="support.php">Support</a></li>
    <!-- <li><a href="vieworders.php">View Orders</a></li> -->
        
    <li><a href="logout.php">Log Out</a></li>
    
    <!-- <span id="cartright"> -->
    <li style="float: right"><a href="cart.php">My Cart<img style="width: 42px; height: auto; border: 0;" src="assets/carticon/ShoppingCart0.gif"/></a>
    <!-- </span> -->
      
    <ul class="noJS">
      <li><a href="cart_save.php">Save Cart</a></li>
      <li><a href="cart_restore.php">Restore Cart</a></li>
    </ul>
    </li>
   </li>
  </ul>    
<!-- </nav> -->
</div>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="../library/js/scripts.js"></script>
<script src="../js/modernizr-1.6.min"></script> -->
    <div class="clear"></div>
</header>
   
    <div id="container" >
        <aside>
    <div class="widget">
  <h3>Log in</h3>
  <div class="inner">
      <form action="login.php" method="post">
        <ul id="login">
            <li>Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="recover.php?mode=username"><i><small>Forgot?</small></i></a><br>
              <input type="text" name="username">
            </li><br>
            <li>
            Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="recover.php?mode=password"><i><small>Forgot?</small></i></a><br>
              <input type="password" name="password">
            </li><br>
            <li>
              {{-- <input class="button" type="submit" value="Log In"/> --}}
               <button class="btn btn-md btn-primary" type="submit">Log in</button>
            </li>
          <br><br>
          <li>
            <p>Note: You must be logged in <br> to access the Order Portal</p> 
          </li>             
        </ul>
      </form>
  </div>
</div>
    
</aside>

<style>
#menu_bullet:hover{
    background-image:   url('assets/arrow.gif');
    background-size:    60px 20px;
    color:royalblue;
  }
</style>

<h2>ARH Order Portal Home</h2>
<!-- <img src="assets/CoquinaLogIn.jpg" width="608"><br><br> -->

<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="assets/CoquinaLogInLg.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Example headline.</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="assets/CoquinaLogInLg.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="assets/AmalfiLg.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->



  {{-- <table> --}}

    <!-- <tr><td scope="row"> -->
    <p><a id="menu_bullet" href="product_select.php?category=opb">
    <h3><span id="menu_text">"Our Process" Brochures &nbsp; <img src="assets/new_burst.jpg"  alt="New Product - Our Processs Brochures!" width="60" align="right"></span></h3>
    </a></p>
    <br>
  
    <p><a id="menu_bullet" href="franchise_home.php">
    <h3><p><span id="menu_text">&nbsp;Franchise Stationery</span></p></h3>
  </a></p>
  <br>

    <p><a id="menu_bullet" href="product_select.php?category=corp">
    <h3><span id="menu_text">&nbsp;Corporate Stationery</span></h3>
    </a></p>
    <br>

    <p><a id="menu_bullet" href="product_select.php?category=np">
    <h3><span id="menu_text">&nbsp;Note Pads &nbsp;<img src="assets/new_burst.jpg"  alt="New Product - Personal Note Pads!" width="60" align="right"></span></h3>
    </a></p>
  
    </div>
    <footer>
  <a href="http://www.g-d.com" title="Open www.g-d.com in a new window/tab" target="_blank">
<img src='assets/footer.gif' alt="G&amp;D Website" width="920px" border="0">
</a>
<!-- &copy; g-d.com 2013. All rights reserved. -->
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>