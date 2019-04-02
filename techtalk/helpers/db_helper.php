<?php
/*
*	Get number of replies per topic
*/
function replyCount($topic_id) {
	$db = new Database;
	$db->query('SELECT * FROM replies WHERE topic_id = :topic_id');
	//binding them in to the variable for the replies
	$db->bind(':topic_id', $topic_id);
	//Assign Rows
	$rows = $db->resultset();
	//Get Count
	return $db->rowCount();
}

/*
*	Get Categories
*/
function getCategories() {
	$db = new Database;
	$db->query('SELECT * FROM categories');

	//Assign Result Set
	$results = $db->resultset();

	return $results;
}

/*
*	User Posts getting all the topics made by the user and getting the rows and then selecting all the replies that has been made by the user for that topic
*/
function userPostCount($user_id) {
	$db = new Database;
	$db->query('SELECT * FROM topics WHERE user_id = :user_id');
	$db->bind(':user_id', $user_id);
	//Assign Rows
	$rows = $db->resultset();
	//Get Count
	$topic_count = $db->rowCount();

	$db->query('SELECT * FROM replies WHERE user_id = :user_id');
	$db->bind(':user_id', $user_id);
	//Assign Rows
	$rows = $db->resultset();
	//Get Count
	$reply_count = $db->rowCount();
	return $topic_count + $reply_count;
}

?>