<?php
class Page extends SiteTree {

	private static $db = array(
	);


	/*******short code example*********/

	private static $casting = array(
	'MyCustomShortCode' => 'HTMLText',	
	'calculator' => 'HTMLText',
	);

  

	public static function MyCustomShortCode($arguments, $content , $parser = null, $tagName) {

	return "<em>" . $tagName . "</em> " . $content . "; " . count($arguments) . " arguments.";

	}


	public static function calculator($arguments, $content , $parser = null, $tagName) {


	//return Controller::curr()->getRequest()->getVar('ID');

	return Controller::curr()->ID; //get current id of the page


		

	return $arguments['x'] . " X " . $arguments['y'] . " = " . $arguments['x'] * $arguments['y'];
	
	}


	/*******short code example ends*********/



	/******* ADDED FOR WIDGET********/
	private static $has_one = array(
	"MyWidgetArea" => "WidgetArea",
	    );

	  public function getCMSFields() {
			$fields = parent::getCMSFields();
			$fields->addFieldToTab("Root.Widgets", new WidgetAreaEditor("MyWidgetArea"));
			return $fields;
	  }
	/*********** ADDED FOR WIDGET *********/
}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);



public function init() {   
  parent::init();
  Requirements::css("http://fonts.googleapis.com/css?family=Raleway:300,500,900%7COpen+Sans:400,700,400italic");
  Requirements::css($this->ThemeDir()."/css/bootstrap.min.css");
  Requirements::css($this->ThemeDir()."/css/style.css");
  Requirements::javascript($this->ThemeDir()."/javascript/common/modernizr.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/jquery-1.11.1.min.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/bootstrap.min.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/bootstrap-datepicker.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/chosen.min.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/bootstrap-checkbox.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/nice-scroll.js");
  Requirements::javascript($this->ThemeDir()."/javascript/common/jquery-browser.js");
  Requirements::javascript($this->ThemeDir()."/javascript/scripts.js");
}


}







