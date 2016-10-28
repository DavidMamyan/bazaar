<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bazaar | Admin</title>
<meta name="description" content="<?php echo $this->_meta_description; ?>" />
<meta name="keywords" content="<?php echo $this->_meta_keywords; ?>" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="icon" href="http://bazaar/images/smallLogo.png" type="image/x-icon" />
<link href="http://bazaar/css/core.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" href="http://bazaar/css/currency_widget.css"> -->
</head>
<body>
<!-- JEX -->
<div id="header">
	<div id="header_in">
		<h5><a href="/" target="_blank">Admin Panel</a></h5>
		JEX
		<?php 
			if (Login::isLogged(Login::$_login_admin)) {
				echo "<div id='logged_as'>Logged in as: <strong>";
				echo Login::getFullNameAdmin(Session::getSession(Login::$_login_admin));
				echo "</strong> | <a href='/logout'>Logout</a></div>";
			}else {
				echo "<div id='logged_as'><a href=/panel>Login</a></div>";
			}
		?>
	</div>
</div>
<div id="outer">
	<div id="wrapper">
		<div id="left">
		<?php if (Login::isLogged(Login::$_login_admin)) { ?>	
			<h2>Navigation</h2>
			<div class="dev br_td">&nbsp;</div>
			<ul id="navigation">
				<li><a href="/panel/products"
					<?php echo $this->objNavigation->active('product'); ?>>Products
				</a></li>	
				<li><a href="/panel/categories"
					<?php echo $this->objNavigation->active('categories'); ?>>Categories
				</a></li>
				<li><a href="/panel/orders"
					<?php echo $this->objNavigation->active('orders'); ?>>Orders
				</a></li>	
				<li><a href="/panel/clients"
					<?php echo $this->objNavigation->active('clients'); ?>>Clients
				</a></li>
				<li><a href="/panel/business"
					<?php echo $this->objNavigation->active('business'); ?>>Business
				</a></li>
			</ul> 				
		<?php }else { ?>
			&nbsp;
		<?php } ?> 
		</div>
		<div id="right">