<?php

/**
 * 
 * @package       org.interplay.wordpress.leader
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
class org_interplay_wordpress_leader_listView
extends com_ajmichels_wppf_abstract_view
implements com_ajmichels_wppf_interface_iView
{
	
	
	/* CONSTRUCTOR ****************************************************************************** */
	
	public function __construct ()
	{
		$this->setTemplate( dirname( __FILE__ ) . '\template\list.php' );
	}
	
	
	/* PUBLIC METHODS *************************************************************************** */
	
	public function render ( $data = array() )
	{
		if ( array_key_exists( 'leaders', $data ) ) {
			$data['leadersContent'] = $this->generateLeaderContent( $data['leaders'] );
		}
		return parent::render( $data );
	}
	
	
	/* PRIVATE METHODS ************************************************************************** */
	
	private function generateLeaderContent ( $leaders )
	{
		$out           = '';
		$new_state     = true;
		$current_state = '';
		$new_city      = true;
		$current_city  = '';
		
		foreach ( $leaders as $leader ) {
			$address = $leader->getAddress();
			
			if ( $new_state || $current_state != $address->getState() ) {
				$new_state     = false;
				$current_state = $address->getState();
				$out          .= '<h3>' . $current_state . '</h3>';
			}
			if ( $new_city || $current_city != $address->getCity() ) {
				$new_city     = false;
				$current_city = $address->getCity();
				$out         .= '<h4>' . $current_city . '</h4>';
			}
			
			$out .= $this->getLeaderView()->render( array( 'leader'=>$leader ) );
			
		}
		
		return $out;
	}
	
	
	/* ACCESSORS ******************************************************************************** */
	
	public function getLeaderView ()
	{
		return clone $this->leaderView;
	}
	
	
	public function setLeaderView ( com_ajmichels_wppf_interface_iView $view )
	{
		$this->leaderView = $view;
	}
	
	
}