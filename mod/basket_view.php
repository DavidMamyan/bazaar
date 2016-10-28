<?php 
require_once("../inc/autoload.php");
	$objUrl = new Url();
	$session = Session::getSession('basket');
	$objBasket = new Basket();
	$out = array();
	if (!empty($session)) {
		$objCatalogue = new Catalogue();
		foreach ($session as $key => $value) {
			$out[$key] = $objCatalogue->getProduct($key);
		}
	}
?>

	<?php if (!empty($out)) { ?>

		<form action="" method="POST" id="frm_basket">
			<table cellpadding="0" border="0" cellspacing="0" class="tbl_repeat">
				<tr>
					<th>Item</th>
					<th class="tr_a">Quantity</th>
					<th class="tr_a col_15">Price</th>
					<th class="tr_a col_15">Remove</th>
				</tr>
				<?php foreach ($out as $item) { ?>
					<tr>
						<td><?php echo "<strong>" . Helper::encodeHTML($item['name']);  "</strong>" ?></td>
						<td><input type="text" name="qty-<?php echo $item['id']; ?>" id="qty-<?php echo $item['id']; ?>" value="<?php echo $session[$item['id']]['qty'] ?>" class="fld_qty"></td>
						<td class="ta_r"><?php echo "&#36;" . number_format($objBasket->itemTotal($item['price'], $session[$item['id']]['qty']), 2); ?></td>
						<td class="ta_r"><?php echo Basket::removeButton($item['id']); ?></td>
					</tr>
				<?php } ?>
				<?php if ($objBasket->_vat_rate != 0) { ?>
				<tr>
					<td colspan="2" class="br_td">Sub-total:</td>
					<td class="ta_r br_td">&#36; <?php echo number_format($objBasket->_sub_total, 2) ?></td>
					<td class="ta_r br_td">&#160;</td>
				</tr>

				<tr>
					<td colspan="2" class="br_td">VAT(<?php echo ($objBasket->_vat_rate) . "%"; ?>)</td>
					<td class="ta_r br_td">&#36; <?php echo number_format($objBasket->_vat, 2); ?></td>
					<td class="ta_r br_td">&#160;</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="2" class="br_td"><strong>Total:</strong></td>
					<td class="ta_r br_td"><strong>&#36;<?php echo number_format($objBasket->_total, 2); ?></strong></td>
					<td class="ta_r br_td">&#160;</td>
				</tr>
			</table>
			<div class="dev br_td">&#160;</div>
			<div class="sbm sbm_blue fl_r">
				<a href="<?php echo $objUrl->href('checkout'); ?>" class="btn">Ckechout</a>
			</div>
			<div class="sbm sbm_blue fl_l">
				<span class="btn update_basket">Update</span>
			</div>
		</form>
	
	<?php }else { ?>
		<p>Your basket is currently empty.</p>
	<?php } ?>