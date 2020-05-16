<?php
///////////////////////////////////
// rec stats links table site_stats_links
///////////////////////////////////
session_start();
require_once("inc.core.connectDB.php");
?>
<?php
$id = $_POST['id'];
$type = $_POST['type'];
$cible = $_POST['cible'];
$idLabel = $_POST['idLabel'];
$country = $_POST['country'];
$language = $_POST['language'];
$page = $_POST['page'];
// recup ip user
$ipUser = $_SERVER["REMOTE_ADDR"];
// user agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];
// remove special characters of value
$value = $type;
require("inc.core.antiHack.php");
$type = $value;
// remove special characters of value
$value = $cible;
require("inc.core.antiHack.php");
$cible = $value;
// remove special characters of value
$value = $country;
require("inc.core.antiHack.php");
$country = $value;
// remove special characters of value
$value = $language;
require("inc.core.antiHack.php");
$language = $value;
// id digital only
if(is_numeric($id)) {
	$connectDBIntelApp->exec("insert into site_stats_links (id, idType, idLabel, ipUser, userAgent, page, cible, country, language) value ('$id', '$type', '$idLabel', '$ipUser', '$userAgent', '$page', '$cible', '$country', '$language')");
}
?>