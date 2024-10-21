<?php
require_once 'function.php';
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    global $conn;
    $stmt = $conn->prepare("UPDATE comments SET content = ? WHERE id = ?");
    $stmt->bind_param("si", $content, $id);
    $stmt->execute();
    header('Location: index.php');
    exit;
}

$result = $conn->query("SELECT * FROM comments WHERE id = $id");
$comment = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Komentar</title>
</head>
<body>
<form method="POST">
    <textarea name="content" required><?= htmlspecialchars($comment['content']) ?></textarea>
    <button type="submit">Update</button>
</form>
</body>
</html>