<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://reddes.bvsalud.org/
 * @since      1.0.0
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/admin
 * @author     BIREME/OPAS/OMS <bvs.technical.support@listas.bireme.br>
 */
class BVS_Events_Calendar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
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
		 * defined in BVS_Events_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BVS_Events_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bvs-events-calendar-admin.css', array(), $this->version, 'all' );

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
		 * defined in BVS_Events_Calendar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The BVS_Events_Calendar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bvs-events-calendar-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
	 * Função que registra o custom post type Event
	 *
	 * @since     1.0.0
	 */
	public function cptui_register_cpts_event() {
		$labels = array(
            "name" => __("Events", 'bvs-events-calendar'),
            "singular_name" => __("Event", 'bvs-events-calendar'),
            "menu_name" => __("Events", 'bvs-events-calendar'),
            "all_items" => __("All Events", 'bvs-events-calendar'),
            "add_new" => __("Add Event", 'bvs-events-calendar'),
            "add_new_item" => __("Add New Event", 'bvs-events-calendar'),
            "edit" => __("Edit", 'bvs-events-calendar'),
            "edit_item" => __("Edit Event", 'bvs-events-calendar'),
            "new_item" => __("New Event", 'bvs-events-calendar'),
            "view" => __("View", 'bvs-events-calendar'),
            "view_item" => __("View Event", 'bvs-events-calendar'),
            "search_items" => __("Search Event", 'bvs-events-calendar'),
            "not_found" => __("No Events found", 'bvs-events-calendar'),
            "not_found_in_trash" => __("No Events found in Trash", 'bvs-events-calendar'),
            "parent" => __("Parent Event", 'bvs-events-calendar'),
        );

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "event", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-groups",		
			"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions", "author" ),		
			"taxonomies" => array( "category", "post_tag", "language" ),		
		);
		register_post_type( "event", $args );

	// End of cptui_register_cpts_event()
	}

	/**
	 * Função que registra o custom post type Schedule
	 *
	 * @since     1.0.0
	 */
	public function cptui_register_cpts_schedule() {
		$labels = array(
            "name" => __("Schedules", 'bvs-events-calendar'),
            "singular_name" => __("Schedule", 'bvs-events-calendar'),
            "menu_name" => __("Schedules", 'bvs-events-calendar'),
            "all_items" => __("All Schedules", 'bvs-events-calendar'),
            "add_new" => __("Add Schedule", 'bvs-events-calendar'),
            "add_new_item" => __("Add New Schedule", 'bvs-events-calendar'),
            "edit" => __("Edit", 'bvs-events-calendar'),
            "edit_item" => __("Edit Schedule", 'bvs-events-calendar'),
            "new_item" => __("New Schedule", 'bvs-events-calendar'),
            "view" => __("View", 'bvs-events-calendar'),
            "view_item" => __("View Schedule", 'bvs-events-calendar'),
            "search_items" => __("Search Schedule", 'bvs-events-calendar'),
            "not_found" => __("No Schedules found", 'bvs-events-calendar'),
            "not_found_in_trash" => __("No Schedules found in Trash", 'bvs-events-calendar'),
            "parent" => __("Parent Schedule", 'bvs-events-calendar'),
        );

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "schedule", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-calendar-alt",		
			"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions", "author" ),		
			"taxonomies" => array( "category", "post_tag", "language" ),		
		);
		register_post_type( "schedule", $args );

	// End of cptui_register_cpts_schedule()
	}

	/**
	 * Função que registra o custom post type Session
	 *
	 * @since     1.0.0
	 */
	public function cptui_register_cpts_session() {
		$labels = array(
            "name" => __("Sessions", 'bvs-events-calendar'),
            "singular_name" => __("Session", 'bvs-events-calendar'),
            "menu_name" => __("Sessions", 'bvs-events-calendar'),
            "all_items" => __("All Sessions", 'bvs-events-calendar'),
            "add_new" => __("Add Session", 'bvs-events-calendar'),
            "add_new_item" => __("Add New Session", 'bvs-events-calendar'),
            "edit" => __("Edit", 'bvs-events-calendar'),
            "edit_item" => __("Edit Session", 'bvs-events-calendar'),
            "new_item" => __("New Session", 'bvs-events-calendar'),
            "view" => __("View", 'bvs-events-calendar'),
            "view_item" => __("View Session", 'bvs-events-calendar'),
            "search_items" => __("Search Session", 'bvs-events-calendar'),
            "not_found" => __("No Sessions found", 'bvs-events-calendar'),
            "not_found_in_trash" => __("No Sessions found in Trash", 'bvs-events-calendar'),
            "parent" => __("Parent Session", 'bvs-events-calendar'),
        );

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "session", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-exerpt-view",		
			"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions", "author" ),		
			"taxonomies" => array( "category", "post_tag", "language" ),		
		);
		register_post_type( "session", $args );

	// End of cptui_register_cpts_session()
	}

	/**
	 * Função que registra o custom post type Subsession
	 *
	 * @since     1.0.0
	 */
	public function cptui_register_cpts_subsession() {
		$labels = array(
            "name" => __("Subsessions", 'bvs-events-calendar'),
            "singular_name" => __("Subsession", 'bvs-events-calendar'),
            "menu_name" => __("Subsessions", 'bvs-events-calendar'),
            "all_items" => __("All Subsessions", 'bvs-events-calendar'),
            "add_new" => __("Add Subsession", 'bvs-events-calendar'),
            "add_new_item" => __("Add New Subsession", 'bvs-events-calendar'),
            "edit" => __("Edit", 'bvs-events-calendar'),
            "edit_item" => __("Edit Subsession", 'bvs-events-calendar'),
            "new_item" => __("New Subsession", 'bvs-events-calendar'),
            "view" => __("View", 'bvs-events-calendar'),
            "view_item" => __("View Subsession", 'bvs-events-calendar'),
            "search_items" => __("Search Subsession", 'bvs-events-calendar'),
            "not_found" => __("No Subsessions found", 'bvs-events-calendar'),
            "not_found_in_trash" => __("No Subsessions found in Trash", 'bvs-events-calendar'),
            "parent" => __("Parent Subsession", 'bvs-events-calendar'),
        );

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "subsession", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-list-view",		
			"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions", "author" ),		
			"taxonomies" => array( "category", "post_tag", "language" ),		
		);
		register_post_type( "subsession", $args );

	// End of cptui_register_cpts_subsession()
	}

	/**
	 * Função que registra o custom post type Presentation
	 *
	 * @since     1.0.0
	 */
	public function cptui_register_cpts_presentation() {
		$labels = array(
            "name" => __("Presentations", 'bvs-events-calendar'),
            "singular_name" => __("Presentation", 'bvs-events-calendar'),
            "menu_name" => __("Presentations", 'bvs-events-calendar'),
            "all_items" => __("All Presentations", 'bvs-events-calendar'),
            "add_new" => __("Add Presentation", 'bvs-events-calendar'),
            "add_new_item" => __("Add New Presentation", 'bvs-events-calendar'),
            "edit" => __("Edit", 'bvs-events-calendar'),
            "edit_item" => __("Edit Presentation", 'bvs-events-calendar'),
            "new_item" => __("New Presentation", 'bvs-events-calendar'),
            "view" => __("View", 'bvs-events-calendar'),
            "view_item" => __("View Presentation", 'bvs-events-calendar'),
            "search_items" => __("Search Presentation", 'bvs-events-calendar'),
            "not_found" => __("No Presentations found", 'bvs-events-calendar'),
            "not_found_in_trash" => __("No Presentations found in Trash", 'bvs-events-calendar'),
            "parent" => __("Parent Presentation", 'bvs-events-calendar'),
        );

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "presentation", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-slides",		
			"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions", "author" ),		
			"taxonomies" => array( "category", "post_tag", "language" ),		
		);
		register_post_type( "presentation", $args );

	// End of cptui_register_cpts_presentation()
	}

	/**
	 * Função que registra o custom post type Participant
	 *
	 * @since     1.0.0
	 */
	public function cptui_register_cpts_participant() {
		$labels = array(
            "name" => __("Participants", 'bvs-events-calendar'),
            "singular_name" => __("Participant", 'bvs-events-calendar'),
            "menu_name" => __("Participants", 'bvs-events-calendar'),
            "all_items" => __("All Participants", 'bvs-events-calendar'),
            "add_new" => __("Add Participant", 'bvs-events-calendar'),
            "add_new_item" => __("Add New Participant", 'bvs-events-calendar'),
            "edit" => __("Edit", 'bvs-events-calendar'),
            "edit_item" => __("Edit Participant", 'bvs-events-calendar'),
            "new_item" => __("New Participant", 'bvs-events-calendar'),
            "view" => __("View", 'bvs-events-calendar'),
            "view_item" => __("View Participant", 'bvs-events-calendar'),
            "search_items" => __("Search Participant", 'bvs-events-calendar'),
            "not_found" => __("No Participants found", 'bvs-events-calendar'),
            "not_found_in_trash" => __("No Participants found in Trash", 'bvs-events-calendar'),
            "parent" => __("Parent Participant", 'bvs-events-calendar'),
        );

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => false,
			"show_in_menu" => true,
			"exclude_from_search" => false,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => array( "slug" => "participant", "with_front" => true ),
			"query_var" => true,
			"menu_icon" => "dashicons-id-alt",		
			"supports" => array( "title", "editor", "excerpt", "custom-fields", "revisions", "author" ),		
			"taxonomies" => array( "category", "post_tag", "language" ),		
		);
		register_post_type( "participant", $args );

	// End of cptui_register_cpts_participant()
	}

}
