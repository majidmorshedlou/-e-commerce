<?php
require_once '../inc/config.php';
global $error;
global $message;
if (!admin_islogin()){
    redirect("login.php");
}
$comments = get_comments();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>نظرات</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">نظرات</h1>
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

        <?php if ($message){                                           //error box codes(important)
            ?>
            <div class="success-message"><?php echo $message; ?></div>
        <?php } if ($error){ ?>
            <div class="error-message"><?php echo $error ?></div>
        <?php } ?>

        <?php
        if (mysqli_num_rows($comments) == 0){ ?>
            <span style="margin-right: 215px; color: #0D47A1; font-size: 18px">نظری برای نمایش و جود ندارد!!!</span>
        <?php } ?>

        <?php while ($comment = mysqli_fetch_array($comments)){

            $product_id = $comment['product_id'];
            $product_name = mysqli_fetch_array(get_product_by_id($product_id));

            ?>

        <div class="comment-item">
            <div class="username"><?php echo $comment['username'] ?></div>

            <div class="comment-text"><?php echo $comment['comment_text'] ?></div>

            <div class="comment-answer">

                <form action="comments.php" method="post">

                    <textarea name="comment-answer" placeholder="پاسخ به نظر..."></textarea><br>
                    <input type="hidden" name="comment-id" value="<?php echo $comment['id'] ?>">
                    <input style="width: 200px" type="submit" name="add-answer" value="ثبت پاسخ"><br>
                </form>
            </div>

            <div class="comment-buttons">
                <span>
                    <span><b><i>نام محصول: </i></b></span>
                    <?php echo $product_name['product_name'] ?>(<?php echo $comment['product_id'] ?>)
                </span>
                <a  href="?approve-id=<?php echo $comment['id'] ?>" class="approve">تایید نظر</a>
                <a  href="?delete-id=<?php echo $comment['id'] ?>" class="delete" onclick = "return confirm('آیا می خواهید این نظر را حذف کنید؟')">حذف نظر</a>
            </div>
            <div class="clear"></div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>
