<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Checkout</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
</head>
<style>

</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top ">
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
                    <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
                </li>
                <li class="nav-item" style="padding-top: 8px"><a href="view_cart.php"><span class="badge"></span> Cart <?php echo count($_SESSION['cart']); ?><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                <li class="nav-item">  <a  href="logout.php" class="nav-link ">Logout</a></li>
            </ul>

        </div>


    </div>


</nav>
<div class="container" style="width: 50%;">
    <div class="row justify-content-center">
        <div class="card my-4 p-3">
            <div class="row main">
                <div class="col-12"><span>Shipping confirmation</span>&nbsp;&nbsp;&nbsp;&nbsp;<span>Credit card checkout</span></div>
            </div>
            <div class="row justify-content-center mrow">
                <div class="col-12"> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="35px" height="35px" /> <img src="https://img.icons8.com/color/48/000000/visa.png" width="35px" height="35px" /> <img src="https://img.icons8.com/color/48/000000/paypal.png" width="35px" height="35px" /> </div>
            </div>
            <form  action="thankyou.php"  method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group"><label class="form-control-placeholder p-0" for="number">CardNumber</label>  <input type="text" class="form-control p-0" id="number" name="number" style="width: 60%" max="16" required></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group"><label class="form-control-placeholder p-0" for="name">Cardholder'sName</label> <input type="text" class="form-control p-0" id="name" name="name" style="width: auto"required> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-12">

                        <div class="form-group"><label class="form-control-placeholder p-0" for="expdate">ExpirationDate</label>  <input type="text" class="form-control p-0" id="expdate" style="width: auto"required></div>

                        <div class="form-group"><label class="form-control-placeholder p-0" for="passw">CVV</label> <input type="password" class="form-control p-0" id="passw" style="width: auto"required> </div>
                    </div>
                </div>
                <div class="row lrow mt-4 mb-3">
                    <div class="col-sm-8 col-12">
                        <h3>Grand Total:</h3>
                        <h5>$<?php echo $_GET['total']?></h5>

                    </div>

                </div>
                <div >
                    <input type="hidden" value="<?php echo $_GET['total']?>" name="amount">
                    <button  class="btn btn-link ml-2" style="background-color: sandybrown;color: black;width: auto" value="Pay" name="pay" id="pay">Pay</button>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>