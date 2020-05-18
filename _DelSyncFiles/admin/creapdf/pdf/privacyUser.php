<?php
////////////////////////////////////////
// projet Alpha
////////////////////////////////////////
///////////////////////////////////////////
//
// Developer : Pierluigi 
// Date : 2020
/*
.     .       .  .   . .   .   . .    +  .
  .     .  :     .    .. :. .___---------___.
       .  .   .    .  :.:. _".^ .^ ^.  '.. :"-_. .
    .  :       .  .  .:../:            . .^  :.:\.
        .   . :: +. :.:/: .   .    .        . . .:\
 .  :    .     . _ :::/:               .  ^ .  . .:\
  .. . .   . - : :.:./.                        .  .:\
  .      .     . :..|:                    .  .  ^. .:|
    .       . : : ..||        .                . . !:|
  .     . . . ::. ::\(                           . :)/
 .   .     : . : .:.|. ######              .#######::|
  :.. .  :-  : .:  ::|.#######           ..########:|
 .  .  .  ..  .  .. :\ ########          :######## :/
  .        .+ :: : -.:\ ########       . ########.:/
    .  .+   . . . . :.:\. #######       #######..:/
      :: . . . . ::.:..:.\           .   .   ..:/ 
   .   .   .  .. :  -::::.\.       | |     . .:/
      .  :  .  .  .-:.":.::.\             ..:/
 .      -.   . . . .: .:::.:.\.           .:/
.   .   .  :      : ....::_:..:\   ___.  :/
   .   .  .   .:. .. .  .: :.:.:\       :/
     +   .   .   : . ::. :.:. .:.|\  .:/|
     .         +   .  .  ...:: ..|  --.:|
.      . . .   .  .  . ... :..:.."(  ..)"
 .   .       .      :  .   .: ::/  .  .::\
*/
//
//////////////////////////////////////////
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */
//////////////
// php privacy user
/////////////
session_start();
require_once("../../scripts/inc.core.connectDB.php");
require_once("../../scripts/inc.core.settings.php");
// if not logged go home
if(!isset($_SESSION['logOk'])) {
	header("location:".$app_urlRoot."");
}
$idUser = $_SESSION['idUser'];
require_once("../../scripts/inc.core.get.valueUser.php");
require_once("../../scripts/inc.core.get.valueIntelUser.php");
require_once("../../scripts/inc.core.get.valueAddressUser.php");
// format sex 
if($sexUser=="Woman") { $civility="Mrs";}else{ $civility="Sir";}

// traite la date actuel
$moisActuel = date('m');
$jourActuel = date('d');
$anneeActuel = date('Y');
// format la date actuel
$dateActuel = $jourActuel."-".$moisActuel."-".$anneeActuel;

// liste les photos du membre
/*$resultatsPhotoT=$connexion->query("select * from photos where idMember='$idUser'");  
$resultatsPhotoT->setFetchMode(PDO::FETCH_OBJ);
$photoT = "";
while( $unResultatPhotoT = $resultatsPhotoT->fetch() ) {	
	$nomFichierPhotoT = $unResultatPhotoT->nomFichier;
	/////////////////////////////////////////////////////
	// ici à changer l'URL de l'image quand l'app sera en Production
	/////////////////////////////////////////////////////
	$photoT = $photoT.'<img src="http://developpement.colapp.ch/dev_remontee/requests/id_'.$idRequest.'/'.$nomFichierPhotoT.'" width="650" alt=""/><br />';
}*/





// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');
// see config.php file !!!
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Pierluigi');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, ''.$nameProject.'', 'Member '.$pseudoUser.'');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('courier', '', 8);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */
$html = '
<h1 align="center">Privacy Transparency</h1>
<p align="center">Here All your Information</p>
<table cellspacing="0" cellpadding="1" border="0">
    <tr>
		<td rowspan="2">
			'.$civility.' <b>'.$pseudoUser.'</b><br />
			Rights: <b>'.$rightsUser.'</b><br />
			SubRights: <b>'.$subRightsUser.'</b><br />
			Email <b>'.$emailUser.'</b><br />
			Password: <b>'.$passwordUser.'</b>
		</td>
		<td align="right">Date: '.$dateActuel.'</td>
    </tr>
    <tr>
       	<td align="right">
			Member Since: <b>'.$dateInscriptionUser.'</b><br />
		</td>
    </tr>

</table>

<h3 align="center">Member</h3>
<p>
Pseudo: <b>'.$pseudoUser.'</b><br />
Job: <b>'.$jobUser.'</b><br />
Skills: <b>'.$skillsUser.'</b><br />
Age: <b>'.$ageUser.'</b><br />
Sex: <b>'.$sexUser.'</b><br />
Sports: <b>'.$sportsUser.'</b><br />
Hobbies: <b>'.$hobbiesUser.'</b><br />
Personal Phone: <b>'.$phonePersoUser.'</b><br />
Professional Phone: <b>'.$phoneProUser.'</b><br />
Nickname Skype : <b>'.$skypePseudoUser.'</b><br />
Personal Website: <b>'.$websitePersoUser.'</b><br />
Professional Website: <b>'.$websiteProUser.'</b><br />
Social Link 1: <b>'.$socialLink1User.'</b><br />
Social Link 2: <b>'.$socialLink2User.'</b><br />
Social Link 3: <b>'.$socialLink3User.'</b><br />
If Demand Data Delete: <b>'.$ifDeletAccuntUser.'</b><br />
Date Demand: <b>'.$dateAskDeletionUser.'</b><br />
Comment Demand: <b>'.$commentDeleteUser.'</b><br />
</p>

<h3 align="center">Address</h3>
<p>
Type: <b>Home</b><br />
If Auto Geolocation: <b>'.$ahu_ifGeoAuto.'</b><br />
Longitude: <b>'.$ahu_longitude.'</b><br />
Latitude: <b>'.$ahu_latitude.'</b><br />
Name: <b>'.$ahu_name.'</b><br />
Phone: <b>'.$ahu_phone.'</b><br />
Entery Code: <b>'.$ahu_entryCode.'</b><br />
Street: <b>'.$ahu_street.'</b><br />
Zip Code: <b>'.$ahu_zipCode.'</b><br />
City: <b>'.$ahu_city.'</b><br />
State: <b>'.$ahu_state.'</b><br />
Country: <b>'.$ahu_country.'</b><br />
</p>

<p>
Type: <b>Billing</b><br />
If same than home: <b>'.$abu_ifSameHome.'</b><br />
Longitude: <b>'.$ageUser.'</b><br />
Latitude: <b>'.$sexUser.'</b><br />
Name: <b>'.$abu_name.'</b><br />
Phone: <b>'.$abu_phone.'</b><br />
Entery Code: <b>'.$abu_entryCode.'</b><br />
Street: <b>'.$abu_street.'</b><br />
Zip Code: <b>'.$abu_zipCode.'</b><br />
City: <b>'.$abu_city.'</b><br />
State: <b>'.$abu_state.'</b><br />
Country: <b>'.$abu_country.'</b><br />
</p>

<p>
Type: <b>Delivery</b><br />
If same than home: <b>'.$adu_ifSameHome.'</b><br />
Longitude: <b>'.$ageUser.'</b><br />
Latitude: <b>'.$sexUser.'</b><br />
Name: <b>'.$adu_name.'</b><br />
Phone: <b>'.$adu_phone.'</b><br />
Entery Code: <b>'.$adu_entryCode.'</b><br />
Street: <b>'.$adu_street.'</b><br />
Zip Code: <b>'.$adu_zipCode.'</b><br />
City: <b>'.$adu_city.'</b><br />
State: <b>'.$adu_state.'</b><br />
Country: <b>'.$adu_country.'</b><br />
</p>

<h3 align="center">Intelligenza</h3>
<p>
Rights: <b>'.$rightsUser.'</b><br />
Sub Rights: <b>'.$subRightsUser.'</b><br />
Function: <b>'.$fonctionUser.'</b><br />
File Avatar: <b>'.$avatarUser.'</b><br />
Avatar: '.$avatarUser.'<br />
</p>

';
// define some HTML content with style
/*
$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
	h1 {
		color: navy;
		font-family: times;
		font-size: 12pt;
		text-decoration: underline;
	}
	p.first {
		color: #003300;
		font-family: helvetica;
		font-size: 12pt;
	}
	p.first span {
		color: #006600;
		font-style: italic;
	}
	p#second {
		color: rgb(00,63,127);
		font-family: times;
		font-size: 12pt;
		text-align: justify;
	}
	p#second > span {
		background-color: #FFFFAA;
	}
	table.first {
		color: #003300;
		font-family: helvetica;
		font-size: 8pt;
		border-left: 3px solid red;
		border-right: 3px solid #FF00FF;
		border-top: 3px solid green;
		border-bottom: 3px solid blue;
		background-color: #ccffcc;
	}
	td {
		border: 2px solid blue;
		background-color: #ffffee;
	}
	td.second {
		border: 2px dashed green;
	}
	div.test {
		color: #CC0000;
		background-color: #FFFF66;
		font-family: helvetica;
		font-size: 10pt;
		border-style: solid solid solid solid;
		border-width: 2px 2px 2px 2px;
		border-color: green #FF00FF blue red;
		text-align: center;
	}
	.lowercase {
		text-transform: lowercase;
	}
	.uppercase {
		text-transform: uppercase;
	}
	.capitalize {
		text-transform: capitalize;
	}
</style>

<h1 class="title">Example of <i style="color:#990000">XHTML + CSS</i></h1>

<p class="first">Example of paragraph with class selector. <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.</span></p>

<p id="second">Example of paragraph with ID selector. <span>Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.</span></p>

<div class="test">example of DIV with border and fill.
<br />Lorem ipsum dolor sit amet, consectetur adipiscing elit.
<br /><span class="lowercase">text-transform <b>LOWERCASE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
<br /><span class="uppercase">text-transform <b>uppercase</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
<br /><span class="capitalize">text-transform <b>cAPITALIZE</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
</div>

<br />

<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="30" align="center"><b>No.</b></td>
  <td width="140" align="center" bgcolor="#FFFF00"><b>XXXX</b></td>
  <td width="140" align="center"><b>XXXX</b></td>
  <td width="80" align="center"> <b>XXXX</b></td>
  <td width="80" align="center"><b>XXXX</b></td>
  <td width="45" align="center"><b>XXXX</b></td>
 </tr>
 <tr>
  <td width="30" align="center">1.</td>
  <td width="140" rowspan="6" class="second">XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center" rowspan="3">2.</td>
  <td width="140" rowspan="3">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="80" rowspan="2" >XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr>
  <td width="30" align="center">3.</td>
  <td width="140">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
 <tr bgcolor="#FFFF80">
  <td width="30" align="center">4.</td>
  <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td width="80">XXXX<br />XXXX</td>
  <td align="center" width="45">XXXX<br />XXXX</td>
 </tr>
</table>
EOF;*/

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// add a page
/*$pdf->AddPage();

$html = '
<h1>HTML TIPS & TRICKS</h1>

<h3>REMOVE CELL PADDING</h3>
<pre>$pdf->SetCellPadding(0);</pre>
This is used to remove any additional vertical space inside a single cell of text.

<h3>REMOVE TAG TOP AND BOTTOM MARGINS</h3>
<pre>$tagvs = array(\'p\' => array(0 => array(\'h\' => 0, \'n\' => 0), 1 => array(\'h\' => 0, \'n\' => 0)));
$pdf->setHtmlVSpace($tagvs);</pre>
Since the CSS margin command is not yet implemented on TCPDF, you need to set the spacing of block tags using the following method.

<h3>SET LINE HEIGHT</h3>
<pre>$pdf->setCellHeightRatio(1.25);</pre>
You can use the following method to fine tune the line height (the number is a percentage relative to font height).

<h3>CHANGE THE PIXEL CONVERSION RATIO</h3>
<pre>$pdf->setImageScale(0.47);</pre>
This is used to adjust the conversion ratio between pixels and document units. Increase the value to get smaller objects.<br />
Since you are using pixel unit, this method is important to set theright zoom factor.<br /><br />
Suppose that you want to print a web page larger 1024 pixels to fill all the available page width.<br />
An A4 page is larger 210mm equivalent to 8.268 inches, if you subtract 13mm (0.512") of margins for each side, the remaining space is 184mm (7.244 inches).<br />
The default resolution for a PDF document is 300 DPI (dots per inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum number of points you can print at 300 DPI for the given width).<br />
The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots<br />
If the web page is larger 1280 pixels, on the same A4 page the conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();*/

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Privacy_'.$nameProject.'_'.$pseudoUser.'_'.$dateActuel.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
