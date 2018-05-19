<?php
include "head.php";
?>
<div class="container-fluid">
  <h3 class="text-center">CONTACT US<hr></h3>
    <div class="row">

      <div class="col-lg-3"></div>

      <div class="col-lg-6">
        <div class="row">
        <?php
          if (array_key_exists("mail", $_GET) && $_GET["mail"] == "Sent") {
              echo "<p class='col-sm-12 form-group text-center text-dark-purple'>Your e-mail has been sent, we'll answer you as soon as possible</p>";
          }
          if (array_key_exists("mail", $_GET) && $_GET["mail"] == "error") {
              echo "<p class='col-sm-12 form-group text-center text-red'>Something went wrong, please try again</p>";
          }
          if (array_key_exists("mail", $_GET) && $_GET["mail"] == "invalidFormat") {
            echo "<p class='col-sm-12 form-group text-center text-red'>Invalid email format</p>";
          }
        ?>
          <div class="col-sm-12 form-group">
            <form lass="form-control" action="contactForm.php" method="POST">
              <input type="text" class="form-control" name="name" placeholder="Name" required>
              <br>
              <input type="email" class="form-control" name="mail" placeholder="Your e-mail" required>
              <br>
              <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              <br>
              <textarea name="message" class="form-control" placeholder="Message" rows="5" required></textarea>
              <small class="form-text text-right">All fields are required and we'll never share your email or your data with anyone else</small>
              <br>
              <button type="submit" class="btn btn-dark-purple pull-right" name="submit">SEND E-MAIL</button>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-3"></div>

    </div>
  </div>
<?php
include "footer.php";
?>