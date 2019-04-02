<?php
/*
*	Template Class
*	Creates a template/view object
*/
class Template {
	// Path to template
	protected $template;
	// Variable passed in to the template whether it is coming from database or defined in the controller 
	protected $vars = array();

	/*
	*	Class Constructor
	*/
	public function __construct($template) {
		$this->template = $template;
	}

	/*
	*	Get template variables(reading data from inaccessible properties)
	*/
	public function __get($key) {
		return $this->vars[$key];
	}

	/*
	*	Set template variables(writing data to the inaccessible properties)
	*/
	public function __set($key, $value) {
		$this->vars[$key] = $value;
	}

	/*
	*	Convert Object To String and can print the template and it is a PHP magic method
	*/
	public function __toString() {
		extract($this->vars); //to get the template variables
		chdir(dirname($this->template));
		ob_start();// for output buffering
		//With output buffering, your HTML is stored in a variable and sent to the browser as one piece at the end of your script.
		// stored as an input buffer

		// including the template in to our file
		include basename($this->template);

		return ob_get_clean();
	}
}

?>