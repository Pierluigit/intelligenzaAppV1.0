<?php
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// rec fields table members
//////////////////////////////////////////////////////////////////////
session_start();
// only if logged
if(!isset($_SESSION['logOk'])) {
	return;
}
require_once("inc.core.connectDB.php"); 
?>
<?php
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// recup post info
//////////////////////////////////////////////////////////////////////
$idMember = $_POST['idMember'];
$field = $_POST['field'];
$value = $_POST['value'];

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// remove special characters of value
//////////////////////////////////////////////////////////////////////
require_once("inc.core.antiHack.php");

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// remove bad words of value
//////////////////////////////////////////////////////////////////////
require_once("inc.core.tools.bannedWords.php");

//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// algorithm encode value
//////////////////////////////////////////////////////////////////////
require_once("inc.core.tools.algorithm.encode.php");


// idMember digital only
if(is_numeric($idMember)) {
	// save the new value in the correct field
	$connectDBIntelApp->exec("update members set ".$field."='$value' where idMember='$idMember' limit 1");
	echo('&nbsp;<i class="far fa-check-circle green"></i>');
}
?>