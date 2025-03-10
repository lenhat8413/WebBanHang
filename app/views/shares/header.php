<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Quản lý sản phẩm</title> 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-tabs {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px;
        }
        .nav-tabs .nav-item {
            margin-bottom: -1px;
        }
        .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            color: #495057;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .nav-tabs .nav-link.active {
            color: #007bff;
            background-color: #fff;
            border-color: #dee2e6 #dee2e6 #fff;
        }
        .nav-tabs .nav-link:hover:not(.active) {
            background-color: #f8f9fa;
            border-color: #f8f9fa #f8f9fa #dee2e6;
        }
        .main-tabs {
            background-color: #f8f9fa;
            padding: 10px 0 0;
        }
    </style>
</head> 
<body> 
    <!-- Menu tab ở vị trí trên cùng -->
    <div class="main-tabs">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Quản lý sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang1/Product/">Danh sách sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/webbanhang1/Product/add">Thêm sản phẩm</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Nội dung trang sẽ nằm ở đây -->
        <div class="tab-content">
            <div class="tab-pane fade show active">
                <h2>Quản lý sản phẩm</h2>
                <p>Chào mừng đến với hệ thống quản lý sản phẩm.</p>
                
                <!-- Nội dung chính của trang web -->
                <!-- (Phần này sẽ thay đổi tùy theo tab đang được chọn) -->
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body> 
</html>