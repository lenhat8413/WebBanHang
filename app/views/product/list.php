<?php include 'app/views/shares/header.php'; ?>

    <!-- Tiêu đề và nút thêm sản phẩm -->
    <div class="container mt-5 pt-5">
        <div class="content-box">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="m-0 text-blue">Danh sách sản phẩm</h1>
                <a href="/webbanhang1/Product/add" class="btn btn-blue">
                    Thêm sản phẩm mới <span class="emoji">➕</span>
                </a>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="row row-cols-1 g-4">
                <?php foreach ($products as $product): ?>
                    <div class="col">
                        <div class="product-item d-flex align-items-start border rounded p-3">
                            <div class="product-image me-4">
                                <?php if ($product->image): ?>
                                    <img src="/webbanhang1/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                         alt="Product Image" class="img-fluid rounded" style="width: 120px; height: 120px; object-fit: cover;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/120" class="img-fluid rounded" alt="No Image" style="width: 120px; height: 120px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            <div class="product-details flex-grow-1 d-flex flex-column justify-content-start">
                                <h5 class="mb-2 product-name">
                                    <a href="/webbanhang1/Product/show/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                       class="text-decoration-none text-dark">
                                        <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
                                </h5>
                                <p class="mb-2 product-price"><strong>Giá:</strong> <span class="text-danger"><?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</span></p>
                                <p class="mb-2 product-category"><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                            <div class="product-actions d-flex flex-column gap-3">
                                <a href="/webbanhang1/Product/edit/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                   class="btn btn-blue btn-sm w-100">Sửa <span class="emoji">✏️</span></a>
                                <a href="/webbanhang1/Product/delete/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                   class="btn btn-gray btn-sm w-100" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa <span class="emoji">🗑️</span></a>
                                <a href="/webbanhang1/Product/addToCart/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" 
                                   class="btn btn-blue btn-sm w-100">Thêm vào giỏ <span class="emoji">🛒</span></a>
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