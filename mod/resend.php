<?php 
	require_once("../inc/autoload.php"); 
	$objUrl = new Url();
	$id = $objUrl->getRaw('id');
	if (!empty($id)) {
		$objUser = new User($objUrl);
		$user = $objUser->getUser($id);
		if (!empty($user)) {
			$objEmail = new Email($objUrl);
			if ($objEmail->process(1, array(
					'email' => $user['email'],
					'first_name' => $user['first_name'],
					'last_name' => $user['last_name'],
					'hash' => $user['hash']
				))) {
				echo json_encode('error', false);
			}else {
				echo json_encode('error', true);
			}
		}else {
			echo json_encode('error', true);
		}
	}else {
		echo json_encode('error', true);
	}
?>