<?php
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "DELETE FROM `products` WHERE `id_product` = $id";
        $result = $conn->query($sql);
        if($result){
            header("Location: product.php?q=product");
        }
    }
?>