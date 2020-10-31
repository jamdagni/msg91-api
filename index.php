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
        <div class="row mt-2">
          <div class="col">
            <h6 class="mb-2">Message</h6>
            <textarea rows="5" cols="25" name="message"></textarea>
          </div>
        </div>
        <button class="btn btn-success" type="submit" name="success">submit</button>
      </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


<?php
// sms integration msg91....
if (isset($_POST['success'])) {
  $mobileNumber = '91'.$_POST['number'];
  $msg = $_POST['message'];

$senderId = "123456";
$flow_id = "5f96dd51bbe7f830f44a0406";
$recipients = array(
    array(
        "mobiles" => "$mobileNumber",
        "name" => "$msg",
    )
);

//Prepare you post parameters
$postData = array(
    "sender" => $senderId,
    "flow_id" => $flow_id,
    "recipients" => $recipients
);
$postDataJson = json_encode($postData);

$url="http://api.msg91.com/api/v5/flow/";

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "$url",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $postDataJson,
    CURLOPT_HTTPHEADER => array(
        "authkey: 345532AxIMn8Dx5f96bdf4P1",
        "content-type: application/json"
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
}
?>
