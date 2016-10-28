<?php 
	require_once("PHPMailer_v5.1/PHPMailer.php");

	class Email{
		private $objMailer;
		public $objUrl;
		public function __construct($objUrl){

			$this->objUrl = is_object($objUrl) ? $objUrl : new Url();

			$this->objMailer = new PHPMailer();
			$this->objMailer->IsSMTP();
			$this->objMailer->SMTPAuth = true;
			$this->objMailer->SMTPKeepAlive = true;
			$this->objMailer->SMTPDebug = 1;
			$this->objMailer->Host = "smtp.gmail.com";
			$this->objMailer->SMTPSecure = "tls";
			$this->objMailer->Port = 587;
			$this->objMailer->Username = "margaryan.mher.28@gmail.com";
			$this->objMailer->Password = "MargaryanM2808596077";
			$this->objMailer->SetFrom("margaryan.mher.28@gmail.com", "My ecommerce");
			$this->objMailer->AddReplyTo("margaryan.mher.28@gmail.com", "My ecommerce");
		}

		public function process($case=null, $array=null){
			if (!empty($case)) {
				switch ($case) {
					case 1:
					// add url to array
					$link  = "<a href=\"";
					$link .= SITE_URL.$this->objUrl->href('activate', array(
						'code',
						$array['hash']
					));
					$link .= "\">";
					$link .= SITE_URL.$this->objUrl->href('activate', array(
						'code',
						$array['hash']
					));
					$link .= $array['hash'];
					$link .= "</a>";
					$array['link'] = $link;
					$this->objMailer->Subject = "Activate your account please";
					$this->objMailer->MsgHTML($this->fetchEmail($case, $array));
					$this->objMailer->AddAddress($array['email'], $array['first_name'] . ' ' . $array['last_name']);		
					break;
				}
				// send email
				if ($this->objMailer->Send()) {
					$this->objMailer->ClearAddresses();
					return true;
				}
				return false;
			}
		} //process ended

		public function fetchEmail($case = null, $array = null){
			if (!empty($case)) {
				if (!empty($array)) {
					foreach ($array as $key => $value) {
						${$key} = $value;
					}
				}
				ob_start();
				require_once(EMAILS_PATH.DS.$case.".php");
				$out = ob_get_clean();
				return $this->wrapEmail($out);
			}
		}

		public function wrapEmail($content){
			if (!empty($content)) {
				return "<div style=\"font-family:Arial, Verdana, sans-serif;font-size:14px;color:#333;line-height:21px; \"{$content}</div>";
			}
		}
	} //class ended. so long, class
?>