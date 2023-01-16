<?php

session_start();

$file = "pws.json";

$json = json_decode(file_get_contents($file), true);

$pws = array();

$usr_pws = $_POST['password'];

if(is_array($json)){
  $pws = $json;
}

if (isset($pws[0]["pws"])){
    if (password_verify($usr_pws,$pws[0]["pws"])){
        unset($_SESSION['login_error']);
        $_SESSION['auth'] = true;
        header("Location:index.php");
    } else {
        $_SESSION['login_error'] = true;
        header("Location:login.php");
    }
}