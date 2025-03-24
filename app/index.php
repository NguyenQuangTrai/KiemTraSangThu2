<?php
// Bắt đầu session nếu chưa có
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Hiển thị lỗi (Chỉ bật khi debug)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Gọi file header.php
$headerPath = __DIR__ . '/views/layouts/header.php';
if (file_exists($headerPath)) {
    include $headerPath;
} else {
    die("Lỗi: Không tìm thấy file header.php");
}

// Kiểm tra người dùng đã đăng nhập chưa (Bảo vệ trang)
$controller = $_GET['controller'] ?? 'sinhvien';
$action = $_GET['action'] ?? 'index';


// Xử lý điều hướng đến Controller phù hợp
try {
    switch ($controller) {
        case 'sinhvien':
            require_once __DIR__ . '/controllers/StudentController.php';
            $controller = new StudentController();
            break;
        case 'hocphan':
            require_once __DIR__ . '/controllers/HocPhanController.php';
            $controller = new HocPhanController();
            break;
        default:
            throw new Exception("Controller '$controller' không tồn tại.");
    }

    // Kiểm tra xem action có tồn tại không, nếu có thì gọi
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        throw new Exception("Action '$action' không tồn tại trong controller '$controller'.");
    }
} catch (Exception $e) {
    die("Lỗi hệ thống: " . $e->getMessage());
}
?>
