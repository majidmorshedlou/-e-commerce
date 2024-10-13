<?php
require_once 'inc/config.php';
//$products = get_limited_products(6);
require_once 'sections/header.php';
?>

<div class="container row mx-auto">
    <div id="content" class="col-lg-9 col-md-12 ">
        <div id="products" class="row">

            <?php $products = search();
            if (!$products) {
                echo ' no match';
            } else {
                foreach ($products as $product) {
            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="product-item">
                            <div class="product-image"><a href="product.php?product-id=<?php echo $product['id'] ?>"><img src="images/<?php echo $product['product_image'] ?>" alt=""></a></div>
                            <div class="product-title"><a href="product.php?product-id=<?php echo $product['id'] ?>"><?php echo $product['product_name'] ?></a></div>
                            <div class="product-price"><?php echo $product['product_price'] ?> تومان</div>
                            <div class="read-more"><a href="product.php?product-id=<?php echo $product['id'] ?>">جزئیات...</a></div>
                        </div>
                    </div>            
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div id="sidebar" class="col-lg-3 col-md-12 d-none d-md-block row">
        <?php require_once 'sections/sidebar.php'; ?>
    </div>



</div>

<div class="clear"></div>

<?php require_once 'sections/footer.php' ?>

</body>

</html>