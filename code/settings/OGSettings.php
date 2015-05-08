<?php

	/**
	 * Additional settings for OG
	 * */
	class OGSettings extends DataExtension {
	
		private static $db = array(
			'TwitterName' 	=> 'Varchar(255)',
			'OGTitle' 		=> 'Varchar(255)',
			'OGDescription'	=> 'Varchar(512)'
		);
		
		private static $has_one = array(
			'OGImage' 		=> 'Image'
		);
	
		/**
		 * @param FieldList $fields
		 */
		public function updateCMSFields(FieldList $fields) {
			
			$og = ToggleCompositeField::create(
				'OG',
				new LabelField('Open', 'Open Graph details'),
				array(
					new TextField('OGTitle', 'Title'),
					new TextField('OGDescription', 'Description'),
					new UploadField('OGImage', 'Image')
				)
			);
			$og->setStartClosed(false);
			
			$twitter = ToggleCompositeField::create(
				'Twitter',
				new LabelField('twit', 'Twitter Details'),
				array(
					$name = new TextField('TwitterName', 'Twitter Name')
				)
			);
			$twitter->setStartClosed(false);
			
			$fields->addFieldToTab('Root.Social', $og);
			$fields->addFieldToTab('Root.Social', $twitter);
			
			$name->setDescription('Your account name that content will be shared from (don\'t include the @).');
		}
	
	}