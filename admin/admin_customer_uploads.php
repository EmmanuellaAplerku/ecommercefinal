<?php
include_once dirname(__FILE__) . '/../settings/core.php';
include_once dirname(__FILE__) . '/../controllers/cart_controller.php';

$select_all_users = select_customer_uploads_ctr();

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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin | Orders</title>
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
                    <a href="./admin_orders.php" class="menuItem active">
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

                    <a href="./admin_customer_uploads.php" class="menuItem active">
                        <div class="icon">
                            <i class='bx bxs-download'></i>
                            <!-- <img src="../assets/icons/bi_people-fill.svg" alt=""> -->
                        </div>
                        <p class="m_name">Uploads</p>
                    </a>
                    <a href="./admin_payments.php" class="menuItem">
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
                    <p>Customer Uploads</p>

                </div>

                <div class="table">
                    <table>
                        <tr>
                            <th>Customer ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Actions</th>
                        </tr>
                        <?php 
                        // print_r($select_all_users);
                        // exit();
                        foreach ($select_all_users as $user) { ?>
                                    <tr>
                                        <td><?php echo $user[
                                            'customer_id'
                                        ]; ?></td>
                                        <td><?php echo $user[
                                            'customer_name'
                                        ]; ?></td>
                                        
                                        <td><?php echo $user[
                                            'customer_email'
                                        ]; ?></td>
                                        <td><?php echo $user[
                                            'customer_contact'
                                        ]; ?></td>
                                        <td><?php echo $user[
                                            'description'
                                        ]; ?></td>
                                        <td><?php echo $user[
                                            'files'
                                        ]; ?></td>
                                        <td><a href="<?php echo $user['files'] ?>" download>Download</a></td>
                                        
                                    </tr>
                                <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
} else {
    ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- fontawesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css">
        <!-- bootstrap -->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <!-- owl carousel -->
        <link rel="stylesheet" href="../assets/css/owl.carousel.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="../assets/css/magnific-popup.css">
        <!-- animate css -->
        <link rel="stylesheet" href="../assets/css/animate.css">
        <!-- mean menu css -->
        <link rel="stylesheet" href="../assets/css/meanmenu.min.css">
        <!-- main style -->
        <link rel="stylesheet" href="../assets/css/main.css">
        <!-- responsive -->
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->

        <!-- sweet alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
   <body>
   <input type="hidden" name="" id="alert" value="<?php echo $message; ?>">
   <script>
            
                Swal.fire({
                    title: 'Access Denied',
                    text: 'You cannot access this page because you are not an admin',
                    icon: 'warning',
                    confirmButtonText: 'Okay'
                }).then(() => {
                    window.location.href = '../index.php'
                })
            

        </script>
    
   </body>
   </html>

   <?php
}




