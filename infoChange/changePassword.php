<?php
session_start();
include_once "../classes.php";
if (isset($_POST['submit'])){
    $oldPwd = $_POST['oldPwd'];
    $newPwd = $_POST['newPwd'];
    $newPwdAgain = $_POST['newPwdAgain'];
    if($newPwd !== $newPwdAgain){
        header("Location: ../pornfolio.php?error=repeatWrong");
        die();
    }
    $conn = PDOConnect::getPDOInstance();
    $hashedOldPwd = $conn->prepare("SELECT user_pwd FROM users WHERE user_id = :userID");
    $hashedOldPwd->bindParam(':userID', $_SESSION['u_id']);
    $hashedOldPwd->execute();
    $hashedOldPwd = $hashedOldPwd->fetch();
    if (!(password_verify($_POST['oldPwd'], $hashedOldPwd['user_pwd']))) {
        header("Location: ../pornfolio.php?error=wrongOldPassword");
        die();
    }
    $newPwd = password_hash($_POST['newPwd'], PASSWORD_DEFAULT);
    $query = $conn->prepare("UPDATE `users` SET user_pwd = :newPwd WHERE user_id = :userID");
    $query->bindParam(':userID', $_SESSION['u_id']);
    $query->bindParam(':newPwd', $newPwd);
    $query->execute();
    header("Location: ../pornfolio.php?password=changed");
}
header("refresh:5;url=../pornfolio.php");
?>
<br><p>Redirecting you to your <a href="../pornfolio.php">PORNFOLIO</a> in 5 seconds...</p>