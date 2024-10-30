<?php

/**
 * 
 * @package       org.interplay.wordpress.leader.template
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

<div class="leader" id="interplay-leader_<?php echo $leader->getID(); ?>">
	<div class="name">
	<?php if ( $leader->isMentor() == 'true' ) { ?>
		<strong>*</strong>
	<?php } ?>
	<?php if ( $leader->htmlBiography ) { ?>
		<a href="javascript:;" onClick="jQuery('#interplay-leaderBio_<?php echo $leader->getID(); ?>').dialog('open')">
	<?php } ?>
	<?php echo $leader->getName(); ?>
	<?php echo $leader->getTypeList(); ?>
	<?php if ( $leader->htmlBiography ) { ?>
		</a>
	<?php } ?>
	</div>
	<div class="phone"><?php echo $leader->getPhone(); ?></div>
	<?php if ( $leader->getEmail() != '' ) { ?>
	<div class="email"><?php echo $leader->getEmail('scrambled'); ?></div>
	<?php } ?>
	<div class="website">
		<a href="<?php echo $leader->getWebsite(); ?>" target="_blank"><?php echo $leader->getWebsite('short'); ?></a>
	</div>
	<?php echo ( $leader->htmlBiography ) ? $leader->htmlBiography : ''; ?>
	<div class="clear"></div>
</div>
