<?php
    //* Lấy tất cả dữ liệu
    function selectAllDataDB($sql){
        $conn = connect_db();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $selectAll = $stmt -> fetchAll();
        return $selectAll;
    }

    //* lấy 1 dữ liệu
    function selectOneDataDB($sql){
        $conn = connect_db();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $selectOne = $stmt -> fetchAll();
        return $selectOne;
    }

    //* Thêm dữ liệu
    function addDataDB($sql){
        $conn = connect_db();
        $conn->exec($sql);
    }

    //* Xóa dữ liệu
    function deleteDataDB($sql){
        $conn = connect_db();
        $conn->exec($sql);
    }

    //* Chỉnh sửa dữ liệu
    function editDataDB($sql){
        $conn = connect_db();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      }

    //* Đếm số lượng dữ liệu (trong câu lệnh phải dùng count())
    function countDataDB($sql){
        $conn = connect_db();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $count = $stmt->fetchColumn();
        return $count;
    }
?>