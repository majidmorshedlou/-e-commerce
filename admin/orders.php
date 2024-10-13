<?php
require_once '../inc/config.php';
if (!admin_islogin()){
    redirect("login.php");
}
$orders = get_orders()

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> مدیریت سفارشات</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
<div id="main">
    <h1 class="title">مدیریت سفارشات</h1>
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
    <div class="content"style="padding: 10px;box-sizing: border-box">
    <?php foreach ($orders as $order) { 
      $products = get_order_items($order['order_id']) ?>  
      <div class="order-item">
      
        <?php if ($order['is_paid'] == 1) { ?>
          
                
                <div class="order-id-paid"><?php  echo $order['order_id'] ?><br>
                    <div class="paid">پرداخت شده</div>
                    <span style= "font-size : 0.9em"><?php echo $order['use_email']  ?></span>
                </div>

            <?php }else{ ?>
                
                <div class="order-id-not-paid"><?php  echo $order['order_id'] ?><br>
                    <div class="not-paid">پرداخت نشده</div>
                    <span style= "font-size : 0.9em"><?php echo $order['use_email']  ?></span>
                </div>

            <?php } ?>

        <table>
          <tr>
            <th>نام محصول</th>
            <th>قیمت محصول</th>
          </tr>
            <?php $price = 0;
            foreach ($products as $product) { ?>
              
          <tr>
            <td><?php echo $product['product_name']  ?></td>
            <td><?php echo $product['product_price']  ?></td>  
          </tr>
            <?php 
            $price =$price + $product['product_price'];
            } ?>
        </table>
        
        <div class="cart-total">جمع سبد خرید: <?php echo $price ?> تومان</div>
      </div>
      <hr class="class-5">
      <?php } ?>
    </div>
</div>
</body>
</html>
