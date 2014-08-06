<?php

class OpenGraphExtensions extends DataExtension {
	public static $db = array(
		'OGTitle' => 'Varchar(255)',
        'OGDescription' => 'Varchar(255)'
	);
	public static $has_one =  array(
		'OGImage' => 'Image'
	);
	
	function __construct() {
		parent::__construct();
		
		/*
print_r($this);
		die;
		
		if($this->owner instanceof FBInterface) {
			throw new Exception(sprintf("The class type %s must implement the FBInterface.", get_class($this->owner)));
		}
*/
	}
	
	function getCMSFields() {	 
	    $fields = parent::getCMSFields();
	    return $fields;
	}
    
	public function updateCMSFields(FieldList $fields) {
		$fields->removeByName('OGTitle');
		$fields->removeByName('OGDescription');
		$fields->removeByName('OGImage');
		
		$og = ToggleCompositeField::create(
			'OG',
			new LabelField('Open', 'Open Graph Tags - for Facebook sharing'),
			array(
				new TextField('OGTitle', 'Title'),
				new TextField('OGDescription', 'Description'),
				new UploadField('OGImage', 'Image')
			)
		);
		$og->setStartClosed(false);
		$fields->addFieldToTab('Root.Social', $og);
	}
	
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		
		if(!$this->owner->ID) {
			return false;
		}
		
		if(method_exists($this->owner, 'getFBTitle') && $this->owner->getFBTitle() !== false && !$this->owner->OGTitle) {
			$this->owner->OGTitle = $this->owner->getFBTitle();
		}
		
		if(method_exists($this->owner, 'getFBDescription') && !$this->owner->OGDescription) {
			$matches = array();
			preg_match('(<p.*>(.*)</p>)', $this->owner->getFBDescription(), $matches);
			
			if($matches) {
				$this->owner->OGDescription = $matches[1];
			} else {
				$this->owner->OGDescription = $this->owner->getFBDescription();
			}
		}
		
		if(method_exists($this->owner, 'getFBImage') && $this->owner->getFBImage() !== false && !$this->owner->OGImage()->ID) {
			$this->owner->OGImageID = $this->owner->getFBImage()->ID;
		}
	}
}