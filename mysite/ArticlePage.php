<?php

class ArticlePage extends Page {

private static $can_be_root = false;

private static $many_many = array (
        'Categories' => 'ArticleCategory'
    );

private static $db = array (
	'Date' => 'Date',
    	'Teaser' => 'Text',
    	'Author' => 'Varchar'
	);

 private static $has_many = array (
        'Comments' => 'ArticleComment'
    );

public function getCMSFields() {
    	$fields = parent::getCMSFields();
	$fields->addFieldToTab('Root.Main', DateField::create('Date','Date of article'),'Content');   
    	$fields->addFieldToTab('Root.Main', TextareaField::create('Teaser'),'Content');
    	$fields->addFieldToTab('Root.Author', TextField::create('Author','Author of article'));

	$fields->addFieldToTab('Root.Attachments', $photo = UploadField::create('Photo'));
        $fields->addFieldToTab('Root.Attachments', $brochure = UploadField::create('Brochure','Travel brochure, optional (PDF only)'));

	$photo->setFolderName('Article-Photos');

	$brochure
		->setFolderName('travel-brochures')
		->getValidator()->setAllowedExtensions(array('pdf'));
	
	$fields->addFieldToTab('Root.Categories', CheckboxSetField::create(
		    'Categories',
		    'Selected categories',
		    $this->Parent()->Categories()->map('ID','Title')
		));

    return $fields;
  }

private static $has_one = array (
        'Photo' => 'Image',
        'Brochure' => 'File'
    );

}

class ArticlePage_Controller extends Page_Controller {

//https://www.silverstripe.org/learn/lessons/introduction-to-frontend-forms

public function CommentForm() {
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create('Name','')
			->setAttribute('placeholder','Name*')
			->addExtraClass('form-control'),
                EmailField::create('Email','')
			->setAttribute('placeholder','Email*')
			->addExtraClass('form-control'),
                TextareaField::create('Comment','')
			->setAttribute('placeholder','Comment*')
			->addExtraClass('form-control')
            ),
            FieldList::create(
                FormAction::create('handleComment','Post Comment')
			->setUseButtonTag(true)
                	->addExtraClass('btn btn-default-color btn-lg')
            ),
            RequiredFields::create('Name','Email','Comment')
        );


	$form->addExtraClass('form-style');

       // return $form;

	$data = Session::get("FormData.{$form->getName()}.data");  //for reloading with same data if error validation

	return $data ? $form->loadDataFrom($data) : $form;
    }



public function handleComment($data, $form) {


//validation

Session::set("FormData.{$form->getName()}.data", $data); // put values to session for reloading form with same data if error

$existing = $this->Comments()->filter(array(
            'Comment' => $data['Comment']
        ));

if($existing->exists() && strlen($data['Comment']) > 20) {
            $form->sessionMessage('That comment already exists! Spammer!','bad');

            return $this->redirectBack();
        }
//validation ends



    $comment = ArticleComment::create();
    //$comment->Name = $data['Name'];
    //$comment->Email = $data['Email'];
    //$comment->Comment = $data['Comment'];
      
    $comment->ArticlePageID = $this->ID;
    $form->saveInto($comment); //instead of commented items use this code save all fields with same name

    Session::clear("FormData.{$form->getName()}.data"); //clear session if not error

    $comment->write();

    $form->sessionMessage('Thanks for your comment!','good');

    return $this->redirectBack();
}

private static $allowed_actions = array (
        'CommentForm',
    );

}

