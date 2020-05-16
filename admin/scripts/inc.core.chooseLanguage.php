<?php
session_start();
$anguage = $_POST['lg'];
$_SESSION['chooseLanguage'] = $anguage; 
?>