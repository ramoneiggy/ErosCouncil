<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include_once "classes.php";
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100&effect=neon">
    
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark bg-dark-nav">

  <a class="navbar-brand" href="index.php"><img class="logo-nav" src="img/sexy-lady-left.png" alt="logo"></a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">

    <ul class="navbar-nav">
      <li class="nav-item <?php Draw::echoActiveClassIfRequestMatches("index"); ?>">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item <?php Draw::echoActiveClassIfRequestMatches("categories"); ?>">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      <li class="nav-item <?php Draw::echoActiveClassIfRequestMatches("contact"); ?>">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li>
    </ul>    

      <ul class="navbar-nav fixed-left ml-auto">
        <li>
          <div class="nav-login">  
          <?php                      
          if (isset($_SESSION['u_id'])){?>
          <li class='notif'></li>
          <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
            <button class="btn btn-outline-purple my-2 my-sm-0" type="submit" name="submit">Search</button>
          </form>&nbsp;
          <?php 
            if (Check::ifAdmin($_SESSION['u_id']) == 1){?>
              <a href='administration.php'><button type='submit' class="btn btn-outline-purple my-2 my-sm-0" name='admin'>ADMINISTRATION</button></a>
            <?php
            }
          ?> 
          <a href="pornfolio.php?profile=<?php echo $_SESSION['u_uid']; ?>"><button type="submit" name="profile" class="btn btn-outline-purple my-2 my-sm-0">PORNFOLIO</button></a>
          <form action="includes/logout.inc.php" method="POST">
            <button type="submit" name="submit" class="btn btn-dark-purple my-2 my-sm-0">Logout</button>              
          </form><?php 
          } else { ?>
          <form class="form-inline" action="includes/login.inc.php" method="POST">
            <input class="form-control mr-sm-2" type="text" name="uid" placeholder="username/e-mail">
            <input class="form-control mr-sm-2" type="password" name="pwd" placeholder="password">
            <button type="submit" name="submit" class="btn btn-outline-purple my-2 my-sm-0">Login</button>
          </form>
          </div>
        </li>    
        <li class="nav-item">
          <a class="btn btn-dark-purple my-2 my-sm-0" href="signup.php">Sign up</a>
        </li><?php
        }     
        ?>   
      </ul>
  </div>
  &nbsp;
  <a class="navbar-brand" href="index.php"><img class="logo-nav" src="img/sexy-lady-right.png" alt="logo"></a>
</nav>

<div class="jumbotron">
  <h1 class="font-effect-neon display-4"><b><a class="header-link-white" href="index.php">PORN REVIEW</a></b></h1>
</div>