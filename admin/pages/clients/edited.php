<?php 
$url = $this->objUrl->getCurrent(array('action', 'id'));
require_once("_header.php"); ?>
<h1>User's details edited successfully</h1>
<p>Now you can view all <a href="<?php echo $url ?>">users</a></p>
<?php require_once("_footer.php"); ?>