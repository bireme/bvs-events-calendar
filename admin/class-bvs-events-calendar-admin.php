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
			"name" => "Events",
			"singular_name" => "Event",
			"menu_name" => "Events",
			"all_items" => "Events",
			"add_new" => "Add New",
			"add_new_item" => "Add New Event",
			"edit" => "Edit",
			"edit_item" => "Edit Event",
			"new_item" => "New Event",
			"view" => "View",
			"view_item" => "View Event",
			"search_items" => "Search Event",
			"not_found" => "No Events found",
			"not_found_in_trash" => "No Events found in Trash",
			"parent" => "Parent Event",
			);

		$args = array(
			"labels" => $labels,
			"description" => "",
			"public" => true,
			"show_ui" => true,
			"show_in_rest" => false,
			"has_archive" => true,
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
			"name" => "Schedules",
			"singular_name" => "Schedule",
			"menu_name" => "Schedules",
			"all_items" => "All Schedules",
			"add_new" => "Add New",
			"add_new_item" => "Add New Schedule",
			"edit" => "Edit",
			"edit_item" => "Edit Schedule",
			"new_item" => "New Schedule",
			"view" => "View",
			"view_item" => "View Schedule",
			"search_items" => "Search Schedule",
			"not_found" => "No Schedule found",
			"not_found_in_trash" => "No Schedule found in trash",
			"parent" => "Parent Schedule",
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
			"name" => "Sessions",
			"singular_name" => "Session",
			"menu_name" => "Sessions",
			"all_items" => "All Sessions",
			"add_new" => "Add New",
			"add_new_item" => "Add New Sessions",
			"edit" => "Edit",
			"edit_item" => "Edit Session",
			"new_item" => "New Session",
			"view" => "View",
			"view_item" => "View Session",
			"search_items" => "Search Session",
			"not_found" => "No Sessions found",
			"not_found_in_trash" => "No Sessions found in Trash",
			"parent" => "Parent Session",
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
			"name" => "Subsessions",
			"singular_name" => "Subsession",
			"menu_name" => "Subsessions",
			"all_items" => "All Subsessions",
			"add_new" => "Add New",
			"add_new_item" => "Add New Subsession",
			"edit" => "Edit",
			"edit_item" => "Edit Subsession",
			"new_item" => "New Subsession",
			"view" => "View",
			"view_item" => "View Subsession",
			"search_items" => "Search Subsession",
			"not_found" => "No Subsessions found",
			"not_found_in_trash" => "No Subsessions found in Trash",
			"parent" => "Parent Subsession",
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
			"name" => "Presentations",
			"singular_name" => "Presentation",
			"menu_name" => "Presentations",
			"all_items" => "All Presentations",
			"add_new" => "Add New",
			"add_new_item" => "Add New Presentation",
			"edit" => "Edit",
			"edit_item" => "Edit Presentation",
			"new_item" => "New Presentation",
			"view" => "View",
			"view_item" => "View Presentation",
			"search_items" => "Search Presentation",
			"not_found" => "No Presentations found",
			"not_found_in_trash" => "No Presentations found in Trash",
			"parent" => "Parent Presentation",
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
			"name" => "Participants",
			"singular_name" => "Participants",
			"menu_name" => "Participants",
			"all_items" => "All Participants",
			"add_new" => "Add New",
			"add_new_item" => "Add New Participants",
			"edit" => "Edit",
			"edit_item" => "Edit Participant",
			"new_item" => "New Participant",
			"view" => "View",
			"view_item" => "View Participant",
			"search_items" => "Search Participant",
			"not_found" => "No Participants found",
			"not_found_in_trash" => "No Participants found in Trash",
			"parent" => "Parent Participant",
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
