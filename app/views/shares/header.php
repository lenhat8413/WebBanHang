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
            background: #4682B4; /* Màu xanh nước biển */
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 2rem;
            font-weight: bold;
            color: white !important;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .navbar-nav .nav-item {
            text-align: center;
            flex-grow: 1;
        }

        .navbar-nav .nav-link {
            font-size: 1.2rem;
            color: white !important;
            transition: 0.3s;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .navbar-nav .nav-link:hover, 
        .navbar-nav .nav-link.active {
            color: #ADD8E6 !important; /* Màu xanh nhạt */
            text-shadow: 0 0 8px #ADD8E6, 0 0 12px #ADD8E6;
        }

        .content-box {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 15px;
            padding: 25px;
            margin-top: 50px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        }

        .text-blue {
            color: #4682B4;
        }

        .btn-blue {
            background-color: #4682B4;
            border-color: #4682B4;
            color: white;
        }
        .btn-blue:hover {
            background-color: #3A6D8C;
            border-color: #3A6D8C;
            color: white;
        }

        .btn-light-blue {
            background-color: #ADD8E6;
            border-color: #ADD8E6;
            color: #000;
        }
        .btn-light-blue:hover {
            background-color: #87CEEB;
            border-color: #87CEEB;
            color: #000;
        }

        .btn-gray {
            background-color: #6c757d;
            border-color: #6c757d;
            color: white;
        }
        .btn-gray:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            color: white;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    require_once 'app/helpers/SessionHelper.php'; // Đảm bảo tải SessionHelper
    $current_page = $_SERVER['REQUEST_URI'];
    ?>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang1/">🏪 Store Mạnh Nhất Thế Giới </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == '/webbanhang1/' ? 'active' : ''); ?>" 
                           href="/webbanhang1/">🏠 Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($current_page, '/Product/') !== false ? 'active' : ''); ?>" 
                           href="/webbanhang1/Product/">📦 Danh sách sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($current_page == '/webbanhang1/Product/add' ? 'active' : ''); ?>" 
                           href="/webbanhang1/Product/add">➕ Thêm sản phẩm</a>
                    </li>
                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?> 🚪
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang1/account/logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == '/webbanhang1/account/login' ? 'active' : ''); ?>" 
                               href="/webbanhang1/account/login">🔐 Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($current_page == '/webbanhang1/account/register' ? 'active' : ''); ?>" 
                               href="/webbanhang1/account/register">📝 Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Phần thân của trang (nếu có) sẽ được chèn ở đây -->
</body>
</html>