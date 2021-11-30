<?php
session_start();
require_once ("config.php");

if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
    echo '';
} else {
    header("location: adminlogin.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>


    <style>
        input,textarea{
            margin: 0px 500px;
            border:1px black solid;
            font-weight: bold;
            margin-left: auto;
        }

        .form-group{
            display: flex;
            padding: 8px;
        }

    </style>

</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Logo.jpg.jpeg" alt="..." height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Product Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminpay.php">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminlogout.php">Logout</a>
                    </li>

                </ul>
                </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<body>

<style>
    .bs-example{
        margin: 20px;
    }
</style>

<div class="bs-example">
    <table class="table table-dark">
        <thead style="text-align: center">
        <tr>
            <th>Number</th>
            <th>Card Name</th>
            <th>Card Number</th>
            <th>Amount</th>


        </tr>
        </thead>
        <tbody>
        <?php

        $query = "SELECT * FROM `payment`";
        $hselect = mysqli_query($conn, $query);
        if (!empty($hselect) && $hselect->num_rows   > 0) {

            while ($oselect = mysqli_fetch_assoc($hselect)) {
                ?>
                <tr style="text-align: center">
                    <td><?php echo $oselect['id']; ?></td>
                    <td>$ <?php echo $oselect['cardname']; ?></td>
                    <td><?php echo $oselect['cardnumber']; ?></td>
                    <td><?php echo $oselect['amount']; ?></td>



                </tr>
                <?php
            }
        }
        else{
            echo "<tr style='color:orange;'><td colspan='8'>No Payments...!</td></tr>";
        }
        ?>

        </tbody>
    </table>
</div>
</body>
</html>
