<?php
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// intelligenza check  field pseudo signup 
//////////////////////////////////////////////////////////
session_start();
require_once("inc.core.connectDB.php");
// to call back message
require_once("inc.core.languagesTranslation.handler.php"); 
?>
<?php
$pseudo = $_POST['pseudo'];
$okPseudo = true;
// remove special characters of value
$value = $pseudo;
require_once("inc.core.antiHack.php");
$pseudo = $value;
// check if already exist
$dbRequest=$connectDBIntelApp->query("select * from members where pseudo='$pseudo'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$okPseudo = false;
}
// check if pseudo is blacklisted
$dbRequestBL=$connectDBIntelApp->query("select * from site_blackList_pseudo where pseudo='$pseudo'");
$dbRequestBL->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequestBL->fetch() ) {	
	$okPseudo = false;
}
// check if not a banned word
$dbRequestBW=$connectDBIntelApp->query("select * from site_blackList_words where word='$pseudo'");
$dbRequestBW->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequestBW->fetch() ) {	
	$okPseudo = false;
}
// check if not a name of product 
/*$dbRequestNP=$connectDBIntelApp->query("select * from products where name='$pseudo'");
$dbRequestNP->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequestNP->fetch() ) {	
	$okPseudo = false;
}*/
// final check
if( $okPseudo == false ) {	
	echo('&nbsp;&nbsp;&nbsp;<i class="fa fa-times red"></i> '.$tr_text_page_connexion_testPseudo_AlreadyUsed.'');
}else {
	echo('&nbsp;&nbsp;&nbsp;<i class="fa fa-check green"></i> '.$tr_text_page_connexion_testPseudo_Available.'');
}
?>