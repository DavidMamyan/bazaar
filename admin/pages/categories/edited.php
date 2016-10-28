<?php 
$url = $this->objUrl->getCurrent(array('action', 'id'));
require_once("_header.php"); ?>
<h1>Category edited successfully</h1>
<p>The category was edited successfully.</p>
<p>Now you can view all <a href="<?php echo $url ?>">categories</a></p>
<?php require_once("_footer.php"); ?>