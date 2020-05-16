<?php
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// intelligenza check if user blacklisted
//////////////////////////////////////////////////////////
// id user
$idUser = $_SESSION['idUser']; 

//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// connect site_blackList_user
$dbRequestBL=$connectDBIntelApp->query("select * from site_blackList_user where idMember='$idUser'");
$dbRequestBL->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequestBL->fetch() ) { 
	$dateBloqued = $getResult->timeStamp;
	$howLong = $getResult->howLong;
	// format date  
	$heureBloque = substr($dateBloqued, 11, 2);	
	$minuteBloque = substr($dateBloqued, 14, 2);  
	$secondeBloque = substr($dateBloqued, 17, 2); 
	$moisBloque = substr($dateBloqued, 5, 2); 
	$jourBloque = substr($dateBloqued, 8, 2); 
	$anneeBloque = substr($dateBloqued, 0, 4); 
	//echo($anneeBloque);exit(0);//debug
	$timeStampBloquage = mktime($heureBloque, $minuteBloque, $secondeBloque, $moisBloque, $jourBloque, $anneeBloque);
	// recup date and time
	$heureActuel = date('G');
	$minuteActuel = date('i');
	$secondeActuel = date('s');
	$moisActuel = date('n');
	$jourActuel = date('j');
	$anneeActuel = date('Y');
	// int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])
	$timeStampActuel = mktime($heureActuel, $minuteActuel, $secondeActuel, $moisActuel, $jourActuel, $anneeActuel);
	//echo($anneeActuel); exit(0);//debug
	// show the timestamps
	//echo('timestamp bloque '.$timeStampBloquage.' et le time stamp actuel est '.$timeStampActuel); exit(0);//debug
	// 24h = 60 * 60 * 24 = 86 400
	// check difference of time
	$tempsEcoule = $timeStampActuel-$timeStampBloquage;
	//echo($tempsEcoule); exit(0);//debug
	if($tempsEcoule<$howLong){//86400 = 24 h 120 = 3min.
		/*session_unset();
		if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
		if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}*/
		header('location:http://www.blackl.com/black-google.php');
	}else {
		// delete from table
		$connectDBIntelApp->exec("delete from site_blackList_user where idMember='$idUser' limit 1");
	}
}else {
	//echo("success");exit(0);//debug
}
?>