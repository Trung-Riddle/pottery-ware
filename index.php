<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pottery Ware</title>
    <link rel="stylesheet" href="./view/styles/index.css">
    <link rel="stylesheet" href="./font/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
include_once("./model/index.php");
require_once("./model/HandleCompletedLogin/index.php");
?>

<body>
    <div class="loading">
        <img src="./asset/svg/pottery-1.1s-200px.svg" alt="">
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
    include_once("./view/layouts/Header/index.php");
    echo "<div style='height: 90px; width: 100%;'></div>";
    include_once("./controller/controlHome.php");
    include_once("./view/layouts/Footer/index.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
        include_once("./view/js/index.php");
    ?>
</body>

</html>