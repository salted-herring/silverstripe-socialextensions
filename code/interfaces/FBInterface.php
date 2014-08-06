<?php

/**
 * Core methods that any class wishing to extend
 * OpenGraphExtension must implement.
 *
 * @author  Simon Winter <simon@saltedherring.com>
 */
interface FBInterface {
	public function getFBTitle();
	public function getFBDescription();
	public function getFBImage();
}