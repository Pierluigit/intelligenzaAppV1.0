<?php if(($set_activeSettingDb=="yes") && ($okCanUseDynamicSettings==true)) {// dynamic mode??>
	<?php if($app_logoProject=="") {// check which logo?>
	<span class="logo"><i class="ti-infinite"></i></span>
	<br><?php echo($app_nameProject);?>
	<?php }else {
			// if existe
			if(file_exists('images/logo/'.$app_logoProject.'')) {?>
				<img src="images/logo/<?php echo($app_logoProject);?>" width="222" alt=""/>
			<?php }else {?>
			<span class="logo"><i class="ti-infinite"></i></span>
			<br><?php echo($app_nameProject);?>
		<?php }?>

	<?php }?>
<?php }else {// manuel mode?>
		<span class="logo"><i class="ti-infinite"></i> <?php echo($app_nameProject);?></span>
<?php }?>