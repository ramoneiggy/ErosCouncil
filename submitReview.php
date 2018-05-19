<?php
session_start();

include "classes.php";

$conn = PDOConnect::getPDOInstance();

// SUBMIT REVIEW
if (isset($_POST['submit'])){

    $personID = test::input($_SESSION['u_id']);
    $PageID = test::input($_POST['pageID']);
    $content = test::input($_POST['review']);

    $pageName = $_POST['pageNameID'];

    $query = $conn->prepare("INSERT INTO comments (personID, PageID, content) VALUES (:personID, :PageID, :content)");
    $query->bindParam(':personID', $personID);
    $query->bindParam(':PageID', $PageID);
    $query->bindParam(':content', $content);

    $query->execute();
    header("Location: pornSite.php?site=$pageName");
}