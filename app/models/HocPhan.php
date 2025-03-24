<?php
class HocPhan
{
    private $conn;
    private $table = "HocPhan";

    public $MaHP;
    public $TenHP;
    public $SoTinChi;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy danh sách tất cả học phần
    public function getAll()
    {
        try {
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Lỗi lấy danh sách học phần: " . $e->getMessage());
        }
    }

    // Lấy thông tin một học phần
    public function getOne()
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE MaHP = :MaHP";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':MaHP', $this->MaHP);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Lỗi lấy học phần: " . $e->getMessage());
        }
    }

    // Thêm học phần
    public function create()
    {
        try {
            $query = "INSERT INTO " . $this->table . " (MaHP, TenHP, SoTinChi) VALUES (:MaHP, :TenHP, :SoTinChi)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':MaHP', $this->MaHP);
            $stmt->bindParam(':TenHP', $this->TenHP);
            $stmt->bindParam(':SoTinChi', $this->SoTinChi);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Lỗi thêm học phần: " . $e->getMessage());
        }
    }

    // Cập nhật học phần
    public function update()
    {
        try {
            $query = "UPDATE " . $this->table . " SET TenHP = :TenHP, SoTinChi = :SoTinChi WHERE MaHP = :MaHP";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':MaHP', $this->MaHP);
            $stmt->bindParam(':TenHP', $this->TenHP);
            $stmt->bindParam(':SoTinChi', $this->SoTinChi);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Lỗi cập nhật học phần: " . $e->getMessage());
        }
    }

    // Xóa học phần
    public function delete()
    {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE MaHP = :MaHP";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':MaHP', $this->MaHP);
            return $stmt->execute();
        } catch (PDOException $e) {
            die("Lỗi xóa học phần: " . $e->getMessage());
        }
    }
}
?>
