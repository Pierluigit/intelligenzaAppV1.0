<!-- BEGIN coming-soon-footer -->
<div class="coming-soon-footer bgBox">
	<div class="social-list" style="display: block">
		<a href="#"><i class="ti-facebook"></i></a>
		<a href="#"><i class="ti-instagram"></i></a>
		<a href="#"><i class="ti-twitter"></i></a>
		<a href="#"><i class="ti-google"></i></a>
		<a href="https://github.com/Pierluigit"><i class="ti-github"></i></a>
	</div>
	<div class="coming-soon-copyright">
		<?php if($okSettings==true) {?>
			App <?php echo($app_nameProject);?> made with <i class="fas fa-heartbeat"></i> <!--©--> <?php echo(date('Y'));?>!<br>
			<a href="connect.php">Connect</a> - <?php if($app_ifBlockNewRegistration!="yes") {?><a href="register.php">Register</a> -<?php }?> <a href="lostPassword.php">Lost Password</a>
		<?php if($app_ifOnlyUseApp!="yes") {?>
		- <a href="privacy.php">Privacy</a> - <a href="terms.php">Terms</a> - <a href="faq.php">F.A.Q.</a> - <a href="contact.php">Contact</a> - <a href="404.php">404</a>
		<?php }?>
		<?php if(file_exists('infos/install.php')) {?>- <a href="infos/install.html">Read Me</a><?php }?>
		<?php }?>
	</div>
</div>
<!-- END coming-soon-footer -->