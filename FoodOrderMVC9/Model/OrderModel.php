<?php
// OrderModel.php

class OrderModel
{
    private $conn;

    public function __construct($database)
    {
        $this->conn = $database->getConnection();
    }
    public function createOrder($customerID, $totalPrice)
    {
        $currentDate = date('Y-m-d H:i:s');
        $status = 'pending';
    
        $sql = "INSERT INTO donhang (TENTAIKHOAN, NGAYDATHANG, TRANGTHAIDONHANG, TONGDONHANG) VALUES (:customerID, :currentDate, :status, :totalPrice)";
        $stmt = $this->conn->prepare($sql);
    
        // Bind values
        $stmt->bindParam(':customerID', $customerID, PDO::PARAM_STR);
        $stmt->bindParam(':currentDate', $currentDate, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':totalPrice', $totalPrice, PDO::PARAM_INT);
    
        // Execute the statement
        $stmt->execute();
    
        // Return the ID of the newly inserted order
        return $this->conn->lastInsertId();
    }
    
    
    

    public function addOrderItem($orderId, $productId, $quantity)
    {
        $sql = "INSERT INTO chitietdonhang (IDDONHANG, IDMONAN, SOLUONG) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$orderId, $productId, $quantity]);

        return true; // You may want to add error handling based on your application's needs
    }
}
?>
