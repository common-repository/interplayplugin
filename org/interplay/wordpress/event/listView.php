<?php

/**
 * 
 * @package       org.interplay.wordpress.event
 * @title         listView.php
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
class org_interplay_wordpress_event_listView
extends com_ajmichels_wppf_abstract_view
implements com_ajmichels_wppf_interface_iView
{
	
	
	public function __construct ()
	{
		$this->setTemplate( dirname( __FILE__ ) . '\template\list.php' );
	}
	
	
	public function render ( $data = array() )
	{
		if ( array_key_exists( 'events', $data ) ) {
			$this->generateEventsContent( $data['events'] );
		}
		return parent::render( $data );
	}
	
	
	private function generateEventsContent ( &$events )
	{
		foreach ( $events as &$event ) {
			$view = $this->getEventView();
			$view->setTemplate( 'summary' );
			$event->htmlContent = $view->render( array( 'event'=>$event ) );
		}
		
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getEventView ()
	{
		return $this->eventView;
	}
	
	
	public function setEventView ( com_ajmichels_wppf_interface_iView $view )
	{
		$this->eventView = $view;
	}
	
	
}