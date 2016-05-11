<?php

class Property extends DataObject {


private static $db = array (
        'Title' => 'Varchar',
        'PricePerNight' => 'Currency',
        'Bedrooms' => 'Int',
        'Bathrooms' => 'Int',
        'FeaturedOnHomepage' => 'Boolean',
	'AvailableStart' => 'Date',
        'AvailableEnd'=> 'Date',
	'Description' => 'Text'
    );

 public function getCMSfields() {
        $fields = FieldList::create(TabSet::create('Root'));
        //$fields = FieldList::create(GridField::create('Root'));
        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Title'),
            CurrencyField::create('PricePerNight','Price (per night)'),
            DropdownField::create('Bedrooms')
                ->setSource(ArrayLib::valuekey(range(1,10))),
            DropdownField::create('Bathrooms')
                ->setSource(ArrayLib::valuekey(range(1,5))),
            DropdownField::create('RegionID','Region')
                ->setSource(Region::get()->map('ID','Title')),
	    TextareaField::create('Description'),
            CheckboxField::create('FeaturedOnHomepage','Feature on homepage')
        ));
        $fields->addFieldToTab('Root.Photos', $upload = UploadField::create(
            'PrimaryPhoto',
            'Primary photo'
        ));

	
        $upload->getValidator()->setAllowedExtensions(array(
            'png','jpeg','jpg','gif'
        ));
        $upload->setFolderName('property-photos');

        return $fields;
    }

private static $has_one = array (
        'Region' => 'Region',
        'PrimaryPhoto' => 'Image'
    );

private static $summary_fields = array (
        'Title' => 'Title',
        'Region.Title' => 'Region',
        'PricePerNight.Nice' => 'Price',
        'FeaturedOnHomepage.Nice' => 'Featured?'
    );

/*private static $searchable_fields = array (
        'Title',
        'Region.Title',
        'FeaturedOnHomepage'
    );  
*/

public function searchableFields() {
        return array (
            'Title' => array (
                'filter' => 'PartialMatchFilter',
                'title' => 'Title',
                'field' => 'TextField'
            ),
            'RegionID' => array (
                'filter' => 'ExactMatchFilter',
                'title' => 'Region',
                'field' => DropdownField::create('RegionID')
                    ->setSource(
                        Region::get()->map('ID','Title')
                    )
                    ->setEmptyString('-- Any region --')                
            ),
            'FeaturedOnHomepage' => array (
                'filter' => 'ExactMatchFilter',
                'title' => 'Only featured'              
            )
        );
    } 

}




/*
for ($i = 0; $i < 5; $i++)
{


	
	$property = Property::create();

	$property->Title = "third_".rand(0,50);
	$property->PricePerNight = rand(1,50);
	$property->Bedrooms = rand(1,2);
	$property->Bathrooms = rand(1,3);
	$property->RegionID = rand(1,6);
	$property->AvailableStart = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + ".rand(1,5)." days"));
	$property->AvailableEnd = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + ".rand(5,15)." days"));
	$property->write();
	
	
	
}*/

