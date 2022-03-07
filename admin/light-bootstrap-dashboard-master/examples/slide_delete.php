<?php
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "DELETE FROM `slide` WHERE `id` = $id";
        $result = $conn->query($sql);
        if($result){
            header("Location: slide.php");
        }
    }
?>