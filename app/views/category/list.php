<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="h4 mb-0">📂 Danh sách danh mục</h1>
        </div>
        <div class="card-body">
            <a href="/webbanhang1/Category/add" class="btn btn-success mb-3">➕ Thêm danh mục</a>
            
            <table class="table table-bordered table-hover">
                <thead class="bg-light">
                    <tr>
                        <th width="10%">📊 ID</th>
                        <th width="60%">📌 Tên danh mục</th>
                        <th width="30%" class="text-center">🛠️ Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="text-center">
                                <a href="/webbanhang1/Category/edit/<?php echo $category->id; ?>" class="btn btn-warning btn-sm">✏️ Sửa</a>
                                <a href="/webbanhang1/Category/delete/<?php echo $category->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');">❌ Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

        
<?php include 'app/views/shares/footer.php'; ?>