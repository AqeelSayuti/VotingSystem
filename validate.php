<?php
if(isset($_POST['g-recaptcha-response']))
{
    $secretkey = "6LfnycQeAAAAAJecD-vxYAlQK45xSoOCZf6U8qkk";
    $ip = $_SERVER['REMOTE_ADDR'];
    $response = $_POST['g-recaptcha-response'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret-$secretkey&response-$response&remoteip-$ip";
    $fire = file_get_contents($url);
    $data = json_decode($fire);
    if($data-> success==true){
        echo "Success";
    }
    else {
        echo "Please tick Recaptcha";
    }
}
    else{
    echo "Recaptcha error";
}
?>