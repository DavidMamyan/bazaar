<?php require_once("../inc/autoload.php"); 
//tokens
$token2 = Session::getSession('token2');
$objForm = new Form();
$token1 = $objForm->getPost('token');
if ($token2 == Login::string2hash($token1)) {
	// create order
	$objOrder = new Order();
	if($objOrder->createOrder()){
		// order details
		$order = $objOrder->getOrder();
		$items = $objOrder->getOrderItems();
		if (!empty($order) && !empty($items)) {
			$objBasket = new Basket();
			$objCatalogue = new Catalogue();
			$objPayPal = new PayPal();
			foreach ($items as $item) {
				$product = $objCatalogue->getProduct($item['product']);
				$objPayPal->addProduct($item['product'], $product['name'], $item['price'], $item['qty']);
			}
			$objPayPal->_tax_cart = $objBasket->_vat;
			//client details
			$objUser = new User();
			$user = $objUser->getUser($order['client']);
			//get country
			if (!empty($user)) {
				$objCountry = new Country();
				$country = $objCountry->getCountry($user['country']);
				//pass details to paypal instance
				$objPayPal->_populate = array(
					"address1" => $user['address_1'],
					"address2" => $user['address_2'],
					"city" => $user['town'],
					"state" => $user['region'],
					"zip" => $user['post_code'],
					"country" => $country['code'],
					"email" => $user['email'],
					"first_name" => $user['first_name'],
					"last_name" => $user['last_name']
				);
				//redirect client ot paypal
				echo $objPayPal->run($order['id']);	 
			}
		}
	}

}
?>