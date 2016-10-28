<?php 
	$id = $this->objUrl->get('id');
	if (!empty($id)) { 
		$objOrder = new Order();
		$order = $objOrder->getOrder($id);
		
		if (!empty($order)) {
			$items = $objOrder->getOrderItems($id);
			if (empty($items)) {
				echo "<script>We are fucked again.</script>";
			}
			$objCatalogue = new Catalogue();
			$objUser = new User();
			$user = $objUser->getUser($order['client']);

			$objCountry = new Country();

			$objBusiness = new Business();
			$business = $objBusiness->getBusiness();

			$objBasket = new Basket();

?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Bazaar | Invoice</title>
			<link rel="stylesheet" type="text/css" href="http://bazaar/css/invoice.css">
		</head>
		<body>
			<div id="wrapper">
				<h1>Invoice</h1>
			  	<div style="width:50%; float: left">
			  		<p><strong>To: 
			  		<?php echo $user['first_name'] . " " . $user['last_name'] ?>
			  		</strong>
			  		<br>
			  		<?php echo $user['address_1']; ?>
			  		<br>
			  		<?php echo !empty($user['address_2']) ? $user['address_2'] ."<br>" : null ?>
			  		<?php echo $user['town'] ?>
			  		<br>
			  		<?php echo $user['region'] ?>
			  		<br>
			  		<?php echo $user['post_code'] ?>
			  		<br>
			  		<?php 
			  			$country = $objCountry->getCountry($user['country']);
			  			echo $country['name'];
			  		?>
			  		</p>
			  	</div>
			  	<div style="width:50%; float:right; text-align:right">
			  		<p><strong><?php echo $business['name']; ?></strong>
			  		<br>
			  		<?php echo nl2br($business['address']); ?>
			  		<br>
			  		<?php echo $business['telephone']; ?>
			  		<br>
			  		<?php echo $business['email']; ?>
			  		<br>
			  		<?php echo $business['website']; ?>
			  		</p>
			  	</div>
			  	<div class="dev">&#160;</div>
			  	<h3>Order number: <?php echo $id ?> / Date: <?php echo $order['date'] ?></h3>
			  	<table cellspacing="0" cellpadding="0" border="0" class="tbl_repeat">
			  		<tr>
			  			<th>Item</th>
			  			<th class="ta_r">Quantity</th>
			  			<th class="ta_r col_15">Price</th>
			  		</tr>
			  			<?php foreach ($items as $item): ?>

			  				<tr>
			  					<td>
			  						<?php 
			  						if (empty($item)) {
				echo "<script>We are fucked again.</script>";
			}
			  							$product = $objCatalogue->getProduct($item['product']);
			  							echo $product['name'];
			  						?>
			  					</td>
			  					<td class="ta_r"><?php echo $item['qty']; ?></td>
	  						<td class="ta_r">$
								<?php echo number_format($objBasket->itemTotal($item['price'], $item['qty']), 2); ?>
	  						</td>
			  				</tr>
			  			<?php endforeach ?>
			  		<?php if ($order['vat_rate'] != 0) { ?>
			  			<tr>
			  				<td colspan="2" class="br_td">Sub-total: </td>
			  				<td class="ta_r br_td">
			  					$ <?php echo number_format($order['subtotal'], 2) ?>
			  				</td>
			  			</tr>
			  			<tr>
			  				<td colspan="2" class="br_td">VAT(<?php echo $order['vat_rate'] . "%"; ?>): </td>
			  				<td class="ta_r br_td">
			  					$ <?php echo number_format($order['vat'], 2) ?>
			  				</td>
			  			</tr>
			  			<tr>
			  				<td colspan="2" class="br_td"><strong>Total:</strong> </td>
			  				<td class="ta_r br_td">
			  					$ <strong><?php echo number_format($order['total'], 2); ?></strong>
			  				</td>
			  			</tr>
			  		<?php } ?>
			  	</table>
			  	<div class="dev br_td">&nbsp;</div>
			  	<p><a href="#" onclick="window.print(); return false">Print</a></p>
			</div>
		</body>
		</html>
	<?php }}?>
