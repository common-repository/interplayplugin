<?php

/**
 * 
 * @package       org.interplay.wordpress.shortcode
 * @title         performingGroupList.php
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

class org_interplay_wordpress_shortcode_performingGroupList
extends com_ajmichels_wppf_shortcode_shortcode
{
	
	
	public $tag = 'InterplayPerformances';
	
	
	public function execute ( $attr, $content = null )
	{
		$data['performingGroups'] = $this->getPerformingGroupService()->getPerformingGroups();
		return $this->getPerformingGroupListView()->render( $data );
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	
	public function getPerformingGroupService ()
	{
		return $this->performingGroupService;
	}
	
	
	public function setPerformingGroupService ( $service )
	{
		$this->performingGroupService = $service;
	}
	
	
	public function getPerformingGroupListView ()
	{
		return clone $this->performingGroupListView;
	}
	
	
	public function setPerformingGroupListView ( $view )
	{
		$this->performingGroupListView = $view;
	}
	
	
}