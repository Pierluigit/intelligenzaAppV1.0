<?php
session_start();
// only if logged
if(!isset($_SESSION['logOk'])) {
	return;
}
require_once("inc.core.connectDB.php");
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// check to data base if match remplace by :)
//////////////////////////////////////////////////////////
$listBannedWords[] = "";
$i=0;
$dbRequestBW=$connectDBIntelApp->query("select * from site_blackList_words");
$dbRequestBW->setFetchMode(PDO::FETCH_OBJ); 
while( $getResultBW = $dbRequestBW->fetch() ) { 
	$word = $getResultBW->word;
	// fill array
	//array_push($listBannedWords, $word);
	
	$ifFound = stristr($value, $word);
	if ($ifFound!="") {
		// remplace by love
		$value = str_ireplace ( $word, "", $value);  
	}
	$i+=1;
}
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// here possible others actions on member who write this bad words! 
//////////////////////////////////////////////////////////
//...
?>