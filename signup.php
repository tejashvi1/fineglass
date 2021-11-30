<html>
<head>
    <title>fineglasses</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">Signup</a>
                </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>

<br>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: darkseagreen;color: white">Signup</div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" required autofocus>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" id="cpassword" class="form-control" name="cpassword" required>
                            </div>
                        </div>

                        <br>
                        <div class="col-md-6 offset-md-6">
                            <button type="submit" id="register" name="register" class="btn btn-danger">
                                Register
                            </button>
                            <a href="login.php" class="btn btn-link" style="background-color: sandybrown;color: white"">
                                Back To Login
                            </a>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>


<?php require_once('config.php');


if(isset($_POST['register'])){

    $user = $_POST['email'];

    $pass = $_POST['password'];

    $cpass = $_POST['cpassword'];
    if($pass== $cpass){
    $insert_user = "insert into user(id,email,password) VALUES(NULL,'$user','$pass')";
	$run_user = mysqli_query($conn,$insert_user);
		
	    echo "<script>window.open('login.php)</script>";
    }
    
}


?>

