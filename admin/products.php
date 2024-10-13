<?php
require_once '../inc/config.php';
global $error;
global $message;
if (!admin_islogin()){
    redirect("../index.php");
}

$products = get_products();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست محصولات</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">لیست محصولات</h1>
    <div class="sidebar">
        <ul>
            <li><a href="../index.php">مشاهده فروشگاه</a></li>
            <li><a href="products.php">لیست محصولات</a></li>
            <li><a href="add-product.php">افزودن محصول</a></li>
            <li><a href="users.php">لیست کاربران</a></li>
            <li><a href="cat.php">دسته‌بندی‌ها</a></li>
            <li><a href="add-support.php">افزودن پشتیبان</a></li>
            <li><a href="supports.php">لیست پشتیبانان</a></li>
            <li><a href="add-storekeeper.php">افزودن انباردار</a></li>
            <li><a href="storekeepers.php">لیست انبارداران</a></li>
            <li><a href="comments.php">نظرات</a></li>
            <li><a href="orders.php">سفارشات</a></li>
            <li><a href="?admin-logout=1" onclick = "return confirm('آیا می خواهید از این صفحه خارج شوید؟')">خروج</a></li>
        </ul>
    </div>
    <div class="content">

        <?php                                                               //error box codes(important)
        if ($message){
            ?>

            <div class="success-message"><?php echo $message ?></div>
            <?php
        }
        if ($error){
            ?>
            <div class="error-message"><?php echo $error ?></div>
            <?php
        }
        ?>

        <table>

            <thead>
            <tr>
                <th>نام محصول</th>
                <th>قیمت </th>
                <th>دسته بندی</th>
                <th>تعداد </th>
                <th>فروشنده </th>
                <th>رنگ </th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>

            <?php

            while ($product = mysqli_fetch_array($products)){      //////////Care about 'product' and "products" they are different!!!!!

                ?>

             <tr>
                <td><?php echo $product['product_name']?></td>
                <td><?php echo $product['product_price']?></td>
                <td><?php echo $product['product_cat']?></td>
                <td><?php echo $product['product_count']?></td>
                <td><?php echo $product['product_seller']?></td>
                <td><?php echo $product['product_color']?></td>
                <td><a href="edit-product.php?edit-product-id=<?php echo $product['id'] ?> ">ویرایش</a></td>
                <td><a href="?delete-product-id= <?php echo $product['id'] ?>" onclick = "return confirm('آیا می خواهید این محصول را حذف کنید؟')">حذف</a></td>
            </tr>

            <?php } ?>

        </table>

    </div>
</div>
</body>
</html>
