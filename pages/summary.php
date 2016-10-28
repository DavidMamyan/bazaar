<?php Login::restrictFront($this->objUrl); 
	$token1 = mt_rand();
	$token2 = Login::string2hash($token1);
	Session::setSession('token2', $token2);
	$objBasket = new Basket();
	$out = array();
	$session = Session::getSession('basket');
	if (!empty($session)) {
		$objCatalogue = new Catalogue();
		foreach ($session as $key => $value) {
			$out[$key] = $objCatalogue->getProduct($key);			
		}		
	}
?>
<?php require_once("_header.php"); ?>
<h1>Order summary</h1>
<?php 
	if (!empty($out)) {?>
	<div id="big_basket">
		<form action="" method="POST" id="frm_basket">
			<table cellspacing="0" cellpadding="0" border="0" class="tbl_repeat">
				<tr>
					<th>Item</th>
					<th class="ta_r">Quantity</th>
					<th class="ta_r col_15">Price</th>
				</tr>
				<?php foreach ($out as $item): ?>
					<tr>
						<td><?php echo $item['name'] ?></td>
						<td class="ta_r"><?php echo $session[$item['id']]['qty'] ?></td>
						<td class="ta_r"><?php echo "$" . number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?></td>
					</tr>
				<?php endforeach ?>
				<?php if ($objBasket->_vat_rate > 0): ?>
					<tr>
						<td colspan="2" class="br_td">Sub-total</td>
						<td class="ta_r br_td">$<?php echo number_format($objBasket->_sub_total, 2); ?></td>
					</tr>
					<tr>
						<td colspan="2" class="br_td">VAT(<?php echo $objBasket->_vat_rate . "%" ?>)</td>
						<td class="ta_r br_td">$<?php echo number_format($objBasket->_vat, 2); ?></td>
					</tr>
				<?php endif ?>
					<tr>
						<td colspan="2" class="br_td"><strong>Total</strong></td>
						<td class="ta_r br_td"><strong>$<?php echo number_format($objBasket->_total, 2); ?></strong></td>
					</tr>
			</table>
			<div class="dev br_td">&#160;</div>
			<div class="sbm sbm_blue fl_r paypal" id="<?php echo $token1; ?>">
				<span class="btn">Proceed to Paypal</span>
			</div>
			<div class="sbm sbm_blue fl_l" id="<?php echo $token1; ?>">
				<a href="<?php echo $this->objUrl->href('basket'); ?>" class="btn">Amend order</a>
			</div>
		</form>
	</div>
	<div class="dn">
		<img src="images/loadinfo.net.gif" alt="proceeding to paypal">
	</div>
<?php		
	}else {	?>
<p>Your basket is currently empty.</p>
<?php } ?>
<?php require_once("_footer.php"); ?>