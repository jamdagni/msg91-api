<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style media="screen">
      .form{
        margin-top:20ch;
        background:wheat;
        text-align:center;
        border-radius: 10%;
      }
    </style>
  </head>
  <body>
    <form method="post" style="width:50ch;margin:auto">
      <div class="p-2 form">
        <div class="row">
          <div class="col">
            <h6 class="mb-2">enter you phone number</h6>
            <input type="text" name="number" value="" placeholder="number">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col">
            <input type="text" name="input_otp" value="" placeholder="enter otp">
          </div>
        </div>
        <button class="btn btn-info mt-2" type="submit" name="otp">submit</button>
      </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php

$authKey = "345532AxIMn8Dx5f96bdf4P1";
$senderId = "123456";

if (isset($_POST['otp'])) {
  $mobile = '91'.$_POST['number'];
  $otp = $_POST['input_otp'];

//API URL
//$url="http://control.msg91.com/api/verifyRequestOTP.php?authkey=$authKey&mobile=$mobile&otp=$otp";
//$url = "https://api.msg91.com/api/v5/otp/verify?otp=8620&authkey=345532AxIMn8Dx5f96bdf4P1&mobile=919711410586";
$curl1 = curl_init();

curl_setopt_array($curl1, array(
  CURLOPT_URL => "https://api.msg91.com/api/v5/otp/verify?otp=$otp&authkey=$authKey&mobile=$mobile",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => '',
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response1 = curl_exec($curl1);
$err1 = curl_error($curl1);

curl_close($curl1);

if ($err1) {
  echo "cURL Error #:" . $err1;
} else {
  echo $response1;
}
}
 ?>
