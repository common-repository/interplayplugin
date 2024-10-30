<?php

/** ********************************************************************************************** /
 * 
 * Plugin Name:  Interplay
 * Plugin URI:   http://www.interplay.org/wordpress
 * Description:  This plugin provides regional interplay.org content for your wordpress powered website.
 * Author:       Interplay.org
 * Version:      2.1.2.010110
 * Author URI:   http://www.interplay.org
 * 
 * Copyright (C) 2019-20 Body Wisdom, Inc
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 * 
 * ********************************************************************************************** */


/* Include and Initialize Class Autoloader */
$autoLoaderPath = '\com\ajmichels\common\autoLoader.php';
require_once( str_replace( '\\', DIRECTORY_SEPARATOR, dirname(__FILE__) . $autoLoaderPath ) );
com_ajmichels_common_autoLoader::getInstance( dirname(__FILE__) );


/**
 * 
 * @title         InterplayPlugin.php
 * @contributors  AJ Michels (www.ajmichels.com)
 * 
 */
class InterplayPlugin
extends com_ajmichels_wppf_bootstrap
implements com_ajmichels_common_iSingleton
{
	
	
	/* SINGLETON ENFORCEMENT ******************************************************************** */
	
	private static $instance;
	
	
	public static function getInstance ()
	{
		if ( !isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	
	/* CONSTRUCT PLUGIN ************************************************************************* */
	
	public function __construct ()
	{
		
		parent::__construct();
		
		$this->setPluginPath( __FILE__ );
		
		if ( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ) {
			$this->loggerSetting( 'enabled', true );
			$this->loggerSetting( 'level', 'debug' );
			$this->loggerSetting( 'minTime', 0 );
			$wsUrl = 'http://127.0.0.1:8203/webservice/';
		}
		else {
			$wsUrl = 'http://www.interplay.org/webservice/';
		}
		
		$sfXml = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpSpring.xml';
		$sfProps = array(
					'pluginUrl'        => $this->getPluginUrl(),
					'wordpressUrl'     => includes_url(),
					'webServiceDomain' => $wsUrl
					);
		$this->sf = new com_ajmichels_phpSpring_bean_factory_default( $sfXml, array(), $sfProps );
		$this->sf->setParent( $this->wppf_serviceFactory );
		
		parent::initPlugin();
		
	}
	
	
	/* PLUGIN HOOKS ***************************************************************************** */
	
	protected function shutdown ()
	{
		
		if ( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ) {
			echo '<!-- Testing Server: 127.0.0.1 -->';
		}
	}
	
	
	/* REGISTER OBJECTS with MANAGERS *********************************************************** */
	
	/**
	 * Register Plugin Options with the option manager.
	 * 
	 * @return  void
	 * 
	 */
	protected function options ()
	{
		
		$this->os->setGroupName( 'interplayPluginOptions' );
		$this->os->register( 'subscription_key' );
		$this->os->register( 'region-scope' );
		$this->os->register( 'single-event-page' );
		$this->os->register( 'data_type' );
		$this->os->register( 'calendar-color-primary' );
		$this->os->register( 'calendar-color-accent' );
		$this->os->register( 'countdown-color-primary' );
		$this->os->register( 'countdown-color-accent' );
	}
	
	
	/**
	 * Register Plugin Actions with the action manager.
	 * 
	 * @return  void
	 * 
	 */
	protected function actions ()
	{
		
		$this->am->register( $this->sf->getBean( 'CreateAdminPagesAction' ), array('admin_menu') );
		$this->am->register( $this->sf->getBean( 'EnqueueResourcesAction'),  array('init') );
	}
	
	
	/**
	 * Register Plugin Shortcodes with the shortcode manager.
	 * 
	 * @return  void
	 * 
	 */
	protected function shortcodes ()
	{
		
		$this->sm->register( $this->sf->getBean( 'LeaderListShortcode' ) );
		$this->sm->register( $this->sf->getBean( 'EventListShortcode' ) );
		$this->sm->register( $this->sf->getBean( 'SingleEventShortcode' ) );
		$this->sm->register( $this->sf->getBean( 'PerformingGroupListShortcode' ) );
	}
	
	
}


/* INSTANTIATE PLUGIN *************************************************************************** */
InterplayPlugin::getInstance();
