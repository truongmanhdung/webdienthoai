<?php
if (isset($_COOKIE['user'])) {

    include 'header.php';
    include 'db.php';
    if (isset($_GET['q'])) {
        $q = $_GET['q'];
        switch ($q) {
            case 'category':
                include 'category_show.php';
                break;
            case 'sua':
                include 'category_update.php';
                break;
            case 'them':
                include 'category_add.php';
                break;
            default:
                include 'category_show.php';
                break;
        }
    }
} else {
    header('Location: https://lh3.googleusercontent.com/proxy/APYMtvaXeetaz24UWRkUEv8lD0C6OD6Kv0Wgwrbw_CODDpkxtyCvyQ6gFhMcywNIsz112fQGmPDbBhXxGfdANHlsr6voTHeqhE_nyGMSOwdI5UKGvYPR7RxWDdtf');
}
?>