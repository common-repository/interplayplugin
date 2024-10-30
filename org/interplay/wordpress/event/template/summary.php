<?php

/**
 * 
 * @package       org.interplay.wordpress.event.template
 * @title         list.php
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

?>

<div class="event" id="interplay-event_<?php echo $event->getID(); ?>">
	<div class="title">
		<a href="<?php echo $event->getUrl( $permalink ); ?>"><?php echo $event->getTitle(); ?></a>
	</div>
	<?php if ( count( $event->getLeaders() ) > 0 ) { ?>
	<div class="leader-list">with <?php echo $event->getLeadersList(); ?></div>
	<?php } ?>
	<div class="locationdate"><?php echo $event->getTimeDescription(); ?></div>
</div>
