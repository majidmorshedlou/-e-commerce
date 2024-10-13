

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css">
    <title>تایید تراکنش پرداخت</title>
</head>
<body>
    <?php
    require_once 'inc/config.php';
    $MerchantID = 'c79070ee-6c8e-467c-9237-011432379056';
    $Authority = $_GET['Authority'];
    $order_data = get_order_by_authority($Authority);
    clear_cart();
    $Amount = $order_data['order_total']; //Amount will be based on Toman
    if ($_GET['Status'] == 'OK') {
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentVerification(
            [
                'MerchantID' => $MerchantID,
                'Authority' => $Authority,
                'Amount' => $Amount,
            ]
    );

    if ($result->Status == 100) {
        $ref_id = $result->RefID;
        if(final_pay($Authority,$ref_id)) {
            ?>
            <div class="final-pay">
            <?php
            echo 'پرداخت با موفقیت انجام شد!کد رهگیری:' . $result->RefID;
            echo "<br>";
            echo 'مبلغ تراکنش: '. $order_data['order_total'] . 'تومان';
            echo "<br>";
            echo "<a href='" . PATH . "'>بازگشت به صفحه اصلی فروشگاه</a>";
            ?>
            </div>
            <?php
        }
    } else {
        echo 'خطایی پیش آمده است!'.$result->Status;
    }
} else {
    echo 'عملیات توسط کاربر لغو شده است!';
}
?>

</body>
</html>