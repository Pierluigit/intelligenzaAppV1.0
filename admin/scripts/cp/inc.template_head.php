<!-- style admin -->
<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/bootstrap/bootstrap4/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/icon/themify-icons/themify-icons.css" rel="stylesheet" />
<link href="<?php echo($app_urlRoot);?>/admin/assets/css/animate.min.css" rel="stylesheet" />
<link href="<?php echo($app_urlRoot);?>/admin/assets/css/style.min.css" rel="stylesheet" />
<link href="<?php echo($app_urlRoot);?>/admin/assets/css/theme/default.css" rel="stylesheet" id="theme" />

<link href="<?php echo($app_urlRoot);?>/css/customAlertBox.css" rel="stylesheet" />
<link href="<?php echo($app_urlRoot);?>/css/font-awesome-animation.min.css" rel="stylesheet">

<style>
	/*field show password*/
	.field-icon {
	  float: right;
	  margin-left: -33px;
	  margin-top: -25px;
	  position: relative;
	  z-index: 2;
	}
	
	.dataTables_filter input {
		height: 33px;
		width: 100%;
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important;
		background: linear-gradient(135deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		color: white;
		border: none;
		transition: ease-in-out, font-size .22s ease-in-out;
	}
	.dataTables_filter input:focus {
		font-size:19px;
		color: antiquewhite !important;
	}
	
	.post-content {
		color: black;
	}
	
</style>
<script>
	//$("input").focusin.css={"border-color:red"}
</script>
<style>
	coming-soon-copyright a {
		color: #3399ff;
		text-decoration: none;
	}
	
	a {
		color: <?php if($app_linkColor!="") { echo($app_linkColor);}else { echo("#3399ff");}?>;/*3399ff*/
		text-decoration: none;
	}
	a:hover {
		color: <?php if($app_linkColorOver!="") { echo($app_linkColorOver);}else { echo("#64b2ff");}?>;/*#64b2ff*/
		text-decoration: none;
	}
	a:active {
		color: <?php if($app_linkColorActive!="") { echo($app_linkColorActive);}else { echo("orange");}?>;
		text-decoration: none;
	}a:visited {
		color: <?php if($app_linkColorVisited!="") { echo($app_linkColorVisited);}else { echo("#64b2ff");}?>;
		text-decoration: none;
	}
	
	::selection {
		color: <?php if($app_selectionColor!="") { echo($app_selectionColor);}else { echo("black");}?>;
		background-color: <?php if($app_selectionColorBg!="") { echo($app_selectionColorBg);}else { echo("white");}?>;
	}
	
	
	table.dataTable td {
		color: black;
	}
	.table-profile th {
		color: white !important;
	}
	
	body {
		<?php if(strstr($page, 'app_')) {?>
		background: url('../images/bg/intelligenza/bgApp.jpg');
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		<?php }?>
		
		background-color: #0F0F0F;
		color: white;
	
	}
	input[type=number] {
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important;
		background: linear-gradient(135deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		color: white;
		border: none;
		transition: ease-in-out, font-size .22s ease-in-out;
	}
	input[type=number]:focus {
		font-size:14px;
		color: antiquewhite !important;
	}
	input[type=email] {
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important;
		background: linear-gradient(135deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		color: white;
		border: none;
		transition: ease-in-out, font-size .22s ease-in-out;
	}
	input[type=email]:focus {
		font-size:14px;
		color: antiquewhite !important;
	}
	input[type=password] {
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important;
		background: linear-gradient(135deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		color: white;
		border: none;
		transition: ease-in-out, font-size .22s ease-in-out;
	}
	input[type=password]:focus {
		font-size:14px;
		color: antiquewhite !important;
	}
	input[type=text] {
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important;
		background: linear-gradient(135deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		color: white;
		border: none;
		transition: ease-in-out, font-size .22s ease-in-out;
	}
	input[type=text]:focus {
		font-size:14px;
		color: antiquewhite !important;
	}
	select {
		background: black;
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important; 
		background: linear-gradient(135deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		color: white !important;
		border: none !important;
		transition: ease-in-out, font-size .22s ease-in-out;
	}
	select:focus {
		font-size:14px;
		color: antiquewhite;
		-webkit-transition: .2s; /* 0.2 seconds transition on hover */
	  transition: opacity .2s;
	}
	textarea {
		color: white !important;
		background: -moz-linear-gradient(-45deg, #000000 0%, #2d2d2d 100%) !important;
		background: -webkit-linear-gradient(-45deg, #000000 0%,#2d2d2d 100%) !important;
		background: linear-gradient(35deg, #000000 0%,#2d2d2d 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#000000', endColorstr='#2d2d2d',GradientType=1 ) !important;
		border: none !important;
    	border-radius: 5px;
		transition: ease-in-out, font-size .22s ease-in-out !important;
	}
	textarea:focus {
		font-size:14px;
		color: antiquewhite !important;
	}
</style>

<style>
	.bg-green {
		color: #fff !important;
		background: #7e68f8 !important;
		background: -moz-linear-gradient(-45deg, green 0%, #609cfc 100%) !important;
		background: -webkit-linear-gradient(-45deg, green 0%,#609cfc 100%) !important;
		background: linear-gradient(135deg, green 0%,#609cfc 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7e68f8', endColorstr='#609cfc',GradientType=1 ) !important;
	}
	.bg-red {
		color: #fff !important;
		background: #7e68f8 !important;
		background: -moz-linear-gradient(-45deg, red 0%, #609cfc 100%) !important;
		background: -webkit-linear-gradient(-45deg, red 0%,#609cfc 100%) !important;
		background: linear-gradient(135deg, red 0%,#609cfc 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7e68f8', endColorstr='#609cfc',GradientType=1 ) !important;
	}
	
	.page-header {
		color: white;
	}
	/* body styles */
	/*body {
		background-color: #4D4D4D;
		color: white;
	}
	a {
		color: aqua;
	}
	a:hover {
		color: white;
	}*/
</style>

<?php if($app_ifActiveAcceptCookies=="yes") {// if app demand accept cookies = yes?>
<!-- cookiealert styles -->
<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/cookiealert.css">
<?php }?>

<!-- my styles -->
<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/jquery-confirm.min.css">
<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/noty_confirm.css">
<link rel="stylesheet" href="<?php echo($app_urlRoot);?>/css/font-awesome.min.css">
<!-- data table -->
<link href="<?php echo($app_urlRoot);?>/css/jquery.dataTables.css" rel="stylesheet">
<link href="<?php echo($app_urlRoot);?>/admin/assets/plugins/table/DataTables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet" />


<style>
	/* volume */
	.slidecontainer {
	  width: 100%; /* Width of the outside container */
	}

	/* The slider itself */
	.slider {
	  -webkit-appearance: none;  /* Override default CSS styles */
		display: inline-block;
	  appearance: none;
	  width: 100%; /* Full-width */
	  height: 8px; /* Specified height */
	  background: #d3d3d3; /* Grey background */
	  outline: none; /* Remove outline */
	  opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
	  -webkit-transition: .2s; /* 0.2 seconds transition on hover */
	  transition: opacity .2s;
	}

	/* Mouse-over effects */
	.slider:hover {
	  opacity: 1; /* Fully shown on mouse-over */
	}

	/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
	.slider::-webkit-slider-thumb {
	  -webkit-appearance: none; /* Override default look */
	  appearance: none;
	  width: 12px; /* Set a specific slider handle width */
	  height: 8px; /* Slider handle height */
	  background: #4CAF50; /* Green background */
	  cursor: pointer; /* Cursor on hover */
	}

	.slider::-moz-range-thumb {
	  width: 12px; /* Set a specific slider handle width */
	  height: 8px; /* Slider handle height */
	  background: #4CAF50; /* Green background */
	  cursor: pointer; /* Cursor on hover */
	}
</style>

<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo($app_urlRoot);?>/images/logo/<?php echo($app_faviconProject);?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo($app_urlRoot);?>/images/logo/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo($app_urlRoot);?>/images/logo/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo($app_urlRoot);?>/images/logo/apple-touch-icon-180x180.png">
<!-- fix bug accordion -->
<style>
	.collapse.show {
	  display: block;
	}	
</style>
<style>
	.bgBox {
		background-color: rgba(0,0,0,0.5);
		border-radius: 14px;
		padding: 14px;
	}
	.bgBoxApp {
		background-color: rgba(0,0,0,0.8);
		/*border-radius: 14px;*/
		/*padding: 14px;*/
	}
	/* write your styles */
	.green {
		color: green;
	}
	.red {
		color: red;
	}
	.orange {
		color: orange;
	}
	.black {
		color: black;
	}
	.white {
		color: white;
	}
	.dateTimeHeader {
		height: 45px;
		width: 111px;
		background-color: rgba(0,0,0,0.8);
		color: white;
		padding: 12px;
	}
	.warning {
		color: orange;
	}
	.profile-header .profile-header-cover {/*1920x699*/
		<?php if($bgProfileUser=="") {?>
			<?php if($app_bgProfileHeader=="") {?>
					background: url('assets/img/profile-cover.jpg');
			<?php }else {
					if(file_exists('../images/bg/'.$app_bgProfileHeader)) {?>
					background: url('../images/bg/<?php echo($app_bgProfileHeader);?>');
					<?php }else {?>
					background: url('assets/img/profile-cover.jpg');
			<?php }
				}?>
		<?php }else {?>
		background: url('../members/id_<?php echo($idUser);?>/img/<?php echo($bgProfileUser);?>');
		<?php }?>
		background-size: 100% auto;
		background-position: center;
		background-repeat: no-repeat;
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
	}
	@media (max-width: 767px) {
		.profile-header .profile-header-cover {
			background-position: top;
		}
	}
	.register-cover {/*1920x1280*/
		
		<?php // if is not a smartphone
		if($smartPhone!="yes2") {?>
			<?php 
			if($app_bgRegister=="") {?>
			background: url('admin/assets/img/intel_register.jpg');
			<?php }else {
			// if existe
			if(file_exists('images/bg/'.$app_bgRegister)) {?>
			background: url('images/bg/<?php echo($app_bgRegister);?>');
			<?php }else {?>
			background: url('admin/assets/img/intel_register.jpg');
			<?php }
			}?>
		
			background-size: 100%;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center center;
			position: fixed;
		<?php }else {
			// not background on smartphone?>
			background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.85) 100%);
			position: fixed;
		<?php }?>
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.register-cover {
			background-size: auto 100%;
		}
	}
	
	.login-cover {/*1920x2880*/
		<?php // if is not a smartphone
		if($smartPhone!="yes2") {?>
			<?php 
			if($app_bgLogin=="") {?>
			background: url('admin/assets/img/intel_login.jpg');
			<?php }else {
			// if existe
			if(file_exists('images/bg/'.$app_bgLogin)) {?>
			background: url('images/bg/<?php echo($app_bgLogin);?>');
			<?php }else {?>
			background: url('admin/assets/img/intel_login.jpg');
			<?php }
			}?>
			background-size: 100%;
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center center;
		<?php }else {
			// not background on smartphone?>
			background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.85) 100%);
			position: fixed;
		<?php }?>
		
		
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	.login-cover:before {
		content: '';
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background: linear-gradient(to bottom, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.85) 100%);
	}
	@media (max-width: 480px) {
		.login-content {
			width: auto;
			margin-left: 0;
			padding: 0 1.25rem;
			left: 0;
			right: 0;
		}
		.login-cover {
			background-size: auto 100%;
		}
	}
	@media (max-width: 1224px) {
		.login-cover {
			background-size: auto 100%;
		}
	}
	.privacy-cover {/*1920x2880*/
		<?php 
		if($app_bgPrivacy=="") {?>
		background: url('admin/assets/img/intel_privacy.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgPrivacy)) {?>
		background: url('images/bg/<?php echo($app_bgPrivacy);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_privacy.jpg');
		<?php }
		}?>
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		position: fixed;
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.privacy-cover {
			background-size: auto 100%;
		}
	}
	.terms-cover {/*1920x2880*/
		<?php 
		if($app_bgTerms=="") {?>
		background: url('admin/assets/img/intel_terms.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgTerms)) {?>
		background: url('images/bg/<?php echo($app_bgTerms);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_terms.jpg');
		<?php }
		}?>
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		position: fixed;
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.terms-cover {
			background-size: auto 100%;
		}
	}
	.airlock-cover {/*1920x2880*/
		<?php 
		if($app_bgAirlock=="") {?>
		background: url('admin/assets/img/intel_airlock.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgAirlock)) {?>
		background: url('images/bg/<?php echo($app_bgAirlock);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_airlock.jpg');
		<?php }
		}?>
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		position: fixed;
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.airlock-cover {
			background-size: auto 100%;
		}
	}
	.lostPass-cover {/*1920x2880*/
		<?php 
		if($app_bgLostPass=="") {?>
		background: url('admin/assets/img/intel_lostPass.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgLostPass)) {?>
		background: url('images/bg/<?php echo($app_bgLostPass);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_lostPass.jpg');
		<?php }
		}?>
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		position: fixed;
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.lostPass-cover {
			background-size: auto 100%;
		}
	}
	.coming-soon-cover {/*1920x1280*/
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		overflow: hidden;
		
		<?php 
		if($app_bgComingSoon=="") {?>
		background: url('admin/assets/img/intel_comingSoon.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgComingSoon)) {?>
		background: url('images/bg/<?php echo($app_bgComingSoon);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_comingSoon.jpg');
		<?php }
		}?>
		background-position: top center;
		background-repeat: no-repeat;
		background-size: 100%;
	}
	@media (max-width: 1024px) {
		.coming-soon-cover {
			background-size: auto 100%;
		}
	}
	.contact-cover {/*1920x1280*/
		<?php 
		if($app_bgContact=="") {?>
		background: url('admin/assets/img/intel_contact.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgContact)) {?>
		background: url('images/bg/<?php echo($app_bgContact);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_contact.jpg');
		<?php }
		}?>
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		position: fixed;
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.contact-cover {
			background-size: auto 100%;
		}
	}
	.faq-cover {/*1920x1280*/
		<?php 
		if($app_bgContact=="") {?>
		background: url('admin/assets/img/intel_faq.jpg');
		<?php }else {
		// if existe
		if(file_exists('images/bg/'.$app_bgFaq)) {?>
		background: url('images/bg/<?php echo($app_bgFaq);?>');
		<?php }else {?>
		background: url('admin/assets/img/intel_faq.jpg');
		<?php }
		}?>
		background-size: 100%;
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center center;
		position: fixed;
		right: 0;
		top: 0;
		left: 0;
		bottom: 0;
	}
	@media (max-width: 1024px) {
		.faq-cover {
			background-size: auto 100%;
		}
	}
</style>