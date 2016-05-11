<?php

class ContactListPage extends Page {

/**
 * One to many relationship with Contact object
 */

  public static $has_many = array(
    'Contacts' => 'Contact'
  );


/**
 * Create Grid Field
 */

  public function getCMSFields() {

  $fields = parent::getCMSFields();

  $gridFieldConfig = GridFieldConfig::create()->addComponents(
    new GridFieldToolbarHeader(),
    new GridFieldAddNewButton('toolbar-header-right'),
    new GridFieldSortableHeader(),
    new GridFieldDataColumns(),
    new GridFieldPaginator(10),
    new GridFieldEditButton(),
    new GridFieldDeleteAction(),
    new GridFieldDetailForm()
  );    


  $gridField = new GridField("Contacts", "Contact list:", $this->Contacts(), $gridFieldConfig);
  $fields->addFieldToTab("Root.Contacts", $gridField);    
  return $fields;
  }

}


class ContactListPage_Controller extends Page_Controller {
 
    public static $allowed_actions = array (
    );
 
    public function init() {
    parent::init();
    }
}
