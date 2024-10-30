<?php

/**
 * 
 * @package       org.interplay.wordpress.leader
 * @title         entity.php
 * @contributors  AJ Michels (www.ajmichels.com)
 * @version       1.5.0
 * @copyright     Copyright (C) 2012 Body Wisdom, Inc
 *                 
 *                 This program is free software; you can redistribute it and/or
 *                 modify it under the terms of the GNU General Public License
 *                 as published by the Free Software Foundation; either version 2
 *                 of the License, or (at your option) any later version.
 *                 
 *                 This program is distributed in the hope that it will be useful,
 *                 but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *                 GNU General Public License for more details.
 *                 
 *                 You should have received a copy of the GNU General Public License
 *                 along with this program; if not, write to the Free Software
 *                 Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 */
class org_interplay_wordpress_leader_entity
extends org_interplay_wordpress_abstract_entity
implements com_ajmichels_wppf_interface_iEntity
{
	
	
	/* PROPERTIES ******************************************************************************* */
	
	private $id                = 0;
	private $isMentor          = false;
	private $isRegionalContact = false;
	private $name              = '';
	private $email             = '';
	private $phone             = '';
	private $website           = '';
	private $profile_url       = '';
	private $biography         = '';
	private $iamge             = '';
	private $address;          // address object
	private $types;            // array of type objects
	
	
	/** MEMENTO METHOD *****************************************************************************
	 * This method is used to set object state without having other objects interact directly with 
	 * it's properties.  See Memento design pattern.
	 */
	public function setMemento ( $data )
	{
		
		$this->id                = $data['id'];
		$this->isMentor          = $data['isMentor'];
		$this->isRegionalContact = $data['isRegionalContact'];
		$this->name              = $data['name'];
		$this->email             = $data['email'];
		$this->phone             = $data['phone'];
		$this->website           = $data['website'];
		$this->profile_url       = $data['profile_url'];
		$this->biography         = $data['bio'];
		$this->image             = $data['image'];
		$this->address           = $data['address'];
		$this->types             = $data['types'];
	}
	
	
	/* ACCESSORS ***********************************************************************************
	   Getters and Setters for object(bean) properties.  Note: There are currently no setter 
	   methods as the plugin is not set up to support writing data to the interplay database. */
	
	public function getID ()
	{
		return $this->id;
	}
	
	
	public function isMentor ()
	{
		return $this->isMentor;
	}
	
	
	public function isRegionalContact ()
	{
		return $this->isRegionalContact;
	}
	
	
	public function getName ()
	{
		return $this->name;
	}
	
	
	public function getEmail ( $format = '' )
	{
		if ( $format == 'scramble' ) {
			return $this->buildStrambledEmail( $this->email );
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
		return $this->_formatURL($this->website, $type);
	}
	
	
	public function getProfileURL ()
	{
		return $this->_formatURL($this->profile_url);
	}
	
	
	public function getBiography ()
	{
		return $this->biography;
	}
	
	
	public function getImage ()
	{
		return $this->image;
	}
	
	
	public function getAddress ()
	{
		return $this->address[0];
	}
	
	
	public function getTypes ()
	{
		return $this->types;
	}
	
	
	/* CUSTOM METHODS *************************************************************************** */
	
	public function getTypeList ()
	{
		$types = $this->getTypes();
		$type_count = count($types);
		$type_string = '';
		if (count($types)>0) {
			$type_string = '(';
			foreach ($types as $type_key => $type) {
				$type_string .= $type->getAbbreviation();
				if ($type->getAbbreviation() != '' && $type_key + 1 < $type_count) {
					$type_string .= '/';
				}
			}
			$type_string .= ')';
		}
		if ($type_string == '()') {
			$type_string = '';
		}
		return $type_string;
	}
	
	
}