<?php
require_once 'function.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    global $conn;
    $conn->query("DELETE FROM posts WHERE id = $id");
}
header('Location: index.php');
exit;
?>