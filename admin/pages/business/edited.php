<?php 
$url = $this->objUrl->getCurrent(array('action', 'id'));
require_once("_header.php"); ?>
<h1>Business updated successfully</h1>
<p>The business details were updated successfully.</p>
<p>Now you can view all <a href="<?php echo $url ?>">businesses</a></p>
<?php require_once("_footer.php"); ?>