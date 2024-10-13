<?php require_once '../inc/config.php'; ?>
<?php

global $message;
global $error;

if (!admin_islogin()) {
    redirect("../index.php");
}


$support_id = $_GET['edit-support-id'];
$get_support= get_support_by_id($support_id);
$support = mysqli_fetch_array($get_support);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش <?php echo $support['sfname']." ".$support['slname'] ?> </title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">ویرایش <?php echo $support['sfname']." ".$support['slname'] ?></h1>
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

    <form action="edit-support.php?edit-support-id=<?php echo $support['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="content">

            <?php if ($message){ ?>
                <div class="success-message"><?php echo $message; ?></div>
            <?php } if ($error){ ?>
                <div class="error-message"><?php echo $error ?></div>
            <?php } ?>

            <input type="text" name="sfname" placeholder="نام" required  value="<?php echo $support['sfname'] ?>"><br>
            <input type="text" name="slname" placeholder="نام خانوادگی" required value="<?php echo $support['slname'] ?>"><br>
            <input type="text" name="support-code" placeholder="کد ملی" required value="<?php echo $support['support_code'] ?>"><br>
            <input type="text" name="support-phone" placeholder="تلفن" value="<?php echo $support['support_phone'] ?>"><br>
            <input type="email" name="support-email" placeholder="ایمیل" required value="<?php echo $support['support_email'] ?>"><br>
            <input type="hidden" name="support-id" value="<?php echo $support['id'] ?>">

            <span style="font-size: 11px; margin-right: 7px"> جنسیت : <strong><?php echo $support['support_gender']?></strong></span><br>
            <select name="support-gender">
                <option value="<?php echo $suport['support_gender'] ?>">انتخاب کنید....</option>
                <option value="مرد">مرد</option>
                <option value="زن">زن</option>
            
            </select><br>

            <img src="../images/supports/<?php echo $support['support_image'] ?>" alt="<?php echo $support['support_image'] ?>" width="150" style="margin-right: 5px"><br>
            <span style="font-size: 11px; margin-right: 7px">عکس جدید: </span>
            <input style="width: 30%;" type="file" name="new-support-image" ><br>
            <input type="hidden" name="support-image" value="<?php echo $support['support_image'] ?>">
            

            <input type="submit" name="update-support" value="بروزرسانی محصول">



    </form>

</div>
</div>
</body>
</html>
