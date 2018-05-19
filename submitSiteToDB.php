<?php

session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

if (isset($_POST['submit'])){
    //give variables

    $name = test::input($_POST['name']);
    $url = $_POST['url'];
    $description = test::input($_POST['description']);
    $logo = $_POST['logo'];
    $images = $_POST['images'];
    $isFeatured = test::input($_POST['isFeatured']);
    $addedByUser = test::input($_SESSION['u_id']);

    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
        header("Location: administration.php?site=urlError");
        exit();
      }
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$logo)) {
        header("Location: administration.php?site=logoError");
        exit();
      }
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$images)) {
        header("Location: administration.php?site=imagesError");
        exit();
      }

    //check if porn site exists in DB

    $check = $conn->prepare ("SELECT `name` FROM `pornpages` WHERE `name` = :name");
    $check->bindParam(':name', $name);

        $check->execute();
        $result = $check->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            header("Location: administration.php?site=alreadyExists");
            exit();
        }

    //add site to DB

    $query = $conn->prepare("INSERT INTO pornpages (name, url, description, logo, images, isFeatured, addedByUser) VALUES (:name, :url, :description, :logo, :images, :isFeatured, :addedByUser)");
    $query->bindParam(':name', $name);
    $query->bindParam(':url', $url);
    $query->bindParam(':description', $description);
    $query->bindParam(':logo', $logo);
    $query->bindParam(':images', $images);
    $query->bindParam(':isFeatured', $isFeatured);
    $query->bindParam(':addedByUser', $addedByUser);
    $query->execute();
    header("Location: administration.php?site=added&name=$name");
}
