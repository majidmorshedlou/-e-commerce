<?php require_once '../inc/config.php'; ?>
<?php

global $message;
global $error;

if (!admin_islogin()) {
    redirect("../index.php");
}

$cats = get_cats();
$product_id = $_GET['edit-product-id'];
$get_product = get_product_by_id($product_id);
$product = mysqli_fetch_array($get_product);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش <?php echo $product['product_name'] ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">ویرایش <?php echo $product['product_name'] ?></h1>
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

    <form action="edit-product.php?edit-product-id=<?php echo $product['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="content">

            <?php if ($message){                                           //error box codes(important)
                ?>
                <div class="success-message"><?php echo $message; ?></div>
            <?php } if ($error){ ?>
                <div class="error-message"><?php echo $error ?></div>
            <?php } ?>

            <label style="margin-right: 8px">نام محصول:<input type="text" name="product-name" placeholder="نام محصول" required  value="<?php echo $product['product_name'] ?>"><br></label>
            <label style="margin-right: 8px">قیمت محصول:<input type="text" name="product-price" placeholder="قیمت محصول" required value="<?php echo $product['product_price'] ?>"><br></label>
            <label style="margin-right: 8px">فروشنده:<input type="text" name="product-seller" placeholder="فروشنده" required value="<?php echo $product['product_seller'] ?>"><br></label>
            <label style="margin-right: 8px">رنگ محصول:<input type="text" name="product-color" placeholder="رنگ محصول" value="<?php echo $product['product_color'] ?>"><br></label>
            <label style="margin-right: 8px">وضعیت محصول:<input type="text" name="product-count" placeholder="وضعیت محصول" required value="<?php echo $product['product_count'] ?>"><br></label>
            <label style="margin-right: 8px">ضمانت محصول:<input type="text" name="product-guarantee" placeholder="ضمانت محصول" required value="<?php echo $product['product_guarantee'] ?>"><br></label>
            <label style="margin-right: 8px"><input type="hidden" name="product-id" value="<?php echo $product['id'] ?>">

            <span style="font-size: 11px; margin-right: 7px"> دسته بندی: <?php echo $product['product_cat']?></span><br>
            <select name="product-cat">
                <option value="<?php echo $product['product_cat'] ?>"><?php echo $product['product_cat'] ?> </option>
                <?php while ($cat = mysqli_fetch_array($cats)) {?>
                    <option value="<?php echo $cat['cat_name']?>"><?php echo $cat['cat_name'] ?></option>
                <?php } ?>
            </select><br>

            <img src="../images/<?php echo $product['product_image'] ?>" alt="<?php echo $product['product_image'] ?>" width="150" style="margin-right: 5px"><br>
            <span style="font-size: 11px; margin-right: 7px">عکس محصول: </span>
            <input style="width: 30%;" type="file" name="new-product-image" ><br>
            <input type="hidden" name="product-image" value="<?php echo $product['product_image'] ?>">

            <label style="margin-right: 8px">توضیحات:<textarea name="product-desc" placeholder="توضیحات محصول"><?php echo $product['product_desc'] ?></textarea><br></label>
            <input type="submit" name="update-product" value="بروزرسانی محصول">



    </form>

</div>
</div>
</body>
</html>
