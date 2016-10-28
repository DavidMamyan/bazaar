<?php Login::restrictAdmin();
$action = $this->objUrl->get('action');
switch ($action) {
	case "add":
		require_once("categories/add.php");
		break;
	
	case "added":
		require_once("categories/added.php");
		break;

	case "added-failed":
		require_once("categories/added-failed.php");
		break;

	case "added-no-upload":
		require_once("categories/added-no-upload.php");
		break;

	case "edit":
		require_once("categories/edit.php");
		break;

	case "edited":
		require_once("categories/edited.php");
		break;

	case "edited-failed":
		require_once("categories/edited-failed.php");
		break;

	case "edited-no-upload":
		require_once("categories/edited-no-upload.php");
		break;

	case "remove":
		require_once("categories/remove.php");
		break;

	default:
		require_once("categories/list.php");
		break;
}
?>