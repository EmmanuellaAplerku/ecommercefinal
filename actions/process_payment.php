<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';


//get reference
$reference = $_GET['reference'];
// $user_id = $_SESSION['customer_id'];
// echo $user_id;
// exit();

if ($reference === "") {
  echo "<script>window.history.back</script>";
}


 $curl = curl_init();
 
 curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
     "Authorization: Bearer sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088",
     "Cache-Control: no-cache",
   ),
 ));

 // get the response and store
 $response = curl_exec($curl);
 // if there are any errors
 $err = curl_error($curl);
// close the session
 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   echo $response;
 }

 // convert the response to PHP object
$decodedResponse = json_decode($response);

if (isset($decodedResponse->data->status) && $decodedResponse->data->status == 'success') {
  $user_id = $_SESSION['customer_id'];
  $invoice_no = floor(mt_rand(100, 1000));
  $order_date = $decodedResponse->data->created_at;
  $current_paystack = $decodedResponse->data->currency;
  $amount_paystack = $decodedResponse->data->amount;
  $order_status = 'pending';
  $payment_date = $decodedResponse->data->paid_at;

  // strip T and Z from paystack date to add to database
  $text = $order_date;
  $replacements = [
      "T" => " ",
      "Z" => " ",
  ];
  $newDate = strtr($text, $replacements);

  // strip T and Z from paystack date to add to database
  $text2 = $payment_date;
  $replacements2 = [
      "T" => " ",
      "Z" => " ",
  ];
  $newPaymentDate = strtr($text2, $replacements2);

  $add_order = add_order_controller($user_id, $invoice_no, $newDate, $order_status);

  if ($add_order) {
      //get current item from orders
      $recent_order = get_last_order_controller();
      $cart = select_all_cart_ctr($user_id);
      foreach ($cart as $item) {
          $add_OrderDetails = add_order_details_controller($recent_order['currentOrder'], $item['product_id'], $item['qty']);
      }

      $add_Payment = payment_cart_controller($amount_paystack, $user_id, $recent_order['currentOrder'], $current_paystack, $newPaymentDate);

      if ($add_Payment) {
          $clearCart = clear_cart_controller($user_id);
          if ($clearCart) {
              header("Location: ../view/customer_entries.php");
          } else {
              echo "Cart Clearance Failed";
          }
      } else {
          echo "Payment Failed";
      }
  } else {
      echo "Order not Added";
  }
} else {
  echo "<script>window.location.href(../View/paymentFailed.php);</script>";
}
