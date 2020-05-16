<?php
// ici supp toutes les chaines si la valeur est une chaine collée dans le champ !
$value = str_ireplace( "now", "", $value);
$value = str_ireplace ( "+or+1=1", "", $value);
$value = str_replace ( "1='1'", "", $value);
$value = str_ireplace ( "select", "", $value);
$value = str_ireplace ( "from", "", $value);
$value = str_ireplace ( "sleep", "", $value);
$value = str_ireplace ( " OR ", "", $value);
$value = str_ireplace ( "drop", "", $value);
$value = str_ireplace ( "delet", "", $value);
$value = str_ireplace ( "if(", "", $value);
$value = str_replace ( "=>", "", $value);
$value = str_ireplace ( "UNION", "", $value);
$value = str_ireplace ( "pwn", "", $value);
$value = str_replace ( "--", "", $value);
$value = str_ireplace ( "NULL", "", $value);
$value = str_replace ( "\x1a", "", $value);
/*$value = str_replace ( "\n", "", $value);*/
$value = str_replace ( "\r", "", $value);
$value = str_replace ( "\ ", "", $value);
$value = str_replace ( "\x00", "", $value);
$value = str_ireplace ( " AND ", "", $value);
$value = str_ireplace ( "login='", "", $value);
$value = str_replace ( "'1'='1'", "", $value);
$value = str_ireplace ( "REMOVE", "", $value); 
$value = str_ireplace ( "drop", "", $value);
$value = str_ireplace ( "REPLACE(", "", $value);
$value = str_ireplace ( "char(", "", $value);
$value = str_ireplace ( "table", "", $value);
///////////////////////////////////////
// ici supp tous les caractaires +*...
$value = str_replace ( "*", "", $value);
$value = str_replace ( "=", "", $value);
$value = str_replace ( "(", "", $value);
$value = str_replace ( ")", "", $value);
$value = str_replace ( "%", "", $value);
$value = str_replace ( "$", "", $value);
$value = str_replace ( "~", "", $value);
$value = str_replace ( ">", "", $value);
$value = str_replace ( "<", "", $value);
$value = str_replace ( '"', "", $value);
$value = str_replace ( "`", "", $value);
$value = str_replace ( "|", "", $value);
$value = str_replace ( "&", "", $value);
$value = str_replace ( ";", "", $value);
$value = str_replace ( "'", "&rsquo;", $value);
$value = str_replace ( "?", "", $value);
$value = str_replace ( "{", "", $value);
$value = str_replace ( "}", "", $value);

$value = str_replace ( "]", "", $value);
$value = str_replace ( "[", "", $value);
?>