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
                header('Location: ../admin/admin_orders.php?message=success');
                // echo "<script>
                // alert('Order status changed successfully');
                // window.history.back();
                // </script>
                // ";
            }
            else{
                header('Location: ../admin/admin_orders.php?message=failed');

                // echo "<script>
                // alert('Order status changed failed');
                // window.history.back();
                // </script>
                // ";
            }
        }

        if (isset($_GET['cancel_id'])) {
            $order_id = $_GET['cancel_id'];
            $result = approve_order_controller($order_id, 'Cancelled');

            if ($result) {
                header('Location: ../admin/admin_orders.php?message=successCancel');

                // echo "<script>
                // alert('Order status changed successfully');
                // window.history.back();
                // </script>
                // ";
            } else {
                header('Location: ../admin/admin_orders.php?message=failedCancel');

                // echo "<script>
                // alert('Order status changed failed');
                // window.history.back();
                // </script>
                // ";
            }
        }
    } else {
    }
}
