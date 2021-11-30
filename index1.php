<?php
session_start();
require_once ("config.php");

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

unset($_SESSION['qty_array']);


?>
<html>
<head>
    <title>fineglasses</title>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <style>
        .product_image{
            height:200px;
        }
        .product_name{
            height:80px;
            padding-left:20px;
            padding-right:20px;
        }
        .product_footer{
            padding-left:20px;
            padding-right:20px;
        }
    </style>
</head>
<body>
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
                    <a class="nav-link active" aria-current="page" href="index1.php">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="women.php">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
                </li>
                <li class="nav-item" style="padding-top: 8px;"><a href="view_cart.php"><span class="badge"></span> Cart <?php echo count($_SESSION['cart']); ?><span class="glyphicon glyphicon-shopping-cart"></span></a></li>


                <li class="nav-item">  <a  href="logout.php" class="nav-link ">Logout</a></li>

            </ul>
            </li>
            </ul>
        </div>




        </div>
    </div>
</nav>

<div class="container">
    <h1 class="mt-4" style="text-align: center">Welcome To Fineglasses</h1>
    <h3 class="mt-4" style="text-align: center">Select Choices For Men Here</h3>

</div>

<div class="container">
    <?php
    if(isset($_SESSION['message'])){
        ?>
        <div class="row" style="margin: 0px 200px">
            <div class="col-sm-12 col-sm-offset-12">
                <div class="alert alert-info text-center" >
                    <?php echo $_SESSION['message']; ?>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['message']);
    }



    $sql = "SELECT * FROM products where category = '1' ";
    $query = $conn->query($sql);
    $inc = 4;
    while($row = $query->fetch_assoc()){
        $inc = ($inc == 4) ? 1 : $inc + 1;
        if($inc == 1) echo "<div class='row text-center'>";
        ?>
        <div class="col-sm-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row product_image">
                        <img src="<?php echo $row['photo'] ?>" width="80%" height="auto">
                    </div>&nbsp;

                    <div class="row product_name"><br>
                        <h4><?php echo $row['name']; ?></h4>
                    </div>
                    <div class="row product_footer">
                        <p class="pull-left">$<b><?php echo $row['price']; ?></b></p>
                        <span class="pull-right"><a href="add_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Add To Cart</a></span><br>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    if($inc == 1) echo "<div></div><div></div><div></div></div>";
    if($inc == 2) echo "<div></div><div></div></div>";
    if($inc == 3) echo "<div></div></div>";

    ?>
</div>

</body>
</html>