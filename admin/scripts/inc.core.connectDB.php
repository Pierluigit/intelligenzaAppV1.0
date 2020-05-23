<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Connect to the DB intelligenza, Alpha, Modular, Knowledges, Backups
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////// online or local  ////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Select Local or Online App?
$ifLocalApp = false;

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
if($ifLocalApp==false) {// app *ONLINE*
	// Connect intelligenza
	////////////////////////////////////////////////////////////////////
	$VALUE_host='';
	$VALUE_port='';
	$VALUE_name_db='';
	$VALUE_user='';
	$VALUE_password='';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
		exit(0);
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBIntelApp = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectDbIntelApp = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet intelligenza db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Alpha
	////////////////////////////////////////////////////////////////////
	$VALUE_host='';
	$VALUE_port='';
	$VALUE_name_db='';
	$VALUE_user='';
	$VALUE_password='';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
		exit(0);
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBAlpha = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectDbAlpha = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Alpha db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Modular
	////////////////////////////////////////////////////////////////////
	$VALUE_host='';
	$VALUE_port='';
	$VALUE_name_db='';
	$VALUE_user='';
	$VALUE_password='';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBModular = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectDbModular = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Modular db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Knowledges
	////////////////////////////////////////////////////////////////////
	$VALUE_host='';
	$VALUE_port='';
	$VALUE_name_db='';
	$VALUE_user='';
	$VALUE_password='';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBKnowledges = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectDBKnowledges = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Knowledges db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Backups
	////////////////////////////////////////////////////////////////////
	$VALUE_host='';
	$VALUE_port='';
	$VALUE_name_db='';
	$VALUE_user='';
	$VALUE_password='';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBBackups = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectDbBackups = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Backups db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// try if log db online ok
	////////////////////////////////////////////////////////////////////
	if(($okConnectDbIntelApp=="yes") && ($okConnectDbAlpha=="yes") && ($okConnectDbModular=="yes") && ($okConnectDBKnowledges=="yes") && ($okConnectDbBackups=="yes")) { 
		// connect DB online ok
		$okConnectDBOnline = true;//echo("connect db online success");exit(0);//debug
	}
}

////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
/////////////////////////// *LOCAL*  ////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
if($ifLocalApp==true) {
	// Connect intelligenza
	////////////////////////////////////////////////////////////////////
	$VALUE_host='localhost';
	$VALUE_port='8889';
	$VALUE_name_db='intelligenza';
	$VALUE_user='root';
	$VALUE_password='root';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBIntelApp = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectLocalDbIntelApp = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Local intelligenza db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Alpha
	////////////////////////////////////////////////////////////////////
	$VALUE_host='localhost';
	$VALUE_port='8889';
	$VALUE_name_db='alpha';
	$VALUE_user='root';
	$VALUE_password='root';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBAlpha = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectLocalDbAlpha = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Local Alpha db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Modular
	////////////////////////////////////////////////////////////////////
	$VALUE_host='localhost';
	$VALUE_port='8889';
	$VALUE_name_db='modular';
	$VALUE_user='root';
	$VALUE_password='root';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBModular = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectLocalDbModular = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Local Modular db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Knowledges
	////////////////////////////////////////////////////////////////////
	$VALUE_host='localhost';
	$VALUE_port='8889';
	$VALUE_name_db='knowledges';
	$VALUE_user='root';
	$VALUE_password='root';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBKnowledges = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectLocalDBKnowledges = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Local Knowledges db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// Connect Backups
	////////////////////////////////////////////////////////////////////
	$VALUE_host='localhost';
	$VALUE_port='8889';
	$VALUE_name_db='backups';
	$VALUE_user='root';
	$VALUE_password='root';
	// check if is informed
	if(($VALUE_host=="") && ($VALUE_name_db=="") && ($VALUE_user=="") && ($VALUE_password=="")) {
		// I know this file must be fill in for the first time
		header("location:infos/install.html");
	}else {
		// All variables are filled
		try { // connect ok
			$connectDBBackups = new PDO('mysql:host='.$VALUE_host.';port='.$VALUE_port.';dbname='.$VALUE_name_db, $VALUE_user, $VALUE_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			// define connect ok
			$okConnectLocalDbBackups = "yes";
		} catch (PDOException $e) {
			// if connect error access db stop and message
			echo 'Connet Local Backups db Error!<br>Check your connection info, and try again! <br>Error message : ' . $e->getMessage();
			exit(0);
		}
	}

	////////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////
	// try if log db online ok
	////////////////////////////////////////////////////////////////////
	if(($okConnectLocalDbIntelApp=="yes") && ($okConnectLocalDbAlpha=="yes") && ($okConnectLocalDbModular=="yes") && ($okConnectLocalDBKnowledges=="yes") && ($okConnectLocalDbBackups=="yes")) { 
		// connect DB online ok
		$okConnectDBLocal = true;//echo("connect db local success");exit(0);//debug
	}
}
?>