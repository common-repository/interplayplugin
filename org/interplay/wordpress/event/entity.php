<?php

/**
 * 
 * @package       org.interplay.wordpress.event
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
 * 
 */
class org_interplay_wordpress_event_entity
extends org_interplay_wordpress_abstract_entity
implements com_ajmichels_wppf_interface_iEntity
{
	
	
	/* PROPERTIES ******************************************************************************* */
	
	private $id              = 0;
	private $isCombination   = false;
	private $isOngoing       = false;
	private $title           = '';
	private $subtitle        = '';
	private $hooktitle       = '';
	private $description     = '';
	private $timedescription = '';
	private $cost            = '0.0';
	private $contact         = '';
	private $duration        = '';
	private $startdate       = '';
	private $enddate         = '';
	private $type            = '';
	private $venue;         // venue object
	private $leaders;       // array of leader objects
	
	
	/* MEMENTO METHOD ******************************************************************************
	   This method is used to set object state without having other objects interact directly with 
	   it's properties.  See Memento design pattern. */
	public function setMemento ( $data )
	{
		
		$this->id              = $data['id'];
		$this->isCombination   = $data['isCombination'];
		$this->isOngoing       = $data['isOngoing'];
		$this->title           = $data['title'];
		$this->subtitle        = $data['subtitle'];
		$this->hooktitle       = $data['hooktitle'];
		$this->description     = $data['description'];
		$this->timedescription = $data['timedescription'];
		$this->cost            = $data['cost'];
		$this->contact         = $data['contact'];
		$this->duration        = $data['duration'];
		$this->startdate       = $data['startdate'];
		$this->enddate         = $data['enddate'];
		$this->type            = $data['type'];
		$this->venue           = $data['venue'];
		$this->leaders         = $data['leaders'];
	}
	
	
	/*	ACCESSORS *********************************************************************************
		Getters and Setters for object(bean) properties.  Note: There are currently no setter 
		methods as the plugin is not set up to support writing data to the interplay database. */
	
	public function getID ()
	{
		return $this->id;
	}
	
	
	public function isCombination ()
	{
		return $this->isCombination;
	}
	
	
	public function isOngoing ()
	{
		return $this->isOngoing;
	}
	
	
	public function getTitle ()
	{
		return $this->title;
	}
	
	
	public function getSubTitle ()
	{
		return $this->subtitle;
	}
	
	
	public function getHookTitle ()
	{
		return $this->hooktitle;
	}
	
	
	public function getDescription ()
	{
		return $this->description;
	}
	
	
	public function getTimeDescription ()
	{
		return $this->timedescription;
	}
	
	
	public function getCost ()
	{
		return $this->cost;
	}
	
	
	public function getContact ()
	{
		return $this->contact;
	}
	
	
	public function getDuration ()
	{
		return $this->duration;
	}
	
	
	public function getStartDate ()
	{
		return $this->startdate;
	}
	
	
	public function getEndDate ()
	{
		return $this->enddate;
	}
	
	
	public function getType ()
	{
		return $this->type;
	}
	
	
	public function getVenue ()
	{
		return $this->venue;
	}
	
	
	public function getLeaders ()
	{
		return $this->leaders;
	}
	
	
	public function getOptionManager ()
	{
		return $this->optionManager;
	}
	
	
	public function setOptionManager ( com_ajmichels_wppf_option_manager $op )
	{
		$this->optionManager = $op;
	}
	
	
	/* CUSTOM METHODS *************************************************************************** */
	
	public function getLeadersList ()
	{
		$leaders      = $this->getLeaders();
		$leader_count = count($leaders);
		$leader_list  = '';
		
		foreach ($leaders as $key => $leader) {
			if ($leader->getName() != '') {
				$leader_list .= '<span class="event-leader">' . $leader->getName() . '</span>';
				if ($leader_count > 2 && $leader_count - 1 != $key) {
					$leader_list .= ', ';
				}
				if ($leader_count > 0 && $leader_count - 2 == $key) {
					$leader_list .= ' and ';
				}
			}
		}
		return $leader_list;
	}
	
	
	public function getUrl ( $permalink )
	{
		$op = $this->getOptionManager();
		$event_url = $op->getOptionValueFromWP('single-event-page');
		if (substr_count($event_url, '?') > 0) {
			$event_url .= '&';
		} else {
			$event_url .= '?';
		}
		$event_url .= 'event=' . $this->getID();
		return $event_url;
	}
	
	
}