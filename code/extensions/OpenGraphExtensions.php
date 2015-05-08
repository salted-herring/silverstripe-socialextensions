<?php
	
	/**
	 * Generic Extension for services that use OG - e.g. FB & Twitter.
	 * */
	class OpenGraphExtensions extends DataExtension {
		public static $db = array(
			'OGTitle'		=> 'Varchar(255)',
			'OGDescription'	=> 'Varchar(255)'
		);
		
		public static $has_one =  array(
			'OGImage'		=> 'Image'
		);
		
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
				new LabelField('Open', 'Open Graph Tags - for sharing'),
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
			
			/**
			 * If OGTitle is not defined, attempt to work out the title.
			 * */
			if (empty($this->owner->OGTitle)) {
				if (isset($this->owner->Title)) {
					$this->owner->OGTitle = $this->owner->Title;
				}
				
				if (isset($this->owner->Name)) {
					$this->owner->OGTitle = $this->owner->Name;
				}
			}
			
			/**
			 * Strip p tags from description
			 * */
			$matches = array();
			preg_match('(<p.*>(.*)</p>)', $this->owner->OGDescription, $matches);
			
			if($matches) {
				$this->owner->OGDescription = $matches[1];
			}
		}
		
		/**
		 * Output the OG / sharing tags.
		 * */
		public function getOG($var = 'Title') {

			// Is $var a field?
			$fields = array(
				'OGTitle',
				'OGDescription',
				'OGImage'
			);
	
			// Can't find it?
			if (!in_array($var, $fields)) {
				return false;
			}
	
			if ($var == 'OGImage') {
				// Has it been overwritten on the page?
				if ($this->OGImage()) {
		
					// Yes.
					return $this->OGImage();
				}
			} else {
				// Has it been overwritten on the page?
				if ($this->$var) {
		
					// Yes.
					return $this->$var;
				}
			}
			
	
			// No? Use the default.
			return SiteConfig::current_site_config()->$var;
		}
	}