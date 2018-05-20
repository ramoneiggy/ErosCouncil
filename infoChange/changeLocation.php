<?php
session_start();
include_once "../classes.php";
if (isset($_POST['submit'])){
    $conn = PDOConnect::getPDOInstance();
    $query = $conn->prepare("UPDATE `users` SET location = :newLocation WHERE user_id = :userID");
    $query->bindParam(':userID', $_SESSION['u_id']);
    $query->bindParam(':newLocation', test::input($_POST['location']));
    $query->execute();
    header("Location: ../pornfolio.php?location=changed");
}
header("refresh:5;url=../pornfolio.php");
?>
<br><p>Redirecting you to your <a href="../pornfolio.php">PORNFOLIO</a> in 5 seconds...</p>