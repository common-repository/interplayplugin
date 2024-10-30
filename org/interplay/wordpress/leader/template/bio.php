<?php

/**
 * 
 * @package       org.interplay.wordpress.leader.template
 * @title         bio.php
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
 
 $address = $leader->getAddress();
 $types = $leader->getTypes();
 $numTypes = count($types);
 
?>

<div id="interplay-leaderBio_<?php echo $leader->getID(); ?>" class="leaderBio">
	<?php if ( trim( $leader->getImage() ) != '' ) { ?>
	<img class="bioPhoto" src="//interplay.org/images/leaders/<?php echo $leader->getImage(); ?>" border="1" class="right">
	<?php } ?>
	<div class="location"><?php echo $address->getLocation('short'); ?></div>
	<div class="name"><?php echo $leader->getName(); ?></div>
	<p><?php echo $leader->getBiography(); ?></p>
	<p></p>
	<div><?php echo $address->getLocation('full'); ?></div>
	<div><?php echo $address->getCountry(); ?></div>
	<p></p>
	<p></p>
	<div><a href="http://interplay.org/index.cfm/go/contact:form/leader_id/<?php echo $leader->getID(); ?>/">Email <?php echo $leader->getName(); ?></a></div>
	<div><?php echo $leader->getPhone(); ?></div>
	<div><a href="<?php echo $leader->getWebsite(); ?>" target="_blank"><?php echo $leader->getWebsite('short'); ?></a></div>
	<p></p>
</div>