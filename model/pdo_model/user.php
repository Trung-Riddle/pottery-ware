<?php
include_once "connect_db.php";
// Get and show all user 
function getAllUser()
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetchAll();
    return $user;
}

//* Get and show one user by id
function getOneUser($id)
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM user WHERE id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetchAll();
    return $user;
}

// Insert user
function addUser($user_name, $password, $avatar, $email, $phone_number, $status_user)
{
    $conn = connect_db();
    $sql = "INSERT INTO user (user_name, password,avatar,email,phone_number,status_user)
  VALUES ('$user_name', '$password', '$avatar', '$email', '$phone_number', '$status_user')";
    $conn->exec($sql);
}

// Delete user
function deleteUser($id)
{
    $conn = connect_db();
    $sql = "DELETE FROM user WHERE id =" . $id;
    $conn->exec($sql);
}

// Update user
function updateUser($id, $user_name, $password, $avatar, $email, $phoneNumber_user, $status_user)
{
    $conn = connect_db();
    $sql = "UPDATE user SET id='" . $id . "', user_name='" . $user_name . "', password='" . $password . "',avatar='" . $avatar . "',email='" . $email . "',phoneNumber_user='" . $phoneNumber_user . "',status_user='" . $status_user . "'WHERE id=" . $id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

//* Get and show count user from database
function countCustomer()
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->fetchColumn();
    return $count;
}

// Check user
function checkuser($user_name, $password)
{
    $sql = "SELECT * FROM user WHERE user_name='" . $user_name . "' AND password='" . $password . "'";
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->fetchColumn();
    return $count;
}