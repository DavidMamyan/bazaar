<?php 
$objUser = new User();
$objOrder = new Order();
if (isset($_POST['srch'])) {
	if (!empty($_POST['srch'])) {
		$url = $this->objUrl->getCurrent('srch').'/srch/'.urlencode(stripslashes($_POST['srch']));
	}else {
		$url = $this->objUrl->getCurrent('srch');
	}
	Helper::redirect($url);
}else {
	$srch = stripslashes(urldecode($this->objUrl->get('srch')));
	if (!empty($srch)) {
		$users = $objUser->getUsers($srch);
		$empty = "There are no results matching your searching creteria.";
	}else {
		$users = $objUser->getUsers();
		$empty = "No records found.";
	}


	$objPaging = new Paging($this->objUrl, $users, 10);
	$rows = $objPaging->getRecords();
	require_once("_header.php"); ?>
	<h1>Clients</h1>
	<form action="<?php echo $this->objUrl->getCurrent('srch'); ?>" method="POST">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			<tr>
				<th><label for="srch">Name: </label></th>
				<td><input type="text" name="srch" id="srch" value="<?php echo ($srch); ?>" class="fld"></td>
				<td>
					<label for="btn_add" class="sbm sbm_blue fl_l">
						<input type="submit" id="btn_add" class="btn" value="Search" >
					</label>
				</td>
			</tr>
		</table>
	</form>
	 
	<?php if (!empty($rows)){ ?>
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_repeat">
		<tr>
			<th>Name</th>
			<th class="col_15 ta_r">Remove</th>
			<th class="col_5 ta_r">View</th>
		</tr>
		<?php foreach ($rows as $user) { ?>
		<tr>
			<td><?php echo Helper::encodeHTML($user['first_name'] . " " . $user['last_name']); ?></td>

			<td class="ta_r">
				<?php 
				$user = $objUser->getUser($user['id']);
					if (empty($user)) { ?>
					<a href="<?php echo $this->objUrl->getCurrent(array('action', 'id')).'/action/remove/id/'.$user['id'] ?>">Remove</a>
				<?php }else { ?>
					<span class="inactive">Remove</span>	
				<?php } ?>
			</td>

			<td class="ta_r"><a href="<?php echo $this->objUrl->getCurrent(array('action', 'id')).'/action/edit/id/'.$user['id'] ?>">Edit</a></td>
		</tr>
		<?php } ?>
	</table>

	<?php echo $objPaging->getPaging() ?>

	<?php 
		}else {
			echo "<p>".$empty."</p>";
		} ?>

	<?php require_once("template/_footer.php"); 
}?>