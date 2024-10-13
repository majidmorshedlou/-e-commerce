<?php
require_once 'config.php';
///////////////register///////////////
function register_user($username, $username_2, $email, $password, $hash)
{

    global $db;

    $query = mysqli_query($db, "INSERT INTO users (ufname, ulname, user_email, user_password,hash)
                                  VALUES ('$username','$username_2','$email','$password','$hash')"); //Insert data from UI
    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////////User login///////////////

function login_user($email, $password)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM users WHERE user_email = '$email' AND user_password= '$password'");
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
}

///////////////User login session//////////////////
function is_login()
{
    if (isset($_SESSION['user-email'])) {
        return true;
    } else {
        return false;
    }
}
/////////Directory function//////////
function redirect($url)
{

    header("Location: " . $url);
}
/////////////////User log out/////////////////////

function user_logout()
{

    unset($_SESSION['user-email']);
}
//////////////Admin name at top////////////////
function get_userdata()
{
    global $db;
    $email = $_SESSION['user-email'];
    $query = mysqli_query($db, "SELECT * FROM users WHERE user_email='$email'");
    return mysqli_fetch_array($query);
}
/////////////////Admin login section//////////////////////

function admin_login($username, $password)
{
    if ($username == ADMIN_USERNAME && $password == ADMIN_PASSWORD) {
        return true;
    } else {
        return false;
    }
}

//////////////////Admin log in session//////////////
function admin_islogin()
{
    if (isset($_SESSION['admin-login'])) {
        return true;
    } else {
        return false;
    }
}
/////////////////admin log out///////////////////////
function admin_logout()
{
    unset($_SESSION['admin-login']);
}
///////////////////Adding Products by admin////////////////////

function add_product($product_name, $product_price, $product_cat, $product_count, $product_seller, $product_color, $product_guarantee, $product_desc, $image_name, $image_tmp)
{   ////

    global $db;

    move_uploaded_file($image_tmp, '../images/' . $image_name);
    $query =  mysqli_query($db, "INSERT INTO products (product_name, product_price, product_cat,product_count ,product_seller ,product_color,product_guarantee,product_image, product_desc)
                        VALUES ('$product_name', '$product_price', '$product_cat', '$product_count', '$product_seller', '$product_color','$product_guarantee','$image_name', '$product_desc')"); ////, '$image_name','$image_temp'
    if ($query) {
        return true;
    } else {
        return false;
    }
}

/////////////////Getting products from DB by admin. Also show products in main page//////////////////////
function get_products($limit = 0)
{
    global $db;
    if ($limit == 0) {
        $query = mysqli_query($db, "SELECT * FROM products  ORDER BY id DESC");
    } else {
        $query = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT $limit");
    }
    return $query;
}

//function get_limited_products($limit){
//    global $db;
//    $query = mysqli_query($db, "SELECT * FROM products ORDER BY id DESC LIMIT $limit");
//    return $query;
//}
/////////////////Delete from products by admin////////////////////////
function delete_product($product_id)
{
    global $db;
    $query = mysqli_query($db, "DELETE FROM products WHERE id = '$product_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
/////////////////////Add category by admin/////////////////////
function add_cat($cat_name)
{
    global $db;
    $query = mysqli_query($db, "INSERT INTO products_cat (cat_name) VALUES ('$cat_name')");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
/////////////Show category to admin/////////////////
function get_cats()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM products_cat ORDER BY id DESC ");
    return $query;
}
////////////////Delete category by admin////////////////////////
function delete_cat($cat_id)
{
    global $db;
    $query = mysqli_query($db, "DELETE FROM products_cat WHERE id = '$cat_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////////Show users to admin///////////////
function get_users()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM users ORDER BY uid DESC ");
    return $query;
}

/////////////Delete users by admin////////////////

function delete_user($user_id)
{
    global $db;
    $query = mysqli_query($db, "DELETE FROM users WHERE uid = '$user_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}

////////////Product main page//////////This function also used in cart section
function get_product_by_id($product_id, $is_array = false)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM products WHERE id = $product_id");
    if ($is_array == true) {
        return mysqli_fetch_array($query);
    } else {
        return $query;
    }
}
//////////Product name for cart section/////////////////
// function get_product_by_id_array($product_id){
//   global $db;
//   $query = mysqli_query($db, "SELECT * FROM products WHERE id = $product_id");
//   return mysqli_fetch_array($query);
// }
function get_product_by_cat($product_cat, $is_array = false)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM products WHERE product_cat = $product_cat");
    if ($is_array == true) {
        return mysqli_fetch_array($query);
    } else {
        return $query;
    }
}
/////////Add comment by user///////////
function add_comment($username, $email, $comment_text, $id)
{
    global $db;
    $query = mysqli_query($db, "INSERT INTO comments (username, users_email, comment_text, product_id)
                                VALUES ('$username', '$email','$comment_text', '$id')");
    return $query;
}
///////////////
function get_comment_by_product_id($product_id)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM comments WHERE product_id = '$product_id' AND is_approved='1' ORDER BY id DESC ");
    return $query;
}

///////////////Get comments//////////////////
function get_comments()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM comments where is_approved = '0' ORDER BY id ASC ");
    return $query;
}
//////////////Confirm comment//////////////////
function approve_comment($comment_id)
{
    global $db;
    $query = mysqli_query($db, "UPDATE comments SET is_approved = '1' WHERE id = '$comment_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
////////////Delete comment///////////////////
function delete_comment($comment_id)
{
    global $db;
    $query = mysqli_query($db, "DELETE  FROM  comments WHERE id = '$comment_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////Answer to comment/////////////////
function add_answer($answer, $comment_id)
{
    global $db;
    $query = mysqli_query($db, "UPDATE comments SET comment_answer ='$answer', is_approved ='1' WHERE id = '$comment_id'");
    return $query;
}

////////////Update and edit product values by admin//////////////
function update_product(
    $product_name,
    $product_price,
    $product_cat,
    $product_count,
    $product_seller,
    $product_color,
    $product_guarantee,
    $product_desc,
    $product_id,
    $product_image,
    $image_tmp = null
) {  //////product_id also needed and input hidden is for this product_id
    global $db;
    if (!isset($image_tmp)) {
        $query = mysqli_query($db, "UPDATE products SET product_name='$product_name',product_price='$product_price',product_cat='$product_cat',
            product_count='$product_count',product_seller='$product_seller',product_color='$product_color', product_guarantee='$product_guarantee', 
            product_image ='$product_image',product_desc='$product_desc' WHERE id = '$product_id'");
    } else {
        move_uploaded_file($image_tmp, '../images/' . $product_image);
        $query = mysqli_query($db, "UPDATE products SET product_name='$product_name',product_price='$product_price',product_cat='$product_cat',
            product_count='$product_count',product_seller='$product_seller',product_color='$product_color', product_guarantee='$product_guarantee',
            product_image ='$product_image',product_desc='$product_desc' WHERE id = '$product_id'");
    }
    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////SUPPORT///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
function login_support($email, $password)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM supports WHERE support_email = '$email' AND support_password= '$password'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}

function sup_is_login()
{

    if (isset($_SESSION['support-email'])) {
        return true;
    } else {
        return false;
    }
}

function support_logout()
{

    unset($_SESSION['support-email']);
}

/////////////////////////////////////
function add_support($sfname, $slname, $support_code, $support_phone, $support_email, $support_gender, $image_name, $image_tmp, $password)
{

    global $db;
    //////
    move_uploaded_file($image_tmp, '../images/supports/' . $image_name);
    $query =  mysqli_query($db, "INSERT INTO supports (sfname,slname,support_code,support_phone,support_email,support_gender,support_image,support_password)
                        VALUES ('$sfname', '$slname', '$support_code', '$support_phone', '$support_email', '$support_gender','$image_name','$password')"); ////, '$image_name','$image_temp'
    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////Show supps to admin
function get_supports()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM supports ORDER BY id DESC ");
    return $query;
}
/////////////////
function get_support_by_id($support_id, $is_array = false)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM supports WHERE id = $support_id");
    if ($is_array == true) {
        return mysqli_fetch_array($query);
    } else {
        return $query;
    }
}

/////////////////Update and edit support values by admin///////////////////
function update_support(
    $sfname,
    $slname,
    $support_code,
    $support_phone,
    $support_email,
    $support_gender,
    $support_id,
    $support_image,
    $image_tmp = null
) {  //////product_id also needed and input hidden is for this product_id
    global $db;
    if (!isset($image_tmp)) {
        $query = mysqli_query($db, "UPDATE supports SET sfname='$sfname',slname='$slname',support_code='$support_code',
            support_phone='$support_phone',support_email='$support_email',support_gender='$support_gender', support_image ='$support_image'
            WHERE id = '$support_id'");
    } else {
        move_uploaded_file($image_tmp, '../images/supports/' . $support_image);
        $query = mysqli_query($db, "UPDATE supports SET sfname='$sfname',slname='$slname',support_code='$support_code',
            support_phone='$support_phone',support_email='$support_email',support_gender='$support_gender', support_image ='$support_image'
        WHERE id = '$support_id'");
    }
    if ($query) {
        return true;
    } else {
        return false;
    }
}
/////////////Delete supports by admin////////////////
function delete_support($support_id)
{
    global $db;
    $query = mysqli_query($db, "DELETE FROM supports WHERE id = '$support_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}

// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////STOREKEEPER///////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
// ///////////////////////////////////////////////////////////////////////////////////
function login_storekeeper($email, $password)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM store WHERE storekeeper_email = '$email' AND storekeeper_password= '$password'");
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
}

function storekeeper_is_login()
{

    if (isset($_SESSION['storekeeper-email'])) {
        return true;
    } else {
        return false;
    }
}

function storekeeper_logout()
{

    unset($_SESSION['storekeeper-email']);
}
////////////////////
function add_storekeeper($kfname, $klname, $storekeeper_code, $storekeeper_phone, $storekeeper_email, $image_name, $image_tmp, $password)
{

    global $db;
    //////
    move_uploaded_file($image_tmp, '../images/store/' . $image_name);
    $query =  mysqli_query($db, "INSERT INTO store (kfname,klname,storekeeper_code,storekeeper_phone,storekeeper_email,storekeeper_image,storekeeper_password)
                        VALUES ('$kfname', '$klname', '$storekeeper_code', '$storekeeper_phone', '$storekeeper_email','$image_name','$password')"); ////, '$image_name','$image_temp'
    if ($query) {
        return true;
    } else {
        return false;
    }
}
/////////////////////////////
function get_storekeeper_by_id($storekeeper_id, $is_array = false)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM store WHERE id = $storekeeper_id");
    if ($is_array == true) {
        return mysqli_fetch_array($query);
    } else {
        return $query;
    }
}
/////////
function get_storekeepers()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM store ORDER BY id DESC ");
    return $query;
}
////////////////////////
function update_storekeeper(
    $kfname,
    $klname,
    $storekeeper_code,
    $storekeeper_phone,
    $storekeeper_email,
    $storekeeper_id,
    $storekeeper_image,
    $image_tmp = null
) {  //////product_id also needed and input hidden is for this product_id
    global $db;
    if (!isset($image_tmp)) {
        $query = mysqli_query($db, "UPDATE store SET kfname='$kfname',klname='$klname',storekeeper_code='$storekeeper_code',
            storekeeper_phone='$storekeeper_phone',storekeeper_email='$storekeeper_email', storekeeper_image ='$storekeeper_image'
            WHERE id = '$storekeeper_id'");
    } else {
        move_uploaded_file($image_tmp, '../images/store/' . $storekeeper_image);
        $query = mysqli_query($db, "UPDATE store SET kfname='$kfname',klname='$klname',storekeeper_code='$storekeeper_code',
            storekeeper_phone='$storekeeper_phone',storekeeper_email='$storekeeper_email', storekeeper_image ='$storekeeper_image'
        WHERE id = '$storekeeper_id'");
    }
    if ($query) {
        return true;
    } else {
        return false;
    }
}
////////////////////////
function delete_storekeeper($storekeeper_id)
{
    global $db;
    $query = mysqli_query($db, "DELETE FROM store WHERE id = '$storekeeper_id'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////STOREKEEPER///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////Update and edit users by themselves///////////////////
function update_user($ufname, $ulname, $username, $address, $post_code, $user_number, $bio, $social, $interest, $user_email, $user_image, $image_tmp = null)
{
    global $db;
    if (!isset($image_tmp)) {
        $query = mysqli_query($db, "UPDATE users SET ufname='$ufname', ulname='$ulname',username='$username', address='$address', post_code='$post_code', user_number='$user_number',bio='$bio', social='$social',interest = '$interest', user_image='$user_image' WHERE user_email = '$user_email'");
    } else {
        move_uploaded_file($image_tmp, '../../images/profiles/' . $user_image);
        $query = mysqli_query($db, "UPDATE users SET ufname='$ufname', ulname='$ulname', username='$username',  address='$address', post_code='$post_code', user_number='$user_number',bio='$bio', social='$social', interest = '$interest', user_image='$user_image' WHERE user_email = '$user_email'");
    }

    if ($query) {
        return true;
    } else {
        return false;
    }
}
///////////Create cart and add products//////////////
function add_to_cart($ip_address, $product_id)
{
    global $db;
    $ip = $_SERVER['REMOTE_ADDR'];
    $check = mysqli_query($db, "SELECT * FROM cart WHERE product_id='$product_id' AND ip_address='$ip'"); //For stop repeating in cart
    if (mysqli_num_rows($check) > 0) {
        return true;
    }

    $query = mysqli_query($db, "INSERT INTO cart (ip_address,product_id) VALUES ('$ip_address','$product_id')");
    if ($query) {
        return true;
    } else {
        return false;
    }
}

////////////Show cart items to user////////////
function get_cart_items()
{
    global $db;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $query = mysqli_query($db, "SELECT * FROM cart WHERE ip_address='$ip_address'");

    $product_ids = array();
    while ($row = mysqli_fetch_array($query)) {
        $product_ids[] = $row['product_id'];
    }

    $products = array();
    foreach ($product_ids as $product_id) {
        $products[] = get_product_by_id($product_id, true);
    }
    return $products;
}
/////////////Cart total price with sub +//////////////
function total_cart_price()
{
    $total_cart_price = 0;
    $cart_items = get_cart_items();
    foreach ($cart_items as $cart_item) {
        $total_cart_price += $cart_item['product_price'];
    }
    return $total_cart_price;
}
///////////Delete from cart by user//////////////
function delete_from_cart($product_id)
{
    global $db;
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $query = mysqli_query($db, "DELETE FROM cart WHERE product_id='$product_id' AND ip_address='$ip_address'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
/////////////Ordering phase//////////////
//function submit_order($email, $product_ids){
//  global $db;
//  // $ids = explode( ',' ,$product_ids, -1);
//  $order_id = 'SYW-'.time();
//   $query = mysqli_query($db, "INSERT INTO orders (order_id, product_id, use_email)
//                          VALUES ('$order_id', '$product_ids', '$email')");
//}

//////////
function get_user_orders()
{
    $email = $_SESSION['user-email'];
    global $db;
    $query = mysqli_query($db, "SELECT * FROM orders WHERE use_email='$email'");
    $orders = array();
    while ($row = mysqli_fetch_array($query)) {
        $orders[] = $row;
    }
    return $orders;
}
///////////////////////
function get_order_items($order_id)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM orders WHERE order_id='$order_id'");

    while ($row = mysqli_fetch_array($query)) {
        $items = explode(',', $row['product_id'], -1);
    }

    $products = array();
    foreach ($items as $item) {
        $products[] = get_product_by_id($item, true);
    }

    return $products;
}
//
function get_orders()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM orders ORDER BY id DESC");
    $orders = array();
    while ($row = mysqli_fetch_array($query)) {
        $orders[] = $row;
    }
    return $orders;
}
//
// function submit_order($email, $product_ids){
//
// }
//
function pay($Amount, $Email, $Mobile, $product_ids)
{
    $MerchantID = 'c79070ee-6c8e-467c-9237-011432379056'; //Required
    $Description = 'خرید از فروشگاه دایِرشاپ'; // Required
    $CallbackURL = 'http://www.direshop.ir/verify.php'; // Required


    $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentRequest(
        [
            'MerchantID' => $MerchantID,
            'Amount' => $Amount,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $CallbackURL,
        ]
    );

    //Redirect to URL You can do it also by creating a form
    if ($result->Status == 100) {
        global $db;
        // $ids = explode( ',' ,$product_ids, -1);

        $order_id = 'SYW-' . time();
        $authority = $result->Authority;
        $query = mysqli_query($db, "INSERT INTO orders (order_id,order_total, product_id, use_email,authority)
                          VALUES ('$order_id','$Amount', '$product_ids', '$Email','$authority')");
        Header('Location: https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
        //برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
        //Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
    } else {
        echo 'ERR: ' . $result->Status;
    }
}
//
function get_order_by_authority($authority)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM orders WHERE authority='$authority'");
    return mysqli_fetch_array($query);
}
//
function final_pay($authority, $ref_id)
{
    global $db;
    $query = mysqli_query($db, "UPDATE orders SET is_paid='1', ref_id='$ref_id' WHERE authority='$authority'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
//
function clear_cart()
{
    global $db;
    $ip = $_SERVER['REMOTE_ADDR'];
    $query = mysqli_query($db, "DELETE FROM cart WHERE ip_address='$ip'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
//
function check_user($email)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM users WHERE user_email='$email'");
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
}
//
function reset_password($password, $email, $hash)
{
    global $db;
    $query = mysqli_query($db, "UPDATE users SET user_password='$password' WHERE user_email='$email' AND hash='$hash'");
    if ($query) {
        return true;
    } else {
        return false;
    }
}
//
function send_email($email)
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM users WHERE user_email='$email'");
    $fetch = mysqli_fetch_array($query);
    $user_hash = $fetch['hash'];
    $to = $email;
    $subject = "لینک بازیابی کلمه عبور دایِرشاپ";
    $txt = "برای بازیابی کلمه‌ی عبور خود، روی لینک زیر کلیک کنید:";
    $txt .= "<br>" . "<a href='http://direshop.ir/users/reset.php?email=" . $email . "&hash=" . $user_hash . "'>بازیابی کلمه عبور</a>";
    $headers = "From: info@direshop.ir";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    if (mail($to, $subject, $txt, $headers)) {
        return true;
    } else {
        return false;
    }
}
//search
if (isset($_GET["search"])) {
    function search()
    {
        global $db;
        $searchText = $_GET["search"];
        // $userId =   getUserId();
        $searchResult = mysqli_query($db, "SELECT * FROM products WHERE product_name LIKE '%$searchText%'");

        $resultArray = [];
        while ($searchResults = mysqli_fetch_array($searchResult)) {
            $resultArray[] = $searchResults;
        }
        if (!$resultArray) {
            // setMessege("یادداشتی یافت نشد!!!");

        } else {
            return $resultArray;
            // print_r ($resultArray);

        }
    }
}
