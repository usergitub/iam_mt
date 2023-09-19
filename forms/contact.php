<?php
  /**
  * Nécessite la librairie "PHP Email Form"
  * La librairie "PHP Email Form" est disponible uniquement dans la version pro du template
  * La bibliothèque doit être téléchargée vers : vendor/php-email-form/php-email-form.php
  * Pour plus d'informations et d'aide : https://bootstrapmade.com/php-email-form/
  */

  // Remplacez contact@example.com par votre véritable adresse e-mail de réception
  $receiving_email_address = 'manueltite12@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Décommentez le code ci-dessous si vous souhaitez utiliser SMTP pour envoyer des e-mails. Vous devez entrer vos identifiants SMTP corrects
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
