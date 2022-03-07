<?php 
    include 'db.php';
    if($_GET['id']){
        $id = $_GET['id'];
        $sql = "DELETE FROM `setting` WHERE `id` = '$id'";
        $result = $conn->query($sql);
        if($result){
            header("Location: setting.php");
        }
    }
?>