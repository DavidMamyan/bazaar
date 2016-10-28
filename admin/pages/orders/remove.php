<?php 
$id = $this->objUrl->get('id');
if (!empty($id)) {
	$objOrder = new Order();
	$order = $objOrder->getOrder($id);
	if (!empty($order)) {
		$yes = $this->objUrl->getCurrent().'/remove/1';
		$no = "javascript:history.go(-1)";
		$remove = $this->objUrl->get('remove');
		// echo "<script>alert('".$remove."')</script>"; 
		if (!empty($remove)) {
			$objOrder->removeOrder($id);
			Helper::redirect($this->objUrl->getCurrent(array('action', 'id', 'remove', 'srch', Paging::$_key)));
		}
		require_once("_header.php"); ?>
		<h1>Orders :: Remove</h1>
		<p>Are you sure you want to remove this order? </p>
		<p>There is no undo!</p>
		<a href="<?php echo $yes ?>">Yes</a> | <a href="<?php echo $no ?>">No</a>
		<?php require_once("_footer.php"); 
}}?>