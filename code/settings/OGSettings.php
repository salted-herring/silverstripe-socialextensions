<?php

	/**
	 * Additional settings for OG
	 * */
	class OGSettings extends DataExtension {
	
		private static $db = array(
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
			
			$fields->addFieldToTab('Root.Social', $og);
		}
	
	}