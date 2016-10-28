<p>Dear <?php echo $first_name ?></p>
<p>Thank you for signing up at our website</p> 
<?php 
if (!empty($password)) { ?>	
<p>
	<br><p>Your login details are these:</p>
	Login: <?php echo $email ?>
	Password: <?php echo $password ?>
<?php } ?> 
</p>
<p>In order to activate your account please click the link below</p>
<p><?php echo $link ?></p>