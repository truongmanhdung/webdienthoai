<?php
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        var_dump($id);
        $sql = "DELETE FROM `product_detail` WHERE `id_product_detail` = '$id'";
        $result = $conn->query($sql);
        if($result){
            header("Location: product.php?q=product");
        }
    }
?>