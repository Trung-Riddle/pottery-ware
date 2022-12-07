<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pottery Ware</title>
    <!-- -------------- CSS -----------------  -->
    <link rel="stylesheet" href="./style/index.css">
    <!-- ------------------- ICON --------------------  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- ------------------ SHORTCUT ICON -------------------  -->
    <link rel="shortcut icon" href="../asset/image/amphora_icons.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="../font/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" />
</head>

<body>
    <div class="loading">
        <img src="../asset/svg/pottery-1.1s-200px.svg" alt="">
        <h3>Loading...</h3>
    </div>
    <div class="filterError">
        <div class="boxError">
            <div class="textError">
            </div>
            <a href="" id="backError">Quay lại</a>
        </div>
    </div>
    <?php
        if(isset($_COOKIE['acc_allow']) && ($_COOKIE['acc_allow'] == sha1("allowacc"))){
            include_once("../model/index.php");
            include_once("./layouts/Dashboard/index.php");
            include_once("./js/index.php");
        }else{
            require_once("./layouts/LoginAdmin/index.php");
        }
    ?>
</body>
<script src="./js/checkForm.js"></script>

</html>