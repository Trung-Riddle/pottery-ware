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
    <!-- ------------------------ SEO -----------------------  -->
    <!-- ------- Tiêu đề của website khi SEO trên google search ----------  -->
    <meta name="title" content="Pottery Ware || Cửa hàng đồ sứ hàng đầu Việt Nam" />
    <!-- ------- Mô tả về webite của mình để Google duyệt nội dung ----------  -->
    <meta name="description" content="Pottery-Ware cửa hàng thương hiệu đồ sứ hàng đầu về chất lượng sản phẩm đồ sứ
    đột phá thương hiệu đồ sừ Việt Nam ra tầm quốc tế. Đỉnh cao từ mọi chất lượng đến chi tiết." />
    <!-- ------------ Lựa chọn hình thức tiếp cận của google -------------------------  -->
    <!-- noodp: Ngăn máy tìm kiếm khỏi việc tạo các miêu tả description từ các thư mục danh bạ Web DMOZ như là một phần của snippet trong trang kết quả tìm kiếm.
    index: Đánh chỉ số trang Web.
    follow: Bọ tìm kiếm sẽ đọc liên kết siêu văn bản trong trang và truy vấn, xử lý sau đó. -->
    <meta name="robots" content="noodp,index,follow" />
    <!-- ----------- Khai báo thời gian ghé thăm của google với website của mình ----------------  -->
    <meta name="revisit-after" content="1 days" />
    <!-- ----------------- Lựa chọn ngôn ngữ cho website của mình ----------------  -->
    <meta http-equiv="content-language" content="vi" />
    <!-- ---------------- Khai báo mã ngôn ngữ cho website -----------------  -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- ----------------- Gợi ý lên hộp tìm kiếm -----------------  -->
    <meta name="google" content="Pottery Ware" />
    <!-- ------------------------ SEO -----------------------  -->
    <link rel="stylesheet" href="./view/styles/index.css">
    <link rel="stylesheet" href="./font/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php
include_once("./model/index.php");
require_once("./model/HandleCompletedLogin/index.php");
?>

<body>
    <?php
    include_once("./view/layouts/Header/index.php");
    include_once("./controller/controlHome.php");
    include_once("./view/layouts/Footer/index.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    include_once("./view/js/index.php");
    ?>
</body>
<!-- ------------------ CHAT BOT ----------------------  -->

<script type="text/javascript">
    window.$crisp = [];
    window.CRISP_WEBSITE_ID = "1a5011eb-a1dc-4343-9a19-8ce9d5c14dc3";
    (function() {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();
</script>

</html>