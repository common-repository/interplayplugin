<?php

/**
 * 
 * @package       org.interplay.wordpress.event.template
 * @title         calendar.php
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

$jsInstanceName = 'ipCal_' . $instance_id;
$calDivID       = 'InterplayCalendar_' . $jsInstanceName ;
$detDivID       = 'InterplayCalendarDetails_' . $jsInstanceName ;

?>

<script type="text/javascript">
	var <?php echo $jsInstanceName; ?> = new InterplayCalendar('<?php echo $jsInstanceName; ?>', '<?php echo $calDivID; ?>', '<?php echo $detDivID; ?>', '2010-03-25');
	window.addEventListener('load', function(){<?php echo $jsInstanceName; ?>.init()}, false);
</script>

<div class="InterplayWidget-Calendar">
	<div id="<?php echo $calDivID; ?>" class="calendar"></div>
	<div id="<?php echo $detDivID; ?>" class="event-details"></div>
</div>