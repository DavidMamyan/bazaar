<?php $objBasket = new Basket(); 
$objUrl = new Url();?>
<h2>Your Basket</h2>
<dl id="basket_left">
	<dt>Number of items: </dt>
	<dd class="bl-ti"><span><?php echo $objBasket->_number_of_items; ?></span></dd>
	<dt>Sub-total</dt>
	<dd class="bl-st">&#36;<span><?php echo number_format($objBasket->_sub_total, 2); ?></span></dd>
	<dt>VAT (<span><?php echo number_format($objBasket->_vat_rate, 2); ?></span>%):</dt>
	<dd class="bl_vat">&#36;<span><?php echo number_format($objBasket->_vat, 2); ?></span></dd>
	<dt>Total (inc):</dt>
	<dd class="bl_total">&#36;<span><?php echo $objBasket->_total; ?></span></dd>
</dl>
<div class="dev br_td">&#160;</div>
<p><a href="<?php echo $objUrl->href('basket') ?>">View Basket</a> | <a href="<?php echo $objUrl->href('checkout') ?>">Checkout</a></p>
<div class="dev br_td">&#160;</div>