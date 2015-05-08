<?php

	/**
	 * Provides accessor methods to get the social links.
	 * */
	class SocialExtensions extends DataExtension {
		
		public function FacebookURL() {
			return SiteConfig::current_site_config()->FacebookURL;
		}
		
		public function TwitterName() {
			return SiteConfig::current_site_config()->TwitterName;
		}
		
		public function PinterestURL() {
			return SiteConfig::current_site_config()->PinterestURL;
		}
	}