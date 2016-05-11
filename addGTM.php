<?php

/*
Plugin Name: Add GTM
Plugin URI:
Description: A plugin for adding Google Tag Manager (GTM) on your WordPress website.
Version: 0.1
Author: Marketing In Color
Author URI: http://www.marketingincolor.com
License: GPL2

Copyright 2014 Marketing In Color  (email : developer@marketingincolor.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

 if(!class_exists('addGTM'))
 {
 	class addGTM
 	{
 		/**
 		 * Construct the plugin object
 		 */
 		public function __construct()
 		{
 			// Initialize Settings
 			require_once(sprintf("%s/settings.php", dirname(__FILE__)));
 			$addGTM_Settings = new addGTM_Settings();

 		} // END public function __construct
 		/**
 		 * Activate the plugin
 		 */
 		public static function activate()
 		{

    }
 		public static function deactivate()
 		{

 		} // END public static function deactivate

 		// Add the settings link to the plugins page
 		function plugin_settings_link($links)
 		{
 			$settings_link = '<a href="options-general.php?page=addGTM">Settings</a>';
 			array_unshift($links, $settings_link);
 			return $links;
 		}

 	} // END class addGTM
} // END if(!class_exists('addGTM'))

 if(class_exists('addGTM'))
 {
 	// Install and uninstall hooks
 	register_activation_hook(__FILE__, array('addGTM', 'activate'));
 	register_deactivation_hook(__FILE__, array('addGTM', 'deactivate'));

 	// instantiate the plugin class
 	$addGTM = new addGTM();
  add_filter('template_include','yoursite_template_include',1);

  function yoursite_template_include($template) {
		ob_start();
		return $template;
  }

  add_filter('shutdown','yoursite_shutdown',0);
  function yoursite_shutdown() {

	  $startOfGTM = "<!-- Google Tag Manager -->
		<noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=";

	  $middleOfGTM = "\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','";

	  $endOfGTM = "');</script>
    <!-- End Google Tag Manager -->";

	  $insert = "\n" . $startOfGTM . get_option('gtm_script') . $middleOfGTM . get_option('gtm_script') . $endOfGTM;
    $content = ob_get_clean();
	  $content = preg_replace('#<body([^>]*)>#i',"<body$1>{$insert}",$content);
	  echo $content;
  }
}
