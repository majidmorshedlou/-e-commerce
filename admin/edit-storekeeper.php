<?php require_once '../inc/config.php'; ?>
<?php

global $message;
global $error;

if (!admin_islogin()) {
    redirect("../index.php");
}


$storekeeper_id = $_GET['edit-storekeeper-id'];
$get_storekeeper= get_storekeeper_by_id($storekeeper_id);
$storekeeper = mysqli_fetch_array($get_storekeeper);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ویرایش <?php echo $storekeeper['kfname']." ".$storekeeper['klname'] ?> </title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">ویرایش <?php echo $storekeeper['kfname']." ".$storekeeper['klname'] ?></h1>
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

    <form action="edit-storekeeper.php?edit-storekeeper-id=<?php echo $storekeeper['id'] ?>" method="post" enctype="multipart/form-data">

        <div class="content">

            <?php if ($message){ ?>
                <div class="success-message"><?php echo $message; ?></div>
            <?php } if ($error){ ?>
                <div class="error-message"><?php echo $error ?></div>
            <?php } ?>

            <input type="text" name="kfname" placeholder="نام" required  value="<?php echo $storekeeper['kfname'] ?>"><br>
            <input type="text" name="klname" placeholder="نام خانوادگی" required value="<?php echo $storekeeper['klname'] ?>"><br>
            <input type="text" name="storekeeper-code" placeholder="کد ملی" required value="<?php echo $storekeeper['storekeeper_code'] ?>"><br>
            <input type="text" name="storekeeper-phone" placeholder="تلفن" value="<?php echo $storekeeper['storekeeper_phone'] ?>"><br>
            <input type="email" name="storekeeper-email" placeholder="ایمیل" required value="<?php echo $storekeeper['storekeeper_email'] ?>"><br>
            <input type="hidden" name="storekeeper-id" value="<?php echo $storekeeper['id'] ?>">


            <img src="../images/store/<?php echo $storekeeper['storekeeper_image'] ?>" alt="<?php echo $storekeeper['storekeeper_image'] ?>" width="150" style="margin-right: 5px"><br>
            <span style="font-size: 11px; margin-right: 7px">عکس جدید: </span>
            <input style="width: 30%;" type="file" name="new-storekeeper-image" ><br>
            <input type="hidden" name="storekeeper-image" value="<?php echo $storekeeper['storekeeper_image'] ?>">
            

            <input type="submit" name="update-storekeeper" value="بروزرسانی محصول">



    </form>

</div>
</div>
</body>
</html>
