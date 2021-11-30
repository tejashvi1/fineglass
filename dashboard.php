<?php
session_start();
require_once ("config.php");

if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
    echo '';
} else {
    header("location: adminlogin.php");
    exit;
}


$product_name = $product_price =$product_image=$product_category= "";
$product_name_err =$product_price_err=$product_image_err=$product_category_err= "";
global $error;



if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(empty(trim($_POST["product_name"]))){
        $product_name_err = "Enter Product Name";
    } else{
        $product_name = trim($_POST["product_name"]);
    }
    if(empty(trim($_POST["price"]))){
        $product_price_err = "Enter Price";
    } else{
        $product_price = trim($_POST["price"]);
    }
    if(empty(trim($_POST["file"]))){
        $product_image_err = "Enter Image Url";
    } else{
        $product_image = trim($_POST["file"]);
    }
    if(empty(trim($_POST["product_categories"]))){
        $product_category_err = "Enter Category";
    } else{
        $product_category = trim($_POST["product_categories"]);
    }





    if(empty($product_name_err) && empty($product_price_err) && empty($product_image_err)&& empty($product_category_err)) {
        $sql = "INSERT INTO products  VALUES (NULL,'$product_name', '$product_price','$product_image','$product_category')";

        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("FineGlass Added in a database successfully.")</script>';
            header("location: dashboard.php");
            exit;
        } else {

            $error = "One Of The field is empty";
        }
    }
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
                        <a class="nav-link" href="product_list.php">Product Edit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_block.php">User Block</a>
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

<form class="form-horizontal" style="text-align: center;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
    <fieldset>

        <legend>PRODUCTS</legend>
        <span class="text-danger"><?php echo $error; ?></span>
        <div class="form-group">
            <label class="col-md-4 control-label" >PRODUCT NAME</label>
            <div class="col-md-4">
                <input id="product_name" style="border: 1px black solid" name="product_name" placeholder="PRODUCT NAME" class="form-control input-md"  type="text" >
                <span class="text-danger"><?php echo $product_name_err; ?></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >PRICE</label>
            <div class="col-md-4">
                <input id="price" name="price" style="border: 1px black solid" placeholder="Price" class="form-control input-md" type="text" >
                <span class="text-danger"><?php echo $product_price_err; ?></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >IMAGE LINK</label>
            <div class="col-md-4">
                <textarea id="file" style="border: 1px black solid" name="file" placeholder="LINK" class="form-control input-md" ></textarea>
                <span class="text-danger"><?php echo $product_image_err; ?></span>
            </div>
        </div>
        <div class="form-group" >
            <label class="col-md-4 control-label" >PRODUCT CATEGORY</label>
            <div class="col-md-4">
                <select id="product_categories"  style="border: 1px black solid" name="product_categories" class="form-control">
                    <option value="1">Men</option>
                    <option value="2">Women</option>
                </select>
            </div>
            <span class="text-danger"><?php echo $product_category_err; ?></span>
        </div>


        <div class="form-group" style="" ><input type="submit" id="submit" class="btn btn-primary rounded-pill btn-block" style="background-color:black;color:white;margin: 0px 500px;width: 15%;" value="Submit">
        </div>

    </fieldset>
</form>


</body>
</html>