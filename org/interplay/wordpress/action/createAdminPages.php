<?php


/**
 * 
 * @package       org.interplay.wordpress.action
 * @title         createAdminPages.php
 * @contributors  AJ Michels (www.ajmichels.com)
 * @version       1.0
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
class org_interplay_wordpress_action_createAdminPages
extends com_ajmichels_wppf_action_action
{
	
	
	public function execute ()
	{
		add_menu_page(
		             'Interplay Settings',
		             'Interplay Settings',
		             'administrator',
		             'interplay_plugin_settings',
		             array( &$this, 'buildSettingsPage' )
		             );
	}
	
	
	public function buildSettingsPage ()
	{
		$om = $this->getOptionManager();
		
		$data = array(
		             'formHeader'      => $om->getSettingsFormHeader(),
		             'subscriptionKey' => $om->getOptionValueFromWP( 'subscription_key' ),
		             'dataType'        => $om->getOptionValueFromWP( 'data_type' ),
		             'singleEventPage' => $om->getOptionValueFromWP( 'single-event-page' )
		             );
		$this->getPluginSettingsView()->out( $data );
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getPluginSettingsView ()
	{
		
		return clone $this->pluginSettingsView;
	}
	
	
	public function setPluginSettingsView ( com_ajmichels_wppf_interface_iView $view)
	{
		
		$this->pluginSettingsView = $view;
	}
	
	public function getOptionManager ()
	{
		
		return $this->optionManager;
	}
	
	
	public function setOptionManager ( com_ajmichels_wppf_option_manager $om)
	{
		
		$this->optionManager = $om;
	}
	
	
}