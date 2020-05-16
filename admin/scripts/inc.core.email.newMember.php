<?php 
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// Alpha project new member
//////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////
// this scripts can be used directly to check
//$app_nameProject = "Pierluigi";
//$app_emailComEmailProject = "myemail@intel.net";
//...
$Destinataire = $emailInscrit;
$Sujet = "".$tr_text_email_newMember_subject1." ".$pseudoInscrit.", ".$tr_text_email_newMember_subject2."";
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
							<p style="text-align:center; color:#ffffff;">
							'.$tr_text_email_newMember_t2.' '.$pseudoInscrit.', '.$tr_text_email_newMember_t3.'.<br />
							'.$tr_text_email_newMember_t7.'
							</p>
							</td>
						</tr>
						<tr style="text-align:center;">
						   <td style="padding-left:18px;padding-right:18px;">
						   <p style="color: #ffffff;">
						   <a href="'.$app_urlRoot.'/connect.php?codeValid='.$validationEmailCode.'" style="display:inline-block;background-color:green;margin:12px 0;padding:8px 24px;text-transform:uppercase;color:#ffffff;text-decoration:none;border-radius:4px">'.$tr_text_email_newMember_t6.'</a><br /><br />
						   '.$tr_text_email_newMember_t4.'<br /> 
						   '.$tr_text_email_newMember_t5.'
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