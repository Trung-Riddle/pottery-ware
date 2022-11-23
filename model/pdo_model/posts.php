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
function getOnePost($id)
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id=" . $id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $post = $stmt->fetchAll();
    return $post;
}

// Insert posts
function addPost($id, $title_post, $content_post, $contentSecond_post, $img_post, $imgSecond_post)
{
    $conn = connect_db();
    $sql = "INSERT INTO posts (id, title_post,content_post,contentSecond_post,img_post,imgSecond_post,date_add)
  VALUES ('$id', '$title_post', '$content_post','$contentSecond_post', '$img_post','$imgSecond_post',now()";
    $conn->exec($sql);
}

// Delete posts
function deletePost($id)
{
    $conn = connect_db();
    $sql = "DELETE FROM posts WHERE id =" . $id;
    $conn->exec($sql);
}

// Update posts
function updatePost($id, $title_post, $content_post, $img_post)
{
    $conn = connect_db();
    $sql = "UPDATE posts SET id='" . $id . "', title_post='" . $title_post . "', content_post='" . $content_post . "',img_post='" . $img_post . "'WHERE id=" . $id;
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
