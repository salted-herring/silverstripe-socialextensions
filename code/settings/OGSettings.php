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
			//
			// Generic OG Tags.
			//
			$fields->addFieldsToTab('Root.Social.Open Graph', array(
				$title = new TextField('OGTitle', 'Title'),
				$description = new TextareaField('OGDescription', 'Description'),
				$img = new UploadField('OGImage', 'Image');
			));
			
			//
			// Twitter
			//
			$fields->addFieldToTab('Root.Social.Twitter', $name = new TextField('TwitterName', 'Twitter Name'));
			$name->setDescription('Your account name that content will be shared from (don\'t include the @).);
		}
	
	}