<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Sửa sản phẩm</h1>
        </div>
        <div class="card-body">
            <!-- Error Messages -->
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
            <form method="POST" action="/webbanhang1/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">

                <!-- Product Name -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label font-weight-bold">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <!-- Description -->
                <div class="form-group mb-4">
                    <label for="description" class="form-label font-weight-bold">Mô tả <span class="text-danger">*</span></label>
                    <textarea id="description" name="description" class="form-control" rows="5" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <!-- Price -->
                <div class="form-group mb-4">
                    <label for="price" class="form-label font-weight-bold">Giá <span class="text-danger">*</span></label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <!-- Category -->
                <div class="form-group mb-4">
                    <label for="category_id" class="form-label font-weight-bold">Danh mục <span class="text-danger">*</span></label>
                    <select id="category_id" name="category_id" class="form-control" required>
                        <option value="" disabled>Chọn danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo ($category->id == $product->category_id) ? 'selected' : ''; ?>>
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
                    <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>">
                    <!-- Current Image -->
                    <?php if (!empty($product->image)): ?>
                        <div class="mt-2">
                            <p>Hình ảnh hiện tại:</p>
                            <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" class="img-thumbnail" style="max-width: 150px;">
                        </div>
                    <?php endif; ?>
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-2"></div>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary px-4">Lưu thay đổi</button>
                    <div>
                        <a href="/webbanhang1/Product" class="btn btn-outline-secondary px-4">Quay lại</a>
                        <button type="reset" class="btn btn-outline-danger px-4">Hủy</button>
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