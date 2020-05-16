<?php 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// user lost password 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// this scripts can be used directly to check
//$app_nameProject = "Pierluigi";
//$app_emailComEmailProject = "myemail@intel.net";
//...
$Destinataire = $emailRecup;
$Sujet = "".$tr_text_email_lostPass_subject1."";
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
							<td><h2 style="text-align:center; padding-top:15px; color:#ffffff; font-size:13px;">
							'.$tr_text_email_newMember_t1.' '.$app_nameProject.'</h2>
							</td>
						</tr>
						<tr style="text-align:center;">
							<td style="padding-left:18px;padding-right:18px;">
								<p style="color: #ffffff;">
								'.$tr_text_email_lostPass_t2.' '.$pseudoMember.', '.$tr_text_email_lostPass_t3.'<br />
								<br /><br><a href="'.$app_urlRoot.'/lostPassword.php?lostPass='.$lostPassCode.'" style="display:inline-block;background-color:#e88d3c;margin:12px 0;padding:8px 24px;text-transform:uppercase;color:#eee7ae;text-decoration:none;border-radius:4px">'.$tr_text_email_lostPass_t4.'</a> <br /><br />
								</p>
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