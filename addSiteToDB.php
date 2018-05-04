<?php

session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $logo = $_POST['logo'];
    $images = $_POST['images'];
    $dateAdded = $_POST['dateAdded'];
    $dateCreated = $_POST['dateCreated'];

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
