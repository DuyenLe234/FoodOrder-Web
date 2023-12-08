<?php
// OrderController.php

class OrderController
{
    private $orderModel;

    public function __construct($orderModel)
    {
        $this->orderModel = $orderModel;
    }

    public function placeOrder($customerId, $totalPrice)
    {
        $orderId = $this->orderModel->createOrder($customerId, $totalPrice);

        if ($orderId) {
            foreach ($_SESSION['cart'] as $cartItem) {
                $this->orderModel->addOrderItem($orderId, $cartItem['IDMonAn'], $cartItem['SoLuong']);
            }

            unset($_SESSION['cart']);

            header("Location:../view/order_confirmation.php?order_id=$orderId");
            exit();
        } else {
            echo "Failed to place the order.";
        }
    }
}
?>
