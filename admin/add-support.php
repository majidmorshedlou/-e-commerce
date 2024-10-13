<?php require_once '../inc/config.php'; ?>
<?php

global $message;
global $error;

if (!admin_islogin()) {
    redirect("../index.php");
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>افزودن پشتیبان</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">افزودن پشتیبان</h1>
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

        <form action="add-support.php" method="post" enctype="multipart/form-data">

            <div class="content">

                <?php if ($message){ ?>
                    <div class="success-message"><?php echo $message; ?></div>
                <?php } if ($error){ ?>
                    <div class="error-message"><?php echo $error ?></div>
                <?php } ?>
            
            <input type="text" name="sfname" placeholder="نام " required autofocus><br>
            <input type="text" name="slname" placeholder="نام خانوادگی" required ><br>
            <input type="text" name="support-code" placeholder="کد ملی" required><br>
            <input type="text" name="support-phone" placeholder="شماره تماس" required><br>
            <input type="email" name="support-email" placeholder="ایمیل"><br>
            <span style="font-size: 11px; margin-right: 7px">جنسیت</span>
            <select name="support-gender">
                <option value="0">انتخاب کنید....</option>
                
                <option value="مرد">مرد</option>
                <option value="زن">زن</option>
                
            </select><br>

            <span style="font-size: 11px; margin-right: 7px">انتخاب عکس</span>
            <input style="width: 30%;" type="file" name="support-image"><br>
            <input type="password" name="password" placeholder="گذرواژه" required><br>
            <input type="password" name="password-conf" placeholder="تکرار گذرواژه" required><br>
            <input type="submit" name="add-support" value="افزودن +">



        </form>

    </div>
</div>
</body>
</html>
