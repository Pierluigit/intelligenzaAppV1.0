<?php
///////////////////////////////////////////
///////// reception (helpdesk) ////////////
///////////////////////////////////////////
// check new user registration
///////////////////////////////////////////
// signup
$form=0;
if(isset($_POST['btn_signup'])) { 	
	$okFormInscription = false;
	$okPseudoInscrit = true;
	$okMailInscrit = true;
	$okPassInscrit = true;
	$okConditionInscrit = false;
	$okCaptcha = false;
	$captcha_code = $_POST['captcha_code'];
	$pseudoInscrit = $_POST['pseudo'];
	$emailInscrit = $_POST['emailInscription'];
	$passwordInscrit = $_POST['password1'];
	$password2Inscrit = $_POST['password2'];
	//////////////////////////////
	// check if demand secure email
	///////////////////////////////
	if($app_ifDemandSecureEmail=="yes") {
		// explode app_secureWebMail
		$secureWebMail = explode("/", $app_secureWebMail);
		$found = 0;
		foreach ($secureWebMail as $webmail) {
			if($ifFound = strstr($emailInscrit, $webmail)) {
				$foud+=1;
			}
		}
		if($foud==0) {
			// erreur
			$okMailInscrit = false;
		}
	}
	//echo("success ".$emailInscrit);exit(0);// @!QNT3ZYNnz
	// anti hack
	// pass
	$value = $passwordInscrit;
	require("inc.core.antiHackPassword.php");
	$passwordInscrit = $value;
	$value = $password2Inscrit;
	require("inc.core.antiHackPassword.php");
	$password2Inscrit = $value;
	// pseudo
	$value = $pseudoInscrit;
	require("inc.core.antiHack.php");
	$pseudoInscrit = $value;
	
	// test conditions
	if(isset($_POST['okCondition'])) { 
		$okConditionInscrit = true;
	}
	//////////////////////////////
	// check if demand secure password
	///////////////////////////////
	if($app_ifDemandSecurePassword=="yes") {
		// test pass
		if($passwordInscrit==$password2Inscrit) {
			if((strlen($passwordInscrit)<8) || (strlen($passwordInscrit)>24)) {
				// check if secure
				$okPassInscrit = false;
			}
		}else {
			$okPassInscrit = false;
		}
		
		$okCapital=false;
		$okMinuscule=false;
		$okNumber=false;
		$okCharaSpecial=false;
		if(preg_match('#^[^A-Z]*([A-Z].*)#',$passwordInscrit)) { $okCapital=true;}
		if(preg_match('#^[^a-z]*([a-z].*)#',$passwordInscrit)) { $okMinuscule=true;}
		if(preg_match('#^[^0-9]*([0-9].*)#',$passwordInscrit)) { $okNumber=true;}		
		$i = 0;
		$ifFound = strstr($passwordInscrit, '!'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '@'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '#'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '$'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '%'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '&'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '*'); if($ifFound!="") { $i+=1;}
		$ifFound = strstr($passwordInscrit, '?'); if($ifFound!="") { $i+=1;}
		// !@#$%&*?
		if($i>=1) { $okCharaSpecial=true;}
		if(($okCapital==true) && ($okMinuscule==true) && ($okNumber==true) && ($okCharaSpecial==true)) { // nothing
		}else { $okPassInscrit = false;}
		
	}else {
		// test pass
		if($passwordInscrit==$password2Inscrit) {
			if((strlen($passwordInscrit)<8) || (strlen($passwordInscrit)>24)) {
				$okPassInscrit = false;
			}
		}else {
			$okPassInscrit = false;
		}
	}
	
	// format pass md5
	$passwordInscrit = md5($passwordInscrit);
	
	// check email 
	if (!preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $emailInscrit) ) {
		$okMailInscrit = false;
		$emailInscrit = strtolower($emailInscrit);// met tout en minuscule, strtoupper() fais l'inverse
	}else {
		// check if site_blackList_email match with test email emailInscrit
		$dbRequest=$connectDBIntelApp->query("select * from site_blackList_email where email='$emailInscrit'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $dbMember = $dbRequest->fetch() ) {
			// match renew black list
			$ipUser = $_SERVER['REMOTE_ADDR'];
			$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");// 86400
			// sandbox
			header("location:http://www.blackl.com/black-google.php");
			exit(0);
		}
	}
	// test nom 
	if((strlen($pseudoInscrit)<2) || (strlen($pseudoInscrit)>24)) {
		$okPseudoInscrit = false;
	}else {
		// test si existe deja dans la base 
		$dbRequest=$connectDBIntelApp->query("select * from members where pseudo='$pseudoInscrit'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequest->fetch() ) {	
			$okPseudoInscrit = false;
			//$pseudoDejaInscrit = true;
		}
		// 2th test if blackliste pseudo
		$dbRequestBL=$connectDBIntelApp->query("select * from site_blackList_pseudo where pseudo='$pseudoInscrit'");
		$dbRequestBL->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequestBL->fetch() ) {	
			$okPseudoInscrit = false;
		}
		// 3th check if not a banned word
		$dbRequestBW=$connectDBIntelApp->query("select * from site_blackList_words where word='$pseudoInscrit'");
		$dbRequestBW->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequestBW->fetch() ) {	
			$okPseudoInscrit = false;
		}
		
	}
	
 	//exit($emailInscrit);
	// test si existe deja dans la base 
	$dbRequest=$connectDBIntelApp->query("select * from members where email='$emailInscrit'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult = $dbRequest->fetch() ) {	
		$okMailInscrit = false;
		$idMember = $getResult->idMember;
		$ifEmailConfirmed = $getResult->ifEmailConfirmed;
		//$emailDejaInscrit = true;
		//$pseudoDejaInscrit = true;
	}
	// recup date inscription, nom, 
	
	// test captcha
	require_once ('modular/_captcha/securimage.php');
  	$securimage = new Securimage();
	
	if ($securimage->check($captcha_code) == true) {
	// the code was correct
		$okCaptcha = true;
		//ar/_captcha/();
	}
	//exit($okConditionInscrit);
	// genere une key unique pour validation de l'email par user
	$validationEmailCode = md5(rand(00000001, 99999999));
	
	// test avant insertion dans la base 
	if(($okMailInscrit==true) && ($okPseudoInscrit==true) && ($okPassInscrit==true) && ($okConditionInscrit==true) && ($okCaptcha==true)) { //echo('youpi rec new enfin : '.$passwordInscrit); exit(0);
		//exit('youpiiiiiiiiii');
		// inserer membre
		$connectDBIntelApp->exec("insert into members (validationEmailCode, pseudo, email, ifEmailConfirmed, password) value ('$validationEmailCode', '$pseudoInscrit', '$emailInscrit', 'no', '$passwordInscrit')");
        
 		// envois des email de bienvenue avec instructions
		require_once("admin/scripts/inc.core.languagesTranslation.handler.php");
		require_once("admin/scripts/inc.core.email.newMember.php");
		
		
		///////////////////////
		// noty en session
		//$okFormInscription = true;
		$_SESSION['okFormInscription'] = "ok";
		$_SESSION['emailInscrit'] = $emailInscrit;
		$_SESSION['pseudoInscrit'] = $pseudoInscrit;
		
		// message derniere action en session ok nouvelle entre plus email
		//$_SESSION['derniereActionAjouterMembre'] = "le $dateActuel &agrave; $heure h $min | nouveau $new_droits $new_civilite $new_prenom $new_nom, email envoy&eacute; en $new_langue à  $new_email";
		//$_SESSION['erreurActionAjouterMembre'] = "non";
		
		// notification ok check your email
		header("location:connect.php?");
	}else {
		// erreur
		//$okFormInscription = false;
		// 3 attempts max
		// wrong don't match
		$connectNotOk= true;
		if(!isset($_SESSION['connectNotOk'])) {//echo('yes no session : '.$passwordInscrit); exit(0);
			$_SESSION['connectNotOk'] = 1;
		}else {//echo('yes there is session : '.$_SESSION['connectNotOk']); exit(0);
			// 3 attempts wrong block ip 24h
			if($_SESSION['connectNotOk']>=3){
				// black list
				$ipUser = $_SERVER['REMOTE_ADDR'];
				$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");
				// sandbox
				header('location:http://www.blackl.com/black-google.php');
			}else {
				$_SESSION['connectNotOk'] += 1;
			}
		}
	}
	
}
////////////////////////////////////////////////
////////////////////////////////////////////////
// check registration backlink first time email confirmation
////////////////////////////////////////////////
if(isset($_GET['codeValid'])) { //echo("success");exit(0);//debug
	unset($_SESSION['okFormInscription']);
	unset($_SESSION['emailInscrit']);
	unset($_SESSION['pseudoInscrit']);
	
	$code = $_GET['codeValid'];
	// antihack
	$value = $code;
	require("inc.core.antiHack.php");
	$code = $value;
	// test 
	$dbRequest=$connectDBIntelApp->query("select * from members where validationEmailCode='$code'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult = $dbRequest->fetch() ) {	
		$idMember = $getResult->idMember;
		$ifEmailConfirmed = $getResult->ifEmailConfirmed;
		$pseudoUserInscription = $getResult->pseudo;
		$emailMember = $getResult->email;
		$validationEmailCodeMember = $getResult->validationEmailCode;
	}
	
	// créer variable de session pour la noty
	$_SESSION['noty_emailConfirmed'] = $emailMember;
	$_SESSION['pseudoInscrit'] = $pseudoUserInscription;
	
	if(($ifEmailConfirmed=='no') && ($validationEmailCodeMember==$code)) { //echo('youi active account'); exit(0);
		// youpiiiiiiiiiiiiiiiii
		//require_once("geolocation.inc.php");
		// ici c'est la premiere fois qu'il ouvre un compte et la seul 
		$connectDBIntelApp->exec("update members set ifEmailConfirmed='yes' where idMember='$idMember' limit 1"); 
		// defini les droits
		$rights="Member";$subRights="";$rightsLabel="";
		// alors creer toute intelligence
		// insert members_intel
		$ipUser = $_SERVER["REMOTE_ADDR"];
		$connectDBIntelApp->exec("insert into members_intel (idMember, ipUser, rights, subRights, ifMP, dateInscription) value ('$idMember', '$ipUser', '$rights', '$subRights', 'no', NOW())");
		// insert members adresses
		$connectDBIntelApp->exec("insert into address (idMember, type) value ('$idMember', 'home')");
		$connectDBIntelApp->exec("insert into address (idMember, type, ifSameHome) value ('$idMember', 'billing', 'yes')");
		$connectDBIntelApp->exec("insert into address (idMember, type, ifSameHome) value ('$idMember', 'delivery', 'yes')");
		// insert wallet
		$connectDBIntelApp->exec("insert into admin_wallets (idMember) value ('$idMember')");
		// insert noty
		$connectDBIntelApp->exec("insert into site_noty (idMember, dateNoty, dateNotyUpdate, type, categories, title, message) value ('$idMember', NOW(), NOW(), 'notyUp', 'welcome', '$tr_text_notyUp_welcome_title', '$tr_text_notyUp_welcome_message')");
		
		// creer un dossier , 755 
		mkdir ("members/id_$idMember");
		chmod ("members/id_$idMember", 0755);
		// creer un sous dossier , 755
		mkdir ("members/id_$idMember/img");
		chmod ("members/id_$idMember/img", 0755);
		// creer un sous dossier , 755
		mkdir ("members/id_$idMember/myFolder");
		chmod ("members/id_$idMember/myFolder", 0755);
		// creer un sous dossier , 755
		mkdir ("members/id_$idMember/photo");
		chmod ("members/id_$idMember/photo", 0755);
		// creer un sous dossier , 755
		mkdir ("members/id_$idMember/video");
		chmod ("members/id_$idMember/video", 0755);
		// creer un sous dossier , 755
		mkdir ("members/id_$idMember/posts");
		chmod ("members/id_$idMember/posts", 0755);
		
		
		// count members
		$totalMembers = $connectDBIntelApp->query("select count(idIntelMember) from members_intel")->fetchColumn();
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		// email me new member
		require_once("admin/scripts/inc.core.email.adminNewMember.php");
		
	}
	header("location:connect.php?");
}

////////////////////////////////////////////////
////////////////////////////////////////////////
// change email user
////////////////////////////////////////////////
if(isset($_POST['btn_changeEmail'])) {
	// who ask to change email
	$ifAdmin = $_POST['ifAdmin'];// value member
	if($ifAdmin=="") {
		// it's an member
		$idUser = $_SESSION["idUser"];
		$pseudoUser = $_SESSION["pseudoUser"];
	}else {
		// it's an admin
		$idUser = $ifAdmin;// id member
		$pseudoUser = $_SESSION["pseudoUser"];
	}
	//
    $okForm = 0;
	$okNewEmail = true;
	//$okPerduPass = 0;
	$newEmail = $_POST['newEmail'];
	// test email
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $newEmail) ) {
		// test si existe deja dans la base
		$dbRequest=$connectDBIntelApp->query("select * from members where email='$newEmail'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $getResult = $dbRequest->fetch() ) {
			$okNewEmail = false;
		}
	}
	//////////////////////////////
	// check if demand secure email
	///////////////////////////////
	if($app_ifDemandSecureEmail=="yes") {
		// explode app_secureWebMail
		$secureWebMail = explode("/", $app_secureWebMail);
		$found = 0;
		foreach ($secureWebMail as $webmail) {
			if($ifFound = strstr($newEmail, $webmail)) {
				$foud+=1;
			}
		}
		if($foud==0) {
			// erreur
			$okNewEmail = false;
		}
	}
	
	// check if site_blackList_email match with test email emailInscrit
		$dbRequest=$connectDBIntelApp->query("select * from site_blackList_email where email='$newEmail'");
		$dbRequest->setFetchMode(PDO::FETCH_OBJ);
		if( $dbMember = $dbRequest->fetch() ) {
			// match renew black list
			$okNewEmail = false;
		}
	
	
	// genere une unique pour changer email
	$validationCodeNewEmail = md5(rand(00000001, 99999999));
	if(($okNewEmail==true)) { 
		unset($_SESSION['newEmailNotOk']);
		//exit($idUser);
		$connectDBIntelApp->exec("update members set validationCodeNewEmail='$validationCodeNewEmail', emailChange='$newEmail' where idMember='$idUser' limit 1");
		//echo("success");exit(0);
		require_once("scripts/inc.core.languagesTranslation.handler.php");
		//echo("attention tu vas recevoir un email");exit();mail("pierluigi.neva@gmail.com", "coucou", "success youpi");
		require_once("scripts/inc.core.email.changeEmail.php");
		
		///////////////////////
		// noty en session
		//$okFormInscription = true;
		$_SESSION['okChangeEmail'] = "ok";
		$_SESSION['emailNew'] = $newEmail;
		
		if($ifAdmin==true) {
			header("location:?");
		}else {
			header("location:?editConnection=1");
		}
	}else {
		//exit('false email');
		///////////////////////
		// noty en session
		//$okFormInscription = true;
		//$newEmailNotOk==true;
		
		if($ifAdmin==true) {
			// admin
			header("location:?");
		}else {
			// member
			$_SESSION['newEmailNotOk'] = "yes";
			header("location:?editConnection=1");
		}
	}
}
////////////////////////////////////////////////
////////////////////////////////////////////////
// change email user backlink new email confirmation 
////////////////////////////////////////////////
// traite le cas ou il valide son new email
if(isset($_GET['codeValidNewMail'])) { 
	unset($_SESSION['okChangeEmail']);
	$code = $_GET['codeValidNewMail'];
	// antihack
	$value = $code;
	require("admin/scripts/inc.core.antiHack.php");
	$code = $value;
	
	$dbRequest=$connectDBIntelApp->query("select * from members where validationCodeNewEmail='$code'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult = $dbRequest->fetch() ) {//echo("success2");exit(0);
		$idMember = $getResult->idMember;
		$emailChange = $getResult->emailChange;
		// instructions
		$connectDBIntelApp->exec("update members set email='$emailChange', validationCodeNewEmail='', emailChange='', validationEmailCode='$code' where idMember='$idMember' limit 1");
		$_SESSION['okChangeEmail2'] = true;
		header("location:?");
	}else {
		// if already confirmed relog3 = noty ok change email must relog
		header("location:?reLog=3");
	}
}
////////////////////////////////////////////////
////////////////////////////////////////////////
// request lostPass, regenerate password 
////////////////////////////////////////////////
if(isset($_POST['btn_lostPass'])) {
	// unset session time exceeded
	unset($_SESSION['lostPassTimeExceeded']);
	//$okPerduPass = 0;
	$okMailRecup = false;
	$okCaptcha = false;
	
	$emailRecup = $_POST['emailRecup'];
	$captcha_code = $_POST['captcha_code'];
	
	// test captcha
	require_once ('modular/_captcha/securimage.php');
  	$securimage = new Securimage();
	
	if ($securimage->check($captcha_code) == true) {
	// the code was correct
		$okCaptcha = true;
		//exit();
	}
	
	// ici test email bloquer
	$dbRequest=$connectDBIntelApp->query("select * from site_blackList_email where email='$emailRecup'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $dbMember = $dbRequest->fetch() ) {
		// match renew black list
		$ipUser = $_SERVER['REMOTE_ADDR'];
		$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");// 86400
		// sandbox
		header("location:http://www.blackl.com/black-google.php");
	}
	
	// test email
	if (preg_match("/^[\w\.\w]+@[\w\.-]+\.[a-z]{2,10}$/i", $emailRecup) ) {
		// test captcha
		if($okCaptcha == true) {
		
				// test si existe deja dans la base 
				$dbRequest=$connectDBIntelApp->query("select * from members where email='$emailRecup'");
				$dbRequest->setFetchMode(PDO::FETCH_OBJ);
				if( $getResult = $dbRequest->fetch() ) { //exit('yo2');
					$okMailRecup = true;

					$idMember = $getResult->idMember;
					$pseudoMember = $getResult->pseudo;
					// instructions
					// genere une unique pour recup du pass
					$lostPassCode = md5(rand(00000001, 99999999).'-i-'.rand(00000001, 99999999).'-a-'.rand(00000001, 99999999));
					$connectDBIntelApp->exec("update members set lostPassCode='$lostPassCode', dateRequestRegeneratePass=NOW() where idMember='$idMember' limit 1");
					require_once("admin/scripts/inc.core.languagesTranslation.handler.php");
					//echo("attention tu vas recevoir un email");exit();
					//mail("pierluigi.neva@gmail.com", "coucou", "success youpi");
					require_once("admin/scripts/inc.core.email.lostPass.php");
					///////////////////////
					// noty en session
					//$okFormInscription = true;
					$_SESSION['okFormLostPass'] = true;
					$_SESSION['emailokFormLostPass'] = $emailRecup;
					$_SESSION['pseudookFormLostPass'] = $pseudoMember;
					
					unset($_SESSION['connectNotOk']);
					
					header("location:?");
				}else {
					// email don't match
					// 3 attempts max
					$connectNotOk= true;
					if(!isset($_SESSION['connectNotOk'])) {
						$_SESSION['connectNotOk'] = 1;
						
					}else {
						//echo("email dont match ".$_SESSION['connectNotOk']);exit(0);
						// 3 attempts wrong block ip 24h
						if($_SESSION['connectNotOk']>=3){
							// black list
							$ipUser = $_SERVER['REMOTE_ADDR'];
							$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");// 86400
							// sandbox
							echo("max 3 email dont match ".$_SESSION['connectNotOk']);exit(0);
							header('location:http://www.blackl.com/black-google.php');
						}else {
							$_SESSION['connectNotOk'] += 1;
						}
					}
				}
			
		}else {
			// wrong captcha don't match
			// 3 attempts max
			$connectNotOk= true;
			if(!isset($_SESSION['connectNotOk'])) {
				$_SESSION['connectNotOk'] = 1;
				
			}else {
				//echo("captcha dont match ".$_SESSION['connectNotOk']);exit(0);
				// 3 attempts wrong block ip 24h
				if($_SESSION['connectNotOk']>=3){
					// black list
					$ipUser = $_SERVER['REMOTE_ADDR'];
					$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");// 86400
					// sandbox
					echo("max 3 captcha dont match ".$_SESSION['connectNotOk']);exit(0);
					header('location:http://www.blackl.com/black-google.php');
				}else {
					$_SESSION['connectNotOk'] += 1;
				}
			}
		}
	}else {
		// wrong email
		
		// 3 attempts max
		$connectNotOk= true;
		if(!isset($_SESSION['connectNotOk'])) {
			$_SESSION['connectNotOk'] = 1;
		}else {
			echo("email wrong ".$_SESSION['connectNotOk']);exit(0);
			// 3 attempts wrong block ip 24h
			if($_SESSION['connectNotOk']>=3){
				// black list
				$ipUser = $_SERVER['REMOTE_ADDR'];
				$connectDBIntelApp->exec("insert into site_blackList_user (ipUser, howLong) value ('$ipUser', '$app_limitTimeBlackList')");// 86400
				// sandbox
				echo("max 3 email wrong ".$_SESSION['connectNotOk']);exit(0);
				header('location:http://www.blackl.com/black-google.php');
			}else {
				$_SESSION['connectNotOk'] += 1;
			}
		}
	}
}

////////////////////////////////////////////////
////////////////////////////////////////////////
// check backlink email regenere password lostPass
////////////////////////////////////////////////
if(isset($_GET['lostPass'])) {//echo("success");exit(0);//debug
	$lostPassCode = $_GET['lostPass'];
	// remove special characters of value
	$value = $lostPassCode;
	require_once("inc.core.antiHack.php");
	$lostPassCode = $value;
	//echo("youpi je passer l'antihack");exit();
	$dbRequest=$connectDBIntelApp->query("select * from members where lostPassCode='$lostPassCode'");
	$dbRequest->setFetchMode(PDO::FETCH_OBJ);
	if( $getResult = $dbRequest->fetch() ) { 
		//echo("youpi suis la result");exit();
		$idMember = $getResult->idMember;
		$passwordUser = $getResult->password;
		$lostPassCode = $getResult->lostPassCode;
		$dateRequestRegeneratePassUser = $getResult->dateRequestRegeneratePass;
		// process active 5min max
		$okCanRRP = true;
		// format dates
		$heureRRP = substr($dateRequestRegeneratePassUser, 11, 2);	
		$minuteRRP = substr($dateRequestRegeneratePassUser, 14, 2);  
		$secondeRRP = substr($dateRequestRegeneratePassUser, 17, 2); 
		$moisRRP = substr($dateRequestRegeneratePassUser, 5, 2); 
		$jourRRP = substr($dateRequestRegeneratePassUser, 8, 2); 
		$anneeRRP = substr($dateRequestRegeneratePassUser, 0, 4); 
		//exit($moisRRP);
		//echo($anneeBloque); exit(0);
		$timeStampRRP = mktime($heureRRP, $minuteRRP, $secondeRRP, $moisRRP, $jourRRP, $anneeRRP);
		$formatDateLastRRP = $jourRRP."-".$moisRRP."-".$anneeRRP." à ".$heureRRP.":".$minuteRRP.":".$secondeRRP;

		//exit($formatDateLastRRPCompteDown);
		// recup date et heure
		$heureActuel = date('G');
		//$heureActuel += 1;// heure d'hiver ATTENTION
		$minuteActuel = date('i');
		$secondeActuel = date('s');
		$moisActuel = date('n');
		$jourActuel = date('j');
		$anneeActuel = date('Y');
		// int mktime ( int hour, int minute, int second, int month, int day, int year [, int is_dst])
		$timeStampActuel = mktime($heureActuel, $minuteActuel, $secondeActuel, $moisActuel, $jourActuel, $anneeActuel);
		// test les deux timestamps affiche difference
		$tempsEcoule = $timeStampActuel-$timeStampRRP;
		
		//echo($tempsEcoule);exit(0);
		// test si il peux voter
		if($tempsEcoule>$app_limitTimeProcessDoubleAndLost){//86400 = 24 h = 60 * 60 * 24, 15min
			//echo("plus de 15min");exit();
			$okCanRRP = false;
		}
		if($okCanRRP==true) {
			$_SESSION['lostPass'] = $idMember;
			unset($_SESSION['okFormLostPass']);
			
			// format le time stamp de quand il pourras vote
			//$timeStampRRPS = date_timestamp_get($timeStampRRP);
			//$timeStampWhenYouCanRRP = $timeStampRRP+300;
			//???????????????????????
			$timeStampWhenYouCanRRP = $timeStampRRP + ($app_limitTimeProcessDoubleAndLost);
			// 7 jours; 24 heures; 60 minutes; 60 secondes
			
			//echo 'Semaine prochaine : '. date('Y-m-d', $timeStampWhenYouCanRRP) ."\n";
			
			
			//echo("origi, ".$timeStampRRP.", ".date("Y/m/d H:i:s", $timeStampRRP)." / nextweek, ".$timeStampWhenYouCanRRP.", ".date("Y/m/d H:i:s", $timeStampWhenYouCanRRP)."");exit(0);
			
			//$timeStampWhenYouCanRRP = date("d-m-Y à H:i:s", $timeStampRRP);
			$_SESSION['formatDateLastRRPCompteDown'] = date("Y/m/d H:i:s", $timeStampWhenYouCanRRP);//2020/10/10 12:34:56 $_SESSION['formatDateLastRRPCompteDown']
			//echo($_SESSION['formatDateLastRRPCompteDown']);exit(0);
			//echo($timeStampWhenCan);exit(0);
			header("location:?");
			
		}else {
			// update db champ code lost pass
			$connectDBIntelApp->exec("update members set lostPassCode='', dateRequestRegeneratePass='0000-00-00 00:00:00' where idMember='$idMember' limit 1");
			unset($_SESSION['okFormLostPass']);
			unset($_SESSION['lostPass']);
			// noty
			$_SESSION['lostPassTimeExceeded'] = true;
		}
		// auto connect
		//$_SESSION['logOk'] = true;
		//$_SESSION['idMember'] = $idMember;
		
		//exit($_SESSION['logOk']);
		//setcookie("remember", $idMember.'----'.$passwordUser, time()+ 3600 * 24, "/", $_SERVER['HTTP_HOST'], true, true);
		//setcookie("rememberMe", $_SERVER['REMOTE_ADDR'], time()+ 3600 * 24, "/", $_SERVER['HTTP_HOST'], true, true);
		//setcookie("logOk", "connexion", time()+300, "/", $_SERVER['HTTP_HOST'], true, true);// 3600 = 1h/ 60 = 1min $limitTempsConnexionUser 5min
		// change dans Intelligenza status statusr
		//$ip = $_SERVER["REMOTE_ADDR"];
		//$connectDBIntelApp->exec("update members_intel set ipUser='$ip' where idMember='$idMember' limit 1");
		
		
		
		// session regenerer
		
		//exit('youpi :) ok recup info '.$passwordUser);
		
		
	}else {
		$_SESSION['lostPassTimeExceeded'] = true;
		//echo("bo suis la, pas de result");exit();
		header("location:?notmatch");
	}
	
	
}



//////////////////////////////
// Regenerate Password lost
if(isset($_POST['btn_regeneratePass'])) {
	$idMember = $_POST['idMember'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$okForm = false;
	$okNewPass = '';
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	// anti hack
	$value = $password1;
	require("admin/scripts/inc.core.antiHackPassword.php");
	$password1 = $value;
	$value = $password2;
	require("admin/scripts/inc.core.antiHackPassword.php");
	$password2 = $value;
	//(md5($passwordActuel));exit(" ".$passwordUser);
	// test if pass actuel match with passuser 
	if((strlen($password1)<=24) && (strlen($password1)>=8) && ($password1==$password2)) {
		//////////////////////////////
		// check if demand secure password
		///////////////////////////////
		if($app_ifDemandSecurePassword=="yes") {//echo("success de");exit(0);
			$okCapital=false;
			$okMinuscule=false;
			$okNumber=false;
			$okCharaSpecial=false;
			if(preg_match('#^[^A-Z]*([A-Z].*)#',$password1)) { $okCapital=true;}
			if(preg_match('#^[^a-z]*([a-z].*)#',$password1)) { $okMinuscule=true;}
			if(preg_match('#^[^0-9]*([0-9].*)#',$password1)) { $okNumber=true;}		
			$i = 0;
			$ifFound = strstr($password1, '!'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '@'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '#'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '$'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '%'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '&'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '*'); if($ifFound!="") { $i+=1;}
			$ifFound = strstr($password1, '?'); if($ifFound!="") { $i+=1;}
			// !@#$%&*?
			if($i>=1) { $okCharaSpecial=true;}
			if(($okCapital==true) && ($okMinuscule==true) && ($okNumber==true) && ($okCharaSpecial==true)) { // nothing
				//exit('youpi2');
				//$okNewPass = 'ok';
				// format pass md5
				$newPassword = md5($password1);
				// update bdd
				$connectDBIntelApp->exec("update members set password='$newPassword', lostPassCode='', dateRequestRegeneratePass='0000-00-00 00:00:00' where idMember='$idMember' limit 1");
				session_unset();
				$_SESSION['okAge']="ok";
				/*if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
				if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
				if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}*/
				header('location:'.$app_urlRoot.'/connect.php?reLog=2');
			}else {
				$okNewPass = 'nokn';
			}
		}else {
			//exit('youpi2');
			//$okNewPass = 'ok';
			// format pass md5
			$newPassword = md5($password1);
			// update bdd
			$connectDBIntelApp->exec("update members set password='$newPassword', lostPassCode='', dateRequestRegeneratePass='0000-00-00 00:00:00' where idMember='$idMember' limit 1");
			session_unset();
			$_SESSION['okAge']="ok";
			/*if(isset($_COOKIE['remember'])) { setcookie("remember", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
			if(isset($_COOKIE['rememberMe'])) { setcookie("rememberMe", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}
			if(isset($_COOKIE['logOk'])) { setcookie("logOk", '', time()- 3600, "/", $_SERVER['HTTP_HOST'], true, true);}*/
			header('location:'.$app_urlRoot.'/connect.php?reLog=2');
		}
		
	}else {
		$okNewPass = 'nokn';
	}
}









// renvois des emails d'activation d'un compte
// si deja encoder et valider ne pas envoyer !!! ne pas faire chier ceux qui on deja activer leur compte !
// recup idmembre en get ! si on me pirate cela ne peux que renvoyer des mail "finalement de relance au user qui non pas encore activer leur compte"
//////////////////////////////////////////////////////////////////
////////////////////////////////// envois mail de validation
///// rem
/*if(isset($_GET['rem'])) {
	$idMembre = $_GET['rem'];
	$okEnvoisEmailRem = '';
	// controle si deja ok 
	connecter_escort();
	$sql="select * from membres where idMembre='$idMembre'";
	$ensemble = mysql_query($sql) or die(mysql_error);
	if($getResult=mysql_fetch_array($ensemble, MYSQL_ASSOC)) {
		$codeValidationEmail = $getResult['codeValidationEmail'];
		$nomInscrit = $getResult['pseudo'];
		$emailInscrit = $getResult['email'];
		$emailConfirmer = $getResult['emailConfirmer'];
		$passCrypter = $getResult['passCrypter'];
	}
	// test combien de fois c'est envoyer
	if(($passCrypter=='non') && ($emailConfirmer=='non')) {
		require_once("admin/scripts/ca/".$_SESSION['langue']."/email_".$_SESSION['langue']."_nouveau_membre.php");
		$okEnvoisEmailRem = true;
		//header('location:connexion.php?');
	}
}*/
/////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////
?>