<?php include "head.php"; ?>


<!--LOG IN-->
<div class="container">
  <div class="row">  
    <div class="col-sm-6">
    <h3>LOGIN</h3>
    <form action="logInPerson.php" method="post">
    <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" name="userName" aria-describedby="emailHelp" placeholder="Enter user name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
<div class="col-sm-6">
    <h3>SIGN UP</h3>
    <form action="signUpPerson.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">User Name</label>
    <input type="text" class="form-control" name="userName" aria-describedby="emailHelp" placeholder="Enter user name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>  <div class="form-group">
    <input type="email" class="form-control" name="repeatEmail" aria-describedby="emailHelp" placeholder="Repeat email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="repeatPassword" placeholder="Repeat password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>

  </div>
</div>