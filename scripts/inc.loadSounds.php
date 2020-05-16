<?php
//////////////////////////////////////////////////////////////////////////////////////
// script qui charge les son de base de l'application
/////////////////////////////////////////////////////
// et ceux de l'utilisateur
?>
<script>
// JavaScript Document
// /////////////////// 
// charger les fichiers son
var bird;
soundManager.onload = function() {
	bird = soundManager.createSound(
    {
        id : "bird",
        url : "<?php echo($app_urlRoot);?>/audio/birds1.mp3" 
    });
	
}

/////////////////////////// 
</script>
