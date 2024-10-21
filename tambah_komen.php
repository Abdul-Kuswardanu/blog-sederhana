<?php
require_once 'function.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];
    global $conn;
    $stmt = $conn->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $post_id, $_SESSION['user_id'], $content);
    $stmt->execute();
    header("Location: post_detail.php?id=$post_id");
    exit;
}
?>