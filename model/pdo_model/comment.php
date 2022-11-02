<?php
    //* Show comment user (have limited)
    function showCmtUser(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM comment ORDER BY id DESC LIMIT 0,10");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cmt = $stmt -> fetchAll();
        return $cmt;
    }
    //* Show comment user by unlimited
    function showCmtUserUnlimited(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM comment ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cmt = $stmt -> fetchAll();
        return $cmt;
    }
    //* Group comment user by name
    function groupByNameProCmt(){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT name_pro FROM comment GROUP BY name_pro ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $groupByCmt = $stmt -> fetchAll();
        return $groupByCmt;
    }
    //* Search comment user
    function searchCmt($user_name, $name_pro){
        $conn = connect_db();
        $stmt = $conn->prepare("SELECT * FROM comment WHERE user_name = '$user_name' $name_pro ORDER BY id DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cmt = $stmt -> fetchAll();
        return $cmt;
    }
    //* Delete comment user
    function deleteCmt($id_cmt){
        $conn = connect_db();
        $sql = "DELETE FROM comment WHERE id =".$id_cmt;
        $conn->exec($sql);
    }
?>