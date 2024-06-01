<?php
require 'db.php';
$productsid = $_GET["productsid"];
//Get Picture 
$picture = "";
$sql = "SELECT picture FROM tblproduct WHERE productsid=?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productsid);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $picture = "../Images/" . $row["picture"];
}
//Delete 
$sql = "delete from tblproduct where productsid=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $productsid);
if ($stmt->execute() == true) {
    unlink($picture); //remove file 
    header("Location:student.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
