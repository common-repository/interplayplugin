<?php

/**
 * 
 * @package       org.interplay.wordpress.address
 * @title         entity.php
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
 */

class org_interplay_wordpress_address_entity
extends org_interplay_wordpress_abstract_entity
implements com_ajmichels_wppf_interface_iEntity
{
	
	
	/* PROPERTIES ******************************************************************************* */
	
	private $street     = '';
	private $city       = '';
	private $state      = '';
	private $country    = '';
	private $postalCode = '';
	
	
	/* MEMENTO METHOD ******************************************************************************
	   This method is used to set object state without having other objects interact directly with 
	   it's properties.  See Memento design pattern. */
	public function setMemento ( $data )
	{
		
		$this->street     = $data['street'];
		$this->city       = $data['city'];
		$this->state      = $data['state'];
		$this->country    = $data['country'];
		$this->postalCode = $data['postalCode'];
	}
	
	
	/* ACCESSORS ***********************************************************************************
	   Getters and Setters for object(bean) properties.  Note: There are currently no setter 
	   methods as the plugin is not set up to support writing data to the interplay database. */
	
	public function getStreet ()
	{
		
		return $this->street;
	}
	
	
	public function getCity ()
	{
		
		return trim($this->city);
	}
	
	
	public function getState ()
	{
		
		return trim($this->state);
	}
	
	
	public function getCountry ()
	{
		
		return trim($this->country);
	}
	
	
	public function getPostalCode ()
	{
		
		return trim($this->postalCode);
	}
	
	
	/* CUSTOM METHODS *************************************************************************** */
	
	public function getLocation ( $type = 'full' )
	{
		
		$locationString = $this->getCity();
		
		if ( $this->getCity() != '' && $this->getState() != '' ) {
			$locationString .= ', ';
		}
		
		$locationString .= $this->getState();
		
		if ( $type != 'short' ) {
			if ($this->getCity() != '' || $this->getState() != '') {
				$locationString .= ' ';
			}
			$locationString .= $this->getPostalCode();
		}
		
		return $locationString;
		
	}
	
	
}