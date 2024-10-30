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

<p>The Leaders Circle is open to those who have completed the 
<a href="http://interplay.org/index.cfm/go/leadertraining:home/" target="_blank">InterPlay Leader 
Training Program</a> or who are in the process of completing that Program. They are committed to 
sharing the ideas and practices of InterPlay in a variety of settings and forms.</p>

<?php if ( $types && is_array( $types ) ) { ?>
<ul>
	<?php foreach( $types as $type ) { ?>
	<li>
		<strong><?php echo $type->getName(); ?> (<?php echo $type->getAbbreviation(); ?>)</strong>
		<?php echo $type->getDescription(); ?>
	</li>
	<?php } ?>
</ul>
<?php } ?>

<?php if ( is_array( $leaders ) && count( $leaders ) > 0 ) { ?>
<div class="interplay-plugin leaders treelist">
	<?php echo $leadersContent; ?>
</div>
<?php } else { ?>
<div class="interplay-plugin message">There are currently no leaders.</div>
<?php } ?>

<script type="text/javascript">
	jQuery('.leaderBio').dialog({
		autoOpen:false,
		modal:true,
		width:600,
		height:400
	});
</script>