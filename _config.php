<?php 
	use Mrk\Mailgun\Mailer as MrkMailgunMailer;

	define('MAILGUN_KEY', 'key-01zghfgcxo4ta4t4j7h8g9pyi4xfgmn0');
	define('MAILGUN_DOMAIN', 'sandbox8297.mailgun.org');
	define('MAILGUN_FROM', 'ketan.shah@gmail.com');


	Email::set_mailer(new MrkMailgunMailer);

 ?>