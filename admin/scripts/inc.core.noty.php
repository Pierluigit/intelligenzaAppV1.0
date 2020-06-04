<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Noty Alpha Project
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Delete member
////////////////////////////////////////////////////////////////////
if(isset($_SESSION['suppMember'])) { //alert('success');//debug
	$idMember = $_SESSION['suppMember'];
	// recup infos
	require_once("scripts/inc.core.get.valueMember.php");
	require_once("scripts/inc.core.get.valueIntelMember.php");
	require_once("scripts/inc.core.get.valueAddressMember.php");
?>
<script>
	$(document).ready( function () {
		$('#deleteMember').click();
	} );
</script>
<a href="#deleteM" id="deleteMember" data-toggle="modal"></a>
<!-- BEGIN modal -->
<div class="modal modal-cover modal-inverse fade" id="deleteM">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header p-b-xs">
				<h3 class="modal-title text-success">Delete Member?</h3>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p class="m-b-lg">
					Pseudo : <?php echo($pseudoMember);?><br>
					Since : <?php echo($dateInscriptionMember);?><br>
					Bill : <?php echo($totalBillMember);?><br>
					Photo : <?php echo($totalPhotoMember);?><br>
					Galleries : <?php echo($totalGalleryMember);?><br>
					Video : <?php echo($totalVideoMember);?><br>
					Friends : <?php echo($totalMembersFriendsMember);?><br>
					Posts : <?php echo($totalPostsMember);?><br>
					Comments : <?php echo($totalCommentsMember);?><br>
					Comment Votes : <?php echo($totalCommentsVotesMember);?><br>
					Labels : <?php echo($totalLabelsMember);?><br>
				</p>
				<div class="row">
					<div class="col-md-12">
						<a href="?cancelDeleteMember=1"><button type="button" class="btn btn-success btn-lg btn-block">Abandon</button></a>
					</div>
				</div>
				<br><br>
				<div class="row">
					<div class="col-md-12">
						<a href="?permanentlyDeleteMember=1"><button type="button" class="btn btn-danger btn-lg btn-block">Permanently Delete</button></a>
					</div>
				</div>
				
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- END modal -->
<?php }?>

<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Block member
////////////////////////////////////////////////////////////////////
if(isset($_SESSION['blockId'])) { //alert('youpiii');
	$idMember = $_SESSION['blockId'];
	// recup infos
	require_once("scripts/inc.core.get.valueMember.php");
	require_once("scripts/inc.core.get.valueIntelMember.php");
	$dbRequestVisit=$connectDBIntelApp->query("select * from site_stats_visits where idMember='$idMember' order by dateVisit desc");
	$dbRequestVisit->setFetchMode(PDO::FETCH_OBJ);
	if( $getResultVisit = $dbRequestVisit->fetch() ) {
		$ipVisit = $getResultVisit->ipUser;
		$dateVisit = $getResultVisit->dateVisit;
		// extrais date last visit
		$dateJJ = substr($dateVisit, 8, 2);     // jour  
		$dateMM = substr($dateVisit, 5, 2);    // mois 
		$dateAAAA = substr($dateVisit, 0, 4); // annee
		$dateLastVisitMember = $dateJJ."-".$dateMM."-".$dateAAAA;
		// extract time
		$timeHours = substr($dateVisit, 11, 2);
		$timeMinutes = substr($dateVisit, 14, 2);
		$timeSeconds = substr($dateVisit, 17, 2);
		$timeLastVisitMember = $timeHours.":".$timeMinutes.":".$timeSeconds;
	}
?>
<script>
	$(document).ready( function () {
		$('#blockMember').click();
	} );
</script>
<a href="#blockM" id="blockMember" data-toggle="modal"></a>
<!-- BEGIN modal -->
<div class="modal modal-cover modal-inverse fade" id="blockM">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header p-b-xs">
				<h3 class="modal-title text-success">Block Member?</h3>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<p class="m-b-lg">
					Pseudo : <?php echo($pseudoMember);?><br>
					Since : <?php echo($dateInscriptionMember);?><br>
					Last Visit : <?php echo($dateLastVisitMember);?> <?php echo($timeLastVisitMember);?><br>
					Last IP : <?php echo($ipVisit);?>
				</p>
				<br>
				<div class="row">
					<div class="col-md-12">
						<a href="?cancelBlockMember=1"><button type="button" class="btn btn-success btn-lg btn-block">Abandon</button></a>
					</div>
				</div>
				<br><br>
				How Long?<br>
				<form action="?" method="post">
				<input type="hidden" name="emailBlock" value="<?php echo($emailMember);?>">
				<input type="hidden" name="ipBlock" value="<?php echo($ipVisit);?>">
				<select tabindex="5" class="form-control m-b-10 input-sm" name="howLong" id="howLong" style="width: 222px">
					<option value="300">5 min.</option>
					<option value="1800">30 min.</option>
					<option value="3600">1 hour</option>
					<option value="86400">24 hours</option>
					<option value="604800">1 week</option>
					<option value="1209600">2 weeks</option>
					<option value="1814400">3 weeks</option>
					<option value="2419200">1 month</option>
					<option value="forever">Forever</option>
				</select>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" name="blockMember" class="btn btn-danger btn-lg btn-block">Block Member</button>
					</div>
				</div>
				</form>
				
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- END modal -->
<?php }?>

<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// noty member
////////////////////////////////////////////////////////////////////
if((isset($_SESSION['notyM'])) && ($page=="app_profileEdit")) { //alert('youpiii');
	$idMemberCode = $_SESSION['notyM'];
	$idMember = getSingleValue("members", "idMCode", $idMemberCode, "idMember"); // table, where field, value, columnName
	// recup infos
	require_once("scripts/inc.core.get.valueMember.php");
	require_once("scripts/inc.core.get.valueIntelMember.php");
?>
<script>
	$(document).ready( function () {
		$('#notyM').click();
	} );
</script>
<a href="#notyMember" id="notyM" data-toggle="modal"></a>
<!-- BEGIN modal -->
<div class="modal modal-cover modal-inverse fade" id="notyMember">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header p-b-xs">
				<h3 class="modal-title text-success">Send a Notification to <?php echo($pseudoMember);?>?</h3>
				<button class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form action="?" method="post">
				<input type="hidden" name="idMember" value="<?php echo($idMember);?>">
				<input type="hidden" name="pseudo" value="<?php echo($pseudoMember);?>">
				<input type="hidden" name="ipBlock" value="<?php echo($ipVisit);?>">
				<input tabindex="1" class="form-control" type="text" name="title" id="title" <?php if((isset($_POST['notyMember'])) && ($okTitle==false)) {?> style="border: 1px solid #e88d3c;"<?php }?> value="<?php echo($_POST['title']);?>" placeholder="Title" maxlength="64" required />
				<br>
				<textarea tabindex="2" class="form-control" name="message" id="message"<?php if((isset($_POST['notyMember'])) && ($okMessage==false)) {?> style="border: 1px solid #e88d3c;"<?php }?> rows="3" placeholder="Message" maxlength="400" required><?php echo($_POST['message']);?></textarea>
				<br>
				<input tabindex="3" class="form-control" type="text" name="link" id="link" value="<?php echo($_POST['link']);?>" placeholder="Link" maxlength="255" />
				<br>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" name="notyMember" class="btn btn-success btn-sm btn-block">Send Noty</button>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12">
						<a href="?cancelNotyMember=1"><button type="button" class="btn btn-danger btn-sm btn-block">Abandon</button></a>
					</div>
				</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<!-- END modal -->
<?php }?>

<script>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Member must have a secure email
////////////////////////////////////////////////////////////////////
if(isset($_GET['notyOk'])) {
	$idMember = $_GET['notyOk'];
	$pseudoMember = getSingleValue("members", "idMember", $idMember, "pseudo"); // table, where field, value, columnName
	?>
	function okNoty() {
	$.notify({
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: "<?php //echo($tr_text_noty_youMustHaveSecureEmail);?>You've just sent a notification to <?php echo($_SESSION['notyOkToPseudoMember']);?>",
		url: '',
		target: '_blank'
	},{
		type: "success",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 9000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	okNoty();
	<?php
}
?>
</script>
<script>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Check Limit Age
////////////////////////////////////////////////////////////////////
if($app_ifLimitAge=="yes") { // set in the inc.settings.php
	if(!isset($_SESSION['okAge'])) { //alert('success');//debug?>
	$.confirm({
		theme: 'my_theme_noty',
		title: '<?php echo($tr_text_alert_confirmAge_title);?>',
		titleClass: '',
		type: '',// info/success/failure/warning
		typeAnimated: true,
		draggable: true,
		dragWindowBorder: true,
		animateFromElement: true,
		alignMiddle: true,
		smoothContent: true,
		animation: 'scale',
		animationSpeed: 400,
		escapeKey: false,
		backgroundDismiss: false,
		closeIcon: false,
		columnClass: 'small', // col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1
		useBootstrap: true,
		autoClose: false, 
		content: "<?php echo($tr_text_alert_confirmAge_t1);?>",
		icon: "fas fa-ban",
		buttons: {
			ok: {
				text: "<?php echo($tr_text_alert_confirmAge_btn1);?>", 
				action: function () {
					$.ajax(
					{
						url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.okAge.php",
						type: "POST",
						success: function(data)
						{
							//alert('success');//debug
						},
						error: function()
						{

						}
					});
				}
			},
			quitter: {
				text: "<?php echo($tr_text_alert_confirmAge_btn2);?>", 
				action: function () {
					document.location.href="https://www.google.com/";
				}
			}
		}
	});
	<?php
	}
}// end if control age == yes
?>
	
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Page Connect Check Login
////////////////////////////////////////////////////////////////////
if($connectNotOk==true) { 
	$message = $tr_text_noty_connexionNotOk;
	if($_SESSION['connectNotOk']==2) { $message = $tr_text_noty_warningLastAttempt;}
	if($_SESSION['connectNotOk']==3) { $message = $tr_text_noty_faileAttempt;}
	?>
	function connectNotOk() {
	$.notify({
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php echo($message);?>',
		url: '',
		target: '_blank'
	},{
		type: "<?php if($_SESSION['connectNotOk']==1) {?>info<?php }?><?php if($_SESSION['connectNotOk']==2) {?>warning<?php }?><?php if($_SESSION['connectNotOk']==3) {?>danger<?php }?>",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	connectNotOk();
	<?php
}
?>
	<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Member must have a secure email
////////////////////////////////////////////////////////////////////
if(isset($_SESSION['emailNotSecure'])) {//$emailNotSecure==true) {//
	?>
	function emailNotSecure() {
	$.notify({
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php echo($tr_text_noty_youMustHaveSecureEmail);?> <?php if($page!="app_profileEdit") {?><a href="profileEdit.php?editConnection=1">connection</a><br><?php echo($app_linksSecureWebMail);?><?php }?>',
		url: '',
		target: '_blank'
	},{
		type: "warning",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 9000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	emailNotSecure();
	<?php
}
?>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Member must have a secure password
////////////////////////////////////////////////////////////////////
if((isset($_SESSION['passUserNotSecure'])) && ($page!="connect")) {//$emailNotSecure==true) {//
	?>
	function passUserNotSecure() {
	$.notify({
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php //echo($tr_text_noty_youMustHaveSecureEmail);?>To enhance your security, You should have a secure password <?php if($page!="app_profileEdit") {?><a href="profileEdit.php?editConnection=1">connection</a><?php }?><br><?php //echo($app_linksSecureWebMail);?>',
		url: '',
		target: '_blank'
	},{
		type: "warning",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 9000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	passUserNotSecure();
	<?php
}
?>
	
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Page register Check signup
//////////////////////////////////////////////////////////////////// not used!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if((isset($_POST['btn_signup_'])) && ($okFormInscription==false)) {
	?>
	function checkSignUp() {
	$.notify({
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php echo($tr_text_noty_errorInscription);?>',
		url: '',
		target: '_blank'
	},{
		type: "warning",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	checkSignUp();
	<?php
}
?>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Page register ok signup
////////////////////////////////////////////////////////////////////
if(isset($_SESSION['okFormInscription'])) {
	?>
	function okFormInscription() {
	$.notify({
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_okInscription);?> <?php echo($_SESSION['pseudoInscrit']);?>, <?php echo($tr_text_noty_confirmEmail);?> : <?php echo($_SESSION['emailInscrit']);?> ! ',
		url: '',
		target: '_blank'
	},{
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	okFormInscription();
	<?php
}
?>
<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Language not translated success <?php echo($tr_text_noty_languageNotTranslated);
////////////////////////////////////////////////////////////////////	
if($languageNotTranslated==true) {
	?>
	function languageNotTranslated() {
	$.notify({
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_languageNotTranslated);?> !',
		url: '',
		target: '_blank'
	},{
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	languageNotTranslated();
	<?php
}
?>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Admin Access not allowed only on connect page
////////////////////////////////////////////////////////////////////
if((isset($_SESSION['notyConnectNotAllowed'])) && ($page=="connect")) {
	?>
	function notyConnectNotAllowed() {
	$.notify({
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_connectNotAllowed);?>Reset Session Access not allowed at the moment! ',
		url: '',
		target: '_blank'
	},{
		type: "danger",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	notyConnectNotAllowed();
	<?php
}
?>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Page lostpass ok regenerate
////////////////////////////////////////////////////////////////////
if(isset($_SESSION['okFormLostPass'])) {
	?>
	function okFormLostPass() {
	$.notify({
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_thank);?> <?php echo($_SESSION['pseudookFormLostPass']);?>, <?php echo($tr_text_noty_checkEmailForRecreatePass);?> : <?php echo($_SESSION['emailokFormLostPass']);?> ! ',
		url: '',
		target: '_blank'
	},{
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	okFormLostPass();
	<?php
}
?>
<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Page lostpass nok regenerate time exceeded
////////////////////////////////////////////////////////////////////
if(isset($_SESSION['lostPassTimeExceeded'])) {
	?>
	function lostPassTimeExceeded() {
	$.notify({
		icon: 'fas fa-info-circle',
		title: '',
		message: 'Process Generate Password Time exceeded!<?php //echo($tr_text_noty_checkEmailForRecreatePass);?>! Try again',
		url: '',
		target: '_blank'
	},{
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	lostPassTimeExceeded();
	<?php
}
?>

	
	
	
	
	
	
	
<?php
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Page lostpass ok regenerate
////////////////////////////////////////////////////////////////////
///////////////////////
// noty test si ok new email change
/*$_SESSION['okFormInscription'] = "ok"; 
$_SESSION['emailInscrit'] = $emailInscrit;
$_SESSION['pseudoInscrit'] = $pseudoInscrit;*/
///////////////////////
if(isset($_SESSION['okChangeEmail'])) {
	?>
	function okChangeEmail() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_thank);?> <?php echo($pseudoUser);?>, <?php echo($tr_text_noty_confirmEmail);?> : <?php echo($_SESSION['emailNew']);?> ! ',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	okChangeEmail();
	<?php
}
?>
<?php 
///////////////////////
// noty test si new email ok
///////////////////////
if((isset($_POST['btn_changeEmail'])) && (isset($_SESSION['newEmailNotOk']))) {
	?>
	function newEmailNotOk() {
	$.notify({
		// options
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php echo($tr_text_noty_errorCheckNewEmail);?>errors email',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "danger",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	newEmailNotOk();
	<?php
}
?>
<?php 
///////////////////////
// noty test si ok new email change
/*$_SESSION['okFormInscription'] = "ok"; 
$_SESSION['emailInscrit'] = $emailInscrit;
$_SESSION['pseudoInscrit'] = $pseudoInscrit;*/ 
///////////////////////
	//$_SESSION['count']=0;
if((isset($_SESSION['okChangeEmail2'])) || (isset($_GET['okNewMail']))) {
	
	//if($i<2) {// how many times user see the noty
	?>
	function okNewMail() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_okNewEmailConfirmed);?>',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	okNewMail();
	<?php
		//$_SESSION['count']+=1;
	//}else {
		//unset($_SESSION['count']);
	//}
	
}
?>
	
	
	
	
	
	
	<?php 
	///////////////////////
	// noty test si new pass ok
	///////////////////////
	if($okNewPass=='ok') {
		?>
		function activeNoty1() {
		$.notify({
			// options
			icon: 'fas fa-exclamation-circle',
			title: '',
			message: '<?php echo($txt);?>! ',
			url: '',
			target: '_blank'
		},{
			// settings
			type: "success",
			allow_dismiss: true,
			placement: {
				from: "top",
				align: "center"
			},
			z_index: 10031,
			delay: 7000,
			timer: 1000,
			url_target: '_blank',
			mouse_over: null,
			animate: {
				enter: 'animated fadeInDown',
				exit: 'animated fadeOutUp'
			},
		});
		}
		activeNoty1();
		<?php
	}
	?>	
<?php 
///////////////////////
// noty test si new pass ok I use !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
///////////////////////
if((isset($_GET['okNewPass'])) && ($_GET['okNewPass']=="nok")) {
	?>
	function okNewPassNotok() {
	$.notify({
		// options
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php //echo($tr_text_noty_errorCheckActualPass);?>Errors check your data and try again!',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "danger",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	okNewPassNotok();
	<?php
}
?>
<?php 
///////////////////////
// noty test si new pass ok
///////////////////////
if($okNewPass=="nokn") {
	?>
	function activeNoty2() {
	$.notify({
		// options
		icon: 'fas fa-exclamation-circle',
		title: '',
		message: '<?php echo($tr_text_noty_errorCheckNewPass);?>',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "danger",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	activeNoty2();
	<?php
}
?>
<?php 
///////////////////////
// noty test si email confirme 
///////////////////////
if(isset($_SESSION['noty_emailConfirmed'])) {
	?>
	function noty_emailConfirmed() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_thank);?> <?php echo($_SESSION['pseudoInscrit']);?>, <?php echo($tr_text_noty_okEmailConfirmedYouCanConnect);?> <?php if($page!="connect") {?><a href="'.$app_urlRoot.'/connect.php?"><?php echo($tr_text_noty_here);?></a><?php }?>!',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	noty_emailConfirmed();
	<?php
}
?>
	
	
	
	
	
	
<?php 
///////////////////////////////////////////////////////////////////////////////// ok
// noty test si ok new email change
/*$_SESSION['okFormInscription'] = "ok"; 
$_SESSION['emailInscrit'] = $emailInscrit;
$_SESSION['pseudoInscrit'] = $pseudoInscrit;*/
///////////////////////
if(isset($_SESSION['lostPass'])) {
	?>
	function lostPass() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php if($page!="lostPassword") {?><a href="<?php echo($app_urlRoot);?>/lostPassword.php?"><?php echo($tr_text_noty_here);?></a><?php }else {?><?php echo($tr_text_noty_here);?><?php }?>, <?php echo($tr_text_noty_youCanRegeneratePass);?>',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	lostPass();
	<?php
}
?>
<?php 
///////////////////////
// noty limit connexion ok use !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
///////////////////////
if(isset($_GET['reLog'])) {
	if($_GET['reLog']=='3') {
		$message = $tr_text_noty_okChangeEmailRelog;
	}
	if($_GET['reLog']=='2') {
		$message = $tr_text_noty_okChangePassRelog;
	}
	if($_GET['reLog']=='') {
		$message = $tr_text_noty_limitTime;
	}
	if($_GET['reLog']=='1') {
		$message = $tr_text_noty_limitTime;
	}
	?>
	function activeNotyLog() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '<?php echo($message);?>',
		message: '',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});

	}
	activeNotyLog();
	<?php
}
?>	
<?php 
///////////////////////
// noty limit connexion
///////////////////////
if(isset($_GET['reLog_'])) {
	?>
	function activeNoty() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_limitTime);?>',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	activeNoty();
	<?php
}
?>	
<?php 
///////////////////////
// noty thank for contact us ok used !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
///////////////////////
if(isset($_GET['okcf'])) {
	?>
	function activeNotyContact() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php echo($tr_text_noty_thankContactUs);?>',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 7000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	activeNotyContact();
	<?php
	//unset($_SESSION['validEmail']);
}
?>
	
<?php 
///////////////////////
// noty dynamic for contact us ok used !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
///////////////////////
if(isset($_GET['okcf'])) {
	?>
	function activeNotyAdmin() {
		$.notify({
			// options
			icon: 'fas fa-info-circle',
			/*title: 'Success',*/
			message: '<?php //echo($tr_text_noty_thankContactUs);?>Success<br> Bravo Merci je t aime<br><a href="https://intelligenza.pro" target="_blank">ici youpi </a>',
			url: 'https://intelligenza.pro',
			target: '_blank'
		},{
			// settings
			type: "success",
			allow_dismiss: false,
			
			placement: {
				from: "top",
				align: "center"
			},
			
			z_index: 10031,
			delay: 0,// 0 = always
			timer: 1000,// 
		});
	}
	activeNotyAdmin();
	
	function test() {
		alert("success youpi");
	}
	<?php
	//unset($_SESSION['validEmail']);
}
?>
	<?php 
///////////////////////
// noty dynamic for contact us ok used !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
///////////////////////
if(isset($_GET['okcf'])) {
	?>
	function activeNotyAdmin2() {
	$.notify({
		// options
		icon: 'fas fa-info-circle',
		title: '',
		message: '<?php //echo($tr_text_noty_thankContactUs);?>Success 240 000 nouveau inscription youpi et 100000000000 de don wowwowowo',
		url: '',
		target: '_blank'
	},{
		// settings
		type: "info",
		/*allow_dismiss: false,*/
		placement: {
			from: "top",
			align: "center"
		},
		z_index: 10031,
		delay: 14000,
		timer: 1000,
		url_target: '_blank',
		mouse_over: null,
		animate: {
			enter: 'animated fadeInDown',
			exit: 'animated fadeOutUp'
		},
	});
	}
	activeNotyAdmin2();
	<?php
	//unset($_SESSION['validEmail']);
}
?>
</script>













