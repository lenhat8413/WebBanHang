<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Thanh toán</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="/webbanhang1/Product/processCheckout">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Họ tên:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="address" class="form-label">Địa chỉ:</label>
                            <textarea id="address" name="address" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Thanh toán <span class="emoji">💳</span></button>
                            <a href="/webbanhang1/Product/cart" class="btn btn-secondary btn-lg mt-2">Quay lại giỏ hàng <span class="emoji">🛒</span></a>
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
        border: 1px solid #ddd;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 2rem;
    }
    .form-label {
        font-weight: 500;
    }
    .emoji {
        margin-left: 0.5rem;
        vertical-align: middle;
    }
    @media (max-width: 768px) {
        .btn-lg {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>