<?php

/**
 * 
 * @package       org.interplay.wordpress.shortcode
 * @title         singleEvent.php
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
class org_interplay_wordpress_shortcode_singleEvent
extends com_ajmichels_wppf_shortcode_shortcode
{
	
	
	public $tag = 'InterplaySingleEvent';
	
	
	public function execute ( $attr, $content = null )
	{
		$event_id      = ( isset( $_GET['event'] ) ) ? $_GET['event'] : 0 ;
		$data['event'] = $this->getEventService()->getEvent( $event_id );
		return $this->getSingleEventView()->render( $data );
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	
	public function getEventService ()
	{
		return $this->eventService;
	}
	
	
	public function setEventService ( org_interplay_wordpress_event_service $service )
	{
		$this->eventService = $service;
	}
	
	
	public function getSingleEventView ()
	{
		return clone $this->singleEventView;
	}
	
	
	public function setSingleEventView ( com_ajmichels_wppf_interface_iView $view )
	{
		$this->singleEventView = $view;
	}
	
	
}