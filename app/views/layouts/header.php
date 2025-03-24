<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* CSS tùy chỉnh cho menu */
        .navbar {
            background-color: #222; /* Màu nền đen */
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ccc !important; /* Màu chữ xám nhạt */
            font-size: 16px;
        }
        .navbar-nav .nav-link:hover {
            color: white !important; /* Hiệu ứng hover */
        }
    </style>
</head>
<body>

<!-- Thanh điều hướng -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Test1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="index.php?controller=sinhvien&action=index">Sinh Viên</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=hocphan&action=index">Học Phần</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=dangki&action=index">Đăng Kí ()</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=user&action=loginForm">Đăng Nhập</a></li>

            </ul>
        </div>
    </div>
</nav>

<!-- Nội dung trang -->
<div class="container mt-5">
    <h1>Trang Chủ</h1>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
