<?php
session_start();
require_once("inc.core.connectDB.php");
$idUser=$_POST['idUser'];
require_once("inc.core.get.valueIntelUser.php"); // ifUseEmailUser emailServerUser passEmailServerUser

// Pour se connecter à un serveur SSL IMAP ou POP3, ajoutez /ssl
// après la spécification du protocole :
$mbox = imap_open("{imap.mail.hostpoint.ch:993/imap/ssl}", "pierluigi@intelligenza.pro", "v3bMdXkt");

$mails = FALSE;
  if (FALSE === $mbox) {
      $err = 'La connexion a échoué. Vérifiez vos paramètres!';
	  exit(0);
  } else {
      $info = imap_check($mbox);
      if (FALSE !== $info) {
          $nbMessages = min(50, $info->Nmsgs);
          $mails = imap_fetch_overview($mbox, '1:'.$nbMessages, 0);
      } else {
          $err = 'Impossible de lire le contenu de la boite mail';
      }
      imap_close($mbox);
  }

  if (FALSE === $mails) {
      echo $err;
	  exit(0);
  } else {
      echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s) dont '.
                                            $info->Recent.' recent(s)'.
           "<br />\n".
           "<br />\n";
      foreach ($mails as $mail) {
          echo $mail->from.
               ' <a href="imap_detail.php?uid='.$mail->uid.'">'.
               $mail->subject.'</a> '.
               $mail->date."<br />\n";
      }
  }

/*$mails = FALSE; //compte et liste les emails
  if (FALSE === $mbox) {
      $err = 'La connexion a échoué. Vérifiez vos paramètres!';
  } else {
      $info = imap_check($mbox);
      if (FALSE !== $info) {
          $nbMessages = min(50, $info->Nmsgs);
          $mails = imap_fetch_overview($mbox, '1:'.$nbMessages, 0);
      } else {
          $err = 'Impossible de lire le contenu de la boite mail';
      }
      imap_close($mbox);
  }

  if (FALSE === $mails) {
      echo $err;
  } else {
      echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s) dont '.
                                            $info->Recent.' recent(s)'.
           "<br />\n".
           "<br />\n";
      foreach ($mails as $mail) {
          echo $mail->from.' '.$mail->subject.' '.$mail->date."<br />\n";
      }
  }
*/


 /*if (FALSE === $mbox) { compte le nombre de message
      $info = FALSE;
      $err = 'La connexion a échoué. Vérifiez vos paramètres!';
  } else {
      $info = imap_check($mbox);
      imap_close($mbox);
  }

  if (FALSE === $info) {
      echo $err;
  } else {
	  // me donne le nombre de messages dans inbox
      echo 'La boite aux lettres contient '.$info->Nmsgs.' message(s) dont '.
                                            $info->Recent.' recent(s)';
  }*/






/*echo "<h1>Mailboxes</h1>\n";
$folders = imap_listmailbox($mbox, "{imap.mail.hostpoint.ch:993/imap/ssl}", "*");

if ($folders == false) {
    echo "Appel échoué<br />\n";
} else {
    foreach ($folders as $val) {
        echo $val . "<br />\n";
    }
}*/

/*echo "<h1>en-têtes dans INBOX</h1>\n";
$headers = imap_headers($mbox);

if ($headers == false) {
    echo "Appel échoué<br />\n";
} else {
    foreach ($headers as $val) {
        echo $val . "<br />\n";
    }
}*/

//imap_close($mbox);// Termine un flux IMAP
?>
