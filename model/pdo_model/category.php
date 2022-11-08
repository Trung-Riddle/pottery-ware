<?php
  //* Get and show all category
  function getAllCate(){
      $conn = connect_db();
      $stmt = $conn->prepare("SELECT * FROM category");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $cate = $stmt -> fetchAll();
      return $cate;
  }
  selectAllDataDB("SELECT * FROM category");

  //* Get and show one category by id
  function getOneCate($id_cate){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM category WHERE id=".$id_cate);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $cate = $stmt -> fetchAll();
    return $cate;
  }

  //* Add new category to database
  function addCate($name_cate, $status_cate){
      $conn = connect_db();
      $sql = "INSERT INTO category (name_cate, status)
    VALUES ('$name_cate', '$status_cate')";
    $conn->exec($sql);
  }

  //* Delect category by id
  function deleteCate($id_cate){
    $conn = connect_db();
    $sql = "DELETE FROM category WHERE id =".$id_cate;
    $conn->exec($sql);
  }

  //* Update category by id
  function editCate($name_cate, $id_cate, $status_cate){
    $conn = connect_db();
    $sql = "UPDATE category SET name_cate ='".$name_cate."', status='".$status_cate."' WHERE id = ".$id_cate;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
?>