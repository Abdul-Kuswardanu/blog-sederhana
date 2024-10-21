<?php
require_once 'function.php';
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    global $conn;
    $stmt = $conn->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header('Location: index.php');
    exit;
}

$result = $conn->query("SELECT * FROM posts WHERE id = $id");
$post = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
</head>
<body>
<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
    <textarea name="content" required><?= htmlspecialchars($post['content']) ?></textarea>
    <button type="submit">Update</button>
</form>
</body>
</html>