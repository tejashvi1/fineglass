<?php
session_start();
require_once ("config.php");

if(isset($_SESSION["valid"]) && $_SESSION["valid"] === true){
    echo '';
} else {
    header("location: adminlogin.php");
    exit;
}




$id = $_GET['id'];

$qry = mysqli_query($conn,"select * from products where id='$id'");

$data = mysqli_fetch_array($qry);

if(isset($_POST['update']))
{
    $product_name = $_POST['name'];
    $photo = $_POST['image'];
    $price = $_POST['price'];

    $edit = mysqli_query($conn,"update products set name='$product_name', price='$price',photo='$photo' where id='$id'");

    if($edit)
    {
        mysqli_close($conn);
        header("location:product_list.php");
        exit;
    }
    else
    {
        echo mysqli_error();
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
<br>
<br>

<h3 style="text-align: center">Update Product Details</h3>
<br>

<form class="form-horizontal" style="text-align: center;"  method="post" >
    <fieldset>

        <div class="form-group">
            <label class="col-md-4 control-label" >PRODUCT NAME</label>
            <div class="col-md-4">
                <input type="text" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter Product Name" Required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" >PRODUCT PRICE</label>
            <div class="col-md-4">
                <input type="text" name="price" value="<?php echo $data['price'] ?>" placeholder="Enter Price" Required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" >PRODUCT IMAGE</label>
            <div class="col-md-4">
                <input type="text" name="image" value="<?php echo $data['photo'] ?>" placeholder="Enter Image Link" Required>
            </div>
        </div>
    </fieldset>
    <input type="submit" name="update" class="btn btn-warning rounded-pill py-2 btn-block" style="color: white;margin:0px  20px;width: auto" value="Update">
</form>


</body>
</html>