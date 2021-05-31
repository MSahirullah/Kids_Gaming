<?php
session_start();
$_SESSION = array();
unset($_SESSION);

if (session_destroy()) {
   header("Location: login.php");
}
