<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'maddusagarisubahan@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'No Subject';

// Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
/*
$contact->smtp = array(
    'host' => 'smtp.example.com', // Replace with your SMTP host
    'username' => 'your_smtp_username', // Replace with your SMTP username
    'password' => 'your_smtp_password', // Replace with your SMTP password
    'port' => '587' // Common SMTP port
);
*/

$contact->add_message($contact->from_name, 'From');
$contact->add_message($contact->from_email, 'Email');
$contact->add_message(isset($_POST['message']) ? $_POST['message'] : '', 'Message', 10);

echo $contact->send();
?>