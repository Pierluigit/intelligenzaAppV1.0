<?php
///////////////////////////////////
// rec fields table members
///////////////////////////////////
session_start();
require_once("inc.core.connectDB.php");

$idMember = $_POST['idMember'];

$connectDBIntelApp->exec("update members set lostPassCode='', dateRequestRegeneratePass='0000-00-00 00:00:00' where idMember='$idMember' limit 1");
unset($_SESSION['okFormLostPass']);
unset($_SESSION['lostPass']);
// noty
$_SESSION['lostPassTimeExceeded'] = true;
?>