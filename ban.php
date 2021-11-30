<?php
session_start();


require_once "config.php";


$id = $_GET['id'];

$del = mysqli_query($conn, "update user set ban = '1' where id = '$id'");

if ($del) {
    mysqli_close($conn);
    header("location:user_block.php");
    exit;
} else {
    echo "ERROR";
}


?>