<?php
include_once "connect_db.php";
// Get and show all posts 
function getAllPost()
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM posts");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $post = $stmt->fetchAll();
    return $post;
}

//* Get and show one posts by id
function getOnePost($pts_id)
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM posts WHERE pts_id=" . $pts_id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $post = $stmt->fetchAll();
    return $post;
}

// Insert posts
function addPost($pts_img, $pts_title, $pts_contents)
{
    $conn = connect_db();
    $sql = "INSERT INTO posts (pts_title,pts_contents,pts_img,pts_created_at)
  VALUES ( '$pts_title', '$pts_contents','$pts_img',now()";
    $conn->exec($sql);
}

// Delete posts
function deletePost($pts_id)
{
    $conn = connect_db();
    $sql = "DELETE FROM posts WHERE pts_id =" . $pts_id;
    $conn->exec($sql);
}

// Update posts
function updatePost($pts_id, $pts_title, $pts_contents, $pts_img)
{
    $conn = connect_db();
    $sql = "UPDATE posts SET pts_id='" . $pts_id . "', pts_title='" . $pts_title . "', pts_contents='" . $pts_contents . "',pts_img='" . $pts_img . "'WHERE pts_id=" . $pts_id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

//* Get and show count posts from database
function countPost()
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM posts");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $count = $stmt->fetchColumn();
    return $count;
}
