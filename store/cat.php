<?php
require_once '../inc/config.php';
global $message;
global $error;

if (!storekeeper_is_login()){
    redirect("../index.php");
}
$cats = get_cats();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>دسته بندی ها</title>
    <link rel="stylesheet" href="../admin/styles/styles.css">
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
            <li><a href="orders.php">سفارشات</a></li>
            <li><a href="?admin-logout=1" onclick = "return confirm('آیا می خواهید از این صفحه خارج شوید؟')">خروج</a></li>
        </ul>
    </div>
    <div class="content">
        <table>
            <thead>
            <tr>
                <th>نام دسته</th>
            </tr>
            </thead>
            <?php while ($cat = mysqli_fetch_array($cats)) {?>
            <tr>
                <td> <?php echo $cat['cat_name']?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>
