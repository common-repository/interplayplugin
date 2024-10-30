<?php

/**
 * 
 * @package       org.interplay.wordpress.event.template
 * @title         event.php
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

	$venue   = $event->getVenue();
	$address = $venue->getAddress();
	$leaders = $event->getLeaders();
	
	echo '<div class="interplay-plugin event" id="interplay-event_' . $event->getID() .'">';
		echo '<h2 class="title">' . $event->getTitle() . '</h2>';
		echo '<div class="subtitle">' . $event->getSubTitle() . '</div>';
		echo '<div class="leaders-list">' . $event->getLeadersList() . '</div>';
		echo '<div class="location">' . $address->getLocation('short') . '</div>';
		echo '<div class="hooktitle">' . $event->getHookTitle() . '</div>';
		echo '<div class="time">' . $event->getTimeDescription() . '</div>';
		echo '<div class="description">' . $event->getDescription() . '</div>';
		echo '<div class="cost"><span class="label">Cost:</span> ' . $event->getCost() . '</div>';
		echo '<div class="contact"><span class="label">To Register:</span> ' . $event->getContact() . '</div>';
		echo '<div class="venue" id="interplay-venue_' . $venue->getID() .'"><div class="label">Venue</div>';
			echo '<div class="name">' . $venue->getName() . '</div>';
			echo '<div class="address">' . $address->getStreet() . '</div>';
			echo '<div class="location">' . $address->getLocation() . '</div>';
			echo '<div class="website"><a href="' . $venue->getWebsite() . '" target="_blank">' . $venue->getWebsite('short') . '</a></div>';
			echo '<div class="description">' . $venue->getDescription() . '</div>';
		echo '</div>';
		if (count($leaders) > 0) {
			echo '<div class="leaders">';
			echo '<div class="label">Leaders</div>';
			foreach ($leaders as $key => $leader) {
				echo '<div class="leader">';
				echo '<div class="name">';
				if ($leader->isMentor() == 'true') {
					echo '<strong>*</strong> ';
				}
				echo $leader->getName() . '</div>';
				echo '<div class="phone">' . $leader->getPhone() . '</div>';
				if ($leader->getEmail() != '') {
					echo '<div class="email">' . $leader->getEmail('scramble') . '</div>';
				}
				echo '<div class="website"><a href="' . $leader->getWebsite() . '" target="_blank">' . $leader->getWebsite('short') . '</a></div>';
				echo '<div class="bio">' . $leader->getBiography() . '</div>';
				echo '<div class="clear"></div>';
			echo '</div>';
			}
			echo '</div>';
		}
	echo '</div>';