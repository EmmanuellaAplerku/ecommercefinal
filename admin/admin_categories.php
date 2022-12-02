<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/product_controller.php';


// select all categories to display
$all_categories = select_all_categories_ctr();


// get selected category to edit
if (isset($_GET['editCatID'])) {
    $selected_category = select_one_category_ctr($_GET['editCatID']);
}


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
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <title>Admin | Categories</title>
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
                            <a href="./admin_categories.php" class="menuItem active">
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
                        <a href="./admin_ac-settings.php" class="menuItem">
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
                    <?php
                        if (isset($_GET['editCatID'])) {
                        ?>
                            <p>Edit Category</p>
                        <?php
                        } else {
                        ?>
                            <p>Categories</p>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- add-categories form -->
                    <div class="addProduct">
                        <form action="../actions/add_category.php" method="POST">
                            <div class="flex">
                                <div class="form-control">
                                    <label for="">Category Name</label>
                                    <input type="text" name="category" id="cat" value="<?php echo $selected_category['cat_name'] ?? ''; ?>">
                                    <input type="hidden" name="cat_id" value="<?php echo $selected_category['cat_id']; ?>">
                                    <small></small>
                                    <button type="submit" name="<?php if (isset($_GET['editCatID'])) {
                                                                    echo 'updateCategory';
                                                                } else {
                                                                    echo 'addCategory';
                                                                } ?>" id="add" class="brand"><?php
                                                                                                if (isset($_GET['editCatID'])) {
                                                                                                    echo "Update Category";
                                                                                                } else {
                                                                                                    echo "Add Category";
                                                                                                } ?>
                                    </button>
                                    <?php
                                    if (isset($_GET['editCatID'])) {
                                    ?>
                                        <button type="submit" name="cancel" id="cancel" class="brand cancel">Cancel</button>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="table ">
                        <table>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                            foreach ($all_categories as $category) {
                            ?>
                                <tr>
                                    <td><?php echo $category['cat_id']; ?></td>
                                    <td><?php echo $category['cat_name']; ?></td>
                                    <td>
                                        <a href="<?php echo "../admin/admin_categories.php?editCatID=" . $category['cat_id']; ?>"><i class='bx bxs-edit-alt'></i></a>
                                        <a href="<?php echo "../actions/add_category.php?deleteCatID=" . $category['cat_id']; ?>"><i class='bx bx-trash'></i></a>
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
        <script src="../js/brand_cat.js"></script>

    </body>

    </html>
<?php
} else {
    echo "<script type='text/javascript'> alert('Admin not logged in');
            document.location.href = '../index.php';
            </script>";
}
