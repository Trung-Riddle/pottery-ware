<?php
if(isset($_COOKIE['ur_id']) && ($_COOKIE['ur_id']) != 0){
    $idUser = $_COOKIE['ur_id'];
    $user = selectAllDataDB("SELECT * FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE ur_id = ".$idUser);
    foreach ($user as $value){
        extract($value);
    }
}
?>