<?php

function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$input_name=test_input($_POST['name']);
$input_email=test_input($_POST['email']);
$input_phone=test_input($_POST['phone']);

$match_name=true;
$valid_mail=true;
$match_phone=true;
$error_redirect_url="location:index.php?";
if(!preg_match("/^[\x{0600}-\x{06FF}a-zA-Z ]*$/u",$input_name)){
    $match_name=false;
    $error_redirect_url.="nerr=1&";
}else{
    $error_redirect_url.="nerr=0&";
}

if(!filter_var($input_email,FILTER_VALIDATE_EMAIL)){
    $valid_mail=false;
    $error_redirect_url.="emerr=1&";
}else{
    $error_redirect_url.="emerr=0&";
    $email_array=explode('.',$input_email);
    $email_index=count($email_array)-1;
    $email_ext=$email_array[$email_index];
    $allowed_ext=array("com","eg","org");
    if(!in_array($email_ext,$allowed_ext)){
        $valid_mail=false;
        $error_redirect_url.="exterr=1&";
    }else{
        $error_redirect_url.="exterr=0&";
    }

}

if(!preg_match("/^[0-9]*$/",$input_phone) || strlen($input_phone)!=11){
    $match_phone=false;
    $error_redirect_url.="pherr=1";
}else{
    $error_redirect_url.="pherr=0";
}

if($match_name==true && $valid_mail==true && $match_phone==true){
    echo 'Thank you for registration Mr/Mrs '.$input_name;
    exit();
}else{
    header($error_redirect_url);
}
?>