<?php require_once 'inc/config.php'; ?>
<?php
global $error;
global $message;

if ($_GET['product-id']){
    $product_id = $_GET['product-id'];
    $product_info = mysqli_fetch_array(get_product_by_id($product_id));
}
$pcomments = get_comment_by_product_id($product_id);
?>
<!doctype html>
<html lang="en">
    <?php require_once 'sections/header.php' ?>
    <!-- <div id="logo">
        <h1 style="text-align: right"><?php echo ' « '.$product_info['product_name'].' » '?></h1><h3></h3>
    </div> -->

<div id="main" class="row container mx-auto"> 
    <div class="product-page col-lg-9 col-md-12">
        <div class="box">
            <div class="single-product">
                <div class="product-info row">
                    <div class="col-md-5 col-sm-12">
                        <div class="product-image"><img src="images/<?php echo $product_info['product_image']?>" alt=""></div>
                    </div> 
                    <div class="col-md-7 col-sm-12 ">
                    <div class="product-title">
                        <?php echo $product_info['product_name']?> 
                    </div>
                    <div class="product-category"><strong>دسته بندی: </strong><?php echo $product_info['product_cat']?></div>
                    <div class="product-category"> <strong>رنگ بندی: </strong><?php echo $product_info['product_color']?></div>
                    <div class="product-category"> <strong>وضعیت کالا: </strong><?php echo $product_info['product_count']?></div>
                    <div class="product-category"> <strong>گارانتی: </strong><?php echo $product_info['product_guarantee']?></div>
                    <br>
                    <div class="product-buy">
                        <div class="product-price"><?php echo $product_info['product_price']?> تومان</div>
                        <div class="add-to-cart-button"><a href="?add-to-cart=<?php echo $product_info['id'] ?>"><em>افزودن به سبد خرید</em></a></div>
                    </div>
                    </div>
                    <div class="clear"></div>
                    <br><hr class="class-5">
                    <div class="col-12">
                        <div class="clear"></div>
                        <div class="product-desc"><strong><em>توضیحات: </em></strong><?php echo $product_info['product_desc'] ?></div>
                    </div>
                    <hr class="class-5">

                </div>
            </div>
        </div>
        <div class="box comments"><span style="text-align: center">نظرات</span><br><div class="product-comments">تعداد نظرات: <?php echo mysqli_num_rows($pcomments)  ?></div><hr class="class-5">
            <div class="comments-list">
                <?php while ($pcomment = mysqli_fetch_array($pcomments)){ ?>
                <div id="comment-item-1" class="comment">
                    <div class="user-image"><img src="images/profiles/profile-avatar.png" alt=""></div>
                    <div class="comment-username"><?php echo $pcomment['username'] ?></div>
                    <div class="comment-date">۱۲ فروردین ۱۳۹۶</div>
                    <div class="comment-text"><p><?php echo $pcomment['comment_text'] ?></p></div>

                    <?php if ($pcomment['comment_answer']) {  ?>
                    <div class="comment-answer"><?php echo $pcomment['comment_answer'] ?></div>
                    <?php } ?>
                </div>

                <?php } ?>
            </div>
            <form action="product.php?product-id=<?php echo $product_id ?>" method="post">
                <?php if ($message){                                           //error box codes(important)
                    ?>
                    <div class="success-message"><?php echo $message; ?></div>
                <?php } if ($error){ ?>
                    <div class="error-message"><?php echo $error ?></div>
                <?php } ?>
                <input type="text" name="username" placeholder="نام ..." required >
                <input type="email" name="email" placeholder="ایمیل ..." required><br>
                <textarea name="comment-text" placeholder="متن نظر شما ..."></textarea><br>
                <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
                <input type="submit" name="add-comment" value="ثبت نظر">
            </form>
        </div>
    </div>

    <div id="sidebar" class="col-lg-3 d-none d-lg-block row">
            <?php if (!is_login()) { ?>
        <div class="users col-12 " >
            <a href="<?php echo PATH; ?>users/login.php" class="login">ورود</a>
            <a href="<?php echo PATH; ?>users/register.php" class="register">ثبت نام</a>
        </div>
            <?php } else { ?>
        <div class="users col-12 " >
            <a href="<?php echo PATH; ?>users/profile" class="show-profile">نمایش پروفایل</a>
        </div>
            <?php } ?>
        
        <div class="sidebar-item">sssss</div>
        <div class="sidebar-item">sssss</div>
        <div class="sidebar-item">sssss</div>
        <div class="sidebar-item">sssss</div>
    </div>
 
</div>

<div class="clear"></div>

        <?php require_once 'sections/footer.php' ?>

</body>
</html>



