<?php 
include_once 'resource/Database.php' ;
include_once 'resource/utilities.php';
include_once 'resource/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Appt</title>
   <link rel="icon" type="image/ico" href="image/just.jpg" />   
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="inc/bootstrap.min.css">
  <script src="inc/jquery.min.js"></script>
  <script src="inc/popper.min.js"></script>
  <script src="inc/bootstrap.min.js"></script>  
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>
<body>

    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <span style="color: #428bca;font: 15px Arial;margin-left:45px;"><img src="image/abc.png" height="23px" width="20px">01986572113</span>
            <span style="color: #428bca;font: 15px Arial;margin:15px;"><img src="image/gmail.png"height="22px" width="20px"> emoncsejust@gmail.com</span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-2">
                        <div class="versity-logo" style="border-right:2px blue solid">
                            <span style="margin-left:20px;"><a href="/"><img class="img-fluid" src="image/just.jpg" alt="logo" width="110px" height="130px"></a></span>
                            <span style="letter-spacing: 14px;margin:35px;color:red;font-weight:bold;">JUST</span>
                        </div>
        </div>
        <div class="col-md-6">
                        <div id="DepartementText" class="CSE-department">
                            <span style="color:black">Department of</span>
                            <h2 style="color:black;">Accounting And Information System</h2>
                        </div>
        </div>
        <div class="col-md-2 text-right">
                        <?php
                        if(!isset($_SESSION['username'])): ?>
                        <span style="color:#428bca;font:15px Arial;margin:15px;" ><a href="login.php">login</a></span>
                       <span style="color:#428bca;font:15px Arial;margin:10px;"><a href="signup.php">Registation</a></span>
                       <?php else: ?>
                        <span style="color:#428bca;font:15px Arial;margin:15px;" ><?php echo $_SESSION['username'];?></span>
                       <span style="color:#428bca;font:15px Arial;margin:15px;" ><a href="logout.php">logout</a></span>
                        <?php endif ?>
        </div>
        <div class="col-md-2">
           <form class="form-inline" action="">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-success" type="submit">Search</button>
           </form>
        </div>
        
    </div>

<nav class="navbar navbar-expand-lg bg-info">
  <ul class="navbar-nav" id="navbar">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">News</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Pepole
      </a>
      <div class="dropdown-menu" id="dropdown">
        <a class="dropdown-item" href="#">Faculty Member</a>
        <a class="dropdown-item" href="#">Support Member</a>
      </div>
    </li>
    
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Activities
      </a>
      <div class="dropdown-menu" id="dropdown">
        <a class="dropdown-item" href="#">Notice</a>
        <a class="dropdown-item" href="#">News and Events</a>
        <a class="dropdown-item" href="#">Upcoming Event</a>
        <a class="dropdown-item" href="#">Extra Carricular</a>
        <a class="dropdown-item" href="#">Co-Carricular</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Alumni</a>
    </li>
  </ul>
</nav>

<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1" ></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/main3.jpg" alt="Soumik" width="60" height="60">
      <div class="carousel-caption">
        <h3>Emon</h3>
        <p>Welcome Every One </p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="image/main.jpg" alt="Soumik" width="100" height="100">
      <div class="carousel-caption">
        <h3>Emon</h3>
        <p>Had such a great time</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="image/main1.jpg" alt="Soumik" width="100" height="100">
      <div class="carousel-caption">
        <h3>Emon</h3>
        <p>Thank U For visiting</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="row" style="padding:20px;">
    <div class="col-md-1">
     
    </div>
    <div class="col-md-5">
        <h3 class="text-center" style="margin:20px; background-color: green; color:white;padding:15px;border-radius:5px;">MESSAGE FROM CHAIRMAN</h3>
       
    </div>
    <div class="col-md-5">
        
      <h3 class="text-center" style="margin:20px; background-color:green; color:white;padding:15px;border-radius:5px;">Notice</h3>
       
    <div class="col-md-1">
     </div>
    </div>
</div>


  
</body>
</html>