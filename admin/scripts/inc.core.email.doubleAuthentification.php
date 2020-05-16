<?php 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// double authentication  
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// this scripts can be used directly to check
//$app_nameProject = "Pierluigi";
//$app_emailComEmailProject = "myemail@intel.net";
//...
$Destinataire = $emailUser;
$Sujet = "".$tr_text_email_doubleAuthentification_subject1." ".$app_nameProject."";
$From  = "From:Team ".$app_nameProject." <".$app_emailComEmailProject.">\n";
$From .= "Reply-To:".$app_emailComEmailProject."\n";
$From .= "MIME-version: 1.0\n";
$From .= "Content-type: text/html; charset=utf-8\n"; 
$Message = '<html>
			<head>
			   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			   <title>'.$app_nameProject.'</title>
			</head>
			<body style="background-color:#000;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
				  <td align="center">
					 <table width="69%" border="0" cellspacing="0" cellpadding="0">
					 	<tr style="text-align:center;">
						   <td></td>
						</tr>
						<tr style="text-align:center;">
						   <td><img src="'.$app_urlRoot.'/images/logo/'.$app_logoEmailProject.'" width="100%" alt=""/></td>
						</tr>
						<tr style="text-align:center;">
							<td><h2 style="text-align:center; padding-top:15px; color:#ffffff;">
							'.$tr_text_email_doubleAuthentification_t1.'</h2>
							<p style="text-align:center; color:#ffffff; font-size:28px;">'.$doubleAuthentificationCode.'</p>
							</td>
						</tr>
						<tr>
						   <td><p style="text-align:center; color:#ffffff;">'.$app_nameProject.' '.$tr_text_copyRights.'</p></td>
						</tr>
					 </table>
				  </td>
			   </tr>
			</table>					
			</body>
			</html>';
mail($Destinataire,$Sujet,$Message,$From,'-f '.$app_emailComEmailProject.'');
?>