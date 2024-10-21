<?php
require_once 'function.php';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$posts = getPosts($page);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Sederhana</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <h1>Blog Sederhana</h1>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div>Welcome, User (<a href="logout.php">Logout</a>)</div>
    <?php else: ?>
        <a href="signin.php">Login</a>
    <?php endif; ?>
</header>

<div class="content">
    <?php while ($post = $posts->fetch_assoc()): ?>
        <div class="post">
            <h2><?= htmlspecialchars($post['title']) ?></h2>
            <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
            <?php if ($post['image']): ?>
                <img src="<?= htmlspecialchars($post['image']) ?>" alt="Image">
            <?php endif; ?>
            <p>Posted on <?= $post['created_at'] ?></p>
        </div>
    <?php endwhile; ?>
</div>

<div class="pagination">
    <a href="?page=<?= max($page - 1, 1) ?>">Previous</a>
    <a href="?page=<?= $page + 1 ?>">Next</a>
</div>

<footer>
    <p>&copy; 2024 | 
        <a href="#"><i class="fab fa-instagram"></i> Instagram</a> | 
        <a href="#"><i class="fab fa-youtube"></i> YouTube</a> | 
        <a href="#"><i class="fab fa-tiktok"></i> TikTok</a> | 
        <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
    </p>
</footer>
</body>
</html>
