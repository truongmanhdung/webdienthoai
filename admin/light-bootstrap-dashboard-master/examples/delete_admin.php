<?php
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "DELETE FROM `users` WHERE `id_user` = $id";
        $result = $conn->query($sql);
        if($result){
            header("Location: user.php?q=user");
        }
    }
?>