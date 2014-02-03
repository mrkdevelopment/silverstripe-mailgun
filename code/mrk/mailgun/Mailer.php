<?php namespace Mrk\Mailgun;

use Mailgun\Mailgun;
	
class Mailer extends \Mailer{
	private $mailgun;



	/**
	 * [__construct description]
	 */
	function __construct() {
		$this->mailgun = new Mailgun(MAILGUN_KEY);
	}



	/**
	 * [sendPlain description]
	 * @param  [type]  $to            [description]
	 * @param  [type]  $from          [description]
	 * @param  [type]  $subject       [description]
	 * @param  [type]  $plainContent  [description]
	 * @param  boolean $attachedFiles [description]
	 * @param  boolean $customheaders [description]
	 * @return [type]                 [description]
	 */
	public function sendPlain($to, $from, $subject, $plainContent, $attachedFiles = array(), $customheaders = false) {
		$message = array(
						'from'    => MAILGUN_FROM, 
                        'to'      => $to, 
                        'subject' => $subject, 
                        'text'    => $plainContent
                       );

		$message = $this->addCustomHeaders($message, $customheaders);


		return $this->mailgun
					->sendMessage(MAILGUN_DOMAIN, $message, $attachedFiles);

	}


	/**
	 * [sendHTML description]
	 * @param  [type]  $to            [description]
	 * @param  [type]  $from          [description]
	 * @param  [type]  $subject       [description]
	 * @param  [type]  $htmlContent   [description]
	 * @param  boolean $attachedFiles [description]
	 * @param  boolean $customheaders [description]
	 * @param  boolean $plainContent  [description]
	 * @return [type]                 [description]
	 */
	public function sendHTML($to, $from, $subject, $htmlContent, $attachedFiles = array(), $customheaders = false,
			$plainContent = false) {

		$message = array(
						'from'    => MAILGUN_FROM, 
                        'to'      => $to, 
                        'subject' => $subject, 
                        'html'    => $htmlContent
                );

		if($plainContent)
			$message['text'] = $plainContent;


		$message = $this->addCustomHeaders($message, $customheaders);


		return $this->mailgun
					->sendMessage(MAILGUN_DOMAIN, $message, $attachedFiles);


	}



	/**
	 * [addCustomHeaders description]
	 * @param [type] $message [description]
	 * @param [type] $headers [description]
	 */
	private function addCustomHeaders($message, $headers){
		unset($headers['X-SilverStripeSite']);

		if($headers){
			foreach ($headers as $key => $value) {
				$message[$key] = $value;
			}
		}

		return $message;

	}
}

 ?>