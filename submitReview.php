<?php
session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

// SUBMIT REVIEW
if (isset($_POST['submit'])){

    $personID = $_SESSION['u_id'];
    $PageID = $_POST['pageID'];
    $content = $_POST['review'];
    $isVisible = 1;
    $datePublished = date("Y-m-d H:i:s");

    $pageName = $_POST['pageNameID'];

    $query = $conn->prepare("INSERT INTO comments (personID, PageID, content, isVisible, datePublished) VALUES (:personID, :PageID, :content, :isVisible, :datePublished)");
    $query->bindParam(':personID', $personID);
    $query->bindParam(':PageID', $PageID);
    $query->bindParam(':content', $content);
    $query->bindParam(':isVisible', $isVisible);
    $query->bindParam(':datePublished', $datePublished);

    $query->execute();
    header("Location: pornSite.php?site=$pageName");
}
