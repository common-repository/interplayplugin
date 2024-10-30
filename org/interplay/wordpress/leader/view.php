<?php

/**
 * 
 * @package       org.interplay.wordpress.leader
 * @title         view.php
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
class org_interplay_wordpress_leader_view
extends com_ajmichels_wppf_abstract_view
implements com_ajmichels_wppf_interface_iView
{
	
	
	/* CONSTRUCTOR ****************************************************************************** */
	
	public function __construct ()
	{
		$this->setTemplate( dirname( __FILE__ ) . '\template\leader.php' );
	}
	
	
	/* PUBLIC METHODS *************************************************************************** */
	
	public function render ( $data = array() )
	{
		$this->generateBioContent( $data['leader'] );
		return parent::render( $data );
	}
	
	
	/* PRIVATE METHODS ************************************************************************** */
	
	private function generateBioContent ( org_interplay_wordpress_leader_entity &$leader )
	{
		if ( trim( $leader->getBiography() ) != '' ) {
			$leader->htmlBiography = $this->getLeaderBioView()->render( array( 'leader' => $leader ) );
		}
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getLeaderBioView ()
	{
		return clone $this->leaderBioView;
	}
	
	public function setLeaderBioView ( com_ajmichels_wppf_interface_iView $view )
	{
		$this->leaderBioView = $view;
	}
	
	
}