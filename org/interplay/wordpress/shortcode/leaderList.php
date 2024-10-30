<?php

/**
 * 
 * @package       org.interplay.wordpress.shortcode
 * @title         leaderList.php
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

class org_interplay_wordpress_shortcode_leaderList
extends com_ajmichels_wppf_shortcode_shortcode
{
	
	
	public $tag = 'InterplayLeaders';
	
	
	public function execute ( $attr, $content = null )
	{
		$data['leaders'] = $this->getLeaderService()->getLeaders();
		$data['types']   = $this->getLeaderTypeService()->getTypes();
		return $this->getLeaderListView()->render( $data );
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getLeaderService ()
	{
		return $this->leaderService;
	}
	
	
	public function setLeaderService ( org_interplay_wordpress_leader_service $service )
	{
		$this->leaderService = $service;
	}
	
	public function getLeaderTypeService ()
	{
		return $this->leaderTypeService;
	}
	
	
	public function setLeaderTypeService ( org_interplay_wordpress_leader_type_service $service )
	{
		$this->leaderTypeService = $service;
	}
	
	
	public function getLeaderListView ()
	{
		return clone $this->leaderListView;
	}
	
	
	public function setLeaderListView ( com_ajmichels_wppf_interface_iView $view )
	{
		$this->leaderListView = $view;
	}
	
	
}