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
function getOneUser($ur_id)
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM user WHERE ur_id=" . $ur_id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $user = $stmt->fetchAll();
    return $user;
}

// Insert user
function addUser($ur_name, $ur_pass, $ur_avatar)
{
    $conn = connect_db();
    $sql = "INSERT INTO user (ur_name, ur_pass,ur_avatar)
  VALUES ('$ur_name', '$ur_pass', '$ur_avatar')";
    $conn->exec($sql);
}

// Delete user
function deleteUser($ur_id)
{
    $conn = connect_db();
    $sql = "DELETE FROM user WHERE ur_id =" . $ur_id;
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
function checkuser($ur_name, $ur_pass)
{
    $sql = "SELECT * FROM user WHERE ur_name='" . $ur_name . "' AND ur_pass='" . $ur_pass . "'";
    $conn = connect_db();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->fetchColumn();
    return $count;
}
