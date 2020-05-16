<?php 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// send email to admin, new member is right now registred 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// this scripts can be used directly to check
//$app_nameProject = "Pierluigi";
//$app_emailComEmailProject = "myemail@intel.net";
//...
$Destinataire = $app_emailComEmailProject;// $emailContactProject
$Sujet = "New Member!";
$From  = "From:Team ".$app_nameProject." <".$app_emailComEmailProject.">\n";
$From .= "Reply-To: noreply@infinite.pro\n";
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
							<td><h1 style="text-align:center; padding-top:15px; color:#ffffff; font-size:18px;"> 
							'.$pseudoUserInscription.' is now registred<br />on '.$app_nameProject.'</h1>
							</td>
						</tr>
						<tr style="text-align:center;">
						   <td style="padding-left:14px;padding-right:18px;">
						   <h3 style="color: #ffffff;">Great Good Job <br /> there are '.$totalMembers.' members now!<h3><br />
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