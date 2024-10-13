<?php require_once 'inc/config.php'; ?>
<?php
$products = get_products();
//$products = get_limited_products(6);

$cart_items = get_cart_items();
// print_r($cart_items);
$total_cart_price = total_cart_price();

?>
        <?php require_once 'sections/header.php'  ?>

    <!-- <div id="logo">
        <h1><a>سبد خرید</a> </h1>
    </div> -->



<div id="main" class="container row mx-auto" >
    <div id="content" class="col-9" >
      <div class="cart">
        <?php if (!$cart_items) { ?>
          <div style="text-align: center;">سبد خرید شما خالی می باشد. از قسمت <a href="index.php">فروشگاه </a> اقدام به خرید کنید!</div>
        <?php }else { ?>

          <?php if ($message){ ?>
              <div class="success-message"><?php echo $message ?></div>
              <?php }
          if ($error){ ?>
              <div class="error-message"><?php echo $error ?></div>
              <?php } ?>

        <table>
          <tr>
            <th>عکس محصول</th>
            <th>نام محصول</th>
            <th>قیمت</th>
            <th>حذف از سبد کالا</th>
          </tr>
          <?php foreach ($cart_items as $cart_item) { ?>
          <tr>
            <td><img  src="images/<?php echo $cart_item['product_image'] ?>" alt="<?php echo $cart_item['product_image'] ?>"></td>
            <td><?php echo $cart_item['product_name'] ?></td>
            <td><?php echo $cart_item['product_price'] ?> تومان</td>
            <td style="text-align:center;"><a href="?delete-from-cart=<?php echo $cart_item['id'] ?>" onclick="return confirm('آیا می خواهید این محصول را از سبد خرید خذف کنید؟')">حذف محصول</a></td>
          </tr>
          <?php } ?>
        </table>
        <div class="cart-total">جمع سبد خرید: <?php echo $total_cart_price ?> تومان</div>
          <hr class="class-5">
          <?php if (!is_login()){ ?>
            <div style="text-align: center">برای ادامه فرآیند <a href="users/login.php"><strong><em>وارد </em></strong> </a>شوید ویا
              <a style="color: #43A047" href="users/register.php"> <strong><em>ثبت نام</em></strong> </a>کنید.</div>
          <?php }else {
            $user_data = get_userdata();
            ?>
          <h3 style="text-align: center">اطلاعات شما</h3>
          <div class="user-info">
          <table>
            <tr>
              <td>نام شما </td>
              <td><?php echo $user_data['ufname']." ".$user_data['ulname']; ?></td>
            </tr>
            <tr>
              <td>آدرس ایمیل </td>
              <td><?php echo $user_data['user_email'] ?></td>
            </tr>
            <tr>
              <td>شماره تماس </td>
              <td><?php echo $user_data['user_number'] ?></td>
            </tr>
            <tr>
              <td>آدرس پستی </td>
              <td><?php echo $user_data['address'] ?></td>
            </tr>
            <tr>
              <td>کد پستی </td>
              <td><?php echo $user_data['post_code'] ?></td>
            </tr>
          </table>
          <div class="edit-user-cart-info">
            <a style="margin-right:700px; font-size: 10px" href="users/profile/edit-profile.php">ویرایش اطلاعات</a>
          </div>
        </div>

        <form class="" action="cart.php" method="post">
          <input type="hidden" name="user-email" value="<?php echo $user_data['user_email'] ?>">
          <input type="hidden" name="user-number" value="<?php echo $user_data['user_number'] ?>">
          <input type="hidden" name="cart-total" value="<?php echo $total_cart_price ?>">
          <input type="hidden" name="product-ids" value="<?php
          foreach ($cart_items as $cart_item ) {
              echo $cart_item['id'].',';
          }  ?>">
          <input type="submit" name="submit-order" value="اتصال به درگاه پرداخت">
        </form>
      <?php } ?>
    <?php } ?>
      </div>
    </div>

    <div id="sidebar" class="col-lg-3 col-md-12 d-none d-md-block row">
        <?php require_once 'sections/sidebar.php'; ?>
    </div>

</div>
</div>
<div class="clear"></div>

<?php require_once 'sections/footer.php' ?>     

</body>
</html>
