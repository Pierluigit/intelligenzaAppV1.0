<?php
///////////////////////////////////////////////////////////////
////////////////////////////////////// Géolacalisation systheme
////////////////////////////////////// herite de la variable de session langue ou fait un test sur les noty langue pour savoir comment me comporter ! 
///////////////////////////////////////////////////////////////
/////////////////////////////////////// infos
// la geo location se fait avec autorisation de l'user en html 5  
// ou si refut par le script qui recupère les données d'emplacement avec l'adresse ip 
// ou il choisi manuellement de ce localisé
// ce script est executé après le test des langues
///////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////
///////////////////////////////////// Attention seo
// le script seo qui suis ne doit pas être affecter par le choi
// de langues ou par le choi de l'emplacement !!!
// formaté des données fixe qui dépande que de l'emplacement 
// HTML 5 ou par adresse ip
///////////////////////////////////////////////////////////////
// http://www.developphp.com/video/PHP/GeoPlugin-Tutorial-Get-User-Location-Information-IP-Detection
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$countryCode = $geo["geoplugin_countryCode"];
$geoplugin_continentCode = $geo['geoplugin_continentCode'];
//echo "Country: ".$country."<br>";
//echo "Country Code: ".$countryCode."<br>";
$_SESSION['geoplugin_continentCode'] = $geoplugin_continentCode;
$_SESSION['geo_country'] = $country;
$_SESSION['geo_countryCode'] = $countryCode;
//exit($geoplugin_continentCode);
//$_SESSION['geo_city'] = 'Geneva';
//$_SESSION['geo_district'] = 'Center';
///////////////////////////////////////

////////////////////////////////////////////////
////////// adaptation du site selon emplacement 
//////////////////////////////////////////////// 
// affiche le bon banner
//$_SESSION['geo_banner'] = 'images/inner-banner-ge.jpg';
//$_SESSION['geo_banner_pays'] = 'images/inner-banner-ge.jpg';// banner_ch.jpg
///////////////////////////////////////////


///////////////////////////////////////////
//////////// adresse selon si il y a agence a lausanne par ex.

///////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////
/////////////////// test pays pour savoir si je bloque l'access direct sur index

//////////////////////////////////////////////////////////////////
/////////////////////////////// adresse de contact 
//$_SESSION['geo_adresse_contact'] = "<p> Ch de la Gravière 5<br>1227 Les Acacias</p><p>Email: team@escortgirls.pro</p><br>";


?> 	