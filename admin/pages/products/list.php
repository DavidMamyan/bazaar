<?php 
$objCatalogue = new Catalogue();
if (isset($_POST['srch'])) {
	if (!empty($_POST['srch'])) {
		$url = $this->objUrl->getCurrent('srch').'/srch/'.urlencode(stripslashes($_POST['srch']));
	}else {
		$url = $this->objUrl->getCurrent('srch');
	}
	Helper::redirect($url);
}else {
	//if there is no search result, display page
	$srch = stripslashes(urldecode($this->objUrl->get('srch')));
if (!empty($srch)) {
	$products = $objCatalogue->getAllProducts($srch);
	$empty = "There are no results matching your searching creteria.";
}else {
	$products = $objCatalogue->getAllProducts();
	$empty = "No records found.";
}

$objPaging = new Paging($this->objUrl, $products, 10);
$rows = $objPaging->getRecords();

require_once("_header.php"); ?>
<h1>Products</h1>
<form action="<?php echo $this->objUrl->getCurrent('srch'); ?>" method="POST">
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
		<tr>
			<th><label for="srch">Product</label></th>
			<td><input type="text" name="srch" id="srch" value="<?php echo $srch; ?>" class="fld"></td>
			<td>
				<label for="btn_add" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn_add" class="btn" value="Search" >
				</label>
			</td>
		</tr>
	</table>
</form>
<div class="br_td dev">&nbsp;</div>
 
<p><a href="<?php echo $this->objUrl->getCurrent('action').'/action/add'; ?>">New product</a></p>
<?php if (!empty($rows)) { ?>
<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
	<tr>
		<th class="col_5">Id</th>
		<th>Product</th>
		<th class="col_15 ta_r">Remove</th>
		<th class="col_5 ta_r">Edit</th>
	</tr>
	<?php foreach ($rows as $product): ?>
	<tr>
		<td><?php echo $product['id']; ?></td>
		<td><?php echo Helper::encodeHTML($product['name']); ?></td>
		<td class="ta_r"><a href="<?php echo $this->objUrl->getCurrent('action').'/action/remove/id/'.$product['id'] ?>">Remove</a></td>
		<td class="ta_r"><a href="<?php echo $this->objUrl->getCurrent('action').'/action/edit/id/'.$product['id'] ?>">Edit</a></td>
	</tr>
	<?php endforeach ?>
</table>
<?php echo $objPaging->getPaging() ?>
<?php }else {
	echo "<p>".$empty."</p>";
} ?>

<?php require_once("_footer.php"); 
}
?>