<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Quản lý website đồng hồ </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css?v=<?php echo time(); ?>" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="../../../index.php" class="simple-text">
                        Trở về website
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="category.php?q=category">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="user.php?q=user">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>User </p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="product.php?q=product">
                            <i class="nc-icon nc-notes"></i>
                            <p>Product</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./comment.php">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>Comment</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="cart.php">
                            <i class="nc-icon nc-atom"></i>
                            <p>Cart</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="trademark.php">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>Trademark</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="setting.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Setting</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="slide.php">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Slide</p>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Dashboard </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <?php
                                    include 'db.php';
                                    if(isset($_COOKIE['user'])){
                                        $email = $_COOKIE['user'];
                                        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
                                        $result = $conn->query($sql);
                                        if($result->num_rows > 0){
                                            while ($row = $result->fetch_assoc()){
                                                $name = $row['name'];
                                                echo '
                                                        <a class="nav-link" href="user.php">
                                                        <span class="no-icon">Chào Admin</span>
                                                    </a>
                                                ';
                                            }
                                        }
                                    }
                                ?>
                                
                            </li>
                            <li class="nav-item">
                                <?php 
                                    if(isset($_COOKIE['user'])){
                                        echo '<a class="nav-link" href="dangxuat.php">
                                        <span class="no-icon">Log out</span>
                                    </a>';
                                    }else{
                                        echo '<a class="nav-link" href="../../../login.php">
                                        <span class="no-icon">Đăng nhập</span>
                                    </a>';
                                    }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="sample">


</div>
            <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>