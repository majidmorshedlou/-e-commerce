<?php require_once '../inc/config.php'; ?>
<?php
global $error;
global $message;
if (admin_islogin()) {

    redirect("index.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود فروشندگان</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div id="main">
        <div id="login-page">
            <h2>ورود به پنل فروشنده</h2>
            <form action="login.php" method="post">
                <input type="text" name="username" placeholder="نام کاربری ادمین" required><br>
                <input type="password" name="password" placeholder="گذرواژه" required ><br>
                <input type="submit" name="admin-login" value="ورود به پنل فروشنده" >


                <?php                                                               //error box codes(important)
                if ($message){
                    ?>

                    <div class="success-message"><?php echo $message ?></div>
                    <?php
                }
                if ($error){
                    ?>
                    <div class="error-message"><?php echo $error ?></div>
                    <?php
                }
                ?>



            </form>
        </div>
    </div>
</body>
</html>