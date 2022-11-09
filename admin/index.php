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
</head>
<?php
include_once("../model/index.php");
?>

<body>
    <div class="App">
        <!-- ---------------- HEADER --------------------  -->
        <div class="Sidebar">
            <?php require("layouts/header.php")  ?>
        </div>
        <div class="Container">
            <div class="Container--Tools">
                <div class="Container--Tools--TaskBar"></div>
                <div class="Container--Tools--Person">
                    <a href="#">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                    <a href="<?= $_SERVER["PHP_SELF"] ?>?act=user">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href=".././index.php">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
            </div>
            <div class="Container--Contents">
                <?php
                include_once("../controller/controlAdmin.php");
                ?>
            </div>
        </div>
    </div>
</body>
<?php
include_once("./js/index.php");
?>

</html>