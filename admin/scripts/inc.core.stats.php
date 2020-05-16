<?php 
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
// intelligenza general stats
//////////////////////////////////////////////////////////
// platform
$platform = "";
$userAgent = $_SERVER["HTTP_USER_AGENT"];
//=====================Windows==============================
if (strstr($userAgent, "Windows NT 5.1;")) {
    $platform = "Windows XP";
}
if (strstr($userAgent, "Windows ME")) {
    $platform = "Windows Millennium";
}
if (strstr($userAgent, "Windows 98")) {
    $platform = "Windows 98";
}
if (strstr($userAgent, "Windows 95")) {
    $platform = "Windows 95";
}
if (strstr($userAgent, "Windows NT 3.1")) {
    $platform = "Windows NT 3.1";
}
if (strstr($userAgent, "Windows NT 3.51")) {
    $platform = "Windows NT 3.51";
}
if (strstr($userAgent, "Windows NT 4")) {
    $platform = "Windows NT 4";
}
if (strstr($userAgent, "Windows 2000 (NT 5.0)")) {
    $platform = "Windows 2000 (NT 5.0)";
}
if (strstr($userAgent, "Windows 2003 Server")) {
    $platform = "Windows 2003 Server";
}
if (strstr($userAgent, "Windows NT 6.0")) {
    $platform = "Windows Vista";
}
if (strstr($userAgent, "Windows NT 5.1; fr; rv:1.8.1.16")) {
    $platform = "Windows M&eacute;dia Center fr.";
}
if (strstr($userAgent, "Windows")) {
    $platform = "Windows";
}
//========================Linux==============================
if (strstr($userAgent, "Linspire Five-O")) {
    $platform = "Linspire Five-O";
}
if (strstr($userAgent, "Mandrake Linux 9.0 with KDE 3.0.3")) {
    $platform = "Mandrake Linux 9.0 with KDE 3.0.3";
}
if (strstr($userAgent, "Red Hat Linux 8.0 With GNOME/Nautilus 2.06")) {
    $platform = "Red Hat Linux 8.0 With GNOME/Nautilus 2.06";
}
if (strstr($userAgent, "IRIX Interactive Desktop 6.5")) {
    $platform = "IRIX Interactive Desktop 6.5";
}
if (strstr($userAgent, "Solaris 8 CDE and OpenWindows")) {
    $platform = "Solaris 8 CDE and OpenWindows";
}
if (strstr($userAgent, "Solaris 9 GNOME")) {
    $platform = "Solaris 9 GNOME";
}
if (strstr($userAgent, "Solaris 10 - Java Desktop System")) {
    $platform = "Solaris 10 - Java Desktop System";
}
if (strstr($userAgent, "Fedora 7 GNOME")) {
    $platform = "Fedora 7 GNOME";
}
if (strstr($userAgent, "Ubuntu 7.04")) {
    $platform = "Ubuntu 7.04";
}
if (strstr($userAgent, "gOS 2.0.0-beta1")) {
    $platform = "gOS 2.0.0-beta1";
}
//=======================Mac==========================
if (strstr($userAgent, "AmigaOS 3")) {
    $platform = "Amiga OS 3";
}
if (strstr($userAgent, "MacOS 7")) {
    $platform = "MacOS 7.5.5";
}
if (strstr($userAgent, "MacOS 8")) {
    $platform = "MacOS 8.1";
}
if (strstr($userAgent, "MacOS 9.2.2")) {
    $platform = "MacOS 9.2.2";
}
if (strstr($userAgent, "At Ease 2.0")) {
    $platform = "At Ease 2.0";
}
if (strstr($userAgent, "At Ease for Workgroups 4.0")) {
    $platform = "At Ease for Workgroups 4.0";
}
if (strstr($userAgent, "OPENSTEP 4.2")) {
    $platform = "OPENSTEP 4.2, Intel version";
}
if (strstr($userAgent, "Rhapsody DR 2")) {
    $platform = "Rhapsody Developer Release 2 ";
}
if (strstr($userAgent, "Macintosh")) {
    $platform = "Macintosh";
}
if (strstr($userAgent, "Mac OS X 10.15")) {
    $platform = "Mac OS X Version 10.15";
}
if (strstr($userAgent, "Mac OS X 10.3")) {
    $platform = "Mac OS X Version 10.3";
}
if (strstr($userAgent, "Mac OS X 10.4")) {
    $platform = "Mac OS X 10.4";
}
if (strstr($userAgent, "Mac OS X 10.5")) {
    $platform = "Mac OS X Version 10.5";
}
if (strstr($userAgent, "MacOS")) {
    $platform = "MacOS";
}
////////////////////////////////////////////////////////////////////
// browser
if (strstr($userAgent, "Firefox")) {
    $browser = "Firefox ";
} 
if (strstr($userAgent, "Gecko/20050728")) {
    $browser = "Mozilla ";
} 
if (strstr($userAgent, "MSIE")) {
    $browser = "IE ";
}
if (strstr($userAgent, "Netscape")) {
    $browser = "Netscape ";
}
if (strstr($userAgent, "Opera")) {
    $browser = "Opera ";
}
if (strstr($userAgent, "Safari")) {
    $browser = "Safari ";
}
if (strstr($userAgent, "Chrome")) {
    $browser = "Chrome ";
}
////////////////////////////////////////////////////////////////////
// check
//echo("the name of the platform of work is ".$platform."<br />the browser is ".$browser."<br>");//debug
//echo($_SERVER["HTTP_USER_AGENT"]);exit(0);//debug
////////////////////////////////////////////////////////////////////
// other
$ipUser = $_SERVER["REMOTE_ADDR"];
$userFrom = $_SERVER['HTTP_REFERER'];
$language = $_SESSION['language'];
////////////////////////////////////////////////////////////////////////////////////////////////////
///////////// check is responsive? and which plateform is it?
////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////// HTTP_USER_AGENT
$userAgent = $_SERVER['HTTP_USER_AGENT'];
// check is smartphone?
if ( preg_match('/iphone/i',$userAgent) || preg_match('/android/i',$userAgent) || preg_match('/blackberry/i',$userAgent) || preg_match('/symb/i',$userAgent) || preg_match('/ipad/i',$userAgent) || preg_match('/ipod/i',$userAgent) || preg_match('/phone/i',$userAgent) )
{
	// which if smartphone
	$smartPhone = 'yes';
	if ( preg_match('/iphone/i',$userAgent)) { $whatSupport = "iPhone";}
	if ( preg_match('/android/i',$userAgent)) { $whatSupport = "Android";}
	if ( preg_match('/blackberry/i',$userAgent)) { $whatSupport = "Blackberry";}
	if ( preg_match('/ipad/i',$userAgent)) { $whatSupport = "iPad";}
	if ( preg_match('/ipod/i',$userAgent)) { $whatSupport = "iPod";}
	//echo($userAgent." - ".$whatSupport); echo("bo");exit();
}
////////////////////////////////////////////////////////////////////////////////////////////////////
// rec stats
////////////////////////////////////////////////////////////////////
// if not admin
if(($rightsUser=="") || ($rightsUser=="member")) {
	$connectDBIntelApp->exec("insert into site_stats_visits (idMember, ipUser, dateVisit, fromPage, visitPage, whatSupport, platform, browser, language, country, city, square) value ('$idUser', '$ipUser', NOW(), '$userFrom', '$page', '$whatSupport', '$platform', '$browser', '$language', '$country', '', '')");
}
?>