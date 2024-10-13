<?php require_once '../inc/config.php' ?>
<?php
global $message;
global $error;

if (storekeeper_is_login()){
    redirect("index.php");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود به پنل انباردار</title>
    <link rel="stylesheet" href="../styles/styles.css">

    <?php require_once '../sections/header.php' ?>

<div class="forms-box">

    <span id="storekeeper">پنل انباردار</span>
    
    <form action="login.php"method="post">
        <p>ایمیل</p>
        <input type="email" name="email"><br>
        <p>کلمه عبور</p>
        <input type="password" name="password"><br>
        <input type="submit" name="store-do-login" value="ورود به حساب کاربری">
            
            <?php if ($message){ ?>
                <div class="success-message"><?php echo $message ?></div>
            <?php } if ($error){ ?>
                <div class="error-message"><?php echo $error ?></div> 
            <?php } ?>

    </form>
    <p class="note">
          <strong>Storekeeper Login Page</strong>
    </p>
    <p class="note"><a href="#">کلمه عبورم را فراموش کرده‌ام :(</a></p>
</div>

<div class="clear"></div>

        <?php require_once '../sections/footer.php' ?>
        
</body>
</html>