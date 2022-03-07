<?php 
    include 'header.php';
    include 'db.php';
    if(isset($_GET['q'])){
        $q = $_GET['q'];
        switch ($q) {
            case 'product':
                include 'product_show.php';
                break;
            case 'sua':
                include 'product_update.php';
                break;
            case 'them':
                include 'product_add.php';
                break;
            default:
                include 'product_show.php';
                break;
        }
    }
?>