<?php
$products = get_products();
?>

<div class="sidebar-content">
    <div class="col-12  row mx-auto">
    <?php if (!is_login()) { ?>
            <div class="users col-xl-6 col-lg-12 ">
                <a href="<?php echo PATH; ?>users/login.php" class="login">ورود</a>
            </div>
            <div class="users col-xl-6 col-lg-12 ">
                <a href="<?php echo PATH; ?>users/register.php" class="register">ثبت‌نام</a>
            </div>
    </div>
<?php } else { ?>

    <div class="users col-xl-12 col-lg-12 ">
        <a href="<?php echo PATH; ?>users/profile" class="show-profile"> پروفایل</a>
    </div>
<?php } ?>
</div>
<div class="sidebar-item">
    <ul>
        <?php while ($sidebar_product = mysqli_fetch_array($products)) { ?>
            <li><a href="product.php?product-id=<?php echo $sidebar_product['id'] ?>">
                    <img src="<?php echo PATH ?>images/<?php echo $sidebar_product['product_image'] ?>" alt="<?php echo $sidebar_product['product_name'] ?>">
                    <?php echo $sidebar_product['product_name'] ?></a></li>
            <div class="clear"></div>
        <?php } ?>
    </ul>
</div>
</div>