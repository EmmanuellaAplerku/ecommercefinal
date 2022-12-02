<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/customer_controller.php';

if (isset($_SESSION['role']) && isset($_SESSION['customer_id'])) {
    $user_id = $_SESSION['customer_id'];
    // $adminData = select_one_user_controller($user_id);

    // page if admin logs in
    if ($_SESSION['role'] == '1') {
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
            <title>Admin | Account Settings</title>
        </head>

        <body>
            <!-- user profile -->
            <div class="us_container">
                <div class="sidebar">
                    <div class="content">

                        <div class="logo">
                            <img src="../assets/logo.png" alt="">
                        </div>
                        <!-- menu -->
                        <p class="sm">Menu</p>

                        <div class="menuItems">
                            <a href="./admin_main.php" class="menuItem">
                                <div class="icon">
                                    <img src="../assets/icons/bx_bxs-dashboard-white.svg" alt="">
                                </div>
                                <p class="m_name">Dashboard</p>
                            </a>
                            <a href="./admin_orders.php" class="menuItem">
                                <div class="icon">
                                    <img src="../assets/icons/mdi_package-white.svg" alt="">
                                </div>
                                <p class="m_name">Orders</p>
                            </a>

                            <button class="accordion"> <img src="../assets/icons/dashicons_products.svg" alt=""> Products</button>
                            <div class="panel">
                                <a href="./admin_viewproduct.php" class="menuItem">
                                    <div class="icon">
                                        <img src="../assets/icons/eye.svg" alt="">
                                    </div>
                                    <p class="m_name">View Product</p>
                                </a>
                                <a href="./admin_addproducts.php" class="menuItem">
                                    <div class="icon">
                                        <img src="../assets/icons/akar-icons_plus-white.svg" alt="">
                                    </div>
                                    <p class="m_name">AddProduct</p>
                                </a>
                                
                                <a href="./admin_brands.php" class="menuItem">
                                    <div class="icon">
                                        <img src="../assets/icons/ic_baseline-review-white.svg" alt="">
                                    </div>
                                    <p class="m_name">Brands</p>
                                </a>
                                <a href="./admin_categories.php" class="menuItem">
                                    <div class="icon">
                                        <img src="../assets/icons/bx_bxs-category-alt.svg" alt="">
                                    </div>
                                    <p class="m_name">Categories</p>
                                </a>
                            </div>

                            <a href="./admin_customers.php" class="menuItem">
                                <div class="icon">
                                    <img src="../assets/icons/bi_people-fill.svg" alt="">
                                </div>
                                <p class="m_name">Customers</p>
                            </a>
                            <a href="./admin_payments.php" class="menuItem">
                                <div class="icon">
                                    <img src="../assets/icons/fluent_payment-24-filled-white.svg" alt="">
                                </div>
                                <p class="m_name">Payments</p>
                            </a>
                            <a href="./admin_ac-settings.php" class="menuItem active">
                                <div class="icon">
                                    <img src="../assets/icons/clarity_settings-solid-white.svg" alt="">
                                </div>
                                <p class="m_name">Settings</p>
                            </a>
                            <a href="../Login/logout.php" class="menuItem">
                                <div class="icon">
                                    <img src="../assets/icons/ri_logout-circle-fill.svg" alt="">
                                </div>
                                <p class="m_name">Logout</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="side-content">
                    <div class="content">
                        <div class="heading">
                            <p>Account Settings</p>
                        </div>

                        <section class="pInfo">
                            <h2>Security Information</h2>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem exercitationem illo repudiandae iure doloribus quidem veniam aperiam magni, neque fuga.</p>

                            <div class="form">
                                <form action="">
                                    <div class="flex">
                                        <div class="form-control">
                                            <label for="">Email</label>
                                            <div class="tandE">
                                                <input type="text" name="email" value="<?php echo $adminData['user_email']; ?>">
                                                <?php
                                                if (isset($_GET['updateEmail'])) {
                                                ?>
                                                    <a href="../actions/admin_update_settings.php?updateEmail=<?php echo $adminData['user_id']; ?>">Update Email</a>

                                                <?php
                                                } else {
                                                ?>
                                                    <a href="../admin/admin_ac-settings.php?updateEmail=<?php echo $adminData['user_id']; ?>">Edit</a>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    
                                </form>
                            </div>

                    </div>
                    </section>
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
}
