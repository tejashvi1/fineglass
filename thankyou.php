<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


<div class="jumbotron text-center">
    <h1 class="display-3">Thank You for your order!</h1>
    <p class="lead"><strong>Please check your email</strong> for Order Details</p>
    <hr>

    <p class="lead">
        <a class="btn btn-primary btn-sm" href="index1.php" role="button">Continue to Main</a>
    </p>
</div>
<?php


require_once("config.php");
$cname = $cnumber = $amount = "";
$cname = $_POST['name'];
$cnumber = $_POST['number'];
$amount = $_POST['amount'];



$sql = "INSERT INTO payment  VALUES (NULL,'$cname','$cnumber','$amount')";

mysqli_query($conn, $sql);






?>

</body>
</html>