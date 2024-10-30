<?php

/**
 * 
 * @package       org.interplay.wordpress.event
 * @title         countdownWidget.php
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
class org_interplay_wordpress_event_countdownWidget
extends org_interplay_wordpress_abstract_widget
{
	
	
	/* CONSTRUCTOR ****************************************************************************** */
	
	function __construct ()
	{
		parent::__construct( false, 'Interplay Countdown' );
		$this->ViewManager = new InterplayPlugin_ViewManager();
	}
	
	
	/* PUBLIC METHOD **************************************************************************** */
	
	public function widget( $args, $instance )
	{
	}
	
	
	public function form ( $instance )
	{
	}
	
	
	public function update ( $new_instance, $old_instance )
	{
	}
	
	
}