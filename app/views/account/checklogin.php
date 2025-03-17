<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, md5($password)); // Thay md5 bằng password_hash nếu cần
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        header("Location: /webbanhang1/Product/add"); // Redirect về trang thêm sản phẩm
        exit();
    } else {
        $errors[] = "Tên đăng nhập hoặc mật khẩu không đúng!";
        header("Location: /webbanhang1/account/login?error=" . urlencode(serialize($errors)));
        exit();
    }
}
?>