<?php



/**

 * 

 * @package       org.interplay.wordpress.auth

 * @title         service.php

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

class org_interplay_wordpress_auth_service

extends com_ajmichels_wppf_abstract_service

implements com_ajmichels_wppf_interface_iService

{

	

	

	/* SINGLETON ENFORCEMENT ******************************************************************** */

	

	private static $instance;

	

	

	public static function getInstance ()

	{

		if ( !isset( self::$instance ) ) {

			self::$instance = new self();

		}

		return self::$instance;

	}

	

	

	/* CONSTRUCTOR ****************************************************************************** */

	

	private function __construct ()

	{

	}

	

	

	/* PUBLIC METHODS *************************************************************************** */

	

	public function getSubscriptionKey ()

	{

		return $this->getOptionManager()->getOptionValueFromWP( 'subscription_key' );

	}

	

	

	public function getDataType ()

	{

		return $this->getOptionManager()->getOptionValueFromWP( 'data_type' );

	}

	

	

	/* ACCESSORS ******************************************************************************** */

	

	public function getOptionManager ()

	{

		return $this->optionManager;

	}

	

	

	public function setOptionManager ( com_ajmichels_wppf_option_manager $om )

	{

		$this->optionManager = $om;

	}
	
	
	public function filterSubKey()
	{
		if(strlen($this->getSubscriptionKey())<10)
		return false;
		else
		return true;
		
	}

	

	

}