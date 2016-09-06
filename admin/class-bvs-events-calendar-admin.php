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

        wp_enqueue_style( 'thickbox' );

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

        wp_enqueue_script( 'thickbox' );

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
			"supports" => array( "title", "excerpt", "custom-fields", "revisions", "author" ),		
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
			"supports" => array( "title", "excerpt", "custom-fields", "revisions", "author" ),		
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

    public function edit_form_desc_label( $post ) {
        if ( ! in_array( $post->post_type, array( 'session', 'subsession' ) ) )
            echo '<h2 class="title-label">' . __( 'Description', 'bvs-events-calendar' ) . '</h2>';
    }

    public function theme_options_menu() {
        add_theme_page( __( 'Theme Options', 'bvs-events-calendar' ), __( 'Theme Options', 'bvs-events-calendar' ), 'edit_theme_options', 'theme-options', array( &$this, 'theme_options_page' ) );
    }

    public function theme_options_page() {
        global $pagenow;
        $settings = get_option( "events_theme_options" );
        ?>
        <div class="wrap">
            <h2><?php echo __('Theme Options','bvs-events-calendar'); ?></h2>
            <?php
                if( isset($_POST['theme-options-submit']) && $_POST['theme-options-submit'] == 'Y' ) {
                    $settings['header'] = $_POST['header'];
                    update_option( "events_theme_options", $settings );

                    echo '<div class="updated notice is-dismissible" ><p><strong>' . __('Theme options updated','bvs-events-calendar') . '</strong></p></div>';
                }
            ?>
            <div id="poststuff">
                <form method="post" action="<?php admin_url( 'themes.php?page=theme-options' ); ?>">
                    <?php
                        if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-options' ){
                            $path = WP_PLUGIN_DIR . '/' . $this->plugin_name . '/includes';
                            
                            echo '<table class="form-table">';
                                include( $path . "/theme-options.php");
                            echo '</table>';
                        }
                    ?>
                    <p class="submit">
                        <input type="hidden" name="theme-options-submit" value="Y" />
                        <input type="submit" name="submit"  class="button-primary" value="<?php echo __('Update'); ?>" />
                    </p>
                </form>
            </div>
        </div>
        <?php
    }

    /**
     * Modify the result (text) displayed for each post in the relationship field list.
     *
     * @since     1.0.0
     */
    public function custom_relationship_result( $title, $post, $field, $post_id ) {

        $events = get_field( 'event_hidden_field', $post->ID );
        $post_type = get_post_type( $post->ID );
        $initial_date = '';

        if ( $post_type == 'session' )
            $initial_date = get_field( 'initial_date_and_time', $post->ID );
        elseif ( $post_type == 'subsession' )
            $initial_date = get_field( 'initial_time', $post->ID );

        if ( ! empty( $initial_date ) )
            $initial_date = ' - ' . date("d/m/Y g:i a", strtotime($initial_date) );
                        
        if ( ! empty($events) )
            $title .= ' [' . get_the_title( $events[0] ) .  ']';
        
        return $title . $initial_date;

    }

    /**
     * Modify the $args array which is used to query 
     * the posts shown in the the relationship field list.
     *
     * @since     1.0.0
     */
    public function custom_relationship_query( $args, $field, $post_id ) {

        $url = wp_get_referer();
        $parts = parse_url($url);
        parse_str($parts['query'], $q);
        $post_type = isset( $q['post'] ) ? get_post_type( $q['post'] ) : '';
        $args['posts_per_page'] = -1;

        if ( isset( $q['event'] ) ) {
            $args['meta_query'] = array();
            $args['meta_query'][] = array(
                'key' => 'event_hidden_field',
                'value' => serialize(strval($q['event'])),
                'compare' => 'LIKE'
            );
        }
        
        return $args;
        
    }

    /**
     * Add event query argument to all links displayed on the post list
     *
     * @since     1.0.0
     */
    public function add_event_query_arg() {
        $event = $_GET['event'] ? $_GET['event'] : '';

        if ( ! empty( $event ) ) {
            ?>
            <script type="text/javascript">
                $ = jQuery;
                $('table.wp-list-table a.row-title').each(function() {
                   var _href = $(this).attr('href'); 
                   $(this).attr('href', _href + '&event=<?php echo $event; ?>');
                });
            </script>
            <?php
        }
    }

    /**
     * Display a event filter dropdown in admin
     *
     * @since     1.0.0
     */
    public function filter_post_type_by_event() {
        global $typenow;
        $fields = array( 'schedule', 'session', 'subsession', 'presentation' );

        if ( in_array( $typenow, $fields ) ) {
            $args = array(
                'post_type' => 'event',
                'post_status' => 'any',
                'posts_per_page' => -1,
            );

            $query = null;
            $query = new WP_Query($args);

            if( $query->have_posts() ) {
                echo '<select name="event" id="event" class="postform">';
                echo '<option value="">Show All Events</option>';
                while ( $query->have_posts() ) : $query->the_post();
                    echo '<option value='. get_the_ID(), $_GET['event'] == get_the_ID() ? ' selected="selected"' : '','>' . get_the_title() . '</option>';
                endwhile;
                echo "</select>";
            }

            wp_reset_query();
        }
    }

    /**
     * Filter posts by event in admin
     *
     * @since     1.0.0
     */
    public function event_parse_query($query) {
        global $pagenow;
        $q_vars = &$query->query_vars;
        $fields = array( 'schedule', 'session', 'subsession', 'presentation' );

        if ( $pagenow == 'edit.php' && isset( $q_vars['event'] ) && ! empty( $q_vars['event'] ) && isset( $q_vars['post_type'] ) && in_array( $q_vars['post_type'], $fields ) ) {

            // Parse meta query
            $q_vars['name'] = '';
            $q_vars['meta_query'] = array();
            $q_vars['meta_query'][] = array(
                'key' => 'event_hidden_field',
                'value' => serialize(strval($q_vars['event'])),
                'compare' => 'LIKE'
            );

        }
    }

    /**
     * Save event related data in postmeta.
     *
     * @since     1.0.0
     */
    public function save_event_hidden_field( $post_id ) {
        $post_type = get_post_type( $post_id );

        $fields = array(
            'event' => 'event',
            'schedule' => 'schedule',
            'session' => 'session',
            'subsession' => 'subsession',
            'presentation' => 'presentation',
        );

        if( ! current_user_can( 'edit_post', $post_id ) )
            return $post_id;

        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            return $post_id;

        if ( ! in_array( $post_type, $fields ) || $post_type == 'event' )
            return $post_id;

        $meta = get_post_meta( $post_id );
        $related = array_intersect_key( $meta, $fields );

        if ( ! empty($related) ) {
            $key = key($related);
            $handle = unserialize($related[$key][0]);

            while ( ! empty( $handle ) && $key != 'event' ) {
                $ids = array();
                $merge = array();

                foreach ( $handle as $h ) {
                    $meta = get_post_meta( $h );
                    $related = array_intersect_key( $meta, $fields );

                    if ( ! empty($related) ) {
                        $key = key($related);
                        $value = unserialize($related[$key][0]);
                        $ids[] = $value;
                    }
                }
                
                $ids = array_filter( $ids );
                //$ids = array_slice( $ids, 0 );

                if ( ! empty( $ids ) ) {
                    foreach ($ids as $k => $v) {
                        $merge = array_merge( $merge, $ids[$k] );
                    }
                }

                $handle = array_unique( array_filter( $merge ) );                
            }
        }

        update_post_meta( $post_id, 'event_hidden_field', $handle );
    }

    /**
     * Save event related data in postmeta in all related content recursively.
     *
     * @since     1.0.0
     */
    public function recursive_save_event_hidden_field( $post_id ) {
        $ids = array( $post_id );
        $post_type = get_post_type( $post_id );
        $fields = array( 'schedule', 'session', 'subsession' );

        $relationships = array(
            'schedule' => 'session',
            'session' => 'subsession',
            'subsession' => 'presentation',
        );

        if ( ! in_array( $post_type, array( 'event', 'participant' ) ) )
            $this->save_event_hidden_field( $post_id );

        if ( in_array( $post_type, $fields ) ) {
            while ( in_array( $post_type, $fields ) ) {
                $merge = array();
                $related = $relationships[$post_type];
                $post_type = ( $post_type == 'subsession' ) ? 'session' : $post_type;

                foreach ( $ids as $id ) {                    
                    $args = array(
                        'post_type' => $related,
                        'post_status' => 'any',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => $post_type,
                                'value' => serialize(strval($id)),
                                'compare' => 'LIKE'
                            )
                        )
                    );

                    if ( $related == 'subsession' )
                        $args['post_type'] = array( $related, 'presentation' );

                    $query = null;
                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) {
                        $list = wp_list_pluck( $query->posts, 'ID' );
                        $merge = array_unique( array_merge( $merge, $list ) );
                    
                        foreach ( $list as $item )
                            $this->save_event_hidden_field( $item );

                        if ( $related == 'subsession' ) {
                            $list = wp_list_pluck( $query->posts, 'post_type', 'ID' );
                            $list = array_keys( $list, 'subsession' );
                        }
                    }
                }

                if ( ! empty( $merge ) ) {
                    $ids = $merge;
                    $post_type = $related;
                } else {
                    break;
                }
            }
        }
    }

    /**
     * Registra os temas do plugin BVS Agenda de Eventos
     *
     * @since     1.0.0
     */
    public function events_calendar_register_theme() {

        $path = WP_PLUGIN_DIR . '/' . $this->plugin_name . '/wp-themes';
        register_theme_directory( $path );
        
    }

    public function events_calendar_admin_notices() {

        if ( 'bvs-eventos' != get_stylesheet() && is_plugin_active( 'bvs-events-calendar/bvs-events-calendar.php' ) ) {

            if ( is_multisite() )
                echo "<div class='notice notice-error'><p>" .  __( 'For the correct operation of the <b>VHL Events Calendar plugin</b>, activate the <b>VHL Events Calendar theme</b> in the network and then activate the theme on this site.', 'bvs-noticias' ) . "</p></div>";
            else
                echo "<div class='notice notice-error'><p>" .  __( 'For the correct operation of the <b>VHL Events Calendar plugin</b>, activate the <b>VHL Events Calendar theme</b>.', 'bvs-noticias' ) . "</p></div>";

        }

    }

    public function events_calendar_connection_types() {
        p2p_register_connection_type( array(
            'name' => 'presentations_to_participants',
            'from' => 'presentation',
            'to' => 'participant',
            'fields' => array(
                'role' => array(
                    'title' => __( 'Role', 'bvs-events-calendar' ),
                    'type' => 'text',
                )
            ),
            'admin_box' => array(
                'show' => 'from',
                'context' => 'advanced'
            ),
            'title' => array(
                'from' => __( 'Related Participants', 'bvs-events-calendar' )
            )
        ) );

        p2p_register_connection_type( array(
            'name' => 'subsessions_to_participants',
            'from' => 'subsession',
            //'to' => array( 'participant', 'role' ),
            'to' => 'participant',
            'fields' => array(
                'role' => array(
                    'title' => __( 'Role', 'bvs-events-calendar' ),
                    'type' => 'text',
                )
            ),
            'admin_box' => array(
                'show' => 'from',
                'context' => 'advanced'
            ),
            'title' => array(
                'from' => __( 'Related Participants', 'bvs-events-calendar' )
            )
        ) );

        p2p_register_connection_type( array(
            'name' => 'sessions_to_participants',
            'from' => 'session',
            'to' => 'participant',
            'fields' => array(
                'role' => array(
                    'title' => __( 'Role', 'bvs-events-calendar' ),
                    'type' => 'text',
                )
            ),
            'admin_box' => array(
                'show' => 'from',
                'context' => 'advanced'
            ),
            'title' => array(
                'from' => __( 'Related Participants', 'bvs-events-calendar' )
            )
        ) );
    }

    public function add_category_custom_fields( $term ){
        global $typenow;
        $term_id = $term->term_id;
        $term_meta = get_option( "taxonomy_$term_id" );
        $fields = array( 'event', 'schedule', 'session', 'subsession', 'presentation' );
        $q = array();

        if ( isset( $_GET['wp_http_referer'] ) ) {
            $parts = parse_url($_GET['wp_http_referer']);
            parse_str($parts['query'], $q);
            $q['post_type'] = $q['post_type'] ? $q['post_type'] : $typenow;
        } else {
            $q['post_type'] = $typenow;
        }

        if ( in_array( $q['post_type'], $fields ) ) {
            $args = array(
                'post_type' => 'event',
                'post_status' => 'any',
                'posts_per_page' => -1,
            );

            $query = null;
            $query = new WP_Query($args);

            if( $query->have_posts() ) { $size = ( $query->found_posts < 6 ) ? $query->found_posts + 1 : 6;
    ?>
        <tr class="form-field">
            <th scope="row">
                <label for="term_meta[event][]"><?php _e( 'Event', 'bvs-events-calendar' ) ?></label>
                <td>
                    <select name="term_meta[event][]" id="term_meta[event][]" multiple size="<?php echo $size;?>">
                        <option value=""></option>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                            <option value="<?php the_ID(); ?>" <?=(in_array(get_the_ID(), (array) $term_meta['event'])) ? 'selected': ''?>><?php the_title(); ?></option>
                        <?php endwhile; ?>
                    </select>
                    <p class="description"><?php _e( 'Sets the associated event.', 'bvs-events-calendar' ); ?></p>
                </td>
            </th>
        </tr>
    <?php
            }
        }
    }

    public function save_custom_category_meta( $term_id ){ 

        if ( isset( $_POST['term_meta'] ) && !empty( $_POST['term_meta'] ) ) {
             
            $term_meta = array();
 
            $term_meta['event'] = isset( $_POST['term_meta']['event'] ) ? (array) $_POST['term_meta']['event'] : '';
    
            update_option( "taxonomy_$term_id", $term_meta );
     
        }

    }

    public function custom_category_columns( $columns ){
        global $typenow;
        $fields = array( 'event', 'schedule', 'session', 'subsession', 'presentation' );

        if ( in_array( $typenow, $fields ) )
            $columns = array_merge( $columns, array( 'event' => __( 'Event', 'bvs-events-calendar' ) ) );

        return $columns;
    }

    public function custom_category_columns_values( $deprecated, $column_name, $term_id ) {
        if( $column_name == 'event' ){
            $term_meta = get_option( "taxonomy_$term_id" );

            if ( $term_meta && isset( $term_meta['event'] ) ) {
                $titles = array();

                foreach ( $term_meta['event'] as $term ) {
                    $title = get_the_title( $term );
                    $link = get_edit_post_link( $term );
                    $titles[] = $link ? "<a href='{$link}'>{$title}</a>" : $title;
                }

                $output = implode( '<span class="cpac-divider"></span>', $titles );

                echo $output;
            }
        }
    }

    public function custom_presentation_columns( $columns ) {
        $columns['session'] = __( 'Session/Subsession', 'bvs-events-calendar' );

        return $columns;
    }

    public function custom_presentation_columns_values( $column, $post_id ) {
        $meta = get_post_meta( $post_id, 'session' );

        if( $column == 'session' ){
            $titles = array();
            
            if ( $meta[0] ) {
                foreach ( (array) $meta[0] as $id ) {
                    if ( $title = get_the_title( $id ) ) {
                        $label = '';
                        $post_type = get_post_type( $id );

                        if ( 'session' == $post_type )
                            $label = ' (' . __( 'Session', 'bvs-events-calendar' ) . ')';
                        elseif ( 'subsession' == $post_type )
                            $label = ' (' . __( 'Subsession', 'bvs-events-calendar' ) . ')';

                        $link = get_edit_post_link( $id );
                        $titles[] = $link ? "<a href='{$link}'>{$title}{$label}</a>" : $title;
                    }
                }
            }
            
            $value = implode( '<span class="cpac-divider"></span>', $titles );

            echo $value;
        }        
    }

    public function custom_subsession_columns( $columns ) {
        $columns['session'] = __( 'Session', 'bvs-events-calendar' );

        return $columns;
    }

    public function custom_subsession_columns_values( $column, $post_id ) {
        $meta = get_post_meta( $post_id, 'session' );

        if( $column == 'session' ){
            $titles = array();
            
            if ( $meta[0] ) {
                foreach ( (array) $meta[0] as $id ) {
                    if ( $title = get_the_title( $id ) ) {
                        $post_type = get_post_type( $id );
                        $link = get_edit_post_link( $id );
                        $titles[] = $link ? "<a href='{$link}'>{$title}</a>" : $title;
                    }
                }
            }
            
            $value = implode( '<span class="cpac-divider"></span>', $titles );

            echo $value;
        }        
    }

    public function custom_presentation_admin_columns_values( $value, $object_id, $column, $storage_key ) {
        $cfkey = 'session';
        $meta = get_post_meta( $object_id, 'session' );

        if ( 'column-meta' == $column->get_type() && $cfkey == $column->get_field() && 'presentation' == $storage_key ) {
            $titles = array();
            
            if ( $meta[0] ) {
                foreach ( (array) $meta[0] as $id ) {
                    if ( $title = get_the_title( $id ) ) {
                        $label = '';
                        $post_type = get_post_type( $id );

                        if ( 'session' == $post_type )
                            $label = ' (' . __( 'Session', 'bvs-events-calendar' ) . ')';
                        elseif ( 'subsession' == $post_type )
                            $label = ' (' . __( 'Subsession', 'bvs-events-calendar' ) . ')';

                        $link = get_edit_post_link( $id );
                        $titles[] = $link ? "<a href='{$link}'>{$title}{$label}</a>" : $title;
                    }
                }
            }
            
            $value = implode( '<span class="cpac-divider"></span>', $titles );
        }
        return $value;
    }

    public function post_categories_metabox_remove() {
        global $typenow;
        $fields = array( 'event', 'schedule', 'session', 'subsession', 'presentation' );
        $id = 'categorydiv';
        $post_type = $fields;
        $position = 'side';
        remove_meta_box( $id, $post_type, $position );
    }

    public function custom_post_categories_metabox(){
        global $typenow;
        $fields = array( 'event', 'schedule', 'session', 'subsession', 'presentation' );
        $id = 'categorydiv';
        $heading = __( 'Categories' );
        $callback = array( &$this, 'custom_callback_post_categories_metabox' );
        $post_type = $fields;
        $position = 'side';
        $priority = 'default';
        add_meta_box( $id, $heading, $callback, $post_type, $position, $priority );
    }

    public function custom_callback_post_categories_metabox( $post ) {
        $tax_name = 'category';

        $args = array(
            'descendants_and_self' => 0,
            'selected_cats' => false,
            'popular_cats' => false,
            'walker' => null,
            'taxonomy' => 'category',
            'checked_ontop' => true,
            'echo' => true,
        );

        if ( empty( $args['walker'] ) || ! ( $args['walker'] instanceof Walker ) ) {
            $walker = new Walker_Category_Checklist;
        } else {
            $walker = $args['walker'];
        }

        $args['selected_cats'] = wp_get_object_terms( $post->ID, 'category', array_merge( $args, array( 'fields' => 'ids' ) ) );

        $categories = array();
        $all_categories = (array) get_terms( 'category', array( 'get' => 'all' ) );

        $meta = get_field( 'event_hidden_field' );
        $ehf = $meta[0] ? $meta[0] : '';
        $event = ( $post->post_type == 'event' ) ? $post->ID : $ehf;

        foreach( $all_categories as $cat ){
            $term_meta = get_option( "taxonomy_$cat->term_id" );

            if ( $term_meta['event'] && $event && in_array( $event, (array) $term_meta['event'] ) ) {
                $categories[] = $cat;
            }
        }

        $output = '';

        if ( $args['checked_ontop'] ) {
            // Post process $categories rather than adding an exclude to the get_terms() query to keep the query the same across all posts (for any query cache)
            $checked_categories = array();
            $keys = array_keys( $categories );
     
            foreach ( $keys as $k ) {
                if ( in_array( $categories[$k]->term_id, $args['selected_cats'] ) ) {
                    $checked_categories[] = $categories[$k];
                    unset( $categories[$k] );
                }
            }
     
            // Put checked cats on top
            $output .= call_user_func_array( array( $walker, 'walk' ), array( $checked_categories, 0, $args ) );
        }
        // Then the rest of them
        $output .= call_user_func_array( array( $walker, 'walk' ), array( $categories, 0, $args ) );

        ?>
        <div id="taxonomy-category" class="categorydiv">
            <input type="hidden" name="post_category[]" value="0" />
            <ul id="<?php echo $tax_name; ?>checklist" data-wp-lists="list:<?php echo $tax_name; ?>" class="categorychecklist form-no-clear">
                <?php echo $output; ?>
            </ul>
        </div>
        <div id="<?php echo $tax_name; ?>-adder" class="wp-hidden-children">
            <a id="<?php echo $tax_name; ?>-add-toggle" href="#<?php echo $tax_name; ?>-add" class="hide-if-no-js taxonomy-add-new">
                <?php
                    /* translators: %s: add new taxonomy label */
                    printf( __( '+ %s', 'bvs-events-calendar' ), 'Add New Category' );
                ?>
            </a>
            <p id="<?php echo $tax_name; ?>-add" class="category-add wp-hidden-child">
                <label class="screen-reader-text" for="new<?php echo $tax_name; ?>"><?php echo __( 'Add New Category', 'bvs-events-calendar' ); ?></label>
                <input type="text" name="new<?php echo $tax_name; ?>" id="new<?php echo $tax_name; ?>" class="form-required form-input-tip" value="<?php echo __( 'New Category Name', 'bvs-events-calendar' ); ?>" aria-required="true"/>
                <input type="button" id="<?php echo $tax_name; ?>-add-submit" data-wp-lists="add:<?php echo $tax_name; ?>checklist:<?php echo $tax_name; ?>-add" class="button category-add-submit" value="<?php echo __( 'Add New Category', 'bvs-events-calendar' ); ?>" />
                <?php wp_nonce_field( 'add-' . $tax_name, '_ajax_nonce-add-' . $tax_name, false ); ?>
                <span id="<?php echo $tax_name; ?>-ajax-response"></span>
            </p>
        </div>
        <?php
    }

    public function custom_set_object_terms( $object_id, $terms, $tt_ids, $taxonomy ){
        $post_type = get_post_type( $object_id );
        $fields = array( 'event', 'schedule', 'session', 'subsession', 'presentation' );

        if( $taxonomy == 'category' && in_array( $post_type, $fields ) ){            
            $meta = get_field( 'event_hidden_field', $object_id );
            $ehf = $meta[0] ? $meta[0] : '';
            $event = ( $post_type == 'event' ) ? $object_id : $ehf;
            
            if ( ! empty( $event ) ) {
                foreach ( $terms as $term_id ) {
                    $term_options = get_option( "taxonomy_$term_id" );

                    if ( empty( $term_options ) ) {
                        $term_meta = array();
                        $term_meta['event'] = (array) $event;
                        update_option( "taxonomy_$term_id", $term_meta );
                    }
                }
            }
        }
    }  

}
