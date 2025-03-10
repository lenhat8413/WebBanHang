<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h1 class="mb-4">Giỏ hàng</h1>

    <?php if (!empty($cart)): ?>
        <div class="row">
            <div class="col-md-8">
                <?php 
                $cartTotal = 0;
                foreach ($cart as $id => $item): 
                    $itemTotal = $item['price'] * $item['quantity'];
                    $cartTotal += $itemTotal;
                ?>
                    <div class="col-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-2 text-center">
                                        <?php if ($item['image']): ?>
                                            <img src="/webbanhang1/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                                                 alt="Product Image" class="img-fluid rounded" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                        <?php else: ?>
                                            <img src="https://via.placeholder.com/200" class="img-fluid rounded" alt="No Image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-10 product-details text-end">
                                        <h2 class="h5"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                                        <p class="text-success mb-2">Giá: <span id="price-<?php echo $id; ?>"><?php echo htmlspecialchars(number_format($item['price'], 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?></span> VND</p>
                                        <div class="mb-2">
                                            <label for="quantity-<?php echo $id; ?>" class="form-label">Số lượng:</label>
                                            <div class="input-group w-50 ms-auto" style="max-width: 200px;">
                                                <button type="button" class="btn btn-outline-secondary" onclick="decreaseQuantity(<?php echo $id; ?>, <?php echo $item['price']; ?>)">-</button>
                                                <input type="number" id="quantity-<?php echo $id; ?>" name="quantity-<?php echo $id; ?>" value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" min="1" class="form-control text-center" readonly>
                                                <button type="button" class="btn btn-outline-secondary" onclick="increaseQuantity(<?php echo $id; ?>, <?php echo $item['price']; ?>)">+</button>
                                            </div>
                                        </div>
                                        <p class="text-muted">Tổng: <span id="total-<?php echo $id; ?>"><?php echo htmlspecialchars(number_format($item['price'] * $item['quantity'], 0, ',', '.'), ENT_QUOTES, 'UTF-8'); ?></span> VND</p>
                                        <a href="/webbanhang1/Product/removeFromCart/<?php echo $id; ?>" class="btn btn-danger btn-sm mt-2">Xóa <span class="emoji">🗑️</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Order Summary Section (Right Side) -->
            <div class="col-md-4">
                <div class="card sticky-top" style="top: 20px;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Tổng giỏ hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Số lượng sản phẩm:</span>
                            <span id="total-items"><?php echo count($cart); ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tạm tính:</span>
                            <span id="subtotal"><?php echo number_format($cartTotal, 0, ',', '.'); ?> VND</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-3">
                            <strong>Tổng cộng:</strong>
                            <strong id="grand-total" class="text-danger"><?php echo number_format($cartTotal, 0, ',', '.'); ?> VND</strong>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="/webbanhang1/Product/checkout" class="btn btn-primary">Thanh Toán <span class="emoji">💳</span></a>
                            <a href="/webbanhang1/Product" class="btn btn-outline-secondary">Tiếp tục mua sắm <span class="emoji">🛒</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <p class="text-muted fs-4">Giỏ hàng của bạn đang trống.</p>
            <a href="/webbanhang1/Product" class="btn btn-primary btn-lg mt-3">Tiếp tục mua sắm <span class="emoji">🛒</span></a>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
    function increaseQuantity(productId, price) {
        let quantityInput = document.getElementById(`quantity-${productId}`);
        let totalElement = document.getElementById(`total-${productId}`);
        let newQuantity = parseInt(quantityInput.value) + 1;
        quantityInput.value = newQuantity;

        // Cập nhật tổng tiền cho sản phẩm
        let newTotal = price * newQuantity;
        totalElement.textContent = newTotal.toLocaleString('vi-VN');

        // Gửi yêu cầu AJAX để cập nhật giỏ hàng
        updateCart(productId, newQuantity);

        // Cập nhật tổng giá trị giỏ hàng
        updateCartTotal();
    }

    function decreaseQuantity(productId, price) {
        let quantityInput = document.getElementById(`quantity-${productId}`);
        let totalElement = document.getElementById(`total-${productId}`);
        let newQuantity = parseInt(quantityInput.value) - 1;
        if (newQuantity < 1) newQuantity = 1;
        quantityInput.value = newQuantity;

        // Cập nhật tổng tiền cho sản phẩm
        let newTotal = price * newQuantity;
        totalElement.textContent = newTotal.toLocaleString('vi-VN');

        // Gửi yêu cầu AJAX để cập nhật giỏ hàng
        updateCart(productId, newQuantity);

        // Cập nhật tổng giá trị giỏ hàng
        updateCartTotal();
    }

    function updateCart(productId, quantity) {
        fetch(`/webbanhang1/Product/updateCart/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `quantity=${quantity}`
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Cập nhật số lượng thất bại!');
            } else {
                updateCartTotal();
            }
        })
        .catch(error => console.error('Error:', error));
    }
    
    function updateCartTotal() {
        let totalQuantity = 0;
        let totalPrice = 0;

        // Lấy tất cả các input quantity
        let quantityInputs = document.querySelectorAll('[id^="quantity-"]');
        let priceElements = document.querySelectorAll('[id^="price-"]');

        quantityInputs.forEach((input, index) => {
            let quantity = parseInt(input.value);
            let price = parseFloat(priceElements[index].textContent.replace(/\./g, '').replace(' VND', ''));
            totalQuantity += quantity;
            totalPrice += price * quantity;
        });

        // Cập nhật hiển thị tổng số lượng và tổng giá tiền
        document.getElementById('total-items').textContent = totalQuantity;
        document.getElementById('subtotal').textContent = totalPrice.toLocaleString('vi-VN') + ' VND';
        document.getElementById('grand-total').textContent = totalPrice.toLocaleString('vi-VN') + ' VND';
    }

    // Gọi hàm updateCartTotal khi trang tải
    window.onload = function() {
        updateCartTotal();
    };
</script>

<style>
    .card {
        transition: all 0.3s ease;
        border: 1px solid #ddd;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .input-group .btn {
        border-radius: 0;
    }
    .input-group .form-control {
        border-radius: 0;
        text-align: center;
    }
    .card-body {
        padding: 1.5rem;
    }
    .product-details {
        padding-left: 5rem;
        text-align: right;
    }
    .emoji {
        margin-left: 0.5rem;
        vertical-align: middle;
    }
    .sticky-top {
        z-index: 100;
    }
    @media (max-width: 768px) {
        .row > .col-12 {
            margin-bottom: 1rem;
        }
        .btn-lg {
            width: 100%;
            margin-bottom: 0.5rem;
        }
        .col-md-2 {
            margin-bottom: 1rem;
        }
        .col-md-10 {
            text-align: center;
        }
        .product-details {
            padding-left: 0;
            text-align: center;
        }
        .sticky-top {
            position: relative;
            top: 0 !important;
            margin-top: 1rem;
        }
    }
</style>