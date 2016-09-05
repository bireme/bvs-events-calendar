<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://reddes.bvsalud.org/
 * @since      1.0.0
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/includes
 * @author     BIREME/OPAS/OMS <bvs.technical.support@listas.bireme.br>
 */
class BVS_Events_Calendar {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      BVS_Events_Calendar_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'bvs-events-calendar';
		$this->version = '1.0.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->load_acf(); // Custom Fields
		$this->load_cpt(); // Custom Post Types
		$this->load_theme_options(); // Theme Options

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - BVS_Events_Calendar_Loader. Orchestrates the hooks of the plugin.
	 * - BVS_Events_Calendar_i18n. Defines internationalization functionality.
	 * - BVS_Events_Calendar_Admin. Defines all hooks for the admin area.
	 * - BVS_Events_Calendar_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bvs-events-calendar-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-bvs-events-calendar-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-bvs-events-calendar-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-bvs-events-calendar-public.php';

		$this->loader = new BVS_Events_Calendar_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the BVS_Events_Calendar_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new BVS_Events_Calendar_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new BVS_Events_Calendar_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles', 1 );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts', 1 );
		
		$this->loader->add_action( 'plugins_loaded', $plugin_admin, 'events_calendar_register_theme' );
		$this->loader->add_action( 'admin_notices', $plugin_admin, 'events_calendar_admin_notices' );
		$this->loader->add_action( 'edit_form_after_title', $plugin_admin, 'edit_form_desc_label' );
		$this->loader->add_action( 'admin_footer-edit.php', $plugin_admin, 'add_event_query_arg' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'recursive_save_event_hidden_field' );
		$this->loader->add_action( 'restrict_manage_posts', $plugin_admin, 'filter_post_type_by_event' );
		$this->loader->add_action( 'p2p_init', $plugin_admin, 'events_calendar_connection_types' );
		$this->loader->add_action( 'category_add_form_fields', $plugin_admin, 'add_category_custom_fields' );
		$this->loader->add_action( 'category_edit_form_fields', $plugin_admin, 'add_category_custom_fields' );
		$this->loader->add_action( 'create_category', $plugin_admin, 'save_custom_category_meta' );
		$this->loader->add_action( 'edited_category', $plugin_admin, 'save_custom_category_meta' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'post_categories_metabox_remove' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'custom_post_categories_metabox' );
		$this->loader->add_action( 'set_object_terms', $plugin_admin, 'custom_set_object_terms', 10, 4 );

		// filter result and query for session field in Subsession
		$this->loader->add_filter( 'acf/fields/relationship/result/key=field_569e804d50029', $plugin_admin, 'custom_relationship_result', 10, 4 );
		$this->loader->add_filter( 'acf/fields/relationship/query/key=field_569e804d50029', $plugin_admin, 'custom_relationship_query', 10, 3 );

		// filter result and query for session field in Presentation
		$this->loader->add_filter( 'acf/fields/relationship/result/key=field_56a10c10dda31', $plugin_admin, 'custom_relationship_result', 10, 4 );
		$this->loader->add_filter( 'acf/fields/relationship/query/key=field_56a10c10dda31', $plugin_admin, 'custom_relationship_query', 10, 3 );

		$this->loader->add_filter( 'parse_query', $plugin_admin, 'event_parse_query' );
		$this->loader->add_filter( 'cac/column/value', $plugin_admin, 'custom_presentation_admin_columns_values', 10, 4 );

		//$this->loader->add_action( 'manage_presentation_posts_custom_column', $plugin_admin, 'custom_presentation_columns_values', 10, 2 );
		//$this->loader->add_filter( 'manage_presentation_posts_columns', $plugin_admin, 'custom_presentation_columns' );

		//$this->loader->add_action( 'manage_category_custom_column', $plugin_admin, 'custom_category_columns_values', 10, 3 );
	    //$this->loader->add_filter( 'manage_edit-category_columns', $plugin_admin, 'custom_category_columns' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new BVS_Events_Calendar_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles', 20 );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts', 20 );

		$this->loader->add_action( 'wp_head', $plugin_public, 'theme_options_init' );
		$this->loader->add_action( 'home_template', $plugin_public, 'static_home_template' );

	}

	/**
	 * Register custom fields
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_acf() {

        if ( 'bvs-eventos' == get_stylesheet() ) {

			/**
			 * Incorpora o plugin ACF no plugin BVS Agenda de Eventos.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/advanced-custom-fields/acf.php';

			/**
			 * Incorpora o plugin ACF: Date and Time Picker no plugin BVS Agenda de Eventos.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/acf-field-date-time-picker/acf-date_time_picker.php';

			/**
			 * Registra os custom fields do plugin ACF no plugin BVS Agenda de Eventos.
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/custom-fields-groups.php';

		}

	}

	/**
	 * Register custom post types and taxonomies
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_cpt() {

        if ( 'bvs-eventos' == get_stylesheet() ) {
        	
        	$plugin_admin = new BVS_Events_Calendar_Admin( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'init', $plugin_admin, 'cptui_register_cpts_event' );
			$this->loader->add_action( 'init', $plugin_admin, 'cptui_register_cpts_schedule' );
			$this->loader->add_action( 'init', $plugin_admin, 'cptui_register_cpts_session' );
			$this->loader->add_action( 'init', $plugin_admin, 'cptui_register_cpts_subsession' );
			$this->loader->add_action( 'init', $plugin_admin, 'cptui_register_cpts_presentation' );
			$this->loader->add_action( 'init', $plugin_admin, 'cptui_register_cpts_participant' );

		}

	}

	/**
	 * Load theme options
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_theme_options() {

        if ( 'bvs-eventos' == get_stylesheet() ) {

        	$plugin_admin = new BVS_Events_Calendar_Admin( $this->get_plugin_name(), $this->get_version() );

			$this->loader->add_action( 'admin_menu', $plugin_admin, 'theme_options_menu' );

		}

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    BVS_Events_Calendar_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
