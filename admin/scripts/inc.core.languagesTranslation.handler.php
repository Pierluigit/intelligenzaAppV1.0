<?php
session_start();
//////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////// 
// languages translation handler
//////////////////////////////////////////////
///////////////////  
if($_SESSION['language']=="fr") {//Francais
	require_once('inc.core.languagesTranslation.fr.php');
} 
if($_SESSION['language']=="en") {//Englais
	require_once('inc.core.languagesTranslation.en.php');
} 
/*
if($_SESSION['language']=="es") {//Espagnol
	require_once('inc.core.languagesTranslation.es.php');
} 
if($_SESSION['language']=="de") {//Allemand
	require_once('inc.core.languagesTranslation.de.php');
} 
if($_SESSION['language']=="it") {//Italien
	require_once('inc.core.languagesTranslation.it.php');
}
Etc...*/
?>