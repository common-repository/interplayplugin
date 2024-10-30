<?php

/**
 * 
 * @package         org.interplay.wordpress.performingGroup
 * @title           entity.php
 * @contributors    AJ Michels (www.ajmichels.com)
 * @version         1.5.0
 * @copyright       Copyright (C) 2012 Body Wisdom, Inc
 *                  
 *                  This program is free software; you can redistribute it and/or
 *                  modify it under the terms of the GNU General Public License
 *                  as published by the Free Software Foundation; either version 2
 *                  of the License, or (at your option) any later version.
 *                  
 *                  This program is distributed in the hope that it will be useful,
 *                  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *                  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *                  GNU General Public License for more details.
 *                  
 *                  You should have received a copy of the GNU General Public License
 *                  along with this program; if not, write to the Free Software
 *                  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 */
class org_interplay_wordpress_abstract_entity
extends com_ajmichels_wppf_abstract_entity
{
	
	
	/**
	 * This function takes an email address string and scrambles it into different parts with HTML.
	 * CSS is then used to make the email address appear in the correct order.  This is done to make 
	 * email addresses are not easily scrapped from the website.
	 * 
	 * @param   string  $email  A standard email address.
	 * 
	 * @return  string
	 * 
	 */
	protected function buildStrambledEmail ( $email )
	{
		
		$emailParts		 = explode( '@', $email );
		
		$scrambledEmail	 = '<span class="scrambledEmail">';
		$scrambledEmail	.= '<span class="emailDomain">' . $emailParts[1] . '</span>';
		$scrambledEmail	.= '<span class="emailAt">@</span>';
		$scrambledEmail	.= '<span class="emailName">' . $emailParts[0] . '</span>';
		$scrambledEmail	.= '</span>';
		
		return $scrambledEmail;
		
	}
	
	
}