<?php

/**
 * 
 * @package       org.interplay.wordpress.leader.type
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
class org_interplay_wordpress_leader_type_service
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
	
	
	/* CONSTRUCTOR METHOD *********************************************************************** */
	
	private function __construct ()
	{
	}
	
	
	/* PUBLIC METHODS *************************************************************************** */
	
	public function getTypes ()
	{
		$this->setData();
		return $this->getDAO()->findAll();
	}
	
	
	/* PRIVATE METHODS ************************************************************************** */
	
	private function setData ()
	{
		$dao = $this->getDAO();
		$wsu = $this->getWebServiceUrl();
		$ds  = $this->getDataService();
		$as  = $this->getAuthService();
		
		$wsu->setScriptPath( 'LeaderTypeService.cfc' );
		$wsu->setParameter( 'method', 'getLeaderTypesRemotely' );
		$wsu->setParameter( 'returnFormat', 'JSON' );
		$wsu->setParameter( 'webserviceKey', $as->getSubscriptionKey() );
		$wsu->setCacheSetting( 'forever' );
		
		$data = $ds->getData( $wsu );
		
		if ( array_key_exists( 'interplayData', $data ) ) {
			$data = $data['interplayData'];
		}
		
		$dao->setData( $data['types'] );
		
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getDataService ()
	{
		return $this->dataService;
	}
	
	
	public function setDataService ( $service )
	{
		$this->dataService = $service;
	}
	
	
	public function setWebServiceUrl ( $url )
	{
		$this->wsUrl = $url;
	}
	
	
	public function getWebServiceUrl ()
	{
		return $this->wsUrl;
	}
	
	
	public function getAuthService ()
	{
		return $this->AuthService;
	}
	
	
	public function setAuthService ( $src )
	{
		$this->AuthService = $src;
	}
	
	
}