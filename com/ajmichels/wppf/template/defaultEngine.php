<?php

if ( !class_exists( 'com_ajmichels_wppf_template_defaultEngine' ) ) {

/**
 * 
 * @package			com.ajmichels.wppf.template
 * @title			defaultEngine.php
 * @extends			com_ajmichels_common_abstractClass
 * @implements		com_ajmichels_wppf_interface_iView
 * @contributors	AJ Michels (http://ajmichels.com)
 * @version			1.0
 * @copyright		Copyright (c) 2012, AJ Michels
 * 					
 * 					Licensed under the Apache License, Version 2.0 (the "License");
 * 					you may not use this file except in compliance with the License.
 * 					You may obtain a copy of the License at
 * 					
 * 					   http://www.apache.org/licenses/LICENSE-2.0
 * 					
 * 					Unless required by applicable law or agreed to in writing, software
 * 					distributed under the License is distributed on an "AS IS" BASIS,
 * 					WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * 					See the License for the specific language governing permissions and
 * 					limitations under the License.
 * 
 */

abstract class com_ajmichels_wppf_template_defaultEngine
extends com_ajmichels_common_abstractClass
implements com_ajmichels_wppf_interface_iView
{
	
	
	public function parseTemplate ( $templatePath, $data = null )
	{
	}
	
	
}

} // end 'if class_exists'