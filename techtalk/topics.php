<!-- //Topics Controller for the topics page-->
<?php require('core/init.php'); ?>

<?php
// Create Topics Object
$topic = new Topic;

//Get Category From URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get User From URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;

//Get Template & Assign Vars
$template = new Template('templates/topics.php');

//Assign Template Variables
if(isset($category)) {
	$template->topics = $topic->getByCategory($category);
	$template->title = 'Posts In "'.$topic->getCategory($category)->name.'"';
}

//Check For User Filter
if(isset($user_id)) {
	$template->topics = $topic->getByUser($user_id);
	//$template->title = 'Posts By "'.$user->getUser($user_id)$topic->username.'"';
}

//Check for category and user filter
if(!isset($category) && !isset($user_id)) {
	$template->topics = $topic->getAllTopics();	
}
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();

//Display template since we have the tostring magic method which will allow to print as an object
echo $template;