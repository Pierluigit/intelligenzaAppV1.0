<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Framework Alpha Project
////////////////////////////////////////////////////////////////////
// 1. debug console
// 2. basic library and my functions
// 3. check if block right clic and selection
// 4. generate strong password
// 5. Functions Javascripts Javascript Ajax PHP MySQL Dynamic
// 6. Stats Clic (optional)
// 7. choose language
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// debug consol 
////////////////////////////////////////////////////////////////////
if(isset($_GET['debug'])) {// to view console put value get ?debug=1?>
<script>
	$(document).ready( function () {
		$('#openDebug').click();
	} );
</script>
<a href="#debugConsol" id="openDebug" data-toggle="modal"></a>

<div class="modal modal-inverse fade" id="debugConsol">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="titleDebug">Debug Console</h3>
				Date : <?php echo($dateNow);?>
				<p>
					<span id="hours"></span>
					<span class="point">:</span>
					<span id="min"> </span>
					<span class="point">:</span>
					<span id="sec"></span>
				</p>
				
				<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">
							PHP <?php echo(PHP_VERSION);?> 
						</div>
						<div class="col-md-10">
							<a href="<?php echo($app_urlRoot);?>/scripts/phpinfo.php" target="_blank">PHP Init Info</a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							URL Root
						</div>
						<div class="col-md-10">
							<?php echo($app_urlRoot);?></a>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							SSL 
						</div>
						<div class="col-md-10">
							<?php if($https==true) {// from scripts/intelligenzaSite.php?><span class="green">HyperText Transfer Protocol Secure</span><?php }else {?><span class="red">Not Safe</span><?php }?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							GEOLOC
						</div>
						<div class="col-md-10">
							Contient Code : <span class="green"><?php echo($_SESSION['geoplugin_continentCode']); ?></span> / 
							Country : <span class="green"><?php echo($_SESSION['geo_country']); ?></span> / 
							Code : <span class="green"><?php echo($_SESSION['geo_countryCode']); ?></span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							LANGUAGE
						</div>
						<div class="col-md-10">
							<span class="green"><?php echo($_SESSION['language']); ?></span> / 
							<?php if(isset($_SESSION['chooseLanguage'])) {?><span class="green">User Choose</span> <i class="fas fa-check"></i><?php }else {?>Browser Preference : <span class="green"><?php echo($_SERVER['HTTP_ACCEPT_LANGUAGE']); ?><?php }?></span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							IP Public
						</div>
						<div class="col-md-10">
							<span class="green"><?php echo($_SERVER['REMOTE_ADDR']);?></span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							ENVIRONMENT
						</div>
						<div class="col-md-10">
							<span class="green"><?php echo($_SERVER['HTTP_USER_AGENT']);?></span> / Platform : <span class="green"><?php if($smartPhone!="yes") {echo($platform);}else { echo($whatSupport);}?></span> / Browser : <span class="green"><?php echo($browser);?></span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							STATUT Connection
						</div>
					  	<div class="col-md-10">
						<p>
							<?php if(!isset($_SESSION['logOk'])) {?>
								Logout
							<?php }else {?>
								<span class="green"><?php if(isset($_COOKIE['remember'])) { ?>Remember Me <?php echo($app_timeRememberMeF);// F = formated?><?php }else {?>Login <?php echo($app_timeConnectionF);// F = formated?>.<?php }?></span><br>

								ID User : <span class="green"><?php echo($_SESSION['idUser']);?></span>, Name : <span class="green"><?php echo($pseudoUser); ?></span>, Rights : <span class="green"><?php echo($rightsUser);?></span>, Sub Rights : <span class="green"><?php echo($subRightsUser);?></span><br>
							<?php }?>
							</p>
					 	</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							Check Age
						</div>
						<div class="col-md-10">
							<?php if($app_ifLimitAge=="yes") {?>Yes<?php }else {?>No<?php }?>
							
							<?php if(isset($_SESSION['okAge'])) {?>
							 / <span class="green">User has validate his age!</span>
							<?php }?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							Double Authentification
						</div>
						<div class="col-md-10">
							<?php if($app_ifDoubleAuthentification=="yes") {?><span class="green">Yes, actived</span><?php }else {?>Not actived<?php }?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							If blocked
						</div>
						<div class="col-md-10">
							Rights clic and selection : <?php if($app_ifLookSelectAndRightClic=="yes") {?><span class="green">Yes, you are safe</span><?php }else {?>No<?php }?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							Statut Audio
						</div>
						<div class="col-md-10">
							<?php if(isset($_SESSION['statutSound'])) {?><span class="green">Yes, you have choose <?php echo($_SESSION['statutSound']);?></span><?php }else {?>No session choice<?php }?> / Default volume <?php echo($app_volume);?>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-2">
							Session Variables 
						</div>
						<div class="col-md-10">
							<?php 
							echo '<pre>';
							var_dump($_SESSION);
							echo '</pre>';
							?>
						</div>
					</div>
				
				</div>
			</div>
			<div class="modal-footer"> 
				<?php echo($app_nameProject);?> <?php echo($tr_text_copyRights);?>
				<!--<button type="button" class="btn btn-grey" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success">Save changes</button>-->
			</div>
		</div>
	</div>
</div>
<?php }?>



<?php 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// basic library and my functions
////////////////////////////////////////////////////////////////////
?>
<!-- notifications -->
<script src="<?php echo($app_urlRoot);?>/js/bootstrap-notify.js"></script>
<!-- confirme -->
<script src="<?php echo($app_urlRoot);?>/js/jquery-confirm.min.js"></script>
<!-- dropzone -->
<script src="<?php echo($app_urlRoot);?>/js/dropzone.js"></script>
<!-- fonctions ajax et de control -->
<script src="<?php echo($app_urlRoot);?>/js/fonctions.js"></script>
<!-- font awesome pour les icones de ok validation -->
<script src="<?php echo($app_urlRoot);?>/js/fontAwesome.js" crossorigin="anonymous"></script>
<!-- angular -->
<!--<script src="<?php //echo($app_urlRoot);?>/js/angular.min.js" charset="utf8"></script>
<script src="<?php //echo($app_urlRoot);?>/js/ui-bootstrap.min.js"></script>
<script src="<?php //echo($app_urlRoot);?>/js/ui-bootstrap-tpls.min.js"></script>-->
<!-- data table -->
<script src="<?php echo($app_urlRoot);?>/js/jquery.dataTables.js" charset="utf8"></script>

<script>
	// mask and show field password
	$(".passwordShow").click(function() {
	  $(this).toggleClass("fa-eye fa-eye-slash");
	  var input = $($(this).attr("toggle"));
	  if (input.attr("type") == "password") {
		input.attr("type", "text");
	  } else {
		input.attr("type", "password");
	  }
	});
</script>


<?php 
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
// dynamic mode
////////////////////////////////////////////////////////////////////////////
if($app_ifActiveAcceptCookies=="yes") {// if app demand accept cookies = yes
////////////////////////////////////////////////////////////////////////////?>
<!-- START Bootstrap-Cookie-Alert -->
<div class="text-center cookiealert" role="alert"><br>
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a href="<?php echo($app_urlRoot);?>/privacy.php" target="_blank">Learn more</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I agree
    </button>
</div>
<!-- Include cookiealert script -->
<script src="<?php echo($app_urlRoot);?>/js/cookiealert.js"></script>
<!-- END Bootstrap-Cookie-Alert -->
<?php 
////////////////////////////////////////////////////////////////////////////
}?>


<?php 
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
// dynamic mode
////////////////////////////////////////////////////////////////////////////
if($app_ifUseAudio=="yes") {// if app audio settings = yes
	//echo("success");exit(0);
////////////////////////////////////////////////////////////////////////////?>
<?php // if is not a smartphone
if($smartPhone!="yes") {?>
<!-- soundmanager -->
<script src="<?php echo($app_urlRoot);?>/js/soundmanager2.js"></script>
<!--<script src="<?php //echo($app_urlRoot);?>/js/360player.js"></script>-->
<!-- load sounds -->
<?php //require_once("".$app_urlRoot."/scripts/inc.loadSounds.php");?>
<script>
	soundManager.setup({
	  url: '<?php echo($app_urlRoot);?>/modular/_sm/swf/',
	  onready: function() {
		// load sounds
		var pageComingSoon = soundManager.createSound({
		  id: 'pageComingSoon',
		  url: '<?php echo($app_urlRoot);?>/audio/pageComingSoon.mp3'
		});
		var pageRegister = soundManager.createSound({
		  id: 'pageRegister',
		  url: '<?php echo($app_urlRoot);?>/audio/pageRegister.mp3'
		});
		var pageAirlock = soundManager.createSound({
		  id: 'pageAirlock',
		  url: '<?php echo($app_urlRoot);?>/audio/pageAirlock.mp3'
		});
		var pageTerms = soundManager.createSound({
		  id: 'pageTerms',
		  url: '<?php echo($app_urlRoot);?>/audio/pageTerms.mp3'
		});
		var pagePrivacy = soundManager.createSound({
		  id: 'pagePrivacy',
		  url: '<?php echo($app_urlRoot);?>/audio/pagePrivacy.mp3'
		});
		var pageLostPass = soundManager.createSound({
		  id: 'pageLostPass',
		  url: '<?php echo($app_urlRoot);?>/audio/pageLostPass.mp3'
		});
		var pageFaq = soundManager.createSound({
		  id: 'pageFaq',
		  url: '<?php echo($app_urlRoot);?>/audio/pageFaq.mp3'
		});
		var pageLogin = soundManager.createSound({
		  id: 'pageLogin',
		  url: '<?php echo($app_urlRoot);?>/audio/pageLogin.mp3'
		});
		var pageContact = soundManager.createSound({
		  id: 'pageContact',
		  url: '<?php echo($app_urlRoot);?>/audio/pageLogin.mp3'
		});
		var openApp = soundManager.createSound({
		  id: 'openApp',
		  url: '<?php echo($app_urlRoot);?>/audio/pageLogin.mp3'
		});
		
		<?php if($page=="register") {?>pageRegister.play();<?php }?>
		<?php if($page=="airlock") {?>pageAirlock.play();<?php }?>
		<?php if($page=="terms") {?>pageTerms.play();<?php }?>
		<?php if($page=="privacy") {?>pagePrivacy.play();<?php }?>
		<?php if($page=="faq") {?>pageFaq.play();<?php }?>
		<?php if($page=="lostPassword") {?>pageLostPass.play();<?php }?>
		<?php if($page=="connect") {?>pageLogin.play();<?php }?>
		<?php if($page=="contact") {?>pageContact.play();<?php }?>
		<?php if($page=="app_admin_appSettings") {?>openApp.play();<?php }?>
		
		
		
	  },
	  ontimeout: function() {
		// Hrmm, SM2 could not start. Missing SWF? Flash blocked? Show an error, etc.?
		  //alert("ops time out Hrmm, SM2 could not start.");
	  }
	});
	// default config 
	soundManager.debugMode = true;
	soundManager.flashVersion = 9;
	soundManager.useHTML5Audio = true;	
	soundManager.defaultOptions.volume = <?php echo($app_volume);?>;
	<?php // check statut audio 
		if(isset($_SESSION['statutSound'])) {// if choice user
			if($_SESSION['statutSound']=='up') {// which choice?>
				soundManager.unmute();
			<?php }
			if($_SESSION['statutSound']=="off") {?>
				soundManager.mute();
			<?php }
		}else {// no choice default app?>
			soundManager.unmute();
		<?php }
	?>
	//soundManager.unmute();
	var slider = document.getElementById("myRange");
	//var output = document.getElementById("demo");
	//output.innerHTML = slider.value; // Display the default slider value
	
	// Update the current slider value (each time you drag the slider handle)
	slider.oninput = function() { //alert("success");//debug
	  //output.innerHTML = this.value;
		//alert(this.value);
	  // here inform sm
	  soundManager.setVolume(this.value);
	}
	// active le son ou deactive
function activeAudio() { //alert('active');
	soundManager.unmute();
	changeStatutAudio('up');
	document.getElementById('muteA').innerHTML = '<a href="javascript:return;" title="Mute" style="cursor:pointer;" onClick="mute();"><i class="fa fa-volume-up fa-2x"></i></a>';
}
function mute() { //alert('mute');
	soundManager.mute();
	changeStatutAudio('off');
	document.getElementById('muteA').innerHTML = '<a href="javascript:return;" title="Activate Audio" style="cursor:pointer;" onClick="activeAudio();"><i class="fa fa-volume-off fa-2x"></i></a>';
}
/*function checkStatusAudio() {
	
	"use strict";
	// requete ajax
	//var formData = {lg:lg};
	$.ajax(
	{
		url : "<?php //echo($app_urlRoot);?>/admin/scripts/inc.core.check.statutAudio.php", 
		type: "POST",
		//data : formData,
		success: function(data)
		{
			//window.location = "?";
			if(data==='off') {
				// ici ouvrire une fenetre de parametres volume et d'activation du son 
				alert('Oops sound off!');
			}
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			// rien
		}
	});
}*/
function changeStatutAudio(statut) { //alert('youpi '+statut);
	"use strict";
	// requete ajax
	var formData = {statut:statut};
	$.ajax(
	{
		url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.change.statutAudio.php", 
		type: "POST",
		data : formData,
		success: function(data)
		{
			//alert("success youpi");
			// rien
		},
		error: function(jqXHR, textStatus, errorThrown)
		{
			// rien
		}
	});
}
	
</script>
<?php // if is not a smartphone
}?>
<?php 
////////////////////////////////////////////////////////////////////////////
}// end if app audio settings = yes
////////////////////////////////////////////////////////////////////////////
?>

<!-- simple countdown with end call back for abo sale... -->
<script src="<?php echo($app_urlRoot);?>/js/jquery.countdown.js"></script>
<!-- time manager -->
<script src="<?php echo($app_urlRoot);?>/js/moment.js"></script>
<script src="<?php echo($app_urlRoot);?>/js/moment-with-locales.js"></script>

<!--<script src="https://www.flowerspower.ch/js/all.js"></script>-->
<!--<script src="https://www.flowerspower.ch/js/jquery-comments.js"></script>-->

<?php
////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////
// dynamic mode
////////////////////////////////////////////////////////////////////////////
if($app_ifLookSelectAndRightClic=="yes") {// check if block right clic and selection
////////////////////////////////////////////////////////////////////////////?>
<script>
//////////////////////////////////////
// Block Right Clic and Selection
function disableselect(e){ 
	"use strict";
	return false;
} 

function reEnable(){ 
	"use strict";
	return true; 
} 
//if IE4+ 
document.onselectstart=new Function ("return false");
document.oncontextmenu=new Function ("return false"); 
//if NS6 
if (window.sidebar){ 
//document.onmousedown=disableselect 
document.onclick=reEnable;
}
///////////////////////////////////////////
</script>
<?php
////////////////////////////////////////////////////////////////////////////
}// end if app block right clic and selection
////////////////////////////////////////////////////////////////////////////
?>


<script>
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// generate strong password
////////////////////////////////////////////////////////////////////
function generatePassword() { //alert("success");//debug
	"use strict";
	$.ajax(
	{
	url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.generateStrongPassword.php",
	type: "POST",
	success: function(data)
	{
		passwordStrength(data);
		document.getElementById('password1').value = ""+ data + "";
		document.getElementById('password2').value = ""+ data + "";
		
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	},
	error: function()
	{
		document.getElementById('showPass').innerHTML = 'Error ajax !';
		$("#confirm_"+field).css("opacity", "100"); 
		function closeConfirme() {
			$('#confirm_'+field).animate({opacity: 0},1000);
		}
		setTimeout(closeConfirme, 4000);
	}
	});
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Functions Javascripts Ajax PHP MySQL Dynamic 
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// check available pseudo 
////////////////////////////////////////////////////////////////////
function checkPseudo() {  //alert('success check pseudo');//debug
	"use strict";
	var okPseudo = false;
	function checkInfos() { 
		if (document.getElementById('pseudo').value.length<2){
			document.getElementById('pseudo').style.border="1px solid #e88d3c"; 
			document.getElementById('confirm_pseudo').innerHTML = "<?php echo($tr_text_page_connexion_chekPseudo);?>";
			return;
		}else{
			document.getElementById('pseudo').style.border="1px solid green";
			okPseudo = true;
		}
	}
	checkInfos();
	if(okPseudo == true) {
		var pseudo = document.getElementById('pseudo').value;
		var formData = {pseudo:pseudo};
		$.ajax(
		{
			url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.check.pseudo.php",
			type: "POST",
			data : formData,
			success: function(data)
			{
				document.getElementById('confirm_pseudo').innerHTML = ""+ data + "";
				var found = data.indexOf("red");
				if (found!="-1") {
					document.getElementById('pseudo').style.border="3px solid #e88d3c";
					return;
				}else{
					document.getElementById('pseudo').style.border="3px solid green";
				}
			},
			error: function()
			{
				document.getElementById('confirm_pseudo').innerHTML = 'Error ajax !';
			}
		});
	}else {
	return;
	}
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// check pseudo member 
////////////////////////////////////////////////////////////////////
function checkPseudoMember(idMember) {  //alert('success check pseudo member');//debug
	"use strict";
	//alert('coucou');
	var okPseudo = false;
	function checkInfos() { 
		if (document.getElementById('pseudo').value.length<2){
			//alert('youpiiiii -2');
			document.getElementById('pseudo').style.border="1px solid #e88d3c"; 
			document.getElementById('confirm_pseudo').innerHTML = "<?php echo($tr_text_page_connexion_chekPseudo);?>";
			return;
		}else{
			document.getElementById('pseudo').style.border="1px solid green";
			okPseudo = true;
		}
	}
	checkInfos();
	if(okPseudo == true) {
		var pseudo = document.getElementById('pseudo').value;
		var formData = {pseudo:pseudo, idMember:idMember};
		$.ajax(
		{
			url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.check.pseudoMember.php",
			type: "POST",
			data : formData,
			success: function(data)
			{
				//data: data from server
				document.getElementById('confirm_pseudo').innerHTML = ""+ data + "";
				document.getElementById('pseudoUser').innerHTML = ""+ pseudo + "";
				document.getElementById('pseudoUser2').innerHTML = ""+ pseudo + "";
				document.getElementById('pseudoUser3').innerHTML = ""+ pseudo + "";
				var found = data.indexOf("red");
				if (found!="-1") {
					document.getElementById('pseudo').style.border="1px solid #e88d3c";

				}else{
					document.getElementById('pseudo').style.border="1px solid green";
					//okPseudo = true;

				}
			},
			error: function()
			{
				document.getElementById('confirm_pseudo').innerHTML = 'Error ajax!';

			}
		});
	}else {
	return;
	}
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// Stats Clic
////////////////////////////////////////////////////////////////////
// to have stats on labels and products...
// place this code where you want have special stats (for video, product..), with the right variable
// onClick="statsClic(<?php //echo($idProduct);?>,'product','<?php //if($ifUseMyShopUrlLabel=="yes") { echo($urlShopLabel);}else { echo($urlBuyProduct);}?>',<?php //echo($idLabelProduct);?>,'<?php //echo($page);?>','<?php //echo($_SESSION['geo_country']); ?>', '<?php //echo($_SESSION['language']); ?>');"
////////////////////////////////////////////////////////////////////
function statsClic(id,type,cible,idLabel,page,country,language) {
	"use strict";
	// requete ajax
	var formData = {id:id,type:type,cible:cible,idLabel:idLabel,page:page,country:country,language:language};
	$.ajax(
	{
		url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.statClic.php",
		type: "POST",
		data : formData,
		success: function()
		{

		},
		error: function()
		{
			
		}
	});
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// choose language 
////////////////////////////////////////////////////////////////////
function chooseLanguage(language) {  //alert(language);//debug
	"use strict";
	// requete ajax
	var formData = {lg:language};
	$.ajax(
	{
		url : "<?php echo($app_urlRoot);?>/admin/scripts/inc.core.chooseLanguage.php",
		type: "POST",
		data : formData,
		success: function()
		{
			location.reload();
		},
		error: function()
		{
			
		}
	});
}
</script>



