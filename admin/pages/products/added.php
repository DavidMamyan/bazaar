<?php 
$url = $this->objUrl->getCurrent('action', 'id');
require_once("_header.php"); ?>
<h1>Product added successfully</h1>
<p>Thank you for adding a new product.</p>
<p>Now you can view all <a href="<?php echo $url ?>">products</a></p>
<?php require_once("_footer.php"); ?>