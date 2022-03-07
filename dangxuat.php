<?php 
    setcookie('user','xóa',time()- (86400 * 30),"/");
    unset($_SESSION['cart']);
    header('Location: index.php');
?>