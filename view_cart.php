<?php
session_start();
require_once ("config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cart</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
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
                        <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
                    </li>
                    <li class="nav-item" style="padding-top: 8px"><a href="view_cart.php"><span class="badge"></span> Cart <?php echo count($_SESSION['cart']); ?><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
                    <li class="nav-item">  <a  href="logout.php" class="nav-link ">Logout</a></li>

                </ul>
                </li>
                </ul>
            </div>




        </div>
</div>
</nav>

<div class="container">

    <h1 class="page-header text-center">Cart Details</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <?php
            if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-info text-center" style="margin: 0px 200px">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php
                unset($_SESSION['message']);
            }

            ?>
            <style>
                table{
                    margin: 0px 200px;
                }
            </style>
            <form method="POST" action="save_cart.php">
                <table class="table table-bordered table-striped" style="text-align: center">
                    <thead>

                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    </thead>
                    <tbody>
                    <?php
                    $total = 0;
                    if(!empty($_SESSION['cart'])){

                        $index = 0;
                        if(!isset($_SESSION['qty_array'])){
                            $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                        }
                        $sql = "SELECT * FROM products WHERE id IN (".implode(',',$_SESSION['cart']).")";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                            ?>
                            <tr>

                                <td><?php echo $row['name']; ?></td>
                                <td>$<?php echo number_format($row['price'], 2); ?></td>
                                <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                                <td>$<?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
                                <?php $total += $_SESSION['qty_array'][$index]*$row['price']; ?>
                            </tr>
                            <?php
                            $index ++;
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <td colspan="4" class="text-center">No Item in Cart</td>
                        </tr>
                        <?php
                    }

                    ?>
                    <tr>
                        <td colspan="3" align="right"><b>Total</b></td>
                        <td>$<b><?php echo number_format($total, 2); ?></b></td>
                    </tr>
                    </tbody>
                </table>
                <div style="margin: 0px 200px">
                <a href="index1.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                <button type="submit" class="btn btn-success" name="save">Save Changes</button>
                <a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
                <a href="checkout.php?total=<?php echo $total?>" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Checkout</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>

