<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Thêm sản phẩm mới</h1>
        </div>
        <div class="card-body">
            <!-- Error Messages (if any) -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <!-- Form -->
            <form method="POST" action="/webbanhang1/Product/add" enctype="multipart/form-data" onsubmit="return validateForm();">
                <!-- Product Name -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label font-weight-bold">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($product->name) ? htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                </div>

                <!-- Description -->
                <div class="form-group mb-4">
                    <label for="description" class="form-label font-weight-bold">Mô tả <span class="text-danger">*</span></label>
                    <textarea id="description" name="description" class="form-control" rows="5" required><?php echo isset($product->description) ? htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8') : ''; ?></textarea>
                </div>

                <!-- Price -->
                <div class="form-group mb-4">
                    <label for="price" class="form-label font-weight-bold">Giá <span class="text-danger">*</span></label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo isset($product->price) ? htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8') : ''; ?>" required>
                </div>

                <!-- Category -->
                <div class="form-group mb-4">
                    <label for="category_id" class="form-label font-weight-bold">Danh mục <span class="text-danger">*</span></label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <option value="" disabled selected>Chọn danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Image Upload -->
                <div class="form-group mb-4">
                    <label for="image" class="form-label font-weight-bold">Hình ảnh</label>
                    <div class="custom-file mb-2">
                        <input type="file" id="image" name="image" class="custom-file-input" onchange="previewImage(event)">
                        <label class="custom-file-label" for="image">Chọn tệp</label>
                    </div>
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-2"></div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary px-4">Thêm sản phẩm</button>
                    <div>
                        <!-- New "Thêm Danh Mục" Button -->
                        <a href="/webbanhang1/Category/add" class="btn btn-outline-success px-4 mr-2">Thêm Danh Mục</a>
                        <a href="/webbanhang1/Category/list" class="btn btn-outline-primary px-4">Danh sách danh mục</a>
                        <a href="/webbanhang1/Product" class="btn btn-outline-secondary px-4">Quay lại danh sách sản phẩm</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for Image Preview -->
<script>
function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-thumbnail';
            img.style.maxWidth = '150px';
            preview.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}
</script>

<?php include 'app/views/shares/footer.php'; ?>