<?php
session_start();
require_once("inc.core.connectDB.php");
$idUser=$_POST['idUser'];
require_once("inc.core.get.valueIntelUser.php"); // ifUseEmailUser emailServerUser passEmailServerUser

// Pour se connecter à un serveur SSL IMAP ou POP3, ajoutez /ssl
// après la spécification du protocole :
$mbox = imap_open("{imap.mail.hostpoint.ch:993/imap/ssl}", "".$emailServerUser."", "".$passEmailServerUser."");

$mails = FALSE;
if (FALSE === $mbox) {
  $err = 'La connexion a échoué. Vérifiez vos paramètres!';
  echo ($err);
} else {
  $info = imap_check($mbox);
  if (FALSE !== $info) {
	  $nbMessages = min(50, $info->Nmsgs);
	  $mails = imap_fetch_overview($mbox, '1:'.$nbMessages, 0);
  } else {
	  $err = 'Impossible de lire le contenu de la boite mail';
	  echo ($err);
  }
  imap_close($mbox);
}

if (FALSE === $mails) {
  echo ($err);
} else {
  echo ( 'La boite aux lettres contient '.$info->Nmsgs.' message(s) dont '.
                                            $info->Recent.' recent(s)');
}
?>