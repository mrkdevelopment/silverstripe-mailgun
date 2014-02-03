silverstripe-mailgun
====================

Silverstripe plugin for Mailgun

*** Custom Headers example.

	$mailer = new \Mrk\Mailer();
    $mailer->addCustomHeader('h:Reply-To', 'email@example.com');

