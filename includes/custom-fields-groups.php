<?php

/**
 * Função que registra todos os custom fields do plugin BVS Agenda de Eventos.
 *
 * @link       http://reddes.bvsalud.org/
 * @since      1.0.0
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/includes
 */

/**
 * Função que registra todos os custom fields do plugin BVS Agenda de Eventos.
 *
 * Registra todos os grupos de custom fields associados aos
 * custom post types específicos do plugin BVS Agenda de Eventos.
 *
 * @package    BVS_Events_Calendar
 * @subpackage BVS_Events_Calendar/includes
 * @author     BIREME/OPAS/OMS <bvs.technical.support@listas.bireme.br>
 */
if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_events',
        'title' => __('Events', 'bvs-events-calendar'),
        'fields' => array (
            array (
                'key' => 'field_569e420193ef9',
                'label' => __('Start Date', 'bvs-events-calendar'),
                'name' => 'start_date',
                'type' => 'date_picker',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_569e425293efa',
                'label' => __('End Date', 'bvs-events-calendar'),
                'name' => 'end_date',
                'type' => 'date_picker',
                'date_format' => 'yymmdd',
                'display_format' => 'dd/mm/yy',
                'first_day' => 1,
            ),
            array (
                'key' => 'field_569e42ca0fa1c',
                'label' => __('Venue', 'bvs-events-calendar'),
                'name' => 'venue',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_569e42f40fa1d',
                'label' => __('Location', 'bvs-events-calendar'),
                'name' => 'location',
                'type' => 'google_map',
                'center_lat' => '',
                'center_lng' => '',
                'zoom' => '',
                'height' => 350,
            ),
            array (
                'key' => 'field_5727bbd00952c',
                'label' => __('Registrations Message', 'bvs-events-calendar'),
                'name' => 'registrations',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'yes',
            ),
            array (
                'key' => 'field_56a10cde54fb5',
                'label' => __('Homepage', 'bvs-events-calendar'),
                'name' => 'homepage',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'page',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'event',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
                0 => 'permalink',
                1 => 'custom_fields',
                2 => 'discussion',
                3 => 'comments',
                4 => 'slug',
                5 => 'format',
                6 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_participant',
        'title' => __('Participant', 'bvs-events-calendar'),
        'fields' => array (
            array (
                'key' => 'field_569e875f5143e',
                'label' => __('Job Title', 'bvs-events-calendar'),
                'name' => 'job_title',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_569e881c5143f',
                'label' => __('Affiliation', 'bvs-events-calendar'),
                'name' => 'affiliation',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_569e89f051440',
                'label' => __('Email', 'bvs-events-calendar'),
                'name' => 'email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_56a0bceefc99b',
                'label' => __('Picture', 'bvs-events-calendar'),
                'name' => 'picture',
                'type' => 'image',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_56a0bd02aeb73',
                'label' => __('Curriculum Vitae', 'bvs-events-calendar'),
                'name' => 'curriculum_vitae',
                'type' => 'text',
                'instructions' => 'Short Bio Page/URL',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5717b81989eb6',
                'label' => __('Site', 'bvs-events-calendar'),
                'name' => 'site',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5717b83e89eb7',
                'label' => __('Twitter', 'bvs-events-calendar'),
                'name' => 'twitter',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5717b84a89eb8',
                'label' => __('Facebook', 'bvs-events-calendar'),
                'name' => 'facebook',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5717b87789eb9',
                'label' => __('LinkedIn', 'bvs-events-calendar'),
                'name' => 'linkedin',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'participant',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_presentation',
        'title' => __('Presentation', 'bvs-events-calendar'),
        'fields' => array (
            array (
                'key' => 'field_5776d6a48af52',
                'label' => __('Initial Date and Time', 'bvs-events-calendar'),
                'name' => 'initial_date',
                'type' => 'date_time_picker',
                'show_date' => 'true',
                'date_format' => 'm/d/y',
                'time_format' => 'h:mm tt',
                'show_week_number' => 'false',
                'picker' => 'slider',
                'save_as_timestamp' => 'true',
                'get_as_timestamp' => 'false',
            ),
            array (
                'key' => 'field_5776d6d38485d',
                'label' => __('End Date and Time', 'bvs-events-calendar'),
                'name' => 'end_date',
                'type' => 'date_time_picker',
                'show_date' => 'true',
                'date_format' => 'm/d/y',
                'time_format' => 'h:mm tt',
                'show_week_number' => 'false',
                'picker' => 'slider',
                'save_as_timestamp' => 'true',
                'get_as_timestamp' => 'false',
            ),
            array (
                'key' => 'field_56a10c10dda31',
                'label' => __('Session', 'bvs-events-calendar'),
                'name' => 'session',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'session',
                    1 => 'subsession',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
            array (
                'key' => 'field_56a0c4cefd68b',
                'label' => __('Author', 'bvs-events-calendar'),
                'name' => 'author',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'participant',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
            array (
                'key' => 'field_56a0c4f20a8ee',
                'label' => __('Attachments', 'bvs-events-calendar'),
                'name' => 'attachments',
                'type' => 'file',
                'save_format' => 'object',
                'library' => 'all',
            ),
            array (
                'key' => 'field_5711073d63085',
                'label' => __('Video', 'bvs-events-calendar'),
                'name' => 'video',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_57179c8e617cb',
                'label' => __('Slideshare', 'bvs-events-calendar'),
                'name' => 'slideshare',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'presentation',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_schedules',
        'title' => __('Schedules', 'bvs-events-calendar'),
        'fields' => array (
            array (
                'key' => 'field_569e43b5a98da',
                'label' => __('Event', 'bvs-events-calendar'),
                'name' => 'event',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'event',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'schedule',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_session',
        'title' => __('Session', 'bvs-events-calendar'),
        'fields' => array (
            array (
                'key' => 'field_569e4ce4a1fe3',
                'label' => __('Schedule', 'bvs-events-calendar'),
                'name' => 'schedule',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'schedule',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
            array (
                'key' => 'field_569e4efafcc96',
                'label' => __('Initial Date and Time', 'bvs-events-calendar'),
                'name' => 'initial_date_and_time',
                'type' => 'date_time_picker',
                'show_date' => 'true',
                'date_format' => 'm/d/y',
                'time_format' => 'h:mm tt',
                'show_week_number' => 'false',
                'picker' => 'slider',
                'save_as_timestamp' => 'true',
                'get_as_timestamp' => 'false',
            ),
            array (
                'key' => 'field_569e4f4dfcc97',
                'label' => __('End Date and Time', 'bvs-events-calendar'),
                'name' => 'end_date_and_time',
                'type' => 'date_time_picker',
                'show_date' => 'true',
                'date_format' => 'm/d/y',
                'time_format' => 'h:mm tt',
                'show_week_number' => 'false',
                'picker' => 'slider',
                'save_as_timestamp' => 'true',
                'get_as_timestamp' => 'false',
            ),
            array (
                'key' => 'field_571103722fc68',
                'label' => __('Location', 'bvs-events-calendar'),
                'name' => 'location',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_571103eee22cd',
                'label' => __('Author', 'bvs-events-calendar'),
                'name' => 'author',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'participant',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'session',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array (
        'id' => 'acf_subsession',
        'title' => __('Subsession', 'bvs-events-calendar'),
        'fields' => array (
            array (
                'key' => 'field_569e515b5d833',
                'label' => __('Initial Date and Time', 'bvs-events-calendar'),
                'name' => 'initial_time',
                'type' => 'date_time_picker',
                'show_date' => 'true',
                'date_format' => 'm/d/y',
                'time_format' => 'h:mm tt',
                'show_week_number' => 'false',
                'picker' => 'slider',
                'save_as_timestamp' => 'true',
                'get_as_timestamp' => 'false',
            ),
            array (
                'key' => 'field_569e517e5d834',
                'label' => __('End date and Time', 'bvs-events-calendar'),
                'name' => 'end_time',
                'type' => 'date_time_picker',
                'show_date' => 'true',
                'date_format' => 'm/d/y',
                'time_format' => 'h:mm tt',
                'show_week_number' => 'false',
                'picker' => 'slider',
                'save_as_timestamp' => 'true',
                'get_as_timestamp' => 'false',
            ),
            array (
                'key' => 'field_569e804d50029',
                'label' => __('Session', 'bvs-events-calendar'),
                'name' => 'session',
                'type' => 'relationship',
                'required' => 1,
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'session',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
            array (
                'key' => 'field_571106e111988',
                'label' => __('Location', 'bvs-events-calendar'),
                'name' => 'location',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_571106ed11989',
                'label' => __('Author', 'bvs-events-calendar'),
                'name' => 'author',
                'type' => 'relationship',
                'return_format' => 'object',
                'post_type' => array (
                    0 => 'participant',
                ),
                'taxonomy' => array (
                    0 => 'all',
                ),
                'filters' => array (
                    0 => 'search',
                ),
                'result_elements' => array (
                    0 => 'post_type',
                    1 => 'post_title',
                ),
                'max' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'subsession',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
