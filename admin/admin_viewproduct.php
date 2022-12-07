<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/product_controller.php';


// select all products
$all_products = select_all_products_ctr();

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

        <title>Admin | Products</title>
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


                        <a href="./admin_viewproduct.php" class="menuItem active">
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

                        <a href="./admin_customer_uploads.php" class="menuItem">
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
                        <p>View Products</p>

                    </div>

                    <div class="table">
                        <table>
                            <tr>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Actions</th>

                            </tr>
                            <?php
                            foreach ($all_products as $product) {
                            ?>
                                <tr>
                                    <td><?php echo $product['product_id']; ?></td>
                                    <td><?php echo $product['product_title']; ?></td>
                                    <td class="prod_img"><img src="<?php echo $product['product_image']; ?>" alt=""></td>
                                    <td><?php echo $product['brand_name']; ?></td>
                                    <td><?php echo $product['cat_name']; ?></td>
                                    <td><?php echo "GHS" . $product['product_price'] . ".00"; ?></td>
                                    <td class="actions">
                                        <a href="<?php echo "../admin/admin_addproducts.php?editPID=" . $product['product_id']; ?>"><i class='bx bx-pencil'></i></a>
                                        <a href="<?php echo "../actions/add_product.php?deletePID=" . $product['product_id']; ?>"><i class='bx bx-trash'></i></a>
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

