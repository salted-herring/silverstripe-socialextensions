<?php

	/**
	 * List all Social Channels.
	 * */
	class SocialSettings extends DataExtension {
		private static $db = array(
			'TwitterName'	=> 'Varchar(255)',
			'FacebookURL'	=> 'Varchar(255)',
			'PinterestURL'	=> 'Varchar(255)'
		);
		
		private static $has_one = array(
		);
		
		private static $has_many = array(
		);
		
		private static $summary_fields = array(
		);
		
		private static $defaults = array(
		);
		
		private static $searchable_fields = array(
		);
		
		public function updateCMSFields(FieldList $fields) {
			$social = ToggleCompositeField::create(
				'Social',
				new LabelField('social', 'Social Network Details'),
				array(
					$fb = new TextField('FacebookURL', 'Facebook URL'),
					$twitterName = new TextField('TwitterName', 'Twitter Name'),
					$pinterest = new TextField('PinterestURL', 'Pinterest URL')
				)
			);
			$social->setStartClosed(false);
			$fields->addFieldToTab('Root.Social', $social);
			
			$twitterName->setDescription('Your account name that content will be shared from (don\'t include the @).');
		}
	}