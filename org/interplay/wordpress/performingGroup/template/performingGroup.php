<?php

/**
 * 
 * @package       org.interplay.wordpress.performingGroup.template
 * @title         performingGroup.php
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

<div class="performing-group" id="interplay-performing-group_<?php echo $performingGroup->getID(); ?>">
	
	<div class="title"><?php echo $performingGroup->getTitle(); ?></div>
	
	<?php if ( $performingGroup->getEmail() != '') { ?>
	<div class="email"><?php echo $performingGroup->getEmail( 'scrambled' ) ?></div>
	<?php } ?>
	
	<div class="phone"><?php echo $performingGroup->getPhone(); ?></div>
	
	<div class="website">
		<a href="<?php echo $performingGroup->getWebsite(); ?>" target="_blank">
			<?php echo $performingGroup->getWebsite( 'short' ); ?>
		</a>
	</div>
	
	<div class="description"><?php echo $performingGroup->getDescription(); ?></div>
	
</div>