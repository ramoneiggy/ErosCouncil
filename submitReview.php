<?php
session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

// SUBMIT REVIEW
if (isset($_POST['submit'])){

    $personID = htmlspecialchars($_SESSION['u_id']);
    $PageID = htmlspecialchars($_POST['pageID']);
    $content = htmlspecialchars($_POST['review']);

    $pageName = $_POST['pageNameID'];

    $query = $conn->prepare("INSERT INTO comments (personID, PageID, content) VALUES (:personID, :PageID, :content)");
    $query->bindParam(':personID', $personID);
    $query->bindParam(':PageID', $PageID);
    $query->bindParam(':content', $content);

    $query->execute();
    header("Location: pornSite.php?site=$pageName");
}
