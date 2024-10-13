<?php
require_once '../inc/config.php';
global $message;
global $error;

if (!admin_islogin()){
    redirect("../index.php");
}
$cats = get_cats();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>دسته بندی ها</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">دسته بندی ها</h1>
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
        <div style="text-align: center">
            <form action="cat.php" method="post">

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

                <input type="text" name="cat-name" placeholder="نام دسته بندی" autofocus style="width: 50%" required>
                <input type="submit" name="add-cat" value="افزودن+" style="width: 20%">
            </form>
        </div>
        <hr>
        <table>
            <thead>
            <tr>
                <th>نام دسته</th>
                <th>حذف</th>
            </tr>
            </thead>
            <?php while ($cat = mysqli_fetch_array($cats)) {?>
            <tr>
                <td> <?php echo $cat['cat_name']?></td>
                <td><a href="?delete-product-cat= <?php echo $cat['id'] ?>"onclick = "return confirm('آیا می خواهید این محصول را حذف کنید؟')">حذف</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>
