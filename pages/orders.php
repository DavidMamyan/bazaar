<?php 
	Login::restrictFront($this->objUrl);
	$objOrder = new Order();
	$order = $objOrder->getClientOrders(Session::getSession(Login::$_login_front));
	$objPaging = new Paging($this->objUrl, $order, 5);
	$rows = $objPaging->getRecords();
	require_once("_header.php");
?>
<h1>My orders</h1>
<?php if (!empty($rows)) { ?>
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
		<tr>
			<th>Id</th>
			<th class="ta_r">Date</th>
			<th class="ta_r col_15">Status</th>
			<th class="ta_r col_15">Total</th>
			<th class="ta_r col_15">Invoice</th>
		</tr>
		<?php foreach ($rows as $row): ?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td class="ta_r"><?php echo Helper::setDate(1, $row['date']) ?></td>
				<td class="ta_r"><?php 
					$status = $objOrder->getStatus($row['status']);
					echo $status['name'];
				?></td>
				<td class="ta_r">$<?php echo 
					number_format($row['total'], 2);
				?></td>
				<td class="ta_r"><?php 
					if ($row['pp_status']==1) {
						echo '<a href="';
						echo $this->objUrl->href('invoice', array('id', $row['id']));
						echo '" target="_blank">Invoice</a>';
					}else {
						echo "<span class='inactive'>Invoice</span>";
					}
				?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php echo $objPaging->getPaging(); ?>
<?php }else { ?>
	<p>Currently you do not have any orders...</p>
<?php } ?> 	


<?php require_once("_footer.php"); ?>