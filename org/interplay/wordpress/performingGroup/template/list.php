<?php

/**
 * 
 * @package       org.interplay.wordpress.performingGroup.template
 * @title         list.php
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

?>

<?php if ( is_array( $performingGroups ) && count( $performingGroups ) > 0 ) { ?>
	
	<div class="interplay-plugin performing-groups treelist">
		<?php echo $performingGroupsContent; ?>
	</div>
	
<?php } else { ?>
	
	<div class="interplay-plugin message">There are currently no performers.</div>
	
<?php } ?>