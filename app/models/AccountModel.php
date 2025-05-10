<?php 
class AccountModel 
{ 
private $conn; 
private $table_name = "account"; 
public function __construct($db) 
{ 
$this->conn = $db; 
}
public function getAccountByUsername($username) 
    { 
        $query = "SELECT * FROM account WHERE username = :username"; 
        $stmt = $this->conn->prepare($query); 
        $stmt->bindParam(':username', $username, PDO::PARAM_STR); 
        $stmt->execute(); 
        $result = $stmt->fetch(PDO::FETCH_OBJ); 
        return $result; 
    } 
 
    function save($username, $fullname, $password) {
        $query = "INSERT INTO " . $this->table_name . " (username, fullname, password) 
                  VALUES (:username, :fullname, :password)";
        
        $stmt = $this->conn->prepare($query);
    
        // Làm sạch dữ liệu
        $username = htmlspecialchars(strip_tags($username));
        $fullname = htmlspecialchars(strip_tags($fullname));
        $password = htmlspecialchars(strip_tags($password));
    
        // Gán dữ liệu
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':password', $password);
    
        // Thực thi câu lệnh
        return $stmt->execute();
    }
    
} 