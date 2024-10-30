<?php

/**
 * 
 * @package       org.interplay.wordpress.action
 * @title         enqueueResources.php
 * @contributors  AJ Michels (www.ajmichels.com)
 * @version       1.5.0
 * @copyright     Copyright (C) 2012 Body Wisdom, Inc
 *                
 *                This program is free software; you can redistribute it and/or
 *                modify it under the terms of the GNU General Public License
 *                as published by the Free Software Foundation; either version 2
 *                of the License, or (at your option) any later version.
 *                
 *                This program is distributed in the hope that it will be useful,
 *                but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *                GNU General Public License for more details.
 *                
 *                You should have received a copy of the GNU General Public License
 *                along with this program; if not, write to the Free Software
 *                Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 */
class org_interplay_wordpress_action_enqueueResources
extends com_ajmichels_wppf_action_action
{
	
	
	private $pluginUrl = '';
	
	
	public function execute ()
	{
		
		$url = $this->getPluginUrl();
		
		/* Create array of CSS references then loop through them adding them to the queue. */
		
		$styles = array();
		$styles['jquery-ui-dialog'] = array( $url . 'css/jQuery/jquery-ui-1.8.20.custom.min.css', array(), false, 'all' );
		$styles['interplaycss']     = array( $url . 'css/InterplayPlugin.min.css', array(), '1.0', 'screen' );
		
		if(!empty($styles))
		{
			foreach ( $styles as $styleName => $styleData ) {
			wp_enqueue_style( $styleName, $styleData[0], $styleData[1], $styleData[2], $styleData[3] );
					}
		}
		
		/* Create array of JavaScript references then loop through them adding them to the queue. */
		
		$scripts = array();
		$scripts['interplayjs']     = array( $url . 'js/interplay.min.js', array('jquery-ui-dialog') );
		$scripts['colorpickerjs']   = array( $url . 'js/ColorPicker.min.js', array('jquery') );
		$scripts['calendarjs']      = array( $url . 'js/InterplayCalendar.min.js', array('jquery') );
		$scripts['colorinverterjs'] = array( $url . 'js/ColorInverter.min.js', array() );
		if(!empty($scripts)){
		foreach ( $scripts as $scriptName => $scriptData ) {
			wp_enqueue_script( $scriptName, $scriptData[0], $scriptData[1] );
		}
							}
		
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getPluginUrl ()
	{
		
		return $this->pluginUrl;
	}
	
	
	public function setPluginUrl ( $url )
	{
		
		$this->pluginUrl = $url;
	}
	
	public function getWordPressUrl ()
	{
		
		return $this->wordPressUrl;
	}
	
	
	public function setWordPressUrl ( $url )
	{
		
		$this->wordPressUrl = $url;
	}
	
	
}