<?php
$picture = $_FILES['myfile']['name'];
if (move_uploaded_file($_FILES['myfile']['tmp_name'], "Images/$picture")) {
    echo ("uploaded success!!");
    header("Location:../index.php");
} else {
    echo ("Failed to upload!!");
}
