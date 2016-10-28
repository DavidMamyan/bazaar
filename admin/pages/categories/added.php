<?php 
$url = $this->objUrl->getCurrent(array('action', 'id'));
require_once("_header.php"); ?>
<h1>Category added successfully</h1>
<p>Thank you for adding a new category.</p>
<p>Now you can view all <a href="<?php echo $url ?>">categories</a></p>
<?php require_once("_footer.php"); ?>