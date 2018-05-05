<?php

session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

if (isset($_POST['submit'])){

    //make sure to choose first free ID slot

    $cleanAI = $conn->prepare("ALTER TABLE pornpages AUTO_INCREMENT = 1");
    $cleanAI->execute();

    //give variables

    $name = $_POST['name'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $logo = $_POST['logo'];
    $images = $_POST['images'];
    $dateAdded = $_POST['dateAdded'];
    $dateCreated = $_POST['dateCreated'];

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

    $query = $conn->prepare("INSERT INTO pornpages (name, url, description, logo, images, dateAdded, dateCreated) VALUES (:name, :url, :description, :logo, :images, :dateAdded, :dateCreated)");
    
    $query->bindParam(':name', $name);
    $query->bindParam(':url', $url);
    $query->bindParam(':description', $description);
    $query->bindParam(':logo', $logo);
    $query->bindParam(':images', $images);
    $query->bindParam(':dateAdded', $dateAdded);
    $query->bindParam(':dateCreated', $dateCreated);

    $query->execute();


    header("Location: administration.php?site=added");

}
