<?php 
$id = $this->objUrl->get('id');
if (!empty($id)) {
	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getCategory($id);
	if (!empty($category)) {
		$yes = $this->objUrl->getCurrent().'/remove/1';
		$no = "javascript:history.go(-1)";
		$remove = $this->objUrl->get('remove');
		// echo "<script>alert('".$remove."')</script>"; 
		if (!empty($remove) && $category['products_count'] == 0) {
			$objCatalogue->removeCategory($id);
			Helper::redirect($this->objUrl->getCurrent(array('action', 'id', 'remove', 'srch', Paging::$_key)));
		}
		require_once("_header.php"); ?>
		<h1>Categories :: Remove</h1>
		<p>Are you sure you want to remove this category? </p>
		<p>There is no undo!</p>
		<a href="<?php echo $yes ?>">Yes</a> | <a href="<?php echo $no ?>">No</a>
		<?php require_once("_footer.php"); 
}}?>