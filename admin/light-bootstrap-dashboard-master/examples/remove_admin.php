<?php
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "UPDATE `users` SET `admin`='' WHERE `id_user` = '$id'";
        $result = $conn->query($sql);
        if($result){
            header("Location: user.php?q=user");
        }
    }
?>