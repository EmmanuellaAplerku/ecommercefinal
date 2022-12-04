<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';
$payments = select_payment_admin_controller();

// page if admin logs in
if (isset($_SESSION['role']) == '1') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/admin.css">

        <!-- boxicons -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <title>Admin | Payments</title>
    </head>

    <body>
        <!-- user profile -->
        <div class="us_container">
        <div class="sidebar">
                <div class="content">

                    <div class="logo" style="padding: 20px 0; color:white;">
                        <h1>REVAMP'D</h1>
                    </div>

                    <!-- menu -->
                    <p class="sm">Menu</p>


                    <div class="menuItems">
                        <a href="./admin_main.php" class="menuItem">
                            <div class="icon">
                                <!-- icon -->
                                <i class='bx bxs-dashboard'></i>

                            </div>
                            <p class="m_name">Dashboard</p>
                        </a>
                        <a href="./admin_orders.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bx-store-alt'></i>
                            </div>
                            <p class="m_name">Orders</p>
                        </a>


                        <a href="./admin_viewproduct.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bx-show'></i>
                                <!--  -->
                            </div>
                            <p class="m_name">View Product</p>
                        </a>
                        <a href="./admin_addproducts.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bx-message-square-add'></i>
                                <!--  -->
                            </div>
                            <p class="m_name">Add Product</p>
                        </a>

                        <a href="./admin_brands.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bxl-unity'></i>
                                <!-- <img src="../assets/icons/ic_baseline-review-white.svg" alt=""> -->
                            </div>
                            <p class="m_name">Brands</p>
                        </a>
                        <a href="./admin_categories.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bxs-customize'></i>
                                <!-- <img src="../assets/icons/bx_bxs-category-alt.svg" alt=""> -->
                            </div>
                            <p class="m_name">Categories</p>
                        </a>

                        <a href="./admin_customers.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bxs-user'></i>
                                <!-- <img src="../assets/icons/bi_people-fill.svg" alt=""> -->
                            </div>
                            <p class="m_name">Customers</p>
                        </a>
                        <a href="./admin_payments.php" class="menuItem active">
                            <div class="icon">
                                <i class='bx bxs-discount'></i>
                                <!-- <img src="../assets/icons/fluent_payment-24-filled-white.svg" alt=""> -->
                            </div>
                            <p class="m_name">Payments</p>
                        </a>

                        <a href="../Login/logout.php" class="menuItem">
                            <div class="icon">
                                <i class='bx bxs-user-minus'></i>
                                <!-- <img src="../assets/icons/ri_logout-circle-fill.svg" alt=""> -->
                            </div>
                            <p class="m_name">Logout</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="side-content">
                <div class="content">
                    <div class="heading">
                        <p>Payments</p>

                    </div>

                    <div class="table">
                        <table>
                            <tr>
                                <th>Payment ID</th>
                                <th>Customer</th>
                                <th>Order</th>
                                <th>Amount</th>
                                <th>Currency</th>
                                <th>Date</th>
                                <th>Actions</th>

                            </tr>
                            <?php
                            foreach ($payments as $payment) {
                            ?>
                                <tr>
                                    <td><?php echo $payment['pay_id']; ?></td>
                                    <td>#<?php echo $payment['invoice_no']; ?></td>
                                    <td><?php echo $payment['customer_name'] ?></td>
                                    <td><?php echo $payment['amt'] / (10 ** 2) ?></td>
                                    <td><?php echo $payment['currency']; ?></td>
                                    <td><?php echo $payment['payment_date']; ?></td>
                                    <td class="actions">
                                        <a href="<?php echo "../actions/delete_payment.php?deletePayID=" . $payment['pay_id']; ?>"><i class='bx bx-trash' style="color: black;"></i></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>


        <script src="../assets/js/accordion.js"></script>

    </body>

    </html>
<?php

} else {
    echo "<script type='text/javascript'> alert('Admin not logged in');
            document.location.href = '../index.php';
            </script>";
}
