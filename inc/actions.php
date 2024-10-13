<?php
///////////////USer register///////////////
$message = '';
$error = '';

if (isset($_POST['do-register'])) { //Send data to db
    $username = $_POST["fname"];
    $username_2 = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash = 'direhash' . time();
    $password_conf = $_POST["password-conf"]; //password confirmation process
    if ($password != $password_conf) {
        $error = 'گذرواژه و تکرار آن مطابقت ندارند!!';
    } else {
        if (register_user($username, $username_2, $email, md5($password), $hash)) {
            //      if (register_user($username, $username_2, $email, $password))//For errors in register function at top bar we can erase if and use the function alone/ without md5
            $message = 'کاربر به دیتابیس اضافه شد';
        } else {
            $error =  'مشکلی به وجود آمد';
        }
    }
}
///////////////User login///////////////

if (isset($_POST['do-login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    //    $password = $_POST['password'];
    // if (login_user($email, $password)) {
    if (login_user($email, $password)) {
        $message = 'باموفقیت وارد شدید!';
        $_SESSION['user-email'] = $email;
        if (!empty($_POST["remember"])) {
            //COOKIES for username
            setcookie("user_loged_in", $_POST["email"], time() + (10 * 365 * 24 * 60 * 60));
            //COOKIES for password
            setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
        } else {
            if (isset($_COOKIE["user_loged_in"])) {
                setcookie("user_loged_in", "");
                if (isset($_COOKIE["userpassword"])) {
                    setcookie("userpassword", "");
                }
            }
        }
    } else {
        $error = 'ایمیل یا گذرواژه نادرست است!';
    }
}
////////////////////remember me

//////////////////User Logout////////////////////////

if (isset($_GET['logout'])) {


    user_logout();
    redirect("../../index.php");
}
/////////////////Admin login/////////////////////
if (isset($_POST["admin-login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (admin_login($username, $password)) {
        $_SESSION['admin-login'] = $username;
        redirect('index.php');
        $message = 'باموفقیت وارد شدید!';
    } else {
        $error = " نام کاربری یا کلمه عبور اشتباه است!";
    }
}

////////////////////////////////
if (isset($_GET['admin-logout'])) {
    admin_logout();
    redirect("login.php");
}
///////////////Add product to DB///////////////

if (isset($_POST['add-product'])) {

    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_cat = $_POST['product-cat'];
    $product_count = $_POST['product-count'];
    $product_seller = $_POST['product-seller'];
    $product_color = $_POST['product-color'];
    $product_guarantee = $_POST['product-guarantee'];
    $image_name = $_FILES['product-image']['name'];
    $image_tmp = $_FILES['product-image']['tmp_name'];
    $product_desc = $_POST['product-desc'];

    if (add_product($product_name, $product_price, $product_cat, $product_count, $product_seller, $product_color, $product_guarantee, $product_desc, $image_name, $image_tmp)) {

        $message = 'محصول به دیتا بیس اضافه شد!!';
    } else {
        $error =  'مشکلی پیش آمد!!!';
    }
}

/////
/////////////////Delete from products///////////////////////
if (isset($_GET['delete-product-id'])) {
    $product_id = $_GET['delete-product-id'];
    if (delete_product($product_id)) {
        $message = "با موفقیت از دیتابیس حذف گردید!";
    } else {
        $error = "عملیات با مشکل مواجه شد!!";
    }
}
//////////////////////////////////////
if (isset($_POST['add-cat'])) {     ////submit
    $cat_name = $_POST['cat-name'];     ////add text to cat
    if (add_cat($cat_name)) {
        $message = 'دسته بندی به دیتابیس اضافه شد';
    } else {
        $error =  'مشکلی به وجود آمد';
    }
}

///////////////////////////////////////
if (isset($_GET['delete-product-cat'])) {
    $cat_id = $_GET['delete-product-cat'];
    if (delete_cat($cat_id)) {
        $message = "با موفقیت از دیتابیس حذف گردید!";
    } else {
        $error = "عملیات با مشکل مواجه شد!!";
    }
}
///////////////////////////////////////
if (isset($_GET['delete-user'])) {
    $user_id = $_GET['delete-user'];
    if (delete_user($user_id)) {
        $message = "کاربر از دیتابیس حذف گردید";
    } else {
        $error = "مشکلی به وجود آمد!!!";
    }
}

/////////////////////////////////////////
if (isset($_POST['add-comment'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $comment_text = $_POST['comment-text'];
    $id = $_POST['product-id'];
    if (add_comment($username, $email, $comment_text, $id)) {
        $message = 'نظر شما با موفقیت ثبت شد!!!';
    } else {
        $error = 'هنگام ثبت نظر مشکلی پیش آمد!';
    }
}



///////////////////////////////////////
if (isset($_GET['approve-id'])) {
    $comment_id = $_GET['approve-id'];
    if (approve_comment($comment_id)) {
        $message = 'نظر کاربر تایید شد!!';
    } else {
        $error = 'مشکلی پیش آمد!';
    }
}
if (isset($_GET['delete-id'])) {
    $comment_id = $_GET['delete-id'];
    if (delete_comment($comment_id)) {
        $message = "نظر از دیتابیس حذف گردید";
    } else {
        $error = "مشکلی به وجود آمد!!!";
    }
}

if (isset($_POST['add-answer'])) {
    $answer = $_POST['comment-answer'];
    $comment_id = $_POST['comment-id'];
    if (add_answer($answer, $comment_id)) {
        $message = "پاسخ ثبت گردید!";
    } else {
        $error = "مشکلی به وجود آمد!!!";
    }
}
if (isset($_POST['update-product'])) {
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_cat = $_POST['product-cat'];
    $product_count = $_POST['product-count'];
    $product_seller = $_POST['product-seller'];
    $product_color = $_POST['product-color'];
    $product_guarantee = $_POST['product-guarantee'];
    $product_desc = $_POST['product-desc'];
    $product_id = $_POST['product-id']; //input hidden in edit-product

    if (!empty($_FILES['new-product-image']['name'])) {
        $image_name = $_FILES['new-product-image']['name'];
        $image_tmp = $_FILES['new-product-image']['tmp_name'];
        $update_product = update_product(
            $product_name,
            $product_price,
            $product_cat,
            $product_count,
            $product_seller,
            $product_color,
            $product_guarantee,
            $product_desc,
            $product_id,
            $image_name,
            $image_tmp
        );
    } else {
        $product_image = $_POST['product-image'];
        $update_product = update_product(
            $product_name,
            $product_price,
            $product_cat,
            $product_count,
            $product_seller,
            $product_color,
            $product_guarantee,
            $product_desc,
            $product_id,
            $product_image
        );
    }
    if ($update_product) {
        $message = 'محصول با موفقیت بروزرسانی شد!';
    } else {
        $error = 'مشکلی به وجود آمد!';
    }
}
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////SUPPORT///////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
////////////////Sup login/////////////////
if (isset($_POST['sup-do-login'])) {
    $email = $_POST['email'];
    //    $password = md5($_POST['password']);
    $password = $_POST['password'];
    if (login_support($email, $password)) {
        $message = 'باموفقیت وارد شدید!';
        $_SESSION['support-email'] = $email;
    } else {
        $error = 'ایمیل یا گذرواژه نادرست است!';
    }
}
////////////Support logout////////////////
if (isset($_GET['support-logout'])) {


    support_logout();
    redirect("../index.php");
}


/////////Add sup by admin///////////////
if (isset($_POST['add-support'])) {

    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $support_code = $_POST['support-code'];
    $support_phone = $_POST['support-phone'];
    $support_email = $_POST['support-email'];
    $support_gender = $_POST['support-gender'];
    $image_name = $_FILES['support-image']['name'];
    $image_tmp = $_FILES['support-image']['tmp_name'];
    $password = $_POST["password"];
    $password_conf = $_POST["password-conf"]; //password confirmation process
    if ($password != $password_conf) {
        $error = 'گذرواژه و تکرار آن مطابقت ندارند!!';
    } else {

        if (add_support($sfname, $slname, $support_code, $support_phone, $support_email, $support_gender, $image_name, $image_tmp, $password)) {

            $message = 'پشتیبان به دیتا بیس اضافه شد!!';
        } else {
            $error =  'مشکلی به وجود آمد';
        }
    }
}
/////////////////////////
if (isset($_POST['update-support'])) {
    $sfname = $_POST['sfname'];
    $slname = $_POST['slname'];
    $support_code = $_POST['support-code'];
    $support_phone = $_POST['support-phone'];
    $support_email = $_POST['support-email'];
    $support_gender = $_POST['support-gender'];
    $support_id = $_POST['support-id']; //input hidden in edit-support

    if (!empty($_FILES['new-support-image']['name'])) {
        $image_name = $_FILES['new-support-image']['name'];
        $image_tmp = $_FILES['new-support-image']['tmp_name'];
        $update_support = update_support(
            $sfname,
            $slname,
            $support_code,
            $support_phone,
            $support_email,
            $support_gender,
            $support_id,
            $image_name,
            $image_tmp
        );
    } else {
        $support_image = $_POST['support-image'];
        $update_support = update_support(
            $sfname,
            $slname,
            $support_code,
            $support_phone,
            $support_email,
            $support_gender,
            $support_id,
            $support_image
        );
    }
    if ($update_support) {
        $message = 'اطلاعات با موفقیت بروزرسانی شد!';
    } else {
        $error = 'مشکلی به وجود آمد!';
    }
}
/////////////////////////////////////////
if (isset($_GET['delete-support'])) {
    $support_id = $_GET['delete-support'];
    if (delete_support($support_id)) {
        $message = "پشتیبان از دیتابیس حذف گردید";
    } else {
        $error = "مشکلی به وجود آمد!!!";
    }
}

// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////STOREKEEPER///////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['store-do-login'])) {
    $email = $_POST['email'];
    //    $password = md5($_POST['password']);
    $password = $_POST['password'];
    if (login_storekeeper($email, $password)) {
        $message = 'باموفقیت وارد شدید!';
        $_SESSION['storekeeper-email'] = $email;
    } else {
        $error = 'ایمیل یا گذرواژه نادرست است!';
    }
}

if (isset($_GET['storekeeper-logout'])) {


    storekeeper_logout();
    redirect("../index.php");
}
////////////Add storekeeper by admin/////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['add-storekeeper'])) {
    $kfname = $_POST['kfname'];
    $klname = $_POST['klname'];
    $storekeeper_code = $_POST['storekeeper-code'];
    $storekeeper_phone = $_POST['storekeeper-phone'];
    $storekeeper_email = $_POST['storekeeper-email'];
    $image_name = $_FILES['storekeeper-image']['name'];
    $image_tmp = $_FILES['storekeeper-image']['tmp_name'];
    $password = $_POST["password"];
    $password_conf = $_POST["password-conf"]; //password confirmation process
    if ($password != $password_conf) {
        $error = 'گذرواژه و تکرار آن مطابقت ندارند!!';
    } else {
        if (add_storekeeper($kfname, $klname, $storekeeper_code, $storekeeper_phone, $storekeeper_email, $image_name, $image_tmp, $password)) {
            $message = 'انباردار به دیتا بیس اضافه شد!!';
        } else {
            $error =  'مشکلی به وجود آمد!';
        }
    }
}
//////////////////////////////////////
if (isset($_POST['update-storekeeper'])) {
    $kfname = $_POST['kfname'];
    $klname = $_POST['klname'];
    $storekeeper_code = $_POST['storekeeper-code'];
    $storekeeper_phone = $_POST['storekeeper-phone'];
    $storekeeper_email = $_POST['storekeeper-email'];
    $storekeeper_id = $_POST['storekeeper-id']; //input hidden in edit-storekeeper

    if (!empty($_FILES['new-storekeeper-image']['name'])) {
        $image_name = $_FILES['new-storekeeper-image']['name'];
        $image_tmp = $_FILES['new-storekeeper-image']['tmp_name'];
        $update_storekeeper = update_storekeeper(
            $kfname,
            $klname,
            $storekeeper_code,
            $storekeeper_phone,
            $storekeeper_email,
            $storekeeper_id,
            $image_name,
            $image_tmp
        );
    } else {
        $storekeeper_image = $_POST['storekeeper-image'];
        $update_storekeeper = update_storekeeper(
            $kfname,
            $klname,
            $storekeeper_code,
            $storekeeper_phone,
            $storekeeper_email,
            $storekeeper_id,
            $storekeeper_image
        );
    }
    if ($update_storekeeper) {
        $message = 'اطلاعات با موفقیت بروزرسانی شد!';
    } else {
        $error = 'مشکلی به وجود آمد!';
    }
}
/////////////////////////////////////////
if (isset($_GET['delete-storekeeper'])) {
    $storekeeper_id = $_GET['delete-storekeeper'];
    if (delete_storekeeper($storekeeper_id)) {
        $message = "کارمند از دیتابیس حذف گردید";
    } else {
        $error = "مشکلی به وجود آمد!!!";
    }
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////STOREKEEPER///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
////////////////////////////
if (isset($_POST['update-profile'])) {
    $ufname = $_POST['ufname'];
    $ulname = $_POST['ulname'];
    $username = $_POST['username'];
    $address = $_POST['address'];
    $post_code = $_POST['post-code'];
    $user_number = $_POST['user-number'];
    $bio = $_POST['bio'];
    $social = $_POST['social'];
    $interest = $_POST['interest'];
    $user_email = $_POST['user-email'];
    if (!empty($_FILES['new-user-image']['name'])) {
        $image_name = $_FILES['new-user-image']['name'];
        $image_tmp = $_FILES['new-user-image']['tmp_name'];
        $update_user = update_user($ufname, $ulname, $username, $address, $post_code, $user_number, $bio, $social, $interest, $user_email, $image_name, $image_tmp);
    } else {
        $user_image = $_POST['user-image'];
        $update_user = update_user($ufname, $ulname, $username, $address, $post_code, $user_number, $bio, $social, $interest, $user_email, $user_image);
    }
    if ($update_user) {
        $message = ' اطلاعات شما با موفقیت بروزرسانی شد!';
    } else {
        $error = 'مشکلی به وجود آمد!';
    }
}
/////////Cart processes/////////////
if (isset($_GET['add-to-cart'])) {
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $product_id = $_GET['add-to-cart'];
    if (add_to_cart($ip_address, $product_id)) {
        redirect('cart.php');
    }
}
////////////////////////
if (isset($_GET['delete-from-cart'])) {
    $product_id = $_GET['delete-from-cart'];
    if (delete_from_cart($product_id)) {
        $message = 'محصول از سبد حذف گردید!';
    } else {
        $error = 'مشکلی به وجود آمد';
    }
}
///////////////////////
//if (isset($_POST['submit-order'])) {
//  $email = $_POST['user-email'];
//  $product_ids =  $_POST['product-ids'];
//  if (submit_order($email, $product_ids)) {
//    // code...
//  }
//}

if (isset($_POST['submit-order'])) {
    $email = $_POST['user-email'];
    $product_ids = $_POST['product-ids'];
    $amount = $_POST['cart-total'];
    $mobile = $_POST['user-number'];
    pay($amount, $email, $mobile, $product_ids);
}

if (isset($_POST['forgot-password'])) {
    $email = $_POST['email'];
    if (check_user($email)) {
        if (send_email($email)) {
            $message = 'لینک بازیابی کلمه عبور برای شما ارسال شد';
        } else {
            $error = 'خطایی پیش آمده است.';
        }
    } else {
        $error = 'کاربر در سیستم یافت نشد.';
    }
}
