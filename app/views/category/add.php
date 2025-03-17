<!-- app/views/category/add.php -->
<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">Thêm danh mục mới</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="/webbanhang1/Category/add">
                <div class="form-group mb-4">
                    <label for="category_name" class="form-label font-weight-bold">Tên danh mục <span class="text-danger">*</span></label>
                    <input type="text" id="category_name" name="category_name" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary px-4">Thêm danh mục</button>
                    <a href="/webbanhang1/Product/add" class="btn btn-outline-secondary px-4">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>