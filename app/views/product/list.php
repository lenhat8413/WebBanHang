<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5 pt-5">
<div id="promotionBanner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/webbanhang1/assets/banner1.jpg" class="d-block w-100" alt="Khuyến mãi 1">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                <h5 class="text-white">Giảm giá cực sốc!</h5>
                <p>Nhận ngay ưu đãi lên đến <strong>50%</strong> khi mua hàng hôm nay.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/webbanhang1/assets/banner2.jpg" class="d-block w-100" alt="Khuyến mãi 2">
            <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                <h5 class="text-white">Sản phẩm mới ra mắt!</h5>
                <p>Khám phá những sản phẩm công nghệ mới nhất với giá ưu đãi.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#promotionBanner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#promotionBanner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <div class="content-box">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="m-0 text-blue">Danh sách sản phẩm</h1>
            <a href="/webbanhang1/Product/add" class="btn btn-blue">
                Thêm sản phẩm mới <span class="emoji">➕</span>
            </a>
        </div>

        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($products as $product): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border rounded">
                        <div class="position-relative">
                            <?php if ($product->image): ?>
                                <img src="/webbanhang1/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                     alt="Product Image" class="card-img-top img-fluid" style="height: 180px; object-fit: cover;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/180" class="card-img-top img-fluid" alt="No Image" style="height: 180px; object-fit: cover;">
                            <?php endif; ?>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="/webbanhang1/Product/show/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                   class="text-decoration-none text-dark">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <p class="card-text text-danger fw-bold">Giá: <?php echo number_format($product->price, 0, ',', '.'); ?> VND</p>
                            <p class="card-text text-muted">Danh mục: <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="/webbanhang1/Product/edit/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                               class="btn btn-sm btn-outline-primary">✏️ Sửa</a>
                            <a href="/webbanhang1/Product/delete/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                               class="btn btn-sm btn-outline-danger" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">🗑️ Xóa</a>
                            <a href="/webbanhang1/Product/addToCart/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                               class="btn btn-sm btn-primary">🛒 Thêm</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'app/views/shares/footer.php'; ?>
</html>