<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Porn Review</title>
    <!-- I need this for collapse and it has to be included before bootstrap js -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="index.php"><img class="logo-nav" src="Pictures/logo.png" alt="logo"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Suggested</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Best Rated</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
    </ul>    

      <ul class="navbar-nav fixed-left ml-auto">
        <li>
          <div class="nav-login">
            <?php
              if (isset($_SESSION['u_id'])){
                echo "<li class='notif'>".$_SESSION['u_uid'].", you are logged in!&nbsp;&nbsp;&nbsp;"."</li>";
                echo '<a href="pornfolio.php?profile='.$_SESSION["u_uid"].'"><button type="submit" name="profile" class="btn btn-warning">PORNFOLIO</button></a>';//PROFILE
                echo '<form action="includes/logout.inc.php" method="POST">
                <button type="submit" name="submit" class="btn btn-primary">Logout</button>              
              </form>';//LOGOUT
              }else{
                echo '<form action="includes/login.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username/e-mail">
                <input type="password" name="pwd" placeholder="password">
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
              </form>
            </div>
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="signup.php">Sign up</a>
          </li>';
              }
            ?>


      </ul>


  </div>
</nav>

<div class="jumbotron">
  <h1 class="display-4">PORN REVIEW</h1>
  <p class="lead">Review porn sites</p>  
</div>

<?php 
if ($_SESSION['u_uid'] == "adminFaca") {
  echo "<a href='administration.php'><button type='submit' class='btn btn-warning' name='admin'>ADMINISTRATION</button></a>";
}
?>