<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'app/helpers/SessionHelper.php'; // Đảm bảo tải SessionHelper
$current_page = $_SERVER['REQUEST_URI'];
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://source.unsplash.com/1920x1080/?technology,machinery') no-repeat center center fixed;
            background-size: cover;
        }
        .navbar-custom {
            background: #2C3E50;
            padding: 15px;
        }
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }
        .navbar-nav .nav-link {
            font-size: 1.1rem;
            color: #ECF0F1 !important;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover, 
        .navbar-nav .nav-link.active {
            color: #F1C40F !important;
        }
        .user-info {
            color: #ECF0F1;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang1/">🏪 Store Mạnh Nhất Thế Giới</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == '/webbanhang1/' ? 'active' : ''); ?>" href="/webbanhang1/product">🏠 Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($current_page, '/Product/') !== false ? 'active' : ''); ?>" href="/webbanhang1/Product/">📦 Danh sách sản phẩm</a>
                    </li>
                    <?php if ($isAdmin): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == '/webbanhang1/Product/add' ? 'active' : ''); ?>" href="/webbanhang1/Product/add">➕ Thêm sản phẩm</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav">
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item">
                            <span class="nav-link user-info">Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang1/account/logout">🚪 Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang1/account/login">🔐 Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang1/account/register">📝 Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>