<?php

  
class Contact extends DataObject {

/**
 * Contact object's fields
 */

  public static $db = array(
    'Name' => 'Varchar(255)',
    'Description' => 'Text',
    'Website' => 'Varchar(255)'
  );

/**
 * Summary fields
 */

  public static $summary_fields = array(
    'Name' => 'Name',
    'Description' => 'Description',
    'Website' => 'Website URL'
  );

public function getCMSFields_forPopup() { 

/**
 * Profile picture field
 */
  
  $thumbField = new UploadField('ProfilePicture', 'Profile picture');
  $thumbField->allowedExtensions = array('jpg', 'png', 'gif');
   
/** 
 * Name, Description and Website fields 
 */

 return new FieldList(
 new TextField('Name', 'Name'),
 new TextareaField('Description', 'Contact description'),
 new TextField('Website', 'Website URL (including http://)'),
 $thumbField
 );

}


/**
 * One-to-one relationship with profile picture and contact list page
 */

 public static $has_one = array(
 'ProfilePicture' => 'Image',
 'ContactListPage' => 'ContactListPage'
 );



}

