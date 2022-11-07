<?php
    if (isset($_GET['act'])) {
        include_once("../model/pdo_model/connect_db.php");
        include_once("../model/pdo_model/globle.php");
        // include_once("../model/pdo_model/category.php");
        // include_once("../model/pdo_model/comment.php");
        // include_once("../model/pdo_model/product.php");
        include_once("../model/pdo_model/posts.php");
        include_once("../model/pdo_model/user.php");
    }
    else{
        include_once("./model/pdo_model/connect_db.php");
        include_once("./model/pdo_model/globle.php");
    }
?>