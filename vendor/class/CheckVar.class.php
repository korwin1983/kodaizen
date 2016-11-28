<?php
class CheckVar {


  private $_text_pattern = "/^[a-zA-Z éçèêùâà-]+$/";
  private $_email_pattern = "/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/";
  private $_phone_pattern = "/^0[1-68][0-9]{8}$/";
  private $_login_pattern =  "/^[a-zA-Z-_]+$/";
  private $_numeric_pattern = "/^0[1-68][0-9]{8}$/";

  public function checkText($var, $empty){
    if (isset($var) && (strlen(trim($var)) > 0)) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
    }
    else {
      if ($empty) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable est non définie ou vide.";
      }

    }
    return $out;
  }

  public function checkName($var, $empty){
    if (isset($var) && (strlen(trim($var)) > 0)) {
      if ((strlen(trim($var)) < 30)) {
        if (preg_match("/^[a-zA-Z éçèêùâà-]+$/", $var)) {
          $out['result'] = TRUE;
          $out['value'] = htmlspecialchars($var);
        }
        else {
          $out['result'] = FALSE;
          $out['message'] = "Format incorrect.";
        }

      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable contient trop de charactères.";
      }
    }
    else {
      if ($empty) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable est non définie ou vide.";
      }

    }
    return $out;
  }

  public function checkLogin($var){
    if (isset($var) && (strlen(trim($var)) > 0)) {
      if ((strlen(trim($var)) < 20)) {
        if (preg_match("/^[a-zA-Z0-9-_]+$/", $var)) {
          $out['result'] = TRUE;
          $out['value'] = htmlspecialchars($var);
        }
        else {
          $out['result'] = FALSE;
          $out['message'] = "Format incorrect.<br>";
        }
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable contient trop de charactères.";
      }
    }
    else {
      $out['result'] = FALSE;
      $out['message'] = "La variable est non définie ou vide.";
    }
    return $out;
  }

  public function checkPassword($var){
    if (isset($var) && (strlen(trim($var)) >= 8)) {
      if ((strlen(trim($var)) <= 15)) {
        if (preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)([\w]{8,15})$/", $var)) {
          $out['result'] = TRUE;
          $out['value'] = htmlspecialchars($var);
        }
        else {
          $out['result'] = FALSE;
          $out['message'] = "Format incorrect.";
        }
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable contient trop de charactères.";
      }
    }
    else {
      $out['result'] = FALSE;
      $out['message'] = "La variable doit contenir au minimum 8 charactères.";
    }
    return $out;
  }



  public function checkEmail($var, $empty){
    if (isset($var) && (strlen(trim($var)) > 0)) {
      if (preg_match("/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $var)) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "Format incorrect.";
      }
    }
    else {
      if ($empty) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable est non définie ou vide.";
      }

    }
    return $out;
  }

  public function checkPhone($var, $empty){

    if (isset($var) && (strlen(trim($var)) > 0)) {
      if (preg_match("/^0[1-68][0-9]{8}$/", $var)) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "Format incorrect.";
      }
    }
    else {
      if ($empty) {
        $out['result'] = TRUE;
        $out['value'] = htmlspecialchars($var);
      }
      else {
        $out['result'] = FALSE;
        $out['message'] = "La variable est non définie ou vide.";
      }

    }
    return $out;
  }
}
?>
