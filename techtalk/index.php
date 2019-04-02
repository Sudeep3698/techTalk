<!-- //Index Controller for the front page -->
<?php require('core/init.php'); ?>

<?php
// Create Topics Object
$topic = new Topic;

// Create Users Object
$user = new User;

//Get Template & Assign Vars
$template = new Template('templates/frontpage.php');

//Assign Vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

//Display template since we have the tostring magic method which will allow to print as an object
echo $template;

?>