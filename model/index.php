<?php
    if (isset($_GET['act'])) {
        include_once("../model/pdo_model/connect_db.php");
        include_once("../model/pdo_model/globle.php");
        include_once("../model/pdo_model/category.php");
        include_once("../model/pdo_model/comment.php");
        include_once("../model/pdo_model/product.php");
        include_once("../model/pdo_model/posts.php");
        include_once("../model/pdo_model/user.php");
    include_once("../model/pdo_model/banner.php");

    }
    else{
        include_once("./model/pdo_model/connect_db.php");
        include_once("./model/pdo_model/globle.php");
        include_once("./model/pdo_model/category.php");
        include_once("./model/pdo_model/comment.php");
        include_once("./model/pdo_model/product.php");
        include_once("./model/pdo_model/posts.php");
        include_once("./model/pdo_model/user.php");
    include_once("../model/pdo_model/banner.php");

        
        if(isset($_COOKIE['ur_id'])){
            if(!isset($_SESSION['carts'])) $_SESSION['carts'] = [];
        }else{
            if(isset($_SESSION['carts'])) unset($_SESSION['carts']);
        }
    }
