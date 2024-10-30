<?php

/**
 * 
 * @package       org.interplay.wordpress.leader.type
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

class org_interplay_wordpress_leader_type_dao
extends com_ajmichels_wppf_abstract_dao
implements com_ajmichels_wppf_interface_iDao
{
	
	
	/* SINGLETON ENFORCENEMT ******************************************************************** */
	
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
	
	private function read ( $id = null )
	{
		$leaderTypes = array ();
		$data        = $this->getData('types', $id);
		
		if ( ( is_array( $data ) && count( $data ) > 0) && ( $id == null || $id != 0 ) ) {
			
			foreach ( $data as $leaderTypeData ) {
				$leaderType = $this->getEntityPrototype();
				$leaderType->setMemento( $leaderTypeData );
				array_push( $leaderTypes, $leaderType );
			}
		}
		else {
			array_push( $leaderTypes, $this->getEntityPrototype() );
		}
		
		return $leaderTypes;
		
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function setData ( $data )
	{
		$this->data = $data;
	}
	
	
	public function getData ( $type = '', $id = null )
	{
		return $this->data;
	}
	
	
}