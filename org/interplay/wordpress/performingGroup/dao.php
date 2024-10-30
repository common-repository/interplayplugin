<?php

/**
 * 
 * @package       org.interplay.wordpress.performingGroup
 * @title         dao.php
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
class org_interplay_wordpress_performingGroup_dao
extends com_ajmichels_wppf_abstract_dao
implements com_ajmichels_wppf_interface_iDao
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
	
	public function findAll ()
	{
		return $this->read();
	}
	
	
	public function findById ( $id = 0 )
	{
		$objects = $this->read( $id );
		return $objects[0];
	}
	
	
	/* CRUD (create, read, update, delete) ****************************************************** */
	
	public function read ( $id = null )
	{
		$addressDAO       = $this->getAddressDAO();
		$leaderDAO        = $this->getLeaderDAO();
		$venueDAO         = $this->getVenueDAO();
		$performingGroups = array ();
		$data             = $this->getData('performinggroups', $id);
		
		if ( ( is_array( $data ) && count( $data ) > 0) && ($id == null || $id != 0 ) ) {
			
			foreach ( $data as $performingGroupData ) {
				
				/* Load Address */
				$addressDAO->setData( array( $performingGroupData['address'] ) );
				$addresses = $addressDAO->findAll();
				$performingGroupData['address'] = $addresses[0];
				
				/* Load Venue */
				$venueDAO->setData( array( $performingGroupData['venue'] ) );
				$venues = $venueDAO->findAll();
				$performingGroupData['venue'] = $venues[0];
				
				/* Load Leaders */
				$leaderDAO->setData( $performingGroupData['leaders'] );
				$performingGroupData['leaders'] = $leaderDAO->findAll();
				
				$performingGroup = $this->getEntityPrototype();
				$performingGroup->setMemento( $performingGroupData );
				
				/* Push Object to Array */
				array_push($performingGroups, $performingGroup);
			}
		}
		
		return $performingGroups;
		
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function setData ( $data )
	{
		$this->data = $data;
	}
	
	
	public function getData ()
	{
		return $this->data;
	}
	
	
	public function getLeaderDAO ()
	{
		return $this->LeaderDAO;
	}
	
	
	public function setLeaderDAO ( com_ajmichels_wppf_interface_iDao $dao )
	{
		$this->LeaderDAO = $dao;
	}
	
	
	public function getAddressDAO ()
	{
		return $this->AddressDAO;
	}
	
	
	public function setAddressDAO ( com_ajmichels_wppf_interface_iDao $dao )
	{
		$this->AddressDAO = $dao;
	}
	
	
	public function getVenueDAO ()
	{
		return $this->VenueDAO;
	}
	
	
	public function setVenueDAO ( com_ajmichels_wppf_interface_iDao $dao )
	{
		$this->VenueDAO = $dao;
	}
	
	
}