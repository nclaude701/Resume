<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'nclaude701@gmail.com';

// Check if the PHP Email Form library file exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/validate.js')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;

// Make sure to sanitize and validate user inputs before using them
$contact->from_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$contact->from_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$contact->subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$contact->message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
  'host' => 'example.com',
  'username' => 'example',
  'password' => 'pass',
  'port' => '587'
);
*/

$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['subject'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

echo $contact->send();
?>
