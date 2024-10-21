<?php
require_once 'function.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = uploadImage($_FILES['image']);
    $user_id = $_SESSION['user_id'];

    global $conn;
    $stmt = $conn->prepare("INSERT INTO posts (user_id, title, content, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $title, $content, $image);
    $stmt->execute();
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Judul" required>
        <textarea name="content" placeholder="Konten" required></textarea>
        <input type="file" name="image" required>
        <button type="submit">Tambah Postingan</button>
    </form>
</div>
</body>
</html>