<?php
//////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////
// rec fields table address
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
$value = $_POST['value'];
$field = $_POST['field'];
$type = $_POST['type'];

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
	$connectDBIntelApp->exec("update address set ".$field."='$value' where type='$type' and idMember='$idMember' limit 1");
	echo('&nbsp;<i class="far fa-check-circle green"></i>');  
}
?>