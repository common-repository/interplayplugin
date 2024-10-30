<?php

/**
 * 
 * @package       org.interplay.wordpress.event
 * @title         dao.php
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
class org_interplay_wordpress_event_dao
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
	
	
	/* CURD (create, update read, delete) ******************************************************* */
	
	public function read ( $id = null )
	{
		$events		= array ();
		$leaderDAO	= $this->getLeaderDAO();
		$venueDAO	= $this->getVenueDAO();
		$data		= $this->getData('events', $id);
		
		if ( ( is_array( $data ) && count( $data ) > 0 ) && $id == null || $id != 0 ) {
			
			foreach ($data as $eventData) {
				
				/* Load Leaders */
				$leaderDAO->setData( $eventData['leaders'] );
				$eventData['leaders'] = $leaderDAO->findAll();
				
				/* Load Venue */
				$venueDAO->setData( array( $eventData['venue'] ) );
				$venues = $venueDAO->findAll($VenueData);
				$eventData['venue'] = $venues[0];
				
				$event = $this->getEntityPrototype();
				$event->setMemento( $eventData );
				
				array_push($events, $event);
			}
			
		}
		
		return $events;
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
	
	
	public function setLeaderDAO ( $dao )
	{
		$this->LeaderDAO = $dao;
	}
	
	
	public function getVenueDAO ()
	{
		return $this->VenueDAO;
	}
	
	
	public function setVenueDAO ( $dao )
	{
		$this->VenueDAO = $dao;
	}
	
	
}