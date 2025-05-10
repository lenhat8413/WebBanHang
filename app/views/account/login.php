<?php include 'app/views/shares/header.php'; ?>

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
<?php include 'app/views/shares/footer.php'; ?>
</html>
