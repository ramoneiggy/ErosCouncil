<?php
session_start();
include_once "../classes.php";
if (isset($_POST['submit'])){
    $conn = PDOConnect::getPDOInstance();
    $query = $conn->prepare("UPDATE `users` SET gender = :newGender WHERE user_id = :userID");
    $query->bindParam(':userID', $_SESSION['u_id']);
    $query->bindParam(':newGender', test::input($_POST['gender']));
    $query->execute();
    header("Location: ../pornfolio.php?gender=changed");
}
header("refresh:5;url=../pornfolio.php");
?>
<br><p>Redirecting you to your <a href="../pornfolio.php">PORNFOLIO</a> in 5 seconds...</p>