<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}

require 'db_blog_sederhana.php';
require 'function.php';

if (isset($_POST['report'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_SESSION['user_id'];
    $report_reason = $_POST['reason'];

    if (empty($report_reason)) {
        $error = "Alasan pelaporan harus diisi.";
    } else {
        $stmt = $conn->prepare("INSERT INTO reports (post_id, user_id, reason, report_date) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iis", $post_id, $user_id, $report_reason);

        if ($stmt->execute()) {
            $success = "Postingan berhasil dilaporkan.";
        } else {
            $error = "Terjadi kesalahan saat melaporkan.";
        }

        $stmt->close();
    }
}

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $stmt = $conn->prepare("SELECT title FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->bind_result($post_title);
    $stmt->fetch();
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b3cde0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            color: #003366;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #003366;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #002244;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Report Post</h2>
        <p>Postingan: <strong><?php echo htmlspecialchars($post_title); ?></strong></p>

        <?php if (isset($error)) { echo '<p class="error">' . $error . '</p>'; } ?>
        <?php if (isset($success)) { echo '<p class="success">' . $success . '</p>'; } ?>

        <form action="report.php" method="POST">
            <textarea name="reason" placeholder="Jelaskan alasan pelaporan" required></textarea>
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
            <button type="submit" name="report">Laporkan</button>
        </form>
    </div>
</body>
</html>
