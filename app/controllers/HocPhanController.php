<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Course.php';

class CourseController
{
    private $db;
    private $hocPhan;

    public function __construct()
    {
        try {
            $database = new Database();
            $this->db = $database->getConnection();
            if (!$this->db) {
                throw new Exception("Không thể kết nối đến cơ sở dữ liệu");
            }
            $this->hocPhan = new Course($this->db);
        } catch (Exception $e) {
            die("Lỗi khởi tạo controller: " . $e->getMessage());
        }
    }

    // Hiển thị danh sách học phần
    public function index()
    {
        try {
            $result = $this->hocPhan->getAll();
            if (!$result) {
                throw new Exception("Không thể lấy danh sách học phần");
            }
            include __DIR__ . '/../views/course/index.php';
        } catch (Exception $e) {
            die("Lỗi hiển thị danh sách: " . $e->getMessage());
        }
    }

    // Hiển thị form thêm học phần
    public function create()
    {
        include __DIR__ . '/../views/course/create.php';
    }

    // Xử lý thêm học phần
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->hocPhan->MaHP = $_POST['MaHP'];
                $this->hocPhan->TenHP = $_POST['TenHP'];
                $this->hocPhan->SoTinChi = $_POST['SoTinChi'];

                if ($this->hocPhan->create()) {
                    header('Location: index.php?action=index');
                } else {
                    throw new Exception("Không thể thêm học phần");
                }
            } catch (Exception $e) {
                die("Lỗi thêm học phần: " . $e->getMessage());
            }
        }
    }

    // Hiển thị form sửa học phần
    public function edit()
    {
        if (isset($_GET['id'])) {
            try {
                $this->hocPhan->MaHP = $_GET['id'];
                $result = $this->hocPhan->getOne();
                if (!$result) {
                    throw new Exception("Không tìm thấy học phần");
                }
                include __DIR__ . '/../views/course/edit.php';
            } catch (Exception $e) {
                die("Lỗi hiển thị form sửa: " . $e->getMessage());
            }
        }
    }

    // Xử lý cập nhật học phần
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->hocPhan->MaHP = $_POST['MaHP'];
                $this->hocPhan->TenHP = $_POST['TenHP'];
                $this->hocPhan->SoTinChi = $_POST['SoTinChi'];

                if ($this->hocPhan->update()) {
                    header('Location: index.php?action=index');
                } else {
                    throw new Exception("Không thể cập nhật học phần");
                }
            } catch (Exception $e) {
                die("Lỗi cập nhật học phần: " . $e->getMessage());
            }
        }
    }

    // Xử lý xóa học phần
    public function delete()
    {
        if (isset($_GET['id'])) {
            try {
                $this->hocPhan->MaHP = $_GET['id'];
                if ($this->hocPhan->delete()) {
                    header('Location: index.php?action=index');
                } else {
                    throw new Exception("Không thể xóa học phần");
                }
            } catch (Exception $e) {
                die("Lỗi xóa học phần: " . $e->getMessage());
            }
        }
    }

    // Hiển thị chi tiết học phần
    public function show()
    {
        if (isset($_GET['id'])) {
            try {
                $this->hocPhan->MaHP = $_GET['id'];
                $result = $this->hocPhan->getOne();
                if (!$result) {
                    throw new Exception("Không tìm thấy học phần");
                }
                include __DIR__ . '/../views/course/detail.php';
            } catch (Exception $e) {
                die("Lỗi hiển thị chi tiết: " . $e->getMessage());
            }
        }
    }
}
?>
