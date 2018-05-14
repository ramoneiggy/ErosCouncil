<?php

session_start();

include "classes.php";

if (isset($_POST['submit'])){

    $query = $_POST['submit'];
    var_dump($query);

    if($query == 'add'){
        $query = $conn->prepare("INSERT INTO `userfavorites`(`userID`, `pornPageID`) VALUES (:personID, :pageID)");
    }elseif($query == 'remove'){
        $query = $conn->prepare("DELETE FROM `userfavorites` WHERE `userID` = :personID AND `pornPageID` = :pageID");
    }
}