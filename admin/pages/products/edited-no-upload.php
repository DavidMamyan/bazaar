<?php 
$url = $this->objUrl->getCurrent(array('action', 'id'));
require_once("_header.php"); ?>
<h1>Product edited successfully</h1>
<p>The new product was edited successfully. No image was updated.</p>
<p>Now you can view all <a href="<?php echo $url ?>">products</a></p>
<?php require_once("_footer.php"); ?>