<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <?php if ($product): ?>
                <div class="card shadow-sm rounded-3">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="mb-0"><?php echo htmlspecialchars($product->name ?? 'Không có tên', ENT_QUOTES, 'UTF-8'); ?></h2>
                    </div>
                    <div class="card-body">
                        <!-- Product Image -->
                        <div class="text-center mb-4">
                            <?php 
                            // Xử lý đường dẫn hình ảnh
                            $imagePath = $product->image ?? '';
                            $basePath = '/webbanhang1/'; // Đường dẫn gốc của dự án
                            $defaultImage = 'https://via.placeholder.com/400x300?text=No+Image';
                            
                            // Nếu có hình ảnh, thêm tiền tố đường dẫn gốc
                            if (!empty($imagePath)) {
                                // Đảm bảo $imagePath không bắt đầu bằng dấu /
                                $imagePath = ltrim($imagePath, '/');
                                $fullImagePath = $basePath . $imagePath;
                            } else {
                                $fullImagePath = $defaultImage;
                            }

                            // Kiểm tra file tồn tại (chỉ áp dụng nếu không phải hình ảnh mặc định)
                            if ($fullImagePath !== $defaultImage && !file_exists($_SERVER['DOCUMENT_ROOT'] . $fullImagePath)) {
                                $fullImagePath = $defaultImage;
                            }
                            ?>
                            <img src="<?php echo htmlspecialchars($fullImagePath, ENT_QUOTES, 'UTF-8'); ?>" 
                                 alt="<?php echo htmlspecialchars($product->name ?? 'Không có ảnh', ENT_QUOTES, 'UTF-8'); ?>" 
                                 class="img-fluid rounded-3 border" style="max-height: 300px; object-fit: cover; width: 100%;">
                        </div>

                        <!-- Product Details -->
                        <div class="mb-4">
                            <h4 class="text-muted">Mô tả:</h4>
                            <p class="lead"><?php echo htmlspecialchars($product->description ?? 'Chưa có mô tả', ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                        <div class="mb-4">
                            <h4 class="text-success">Giá:</h4>
                            <p class="display-6"><?php echo htmlspecialchars(number_format($product->price ?? 0, 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?> VNĐ</p>
                        </div>
                        <div class="mb-4">
                            <h4 class="text-info">Danh mục:</h4>
                            <p class="lead"><?php echo htmlspecialchars($product->category_name ?? 'Chưa có danh mục', ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 flex-wrap justify-content-center">
                            <a href="/webbanhang1/Product/edit/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-warning btn-lg mb-2">Sửa</a>
                            <a href="/webbanhang1/Product/delete/<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-danger btn-lg mb-2" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            <a href="/webbanhang1/Product/" class="btn btn-secondary btn-lg mb-2">Quay lại danh sách</a>
                        </div>
                    </div>
                    <div class="card-footer text-center text-muted">
                        © 2025 Quản lý sản phẩm. All rights reserved.
                    </div>
                </div>
            <?php else: ?>
                <div class="text-center py-5">
                    <p class="text-muted fs-4">Sản phẩm không tồn tại hoặc đã bị xóa.</p>
                    <a href="/webbanhang1/Product/" class="btn btn-primary btn-lg mt-3">Quay lại danh sách</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .img-fluid {
        border-radius: 0.5rem !important;
    }
    .btn {
        min-width: 120px;
        text-align: center;
    }
    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }
        .btn {
            width: 100%;
        }
    }
</style>