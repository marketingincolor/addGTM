<?php
class AddGTM_Settings
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
          add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
		} // END public function __construct

        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('AddGTM-group', 'gtm_script');

        	// add your settings section
        	add_settings_section(
        	    'AddGTM-section',
        	    '',
        	    array(&$this, 'settings_section_AddGTM'),
        	    'AddGTM'
        	);

        	// add your setting's fields
            add_settings_field(
                'AddGTM-gtm_script',
                'GTM ID:',
                array(&$this, 'settings_field_input_text'),
                'AddGTM',
                'AddGTM-section',
                array(
                    'field' => 'gtm_script'
                )
            );
            // Possibly do additional admin_init tasks
        } // END public static function activate
        public function settings_section_AddGTM()
        {
            // Think of this as help text for the section.
						$newline = "<br/>";
            echo "Need Help Finding Your GTM ID?" . $newline ."<a href = \"https://developers.google.com/tag-manager/quickstart\">Google Tag Manager Quick Start Guide</a>";
        }

        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } // END public function settings_field_input_text($args)

        /**
         * add a menu
         */
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'AddGTM Settings',
        	    'Tag Manager ID',
        	    'manage_options',
        	    'AddGTM',
        	    array(&$this, 'plugin_settings_page')
        	);
        } // END public function add_menu()

        /**
         * Menu Callback
         */
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}

        	// Render the settings template
        	include(sprintf("%s/includes/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class AddGTM_Settings
// END if(!class_exists('AddGTM_Settings')
