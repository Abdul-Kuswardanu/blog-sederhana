<?php
require_once 'function.php';
session_start();
$id = $_GET['id'];
$post_result = $conn->query("SELECT * FROM posts WHERE id = $id");
$post = $post_result->fetch_assoc();
$comments = $conn->query("SELECT * FROM comments WHERE post_id = $id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Postingan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <a href="index.php"><img src="" class="logo" alt=""></a>
</header>

<div class="container">
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <?php if ($post['image']): ?>
        <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image">
    <?php endif; ?>

    <h3>Komentar</h3>
    <div class="comments">
        <?php while ($comment = $comments->fetch_assoc()): ?>
            <div class="comment">
                <p><?= htmlspecialchars($comment['content']) ?></p>
                <small>Posted on <?= $comment['created_at'] ?></small>
            </div>
        <?php endwhile; ?>
    </div>

    <?php if (isset($_SESSION['user_id'])): ?>
        <form method="POST" action="tambah_komen.php">
            <input type="hidden" name="post_id" value="<?= $id ?>">
            <textarea name="content" placeholder="Tambahkan komentar..." required></textarea>
            <button type="submit">Tambah Komentar</button>
        </form>
    <?php else: ?>
        <p><a href="signin.php">Login</a> untuk berkomentar.</p>
    <?php endif; ?>
</div>

<footer>
    <p>&copy; 2024 | 
        <a href="#">Instagram</a> | 
        <a href="#">YouTube</a> | 
        <a href="#">TikTok</a> | 
        <a href="#">Facebook</a>
    </p>
</footer>
</body>
</html>
