<?php
$bid = $_GET['bid'];
 require('includes/config.php'); 
$sql = "SELECT * FROM book WHERE b_id = '{$bid}'";
$res = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($res);

$amount = $row['b_price'];
session_start();
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_e3c12218285f394d8b916bb52bd",
                  "X-Auth-Token:test_844fe5c4ad62a8c401a84d80768"));
$payload = Array(
    'purpose' => 'online secondhand buying and selling portal',
    'amount' => $amount,
    'phone' => '9999999999',
    'buyer_name' => 'shraddha balsaraf',
    'redirect_url' => 'http://localhost/b-s/success.php?id='.$bid,
    'send_email' => true,
    'webhook' => 'http://www.example.com/webhook/',
    'send_sms' => true,
    'email' => 'shraddhadb1103@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch);
$response=json_decode($response); 

$_SESSION['TID']=$response->payment_request->id;
header('location:'.$response->payment_request->longurl);
die ();
?>