<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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

    .card {
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.9);
        border-radius: 1rem;
    }

    .form-label {
        font-weight: 500;
    }

    .form-control {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        background-color: #fff;
        border-color: #4682B4;
        box-shadow: 0 0 5px rgba(70, 130, 180, 0.5);
    }

    .text-muted {
        font-size: 0.9rem;
    }
    </style>
</head>
<body>
    <?php $current_page = $_SERVER['REQUEST_URI']; ?>

    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang1/">🏪 Store Mạnh Nhất Thế Giới</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang1/account/register">🔑 Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="vh-100 d-flex align-items-center justify-content-center">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0">
              <div class="card-body p-5">
                <form action="/webbanhang1/account/checklogin" method="post">
                  <h2 class="text-center fw-bold text-uppercase mb-4 text-blue">ĐĂNG NHẬP</h2>
                  <p class="text-center text-muted mb-4">Vui lòng nhập thông tin đăng nhập.</p>

                  <div class="form-group mb-3">
                    <label class="form-label fw-semibold">Tên đăng nhập</label>
                    <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập" required value="lethanh8413" />
                  </div>

                  <div class="form-group mb-3">
                    <label class="form-label fw-semibold">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required value="********" />
                  </div>

                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="#" class="text-decoration-none text-blue">Quên mật khẩu?</a>
                  </div>

                  <button class="btn btn-blue w-100 py-2" type="submit">ĐĂNG NHẬP</button>

                  <div class="text-center mt-4">
                    <p class="mb-0">Chưa có tài khoản? <a href="/webbanhang1/account/register" class="text-decoration-none text-blue fw-bold">Đăng ký</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>