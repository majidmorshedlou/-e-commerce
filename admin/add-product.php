<?php require_once '../inc/config.php'; ?>
<?php

global $message;
global $error;

if (!admin_islogin()) {
    redirect("../index.php");
}

$cats = get_cats();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>افزودن محصول</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div id="main">
     <h1 class="title">محصول جدید</h1>
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

            <form action="add-product.php" method="post" enctype="multipart/form-data">



                <?php if ($message){                                           //error box codes(important)
                    ?>
                    <div class="success-message"><?php echo $message; ?></div>
                    <?php } if ($error){ ?>
                    <div class="error-message"><?php echo $error ?></div>
                    <?php } ?>

                <input type="text" name="product-name" placeholder="نام محصول" required autofocus><br>
                <input type="text" name="product-price" placeholder="قیمت محصول" required><br>
                <input type="text" name="product-count" placeholder="وضعیت محصول" required><br>
                <input type="text" name="product-color" placeholder="رنگ محصول"><br>
                <input type="text" name="product-seller" placeholder="فروشنده" required><br>
                <input type="text" name="product-guarantee" placeholder="مدت ضمانت کالا"><br>
                <span style="font-size: 11px; margin-right: 7px">انتخاب دسته بندی</span>
                <select name="product-cat">
                    <option value="0">انتخاب کنید....</option>
                    <?php while ($cat = mysqli_fetch_array($cats)) {?>
                    <option value="<?php echo $cat['cat_name']?>"><?php echo $cat['cat_name'] ?></option>
                    <?php } ?>
                </select><br>

                <span style="font-size: 11px; margin-right: 7px">انتخاب عکس</span>
                <input style="width: 30%;" type="file" name="product-image"><br>

                <textarea name="product-desc" placeholder="توضیحات محصول"></textarea><br>

                <input type="submit" name="add-product" value="افزودن محصول+">
        </div>

        </form>
        </div>


    </div>
</body>
</html>
