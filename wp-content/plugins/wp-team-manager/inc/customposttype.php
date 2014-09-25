<?php
//Adding the necessary actions
add_action('init', 'register_team_manager' );

//register the custom post type for the team manager
function register_team_manager() {

    $labels = array( 
        'name' => _x( 'Team', 'wp-team-manager' ),
        'singular_name' => _x( 'Team Member', 'wp-team-manager' ),
        'add_new' => _x( 'Add New Member', 'wp-team-manager' ),
        'add_new_item' => _x( 'Add New ', 'wp-team-manager' ),
        'edit_item' => _x( 'Edit Team Member ', 'wp-team-manager' ),
        'new_item' => _x( 'New Team Member', 'wp-team-manager' ),
        'view_item' => _x( 'View Team Members', 'wp-team-manager' ),
        'search_items' => _x( 'Search Team Members', 'wp-team-manager' ),
        'not_found' => _x( 'Not found any Team Member', 'wp-team-manager' ),
        'not_found_in_trash' => _x( 'No Team Member found in Trash', 'wp-team-manager' ),
        'parent_item_colon' => _x( 'Parent Team Member:', 'wp-team-manager' ),
        'menu_name' => _x( 'Team', 'wp-team-manager' ),
    );
	
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,        
        'supports' => array( 'title', 'thumbnail','editor','page-attributes'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,       
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
		'menu_icon' => plugins_url( '../img/icon16.png',__FILE__),
		'rewrite' => array( 'slug' => 'team-manager' )

    );

    register_post_type( 'team_manager', $args );

    //register custom category for the team manager

    $labels = array(
        'name'                       => _x( 'Groups', 'wp-team-manager' ),
        'singular_name'              => _x( 'Group', 'wp-team-manager' ),
        'search_items'               => _x( 'Search Groups', 'wp-team-manager' ),
        'popular_items'              => _x( 'Popular Groups', 'wp-team-manager' ),
        'all_items'                  => _x( 'All Groups', 'wp-team-manager' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => _x( 'Edit Group', 'wp-team-manager' ),
        'update_item'                => _x( 'Update Group', 'wp-team-manager' ),
        'add_new_item'               => _x( 'Add New Group', 'wp-team-manager' ),
        'new_item_name'              => _x( 'New Group Name', 'wp-team-manager' ),
        'separate_items_with_commas' => _x( 'Separate Groups with commas', 'wp-team-manager' ),
        'add_or_remove_items'        => _x( 'Add or remove Groups', 'wp-team-manager' ),
        'choose_from_most_used'      => _x( 'Choose from the most used Groups', 'wp-team-manager' ),
        'not_found'                  => _x( 'No Groups found.', 'wp-team-manager' ),
        'menu_name'                  => _x( 'Team Groups', 'wp-team-manager' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'team_groups' ),
    );

    register_taxonomy( 'team_groups', 'team_manager', $args );

}

// add VCF file type upload support

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    // add your extension to the array
    $existing_mimes['vcf'] = 'text/x-vcard';
    return $existing_mimes;
}


/********************* BEGIN DEFINITION OF META BOXES ***********************/

$prefix = 'tm_';

$meta_boxes = array();

$meta_boxes[] = array(
    'id' => 'team_personal',                         // meta box id, unique per meta box
    'title' => 'Team Member Information',          // meta box title
    'pages' => array('team_manager'),  // post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',                      // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',                       // order of meta box: high (default), low; optional

    'fields' => array(                          // list of meta fields
        
        array(
            'name' => __('Job Title','wp-team-manager'),                  // field name
            'desc' => __('Job title of this team member.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'jtitle',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => __('')                    // default value, optional
        ),
        array(
            'name' => __('Telephone','wp-team-manager'),                  // field name
            'desc' => __('Telephone no of this team member.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'telephone',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Location','wp-team-manager'),                // field name
            'desc' => __('Location of this team member.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'location',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Web URL','wp-team-manager'),                  // field name
            'desc' => __('Website url of this team member.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'web_url',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),                
        array(
            'name' => __('VCARD','wp-team-manager'),
            'desc' => __('Upload your VCARD','wp-team-manager'),
            'id' => $prefix . 'vcard',
            'type' => 'file'                        // file upload
        )
    )
);

// first meta box
$meta_boxes[] = array(
    'id' => 'team_social',                         // meta box id, unique per meta box
    'title' => __('Social Profile','wp-team-manager'),          // meta box title
    'pages' => array('team_manager'),  // post types, accept custom post types as well, default is array('post'); optional
    'context' => 'normal',                      // where the meta box appear: normal (default), advanced, side; optional
    'priority' => 'high',                       // order of meta box: high (default), low; optional

    'fields' => array(                          // list of meta fields
        
        array(
            'name' => __('Facebook','wp-team-manager'),                 // field name
            'desc' => __('Facebook profile or page link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'flink',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Twitter','wp-team-manager'),                  // field name
            'desc' => __('Twitter profile link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'tlink',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('LinkedIn','wp-team-manager'),                  // field name
            'desc' => __('LinkedIn profile link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'llink',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Google Plus','wp-team-manager'),                 // field name
            'desc' => __('Google Plus profile link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'gplink',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Dribbble','wp-team-manager'),                  // field name
            'desc' => __('Dribbble profile link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'dribbble',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),        
        array(
            'name' => __('Youtube','wp-team-manager'),                 // field name
            'desc' => __('Youtube profile link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'ylink',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Vimeo','wp-team-manager'),                  // field name
            'desc' => __('Vimeo profile link.','wp-team-manager'), // field description, optional
            'id' => $prefix . 'vlink',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        ),
        array(
            'name' => __('Email','wp-team-manager'),                  // field name
            'desc' => __('Email Id','wp-team-manager'), // field description, optional
            'id' => $prefix . 'emailid',              // field id, i.e. the meta key
            'type' => 'text',                       // text box
            'std' => ''                    // default value, optional
        )
    )
);
/********************* BEGIN EXTENDING CLASS ***********************/

/**
 * Extend WTM_Meta_Box class
 * Add field type: 'taxonomy'
 */
class WTM_Meta_Box_Taxonomy extends WTM_Meta_Box {
    
    function add_missed_values() {
        parent::add_missed_values();
        
        // add 'multiple' option to taxonomy field with checkbox_list type
        foreach ($this->_meta_box['fields'] as $key => $field) {
            if ('taxonomy' == $field['type'] && 'checkbox_list' == $field['options']['type']) {
                $this->_meta_box['fields'][$key]['multiple'] = true;
            }
        }
    }
    
    // show taxonomy list
    function show_field_taxonomy($field, $meta) {
        global $post;
        
        if (!is_array($meta)) $meta = (array) $meta;
        
        $this->show_field_begin($field, $meta);
        
        $options = $field['options'];
        $terms = get_terms($options['taxonomy'], $options['args']);
        
        // checkbox_list
        if ('checkbox_list' == $options['type']) {
            foreach ($terms as $term) {
                echo "<input type='checkbox' name='{$field['id']}[]' value='$term->slug'" . checked(in_array($term->slug, $meta), true, false) . " /> $term->name<br/>";
            }
        }
        // select
        else {
            echo "<select name='{$field['id']}" . ($field['multiple'] ? "[]' multiple='multiple' style='height:auto'" : "'") . ">";
        
            foreach ($terms as $term) {
                echo "<option value='$term->slug'" . selected(in_array($term->slug, $meta), true, false) . ">$term->name</option>";
            }
            echo "</select>";
        }
        
        $this->show_field_end($field, $meta);
    }
}

foreach ($meta_boxes as $meta_box) {
    $wptm_box = new WTM_Meta_Box_Taxonomy($meta_box);
}

/********************* END DEFINITION OF META BOXES ***********************/