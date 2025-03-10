<?php
session_start();

// Kiểm tra nếu giỏ hàng tồn tại trong session
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    // Lấy ID sản phẩm từ URL
    $productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Kiểm tra nếu ID hợp lệ và tồn tại trong giỏ hàng
    if ($productId > 0 && isset($_SESSION['cart'][$productId])) {
        // Xóa sản phẩm khỏi giỏ hàng
        unset($_SESSION['cart'][$productId]);
        // Cập nhật lại session để tránh index bị lỗi
        $_SESSION['cart'] = array_filter($_SESSION['cart']);
    }
}

// Chuyển hướng về trang giỏ hàng
header("Location: /webbanhang1/Product/cart");
exit();
?>