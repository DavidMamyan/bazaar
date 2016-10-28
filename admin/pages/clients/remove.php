<?php 
$id = $this->objUrl->get('id');
if (!empty($id)) {
	$objUser = new User();
	$order = $objUser->getUser($id);
	if (!empty($user)) {
		$objOrder = new Order();
		$orders = $objOrder->getClientOrders($id);
		if (empty($order)) {
			$yes = $this->objUrl->getCurrent().'action/remove/1';
			$no = "javascript:history.go(-1)";
			$remove = $this->objUrl->get('remove');
			// echo "<script>alert('".$remove."')</script>"; 
			if (!empty($remove)) {
				$objUser->removeUser($id);
				Helper::redirect($this->objUrl->getCurrent(array('id', 'action', 'remove', 'srch', Paging::$_key)));
			}
			require_once("_header.php"); ?>
			<h1>Users :: Remove</h1>
			<p>Are you sure you want to remove this client (<?php echo $user['first_name'] . $user['last_name']; ?> )</p>
			<p>There is no undo!</p>
			<a href="<?php echo $yes ?>">Yes</a> | <a href="<?php echo $no ?>">No</a>
			<?php require_once("_footer.php"); 
		}else {
			echo "<script>alert('You cannot delete a client which has an order.')</script>";
		}	 
	} 
} ?>