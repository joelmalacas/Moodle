<?php
session_start();

if(!isset($_SESSION["autenticacao"])){
header("Location: /Moodle/login.html");
exit;
}
?>