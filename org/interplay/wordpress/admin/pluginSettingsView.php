<?php

/**
 * 
 * @package       org.interplay.wordpress.admin
 * @title         pluginSettingsView.php
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

class org_interplay_wordpress_admin_pluginSettingsView
extends com_ajmichels_wppf_abstract_view
implements com_ajmichels_wppf_interface_iView
{
	
	
	/* CONSTRUCTOR METHOD *********************************************************************** */
	
	public function __construct ()
	{
		$this->setTemplate( dirname( __FILE__ ) . '\template\pluginSettings.php' );
	}
	
	
	/* PUBLIC METHODS *************************************************************************** */
	
	public function render ( $data = array() )
	{
		$data['clearCacheLink'] = $_SERVER['SCRIPT_NAME'];
		if ( count( $_SERVER['QUERY_STRING'] ) > 0 ) {
			$data['clearCacheLink'] .= '?' . $_SERVER['QUERY_STRING'];
		}
		if ( !array_key_exists( 'clearCache', $_REQUEST ) ) {
			$data['clearCacheLink'] .= '&clearCache';
		}
		return parent::render( $data );
	}
	
	
	
}