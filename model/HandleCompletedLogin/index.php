<?php
if(isset($_COOKIE['ur_id']) && ($_COOKIE['ur_id'] > 0)){
    $idUser = substr($_COOKIE['ur_id'], 4);
    $user = selectAllDataDB("SELECT * FROM user INNER JOIN customer ON user.ur_id = customer.cus_id_user WHERE ur_id = ".$idUser);
    foreach ($user as $value){
        extract($value);
    }
}
?>