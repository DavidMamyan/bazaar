<?php 
	if (!isset($_SESSION)) {
		session_start();
	}

	defined("PAGE_EXT")
		|| define("PAGE_EXT", ".html");

	// site domain name with http
	defined("SITE_URL")
		|| define("SITE_URL", "http://".$_SERVER['SERVER_NAME']);
		// echo SITE_URL . "<br>";

	// directory separator
	defined("DS")
		|| define("DS", DIRECTORY_SEPARATOR);
		// echo DS . "<br>";

	// path to the root
	defined("ROOT_PATH")
		|| define("ROOT_PATH", realpath(dirname(__FILE__).DS."..".DS));
		// echo ROOT_PATH . "<br>";
		// echo ROOT_PATH.DS.PAGES_DIR;

	// classes folder
	defined("CLASSES_DIR")
		|| define("CLASSES_DIR", "classes");
	// echo CLASSES_DIR . "<br>";

	// pages directory
	defined("PAGES_DIR")
		|| define("PAGES_DIR", "pages");
	// echo PAGES_DIR . "<br>";

	// modules folder
	defined("MOD_DIR")
		|| define("MOD_DIR", "mod");
		// echo MOD_DIR . "<br>"

	// inc folder
	defined("INC_DIR")
		|| define("INC_DIR", "inc");
		// echo INC_DIR . "<br>"
	
	// templates folder
	defined("TEMPLATE_DIR")
		|| define("TEMPLATE_DIR", "template");
	// echo TEMPLATE_DIR . "<br>"

	// emails path
	defined("EMAILS_PATH")
		|| define("EMAILS_PATH", ROOT_PATH.DS."emails");
	// echo EMAILS_PATH . "<br>;

	// catalogue images path
	defined("CATALOGUE_PATH")
		|| define("CATALOGUE_PATH", ROOT_PATH.DS."media".DS."catalogue");
		// echo CATALOGUE_PATH . "<br>";
	// echo ROOT_PATH.DS.PAGES_DIR.DS.'.php';
	// add all above directores to the include path
	set_include_path(implode(PATH_SEPARATOR, array(
		realpath(ROOT_PATH.DS.MOD_DIR),
		realpath(ROOT_PATH.DS.INC_DIR),
		get_include_path()
	)));
?>