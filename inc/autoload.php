<?php 
require_once ('_config.php');
	function __autoload($class_name){
		$class = explode("_", $class_name);
		$path = implode("/", $class).".php";
		require_once (ROOT_PATH.DS.CLASSES_DIR.DS.$path);
	}
?>