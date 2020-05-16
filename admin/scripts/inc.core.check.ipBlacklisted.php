<?php
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// intelligenza check if ip bloqued and from how much time :)
//////////////////////////////////////////////////////////
// recup ip user
$ipUser = $_SERVER['REMOTE_ADDR']; 
// check db if existe
$dbRequest=$connectDBIntelApp->query("select * from site_blackList_user where ipUser='$ipUser'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ); 
if( $getResult = $dbRequest->fetch() ) { 
	$dateBloqued = $getResult->timeStamp;
	$ipUserBloque = $getResult->ipUser;
	$howLong = $getResult->howLong;
	// format date
	$heureBloque = substr($dateBloqued, 11, 2);	
	$minuteBloque = substr($dateBloqued, 14, 2);  
	$secondeBloque = substr($dateBloqued, 17, 2); 
	$moisBloque = substr($dateBloqued, 5, 2); 
	$jourBloque = substr($dateBloqued, 8, 2); 
	$anneeBloque = substr($dateBloqued, 0, 4); 
	//echo($anneeBloque); exit(0);//debug
	$timeStampBloquage = mktime($heureBloque, $minuteBloque, $secondeBloque, $moisBloque, $jourBloque, $anneeBloque);
	// recup date and heure
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
	// test les deux timestamps affiche difference
	$tempsEcoule = $timeStampActuel-$timeStampBloquage;
	//echo($tempsEcoule); exit(0);//debug
	if($tempsEcoule<$howLong){//86400 = 24 h 120 = 3min.
		header('location:http://www.blackl.com/black-google.php');
	}else {
		// delete from table
		$connectDBIntelApp->exec("delete from site_blackList_user where ipUser='$ipUserBloque' limit 1");
		// kill session
		unset($_SESSION['connectNotOk']);
	}
	//
}else {
	// ok nothing to do!
}
?>