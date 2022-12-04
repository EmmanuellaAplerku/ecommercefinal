<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';



if (isset($_SESSION['customer_id']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == '1') {

        if (isset($_GET['a_id'])) {
            $order_id = $_GET['a_id'];
            $order_status = "Approved";
            $result = approve_order_controller($order_id, $order_status);
            if ($result) {
                echo "<script>
                alert('Order status changed successfully');
                window.history.back();
                </script>
                ";
            }
            else{
                echo "<script>
                alert('Order status changed failed');
                window.history.back();
                </script>
                ";
            }
        }

        if (isset($_GET['cancel_id'])) {
            $order_id = $_GET['cancel_id'];
            $result = approve_order_controller($order_id, 'Cancelled');

            if ($result) {
                echo "<script>
                alert('Order status changed successfully');
                window.history.back();
                </script>
                ";
            } else {
                echo "<script>
                alert('Order status changed failed');
                window.history.back();
                </script>
                ";
            }
        }
    } else {
    }
}
