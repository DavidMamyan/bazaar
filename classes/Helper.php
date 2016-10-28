<?php
class Helper {

	// public static function getActive($page = null){
	// 	if (!empty($page)) {
	// 		if (is_array($page)) {
	// 			$error = array();
	// 			foreach ($page as $key => $value) {
	// 				if (Url::getParam($key) != $value) {
	// 					array_push($error, $key);
	// 				}
	// 			}
	// 			return empty($error) ? " class=\"act\"" : null;
	// 		}
	// 	}
	// 	return $page == Url::cPage() ? "class=\"act\"" : null;
	// }


	
	public static function encodeHTML($string, $case = 2) {
		switch($case) {
			case 1:
			return htmlentities($string, ENT_NOQUOTES, 'UTF-8', false);
			break;			
			case 2:
			$pattern = '<([a-zA-Z0-9\.\, "\'_\/\-\+~=;:\(\)?&#%![\]@]+)>';
			// put text only, devided with html tags into array
			$textMatches = preg_split('/' . $pattern . '/', $string);
			// array for sanitised output
			$textSanitised = array();			
			foreach($textMatches as $key => $value) {
				$textSanitised[$key] = htmlentities(html_entity_decode($value, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
			}			
			foreach($textMatches as $key => $value) {
				$string = str_replace($value, $textSanitised[$key], $string);
			}			
			return $string;			
			break;
		}
	}
	
	// image size
	public static function getImgSize($image, $case){
		if (is_file($image)) {
			//0=>width 1=>height 2=>type 3=>attribs
			$size = getimagesize($image);
			return $size[$case];
		}
	}

	// shorten things
	public static function shortenString($string, $len=150){
		if (strlen($string)>$len) {
			$string = trim(substr($string, 0, $len));
			$string = substr($string, 0, strpos($string, " "))."&hellip;";
		}else {
			$string .= "&hellip;";
		}
		return $string;
	}

	// redirection
	public static function redirect($url){
		if (!empty($url)) {
			header("Location: {$url}");
			exit;
		}
	}

	// date 
	public static function setDate($case = null, $date = null){
		$date = empty($date) ? time() : strtotime($date);
		switch ($case) {
			case 1:
				return date('d/m/Y', $date);
				break;
			case 2:
				return date('l, jS F Y, H:i:s', $date);
				break;
			case 3:
				return date('Y-m-d-H-i-s', $date);
				break;
			
			default:
				return date('Y-m-d H:i:s', $date);
				break;
		}
	}

	public static function cleanString($name = null){
		if (!empty($name)) {
			return strtolower(preg_replace('/[^a-zA-Z0-9.]/', '-', $name));
		}
	}

	public static function clearString($string = null, $array = null){
		if (!empty($string) && !self::isEmpty($array)) {
			$array = self::makeArray($array);
			foreach ($array as $key => $value) {
				$string = str_replace($value, "", $string);
			}
			return $string;
		}
	}

	public static function isEmpty($value){
		return empty($value) && !is_numeric($value) ? true : false;
	}

	public static function makeArray($array = null){
		return is_array($array) ? $array : array($array);
	}

} //class ended, thanks for everything class