<?php

error_reporting(E_ALL & ~E_NOTICE);

if (isset($_POST['submit'])){

    include_once 'dbh.inc.php';

    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['dateOfBirth']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $emailAgain = mysqli_real_escape_string($conn, $_POST['emailAgain']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwdAgain = mysqli_real_escape_string($conn, $_POST['pwdAgain']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $avatar = "uploads/profilePics/user-default.png";
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    //check if user is underage
    $now = date('Y-m-d');
    $userAge = $now-$dateOfBirth;
    if ($userAge < 18){
        die('YOU ARE UNDERAGE, GO AWAY!!!');
    }


    //Error handlers
    //Check for empty fields

    if($email !== $emailAgain || $pwd !== $pwdAgain){
        header("Location: ../signup.php?signup=emailOrPasswordNotSame");
        exit();
    }

    if (empty($uid) || empty($email) || empty($pwd)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    }else{
        //Check if input chars are valid
        if (!preg_match("/^[a-zA-Z]*$/", $uid)){
            header("Location: ../signup.php?signup=invalidCharacters");
            exit();
        }else{
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signup.php?signup=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE user_uid='$uid'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    header("Location: ../signup.php?signup=usertaken");
                    exit();
                }else{
                    //Hashing the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_email, user_uid, dateOfBirth, avatar, gender, location, user_pwd) VALUES ('$email', '$uid', '$dateOfBirth', '$avatar', '$gender', '$location', '$hashedPwd');";
                    mysqli_query($conn, $sql);
                    header("Location: ../index.php?signup=success");
                    exit();
                }
            }
        }
    }

}else{
    header("Location: ../signup.php?signup=nesto");
    exit();
}

