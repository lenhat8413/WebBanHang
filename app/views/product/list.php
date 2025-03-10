<?php include 'app/views/shares/header.php'; ?>

<!-- Tiêu đề và nút thêm sản phẩm -->
<div class="container mt-4">
    <h1 class="mb-4">Danh sách sản phẩm</h1>
    <a href="/webbanhang1/Product/add" class="btn btn-success mb-3">
        Thêm sản phẩm mới <span class="emoji">➕</span>
    </a>

    <!-- Danh sách sản phẩm -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($products as $product): ?>
            <div class="col">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php if ($product->image): ?>
                                <img src="/webbanhang1/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                     alt="Product Image" class="img-fluid rounded-start" style="max-width: 100%; height: auto;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/100" class="img-fluid rounded-start" alt="No Image">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/webbanhang1/Product/show/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                       class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </h5>
                                <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                                <p class="card-text"><strong>Giá:</strong> <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
                                <p class="card-text"><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <!-- Nút thao tác được đặt ở footer của card -->
                            <div class="card-footer bg-transparent border-0">
                                <div class="btn-group d-flex justify-content-between" role="group">
                                    <a href="/webbanhang1/Product/edit/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                       class="btn btn-warning btn-sm">Sửa <span class="emoji">✏️</span></a>
                                    <a href="/webbanhang1/Product/delete/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa <span class="emoji">🗑️</span></a>
                                    <a href="/webbanhang1/Product/addToCart/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                       class="btn btn-primary btn-sm">Thêm vào giỏ hàng <span class="emoji">🛒</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .emoji {
        margin-left: 0.5rem; /* Khoảng cách giữa emoji và chữ */
        vertical-align: middle; /* Căn giữa emoji với chữ */
    }
</style>