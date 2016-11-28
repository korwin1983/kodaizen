<?php
include_once('../vendor/class/CheckVar.class.php');
// print_r($_POST);

$checkvar = new Checkvar;

$check_last_name = $checkvar->checkName($_POST['last-name'], FALSE);
$check_first_name = $checkvar->checkName($_POST['first-name'], FALSE);
$check_email = $checkvar->checkEmail($_POST['email'], FALSE);
$check_phone = $checkvar->checkPhone($_POST['phone'], TRUE);
$check_message = $checkvar->checkText($_POST['message'], FALSE);

$validate = TRUE;
$error_info ="";

if ($check_last_name['result']) {
  $last_name = $check_last_name['value'];
}
else {
  $validate = FALSE;
  $error_info = "Erreur champ nom: ".$check_last_name['message']."<br>";
}

if ($check_first_name['result']) {
  $first_name = $check_first_name['value'];
}
else {
  $validate = FALSE;
  $error_info = $error_info."Erreur champ prénom: ".$check_first_name['message']."<br>";
}

if ($check_email['result']) {
  $email = $check_email['value'];
}
else {
  $validate = FALSE;
  $error_info = $error_info."Erreur champ e-mail: ".$check_email['message']."<br>";
}

if ($check_phone['result']) {
  $phone = $check_phone['value'];
}
else {
  $validate = FALSE;
  $error_info = $error_info."Erreur champ téléphone: ".$check_phone['message']."<br>";
}

if ($check_message['result']) {
  $message = $check_message['value'];
}
else {
  $validate = FALSE;
  $error_info = $error_info."Erreur champ message: ".$check_message['message']."<br>";
}

if ($validate) {
  $out['result'] = TRUE;


$sujet = "Formulaire de contact kodaizen";
$contenu = $first_name." ".$last_name."<br>".$phone."<br>".$email."<br>".$message;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail('guillaume.cartie@gmail.com', $sujet, $contenu, $headers);


}
else {
  $out['result'] = FALSE;
  $out['info'] = $error_info;
}
// print_r($out);
echo json_encode($out);


 ?>
