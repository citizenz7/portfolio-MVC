<?php
ob_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendors/PHPMailer/src/Exception.php';
require 'vendors/PHPMailer/src/PHPMailer.php';
require 'vendors/PHPMailer/src/SMTP.php';


if (isset($_POST['submit'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error[] = "Votre e-mail n'est pas valide";
        }

        if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['name']) || empty($_POST['msg'])) {
                $error[] = "Veuillez remplir tous les champs";
        }


	       if ($_POST['captcha'] == 'linux') {

           if(!isset($error)) {
                $name = $_POST["name"];
                $subject = $_POST["subject"];
                $message = $_POST["msg"];
                $from = $_POST["email"];

                $mail = new PHPMailer;
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();                                        // Active l'envoi via SMTP
                $mail->Host = SMTPHOST;                                 // A remplacer par le nom de votre serveur SMTP
                $mail->SMTPAuth = true;                                 // Active l'authentification par SMTP
                $mail->Username = SITEMAIL;                             // Nom d'utilisateur SMTP (votre adresse email complète)
                $mail->Password = SITEMAILPASSWORD;                     // Mot de passe de l'adresse email indiquée précédemment
                $mail->Port = SMTPPORT;                                 // Port SMTP
                $mail->SMTPSecure = 'tls';                              // Utiliser SSL / TLS
                $mail->isHTML(true);                                    // Format de l'email en HTML
                //$mail->SMTPDebug = 2;                                 // Debug perposes
                $mail->From = $from;                                    // L'adresse mail de l'emetteur du mail
                $mail->FromName = $name;                                // Le nom de l'emetteur qui s'affichera dans le mail
                $mail->addAddress(SITEMAIL);                            // Destinataire du mail
                $mail->Subject = 'Message depuis le ' . SITEDESCRIPTION . ' : '.$subject;  // Le sujet de l'email

                $message = "Nom: ".$name."<br><br>".$message;
                $message = "De: ".$from."<br>".$message;

                $mail->Body = nl2br($message);                          // Le contenu du mail en HTML

                if(!$mail->send()) {
                  header("Location: index.php?action=contact&&action=notok");
                }
                else {
                  header("Location: index.php?action=contact&&action=ok");
                }
            }// if no $error

	      }// captcha

	else {
		header("Location: index.php?action=contact&&action=wrongcaptcha");
	}
}// if post submit
?>

<div class="container pb-5">
  <div class="row">
    <div class="col-sm-12 px-3 py-1 text-justify border">
      <?php
      // Affichage : message envoyé !
          if(isset($_GET['action']) && $_GET['action'] == "ok"){
              echo '<div class="alert-success" style="font-weight:bold; font-size:19px; text-align:center;">Votre message a bien été envoyé.<br>Merci.</div><br>';
          }

          if(isset($_GET['action']) && $_GET['action'] == "notok"){
              echo '<div class="alert-danger">';
              echo '<span class="fa fa-warning"></span>&nbsp;Le message ne peut être envoyé :( <br>';
              echo 'Erreur: ' . $mail->ErrorInfo;
              echo '</div>';
          }

	        if(isset($_GET['action']) && $_GET['action'] == "wrongcaptcha") {
	  	        echo '<div class="alert alert-danger mt-3 alert-dismissible fade show">Mauvais code anti-spam !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	        }
      ?>

        <div class="card-body">
           <img class="img-fluid mx-auto d-block pb-3" src="view/img/letters-contact-bg.jpg" alt="letters contact">
           <div class="h4 mt-0 title">Me contacter</div>
           Vous pouvez me contacter par mail pour tout sujet concernant mes projets, mes articles, mon CV, ... Merci d'utiliser le formulaire ci-dessous. J'essaierai de répondre le plus rapidement possible à votre message.

          <form class="" method="post" action="contact.php">
            <div class="form-group pt-4">
              <label for="email">Votre adresse e-mail</label>
              <input class="form-control" type="email" id="email" name="email">
            </div>
            <div class="form-group">
                    <label for="name">Votre nom/pseudo</label>
                    <input class="form-control" type="text" id="name" name="name">
            </div>
            <div class="form-group">
                    <label for="subject">Sujet du message</label>
                    <input class="form-control" type="text" id="subject" name="subject">
            </div>
            <div class="form-group">
                    <label for="msg">Message</label>
                    <textarea class="form-control" id="msg" name="msg" rows="7"></textarea>
            </div>
		        <div class="form-group">
                    <label for="captcha"><i class="fas fa-mail-bulk"></i> Anti-spam : Recopiez le mot <b>linux</b></label>
                        <input class="form-control" type="text" name="captcha" id="captcha">
            </div>
          <div class="form-group text-right pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">Envoyer le message</button>
                    <button type="reset" class="btn btn-secondary">Annuler</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
//$proj->closeCursor();
$content = ob_get_clean();
?>

<?php require('template.php'); ?>
