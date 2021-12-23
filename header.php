<!DOCTYPE html>
<html>
    <head>
        <title>Online Electronics Products Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css" type="text/css">   
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand" style="background-color: lightblue;font-weight:bold;">
                <img src="images/logo.jpg" alt="product" width="70" height="55"></Img>
                <ul class="navbar-nav">
                    <?php
                    if(isset($_SESSION['email'])){
                        ?>
                        <li class="nav-item active">
                            <a class="nav-link  text-dark font-weight-bold  btn-l" target="_blank" href="viewproducts.php">Products<span class="sr-only">(current)</span></a>
                        </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link  text-dark font-weight-bold  btn-l" target="_blank" href="logout.php">Logout <span class="sr-only">(current)</span></a>
                    </li>
                    <?php 
                    }
                    if(!isset($_SESSION['email'])){
                        ?>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link  text-dark font-weight-bold  btn-l" target="_blank" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link  text-dark font-weight-bold  btn-l" target="_blank" href="registration.php">Registration <span class="sr-only"></span></a>
                    </li>
                </ul>
                <ul class="navbar-nav">  
                    <li class="nav-item active">
                        <a class="nav-link  text-dark font-weight-bold  btn-l" target="_blank" href="login.php">Login <span class="sr-only">(current)</span></a>
                    </li> 
                    <?php
                    }
                    ?>
                </ul>   
            </nav>
    </header>