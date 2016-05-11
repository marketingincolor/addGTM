<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.marketingincolor.com
 * @since      1.0.0
 *
 * @package    AddGTM_Name
 * @subpackage AddGTM/admin
 */

/**
 * The admin-specific functionality of the AddGTM.
 *
 * Defines the AddGTM name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    AddGTM_Name
 * @subpackage AddGTM_Name/admin
 * @author     Marketing In Color <email@example.com>
 */
class AddGTM_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $AddGTM_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $AddGTM_name, $version ) {

		$this->AddGTM = $AddGTM;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->AddGTM, plugin_dir_url( __FILE__ ) . 'css/AddGTM-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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




		wp_enqueue_script( $this->AddGTM, plugin_dir_url( __FILE__ ) . 'js/AddGTM-admin.js', array( 'jquery' ), $this->version, false );

	}

	/*public function display_admin_page(){
		add_menu_page(
			'Add Google Tag Manager', //page title
			'Tag Manager', //menu Title
			'manage_options', //capabilities
			'AddGTM Admin', //menu slug
			array($this, 'showPage'), //function
			'dashicons-tag', //icon_url
			'4' //position from top
		);
	}

	public function showPage () {
		include ( 'partials/AddGTM-admin-display.php' );
	}
*/

}
