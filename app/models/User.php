<?php
class User
{
    private $conn;
    private $table = "User";

    public $id;
    public $username;
    public $password;
    public $role;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Tìm user theo username
    public function getByUsername()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tạo tài khoản mới
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':role', $this->role);
        return $stmt->execute();
    }
}
?>
