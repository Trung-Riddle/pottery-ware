<?php
    session_start();
    require_once("../pdo_model/connect_db.php");
    require_once("../pdo_model/globle.php");
    require_once("../sendMail.php");
    if(isset($_POST['submitOrder']) && ($_POST['submitOrder'])){
        //* Insert table order
        $ur_id = substr($_COOKIE['ur_id'], 4);
        $select_cus_id = selectOneDataDB("SELECT cus_id FROM customer WHERE cus_id_user = '$ur_id'");
        $cus_id = $select_cus_id[0]['cus_id'];
        $ord_code = "PW".mt_rand(1000, 9999).$cus_id;
        $ord_cus_name = $_POST['ord_cus_name'];
        $ord_email = $_POST['ord_email'];
        $ord_phone = $_POST['ord_phone'];
        $ord_address = $_POST['ord_address'];
        $ord_payment = $_POST['ord_payment'];
        $ord_created_at = date("Y-m-d");
        
        //* Add data to customer
        $sql_add_data_customer = "INSERT INTO `order` (ord_id_customer, ord_code, ord_cus_name, ord_payment, ord_address, ord_email, ord_phone, ord_created_at) VALUES ('$cus_id', '$ord_code', '$ord_cus_name', '$ord_payment', '$ord_address', '$ord_email', '$ord_phone', '$ord_created_at')";
        addDataDB($sql_add_data_customer);

        //* Insert table cart
        $totalCart = 0;
        $total = 0;
        $tax = 0;
        $totalAll = 0;
        $select_c_id_order = selectOneDataDB("SELECT * FROM `order` WHERE ord_code = '$ord_code'");
        $c_id_order = $select_c_id_order[0]['ord_id'];

        //* Add data to cart
        foreach($_SESSION['carts'] as $cart) { 
            $totalCart = $cart[3] * $cart[4];
            $total += $totalCart;
            $tax = $total * 5 / 100;
            $totalAll = $total + $tax + 30000;
            addDataDB(
                "INSERT INTO `cart`
                (c_id_order, c_id_pro, c_price, c_amount)
                VALUES
                ('$c_id_order', '$cart[0]', '$cart[3]', '$cart[4]')"
            );
        }

        unset($_SESSION['carts']);

        $payment = "";
        if($ord_payment == 0){
            $payment = "Thanh toán khi nhận hàng";
        }else if($ord_payment == 1){
            $payment = "Thanh toán MOMO";
        }else if($ord_payment == 2){
            $payment = "Thanh toán ngân hàng";
        }

        //* Send mail to user
        $title = "Pettery Ware - Confirm Payment";

        $content = "
        <p
            style='
            background-color: #edb2a0;
            color: white;
            display: block;
            padding: 30px 0;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            '
        >
            Pottery Ware
        </p>
        <p style='display: block; width: max-content; margin: 0 auto'>
            Cảm ơn Quý khách đã sử dụng dịch vụ của Pottery Ware. <br />
            Pottery Ware xin gửi thông tin đơn hàng của quý khách như sau:
            <br /><br />
            <b>Mã đơn hàng: </b>$ord_code<br />
            <b>Tên khách hàng: </b>$ord_cus_name<br />
            <b>Địa chỉ: </b>$ord_address<br />
            <b>Phương thức thanh toán: </b>$payment<br />
            <b>Trạng thái: </b> Đang chờ xác nhận <br /><br />
        </p>
        <p
            style='
            background-color: #edb2a0;
            color: white;
            display: block;
            padding: 30px 0;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            '
        >
            Xin trân thành cảm ơn.
        </p>
        ";
        sendMail($title, $content, $ord_email, $ord_cus_name);

        echo "<script>
            location.href = '../../index.php?page=order&code=$ord_code'
        </script>";
    }
?>