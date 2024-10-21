<?php
require_once 'db_blog_sederhana.php';

function registerUser($username, $email, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    return $stmt->execute();
}

function loginUser($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if (password_verify($password, $result['password'])) {
        session_start();
        $_SESSION['user_id'] = $result['id'];
        return true;
    }
    return false;
}

function uploadImage($file) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    move_uploaded_file($file["tmp_name"], $target_file);
    return $target_file;
}

function getPosts($page, $limit = 5) {
    global $conn;
    $offset = ($page - 1) * $limit;
    $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT $limit OFFSET $offset");
    return $result;
}

function searchPosts($query) {
    global $conn;
    $query = "%$query%";
    $stmt = $conn->prepare("SELECT * FROM posts WHERE title LIKE ? OR content LIKE ?");
    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();
    return $stmt->get_result();
}

function pagination($page, $totalPages) {
    if ($totalPages > 1) {
        echo '<div class="pagination">';
        if ($page > 1) {
            echo '<button onclick="window.location.href=\'?page=' . ($page - 1) . '\'">Previous</button>';
        }
        if ($page < $totalPages) {
            echo '<button onclick="window.location.href=\'?page=' . ($page + 1) . '\'">Next</button>';
        }
        echo '</div>';
    }
}
?>
