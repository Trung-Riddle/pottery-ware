<?php
include_once "connect_db.php";
// Get and show all banner
function getAllBanner()
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM banner");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $banner = $stmt->fetchAll();
    return $banner;
}

//* Get and show one banner by id
function getOneBanner($bn_id)
{
    $conn = connect_db();
    $stmt = $conn->prepare("SELECT * FROM banner WHERE bn_id=" . $bn_id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $banner = $stmt->fetchAll();
    return $banner;
}

// Update banner
function updateBanner($bn_id, $bn_img, $bn_title, $bn_content, $bn_created_at)
{
    $conn = connect_db();
    $sql = "UPDATE banner SET bn_id='" . $bn_id . "', bn_img='" . $bn_img . "', bn_title='" . $bn_title . "',bn_content='" . $bn_content . "',bn_created_at='" . $bn_created_at . "'WHERE id=" . $bn_id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
