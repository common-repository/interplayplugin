<?php

/**
 * 
 * @package       org.interplay.wordpress.leader.type
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
class org_interplay_wordpress_leader_type_entity
extends org_interplay_wordpress_abstract_entity
implements com_ajmichels_wppf_interface_iEntity
{
	
	
	/* PROPERTIES ******************************************************************************* */
	
	private $id           = '';
	private $rank         = '';
	private $name         = '';
	private $abbreviation = '';
	private $class        = '';
	private $description  = '';
	private $active       = '';
	
	
	/**
	 * This method is used to set object state without having other objects interact directly with 
	 * it's properties.  See Memento design pattern.
	 */
	public function setMemento ( $data )
	{
		$this->id           = $data['id'];
		$this->rank         = $data['rank'];
		$this->name         = $data['name'];
		$this->abbreviation = $data['abbreviation'];
		$this->class        = $data['class'];
		$this->description  = $data['description'];
		$this->active       = $data['active'];
	}
	
	
	/* ACCESSORS ***********************************************************************************
	   Getters and Setters for object(bean) properties.  Note: There are currently no setter 
	   methods as the plugin is not set up to support writing data to the interplay database. */
	
	public function getID ()
	{
		return $this->id;
	}
	
	
	public function getRank ()
	{
		return $this->rank;
	}
	
	
	public function getName ()
	{
		return $this->name;
	}
	
	
	public function getAbbreviation ()
	{
		return $this->abbreviation;
	}
	
	
	public function getClass ()
	{
		return $this->class;
	}
	
	
	public function getDescription ()
	{
		return $this->description;
	}
	
	
	public function getActive ()
	{
		return $this->active;
	}
	
	
}