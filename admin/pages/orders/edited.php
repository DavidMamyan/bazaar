<?php 
$url = $this->objUrl->getCurrent(array('action', 'id'));
require_once("_header.php"); ?>
<h1>Order updated successfully</h1>
<p>The order was updated successfully.</p>
<p>Now you can view all <a href="<?php echo $url ?>">orders</a></p>
<?php require_once("_footer.php"); ?>