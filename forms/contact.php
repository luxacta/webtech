<?php
  $receiving_email_address = 'webbertest0@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/validate.js' )) {
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

  //SMTP Credentials
  $contact->smtp = array(
    'host' => 'sandbox.smtp.mailtrap.io',
    'username' => 'd283147aa41c15',
    'password' => '6a99ab3f0abfa6',
    'port' => '2525'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
