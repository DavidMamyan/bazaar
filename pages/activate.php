<?php 
	$code = $this->objUrl->get('code');
	if (!empty($code)) {
		$objUser = new User();
		$user = $objUser->getUserByHash($code);
		if (!empty($user)) {
			if ($user['active']==0) {
				if ($objUser->makeActive($user['id'])) {
					$mess = "<h1>Thank you!</h1>";
					$mess .= "<p>Your account has been activated. <br> You can now log in and continue your order. <br> </p>";
				}else {
					$mess = "<h1>Activation failed.</h1>";
					$mess .= "<p>A problem occured while activating your account. Please try again later.</p>";
				}
			}else {
				$mess = "<h1>Your account is already activated</h1>";
				$mess .= "<p>You can log in and order stuff :) </p>";
			}
		}else {
			Helper::redirect($this->objUrl->href('error'))
		}

		require_once("_header.php");
			echo $mess;
		require_once("_footer.php");
	}else {
		Helper::redirect($this->objUrl->href('error'))
	}
?>