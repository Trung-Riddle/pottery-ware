<?php
    if(isset($_GET["act"])){
        switch ($_GET["act"]) {
            case 'dashboard':
                include_once("./layouts/Dashboard/index.php");
                break;
            case 'order':
                include_once("./layouts/order/index.php");
                break;
            case 'posts':
                include_once("./layouts/posts/index.php");
                break;
            case 'comment':
                include_once("./layouts/comment/index.php");
                break;
            case 'category':
                include_once("./layouts/category/index.php");
                break;
            case 'product':
                include_once("./layouts/product/index.php");
                break;
            case 'charts':
                include_once("./layouts/charts/index.php");
                break;
            case 'notification':
                include_once("./layouts/notification/index.php");
                break;
            case 'sendmail':
                include_once("./layouts/sendmail/index.php");
                break;

            
            default:
                
                break;
        }
    }
?>