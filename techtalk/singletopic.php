<!-- //SingleTopic Controller for the single topic page -->
<?php require('core/init.php'); ?>

<?php
//Create Topic Object
$topic =  new Topic;

//Get ID from URL
$topic_id = $_GET['id'];

//Process Reply
if(isset($_POST['do_reply'])) {
	//Create Data Array
	$data = array();
	$data['topic_id'] = $_GET['id'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];

	//Create Validator Object
	$validate = new Validator;

	//Required Fields
	$field_array = array('body');

	if($validate->isRequired($field_array)) {
		//Register User
		if($topic->reply($data)) {
			redirect('singletopic.php?id='.$topic_id, 'Your reply has been posted', 'success');
		} else {
			redirect('singletopic.php?id='.$topic_id, 'Something went wrong with your post', 'error');
		}
	} else {
		redirect('singletopic.php?id='.$topic_id, 'Your reply form is blank!', 'error');
	}
}

//Get Template & Assign Vars
$template = new Template('templates/singletopic.php');

//Assign Vars
$template->topic = $topic->getTopic($topic_id);
$template->replies = $topic->getReplies($topic_id);
$template->title = $topic->getTopic($topic_id)->title;

//Display template since we have the tostring magic method which will allow to print as an object
echo $template;

?>