<?php

/**
 * 
 * @package       org.interplay.wordpress.performingGroup
 * @title         entity.php
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
class org_interplay_wordpress_performingGroup_entity
extends org_interplay_wordpress_abstract_entity
implements com_ajmichels_wppf_interface_iEntity
{
	
	
	/* PROPERTIES ******************************************************************************* */
	
	private $id          = 0;
	private $title       = '';
	private $description = '';
	private $email       = '';
	private $phone       = '';
	private $website     = '';
	private $address;    // address object
	private $venue;      // venue object
	private $leaders;    // array of leader objects
	
	
	/**
	 * This method is used to set object state without having other objects interact directly with 
	 * it's properties.  See Memento design pattern.
	 */
	public function setMemento ( $data )
	{
		$this->id          = $data['id'];
		$this->title       = $data['title'];
		$this->description = $data['description'];
		$this->email       = $data['email'];
		$this->phone       = $data['phone'];
		$this->website     = $data['website'];
		$this->address     = $data['address'];
		$this->venue       = $data['venue'];
		$this->leaders     = $data['leaders'];
	}
	
	
	/* ACCESSORS ***********************************************************************************
	   Getters and Setters for object(bean) properties.  Note: There are currently no setter 
	   methods as the plugin is not set up to support writing data to the interplay database. */
	public function getID ()
	{
		return $this->id;
	}
	
	
	public function getTitle ()
	{
		return $this->title;
	}
	
	
	public function getDescription ()
	{
		return $this->description;
	}
	
	
	public function getEmail ( $format = null )
	{
		if ( $format == 'scramble' ) {
			return buildStrambledEmail( $this->email );
		}
		else {
			return $this->email;
		}
	}
	
	
	public function getPhone ()
	{
		return $this->phone;
	}
	
	
	public function getWebsite ( $type = 'full' )
	{
		return $this->_formatURL( $this->website, $type );
	}
	
	
	public function getAddress ()
	{
		return $this->address;
	}
	
	
	public function getVenue ()
	{
		return $this->venue;
	}
	
	
	public function getLeaders ()
	{
		return $this->leaders;
	}
	
	
}