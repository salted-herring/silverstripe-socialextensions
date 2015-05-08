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

			$fields->addFieldsToTab('Root.Social', array(
				new Tab(
					$title = 'OpenGraph',
					new TextField('OGTitle', 'Title'),
					new TextareaField('OGDescription', 'Description'),
					new UploadField('OGImage', 'Image')
				),
				new Tab(
					$title = 'Twitter',
					$name = new TextField('TwitterName', 'Twitter Name')
				)
			));
			
			$name->setDescription('Your account name that content will be shared from (don\'t include the @).');
		}
	
	}