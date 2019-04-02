<?php
/*
*	Format Date
*/
function formatDate($date) {
	$date = date("F j, Y, g:i a", strtotime($date));
	return $date;
}

/*
*	URL Format
*/
function urlFormat($str) {
	//using regular expressions to check if it is in url
	//Strip out all whitespace
	$str = preg_replace('/\s*/', '', $str);
	//Convert the string to all lowercase
	$str = strtolower($str);
	//URL Encode
	$str = urlencode($str);
	return $str;
}

/*
*	Add classname active if category is active, Accessing the category using the GET super global
*/
function is_active($category) {
	if(isset($_GET['category'])) {
		if($_GET['category'] == $category) {
			return 'active';
		} else {
			return '';
		}
	} else {
		if($category == null) {
			return 'active';
		}
	}
}

?>