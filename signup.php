<?php include "head.php"; ?>


<!--LOG IN-->
<div class="container">
    <div class="row">  
    <div class="col-3"></div>
        <div class="col-6">
            <h2>SIGN UP</h2>

            <form action="includes/signup.inc.php" method="POST">

                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" name="uid" aria-describedby="emailHelp" placeholder="Enter user name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>  

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Password">
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            
            </form>
        </div>
        <div class="col-3"></div>  
    </div>
</div>