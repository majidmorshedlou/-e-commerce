<?php
require_once '../inc/config.php';
if (!storekeeper_is_login()){
    redirect("login.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل انباردار</title>
    <link rel="stylesheet" href="../admin/styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">پنل انباردار</h1>
    <div class="sidebar">
        <ul>
        <li><a href="../index.php">مشاهده فروشگاه</a></li>
            <li><a href="../index.php">مشاهده فروشگاه</a></li>
            <li><a href="products.php">لیست محصولات</a></li>
            <li><a href="add-product.php">افزودن محصول</a></li>
            <li><a href="users.php">لیست کاربران</a></li>
            <li><a href="cat.php">دسته‌بندی‌ها</a></li>
            <li><a href="orders.php">سفارشات</a></li>
            <li><a href="?storekeeper-logout=1" onclick = "return confirm('آیا می خواهید از این صفحه خارج شوید؟')">خروج</a></li>
        </ul>
    </div>
    <div class="content">یکی از موارد منوی سمت راست را انتخاب کنید :)</div>
</div>
</body>
</html>
