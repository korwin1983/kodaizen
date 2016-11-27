<?php
include_once('../vendor/class/CheckVar.class.php');


print_r($_POST);

$checkvar = new Checkvar;

$check_last_name = $checkvar->checkName($_POST['last-name'], FALSE);
$check_first_name = $checkvar->checkName($_POST['first-name'], FALSE);
$check_email = $checkvar->checkEmail($_POST['email'], FALSE);
$check_phone = $checkvar->checkPhone($_POST['phone'], TRUE);
$check_message = $checkvar->checkText($_POST['message'], FALSE);

print_r($check_last_name);
print_r($check_first_name);
print_r($check_email);
print_r($check_phone);
print_r($check_message);

 ?>
