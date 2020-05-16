<?php 
// recup home
$dbRequest=$connectDBIntelApp->query("select * from address where idMember='$idUser' and type='home'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idAddress = $getResult->idAddress;
	$ahu_idMember = $getResult->idMember;
	$ahu_type = $getResult->type;	
	$ahu_ifGeoAuto = $getResult->ifGeoAuto;
	$ahu_longitude = $getResult->longitude;
	$ahu_latitude = $getResult->latitude;
	$ahu_entryCode = $getResult->entryCode;
	$ahu_street = $getResult->street;
	$ahu_state = $getResult->state;
	$ahu_zipCode = $getResult->zipCode;
	$ahu_city = $getResult->city;
	$ahu_country = $getResult->country;
	$ahu_phone = $getResult->phone;
	$ahu_name = $getResult->name;
}
// recup billing
$dbRequest=$connectDBIntelApp->query("select * from address where idMember='$idUser' and type='billing'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idAddress = $getResult->idAddress;
	$abu_idMember = $getResult->idMember;
	$abu_type = $getResult->type;	
	$abu_ifSameHome = $getResult->ifSameHome;
	$abu_entryCode = $getResult->entryCode;
	$abu_street = $getResult->street;
	$abu_state = $getResult->state;
	$abu_zipCode = $getResult->zipCode;
	$abu_city = $getResult->city;
	$abu_country = $getResult->country;
	$abu_phone = $getResult->phone;
	$abu_name = $getResult->name;
}
// recup delivery
$dbRequest=$connectDBIntelApp->query("select * from address where idMember='$idUser' and type='delivery'");
$dbRequest->setFetchMode(PDO::FETCH_OBJ);
if( $getResult = $dbRequest->fetch() ) {	
	$idAddress = $getResult->idAddress;
	$adu_idMember = $getResult->idMember;
	$adu_type = $getResult->type;	
	$adu_ifSameHome = $getResult->ifSameHome;
	$adu_entryCode = $getResult->entryCode;
	$adu_street = $getResult->street;
	$adu_state = $getResult->state;
	$adu_zipCode = $getResult->zipCode;
	$adu_city = $getResult->city;
	$adu_country = $getResult->country;
	$adu_phone = $getResult->phone;
	$adu_name = $getResult->name;
}
// check if address are filled (to commerce delivery and billing)
$okaddressOrderUser = false;
$deliveryAddressUser = "";
// check if same than home
if($adu_ifSameHome=="yes") {
	if(strlen($ahu_street)>=6) { $okhStreet = true;}
	if(strlen($ahu_zipCode)>=4) { $okhZip = true;}
	if(strlen($ahu_city)>=3) { $okhCity = true;}
	if(strlen($ahu_country)>=4) { $okhCountry = true;}
	if(strlen($ahu_phone)>=10) { $okPhone = true;}
	if(strlen($ahu_name)>=3) { $okName = true;}

	if(($okhStreet==true) && ($okhZip==true) && ($okhCity==true) && ($okhCountry==true) && ($okPhone==true) && ($okName==true)) { $deliveryAddressUser = "home"; $okAddressOrderUser = true;}
}else {// if not check delivery
	if(strlen($adu_street)>=6) { $okdStreet = true;}
	if(strlen($adu_zipCode)>=4) { $okdZip = true;}
	if(strlen($adu_city)>=3) { $okdCity = true;}
	if(strlen($adu_country)>=4) { $okdCountry = true;}
	if(strlen($adu_phone)>=10) { $okPhone = true;}
	if(strlen($adu_name)>=3) { $okName = true;}

	if(($okdStreet==true) && ($okdZip==true) && ($okdCity==true) && ($okdCountry==true) && ($okPhone==true) && ($okName==true)) { $deliveryAddressUser = "delivery"; $okAddressOrderUser = true;}
}
?>