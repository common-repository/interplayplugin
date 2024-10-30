<?php

/**
 * 
 * @package       org.interplay.wordpress.admin.template
 * @title         pluginSettings.php
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

<div class="wrap"> 
	
	<div id="icon-options-general" class="icon32"><br /></div>
	
	<h2>Interplay Plugin Settings</h2>
	
	<form method="post" action="options.php">
		
		<?php echo $formHeader; ?>
		
		<div>
			
			<fieldset>
				<legend><h3>General Settings</h3></legend> 
				
				<table class="form-table"> 
					
					<tr valign="top"> 
						<th scope="row"><label for="subscription_key">Subscription Key</label></th> 
						<td>
							<input name="subscription_key" type="text" id="subscription_key" 
								value="<?php echo $subscriptionKey; ?>" size="56" />
						</td> 
					</tr>
					
					<tr valign="top"> 
						<th scope="row"><label for="single-event-page">Single Event Page</label></th> 
						<td>
							<input name="single-event-page" type="text" id="single-event-page" 
								value="<?php echo $singleEventPage; ?>" size="56" /><br/>
							<p><em>post/page permalink for [InterplaySingleEvent/]</em></p>
						</td> 
					</tr>
					
					<tr valign="top"> 
						<th scope="row"><label for="single-event-page">Data Cache</label></th> 
						<td>
							<a href="<?php echo $clearCacheLink; ?>">Clear Cache</a><br/>
							<p style="width:400px;"><em>The Interplay wordpress plugin uses data 
							caching to improve performance. However, this can sometimes result in 
							your information not being displayed immediately after making changes on 
							the <a href="http://interplay.org" target="_blank">Interplay.org website</a> 
							in the leaders circle. This link will clear the data cache and can be 
							used anytime this issue occurs.</em></p>
						</td> 
					</tr>
					
					<tr valign="top"> 
						<th scope="row"><label for="single-event-page">Data Type</label></th> 
						<td>
							<input id="data_type_region" name="data_type" type="radio" value="region"<?php echo ( $dataType == 'region' ) ? ' checked="checked"' : '' ; ?> />
							<label for="data_type_region">Region</label><br>
							<input id="data_type_leader" name="data_type" type="radio" value="leader"<?php echo ( $dataType == 'leader' ) ? ' checked="checked"' : '' ; ?> />
							<label for="data_type_leader">Leader</label><br>
							<p style="width:400px;"><em>This option determines whether the data 
							displayed via the plugin is associated with a specific Region or a 
							specific Leader. As you can see you can only choose one at a time but 
							you can change it whenever you like. If the information you are seeing 
							is not correct for either option please contact 
							<a href="mailto:info@interplay.org">Body Wisdom staff</a> to have your 
							settings updated.</em></p>
						</td> 
					</tr>
					
				</table>
				
			</fieldset>
			
			<div>
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</div>
			
			<h3>Configuration</h3>
			
			<p>There are currently three different types of data which can be displayed with the 
				plugin.  <em>Events</em> (Happenings), <em>Leaders</em>, and <em>Performing Groups</em>.  
				Displaying this information on your site is done via shortcodes.  These shortcodes 
				are placed on pages or posts and are then replaced by the interplay content when 
				users view the page.  A good approach is to create a page for each of the different 
				types of content and place the appropriate shortcode on each page.</p>
			
			<h4>ShortCodes</h4>
			
			<dl>
				<dt style="font-weight:bold;">[InterplayEvents/]</dt>
				<dd>This shortcode will display all events associated with the region or leader
					defined with the web service account.</dd>
					
				<dt style="font-weight:bold;">[InterplaySingleEvent/]</dt>
				<dd>This shortcaode will display the full details for a single interplay event. This
					process requires that an identifier for the event be included in the URL.
					<em>ex. http://mydomain.com/?page_id=2&event=123</em></dd>
				
				<dt style="font-weight:bold;">[InterplayLeaders/]</dt>
				<dd>This shortcode will display all leaders associated with the region defined with 
					the web service account. If the web service account is associated with a leader
					rather than a region only that leader will be displayed in this list.</dd>
					
				<dt style="font-weight:bold;">[InterplayPerformances/]</dt>
				<dd>This shortcode will display all performing groups associated with the region or 
					leader defined with the web service account.</dd>
			</dl>
			
			<p><em>Note: Use of the shortcodes may result in links to external websites (links back
				 to interplay.org and links to leader websites) being output on your website.</em></p>
			
			<h3>Support</h3>
			
			<p>If you experience issues either using or setting up the plugin please feel free to 
				contact <a href="mailto:wordpress@interplay.org">wordpress@interplay.org</a>.</p>
			
		</div>
		
	</form>
	
</div>