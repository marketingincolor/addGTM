<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.marketingincolor.com
 * @since      0.0.1
 *
 * @package    AddGTM
 * @subpackage AddGTM/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AddGTM
 * @subpackage AddGTM/public
 * @author     Marketing In Color
 */
class AddGTM_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $AddGTM;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $AddGTM, $version ) {

		$this->AddGTM = $AddGTM;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->AddGTM, plugin_dir_url( __FILE__ ) . 'css/AddGTM-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->AddGTM, plugin_dir_url( __FILE__ ) . 'js/AddGTM-public.js', array( 'jquery' ), $this->version, false );

	}


}

//Adds GTM code below the opening <body> tag
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
