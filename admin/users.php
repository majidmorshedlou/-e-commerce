<?php
require_once '../inc/config.php';
global $message;
global $error;
if (!admin_islogin()){
    redirect("../index.php");
}

$users = get_users();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>لیست کاربران</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">لیست کاربران</h1>
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

                <?php if ($message){ ?>
                    <div class="success-message"><?php echo $message; ?></div>
                <?php } if ($error){ ?>
                    <div class="error-message"><?php echo $error ?></div>
                <?php } ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>ایمیل</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <?php while ($user = mysqli_fetch_array($users)) {?>
                    <tr>
                        <td> <?php echo $user['uid']?></td>
                        <td> <?php echo $user['ufname']?></td>
                        <td> <?php echo $user['ulname']?></td>
                        <td> <?php echo $user['user_email']?></td>
                        <td><a href="?delete-user= <?php echo $user['uid'] ?>" onclick = "return confirm('آیا می خواهید این کاربر را حذف کنید؟')">حذف</a></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

</div>
</body>
</html>
