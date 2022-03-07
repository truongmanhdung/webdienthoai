<?php
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "DELETE FROM `categories` WHERE `id_category` = $id";
        $result = $conn->query($sql);
        if($result){
            header("Location: category.php?q=category");
        }
    }
?>