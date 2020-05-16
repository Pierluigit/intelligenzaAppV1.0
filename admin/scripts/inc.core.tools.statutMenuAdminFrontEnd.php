<?php
session_start();
$menu = $_POST['menu'];
$_SESSION['statutMenuAdminFrontEnd'] = $menu; 
?>