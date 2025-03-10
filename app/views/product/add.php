<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-primary text-white text-center">
                    <h1 class="mb-0">Thêm sản phẩm mới</h1>
                </div>
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="/webbanhang1/Product/save" enctype="multipart/form-data" onsubmit="return validateForm();">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Mô tả:</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price" class="form-lab  l>
                            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">Danh mục:</label>
                            <select id="category_id" name="category_id" class="form-control" required>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="image" class="form-label">Hình ảnh:</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>

                        <div class="d-flex gap-2 justify-content-center">
                            <button type="submit" class="btn btn-primary btn-lg">Thêm sản phẩm</button>
                            <a href="/webbanhang1/Product/list" class="btn btn-secondary btn-lg">Quay lại danh sách sản phẩm</a>
                        </div>
                    </form>
                </div>
            </div>
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
    .form-control {
        border-radius: 0.5rem;
    }
    .btn-lg {
        min-width: 150px;
        text-align: center;
    }
    @media (max-width: 768px) {
        .d-flex {
            flex-direction: column;
        }
        .btn-lg {
            width: 100%;
        }
    }
</style>