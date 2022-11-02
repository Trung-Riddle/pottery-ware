<?php
  //* Get and show all product from database
  function getAllProduct(){
      $conn = connect_db();
      $stmt = $conn->prepare("SELECT * FROM product ORDER BY id DESC");
      $stmt->execute();
      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $pro = $stmt -> fetchAll();
      return $pro;
  }
  //* Get and show one product from database
  function getOneProduct($id_pro){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM product WHERE id=".$id_pro);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $pro = $stmt -> fetchAll();
    return $pro;
  }
  //* Add new product to database
  function addProduct($name_pro, $price_pro, $name_cate, $newImgPro, $date_add){
      $conn = connect_db();
      $sql = "INSERT INTO product (name_pro, price_pro, name_cate, img_pro, date_add) VALUES ('$name_pro', '$price_pro', '$name_cate', '$newImgPro', '$date_add')";
      $conn->exec($sql);
  }
  //* Delect product by id
  function deleteProduct($id_pro){
    $conn = connect_db();
    $sql = "DELETE FROM product WHERE id =".$id_pro;
    $conn->exec($sql);
  }
  //* Update product by id
  function editProduct($id_pro, $name_pro, $price_pro, $del, $name_cate, $newImgPro, $status_pro, $date_add){
    $conn = connect_db();
    $sql = "UPDATE product SET name_pro ='".$name_pro."', price_pro = '".$price_pro."', del = '".$del."', name_cate ='".$name_cate."', img_pro = '".$newImgPro."', status_pro = '".$status_pro."', date_add = '".$date_add."' WHERE id = ".$id_pro;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
  //* Get and show product by type name category
  function getTypeProduct($name_cate){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM product WHERE name_cate='".$name_cate."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $pro = $stmt -> fetchAll();
    return $pro;
  }
  //* Get and show count product from database
  function countProduce(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM product");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt -> fetchColumn();
    return $count;
  }
  //* Show product by top view limit 10
  function topViewProduct(){
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM product ORDER BY top_view LIMIT 0, 10");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $pro = $stmt -> fetchAll();
    return $pro;
  }
?>