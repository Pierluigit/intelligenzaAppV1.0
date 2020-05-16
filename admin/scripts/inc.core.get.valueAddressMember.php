<?php 
// recup home
$dbRequest=$connectDBIntelApp->query("select * from address where idMember='$idMember' and type='home'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idAddress = $getResult->idAddress;
	$ahm_idMember = $getResult->idMember;
	$ahm_type = $getResult->type;	
	$ahm_ifGeoAuto = $getResult->ifGeoAuto; 
	$ahm_longitude = $getResult->longitude;
	$ahm_latitude = $getResult->latitude;
	$ahm_entryCode = $getResult->entryCode;
	$ahm_street = $getResult->street;
	$ahm_state = $getResult->state;
	$ahm_zipCode = $getResult->zipCode;
	$ahm_city = $getResult->city;
	$ahm_country = $getResult->country;
	$ahm_phone = $getResult->phone;
	$ahm_name = $getResult->name;
}
// recup billing
$dbRequest=$connectDBIntelApp->query("select * from address where idMember='$idMember' and type='billing'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idAddress = $getResult->idAddress;
	$abm_idMember = $getResult->idMember;
	$abm_type = $getResult->type;	
	$abm_ifSameHome = $getResult->ifSameHome;
	$abm_entryCode = $getResult->entryCode;
	$abm_street = $getResult->street;
	$abm_state = $getResult->state;
	$abm_zipCode = $getResult->zipCode;
	$abm_city = $getResult->city;
	$abm_country = $getResult->country;
	$abm_phone = $getResult->phone;
	$abm_name = $getResult->name;
}
// recup delivery
$dbRequest=$connectDBIntelApp->query("select * from address where idMember='$idMember' and type='delivery'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idAddress = $getResult->idAddress;
	$adm_idMember = $getResult->idMember;
	$adm_type = $getResult->type;
	$adm_ifSameHome = $getResult->ifSameHome;
	$adm_entryCode = $getResult->entryCode;
	$adm_street = $getResult->street;
	$adm_state = $getResult->state;
	$adm_zipCode = $getResult->zipCode;
	$adm_city = $getResult->city;
	$adm_country = $getResult->country;
	$adm_phone = $getResult->phone;
	$adm_name = $getResult->name;
}
// check if address are filled (to commerce delivery and billing)
$okaddressOrderMember = false;
// check if same than home
if($adm_ifSameHome=="yes") {
	if(strlen($ahm_street)>=6) { $okhStreet = true;}
	if(strlen($ahm_zipCode)>=4) { $okhZip = true;}
	if(strlen($ahm_city)>=3) { $okhCity = true;}
	if(strlen($ahm_country)>=4) { $okhCountry = true;}
	if(strlen($ahm_phone)>=10) { $okPhone = true;}
	if(strlen($ahm_name)>=3) { $okName = true;}

	if(($okhStreet==true) && ($okhZip==true) && ($okhCity==true) && ($okhCountry==true) && ($okPhone==true) && ($okName==true)) { $deliveryAddressMember = "home"; $okaddressOrderMember = true;}
}else {// if not check delivery
	if(strlen($adm_street)>=6) { $okdStreet = true;}
	if(strlen($adm_zipCode)>=4) { $okdZip = true;}
	if(strlen($adm_city)>=3) { $okdCity = true;}
	if(strlen($adm_country)>=4) { $okdCountry = true;}
	if(strlen($adm_phone)>=10) { $okPhone = true;}
	if(strlen($adm_name)>=3) { $okName = true;}

	if(($okdStreet==true) && ($okdZip==true) && ($okdCity==true) && ($okdCountry==true) && ($okPhone==true) && ($okName==true)) { $deliveryAddressMember = "delivery"; $okaddressOrderMember = true;}
}
?>