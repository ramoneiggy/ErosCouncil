<?php
session_start();
include_once "../classes.php";
if (isset($_POST['submit'])){
    if($_POST['email'] !== $_POST['emailAgain']){
        header("Location: ../pornfolio.php?error=email");
        die('Emails are not same!');
    }
    $newEmail = test::input($_POST["email"]);
    if(!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../pornfolio.php?error=email");
        die("Invalid email format");
    }
    $conn = PDOConnect::getPDOInstance();
    $query = $conn->prepare("UPDATE `users` SET `user_email`= :newEmail WHERE user_id = :userID");
    $query->bindParam(':userID', $_SESSION['u_id']);
    $query->bindParam(':newEmail', $newEmail);
    $query->execute();
    header("Location: ../pornfolio.php?email=changed");
}
header("refresh:5;url=pornfolio.php");
?>
<br><p>Redirecting you to your <a href="../pornfolio.php">PORNFOLIO</a> in 5 seconds...</p>