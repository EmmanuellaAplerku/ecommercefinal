<?php

//get reference
// $refnumber = $GET['reference'];


 $curl = curl_init();
 
 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.paystack.co/transaction/verify/:$refnumber",
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
     "Authorization: Bearer sk_test_74da77c6fdee6596925a318bfc3421b8f55a919f",
     "Cache-Control: no-cache",
   ),
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   echo $response;
 }
  
?>