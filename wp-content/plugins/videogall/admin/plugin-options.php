<?php
/**
 * Initializing theme options
 */
function videogall_init_options() {
    if(false === videogall_get_options()) add_option('videogall_options', videogall_get_default_options());
    $default_options = videogall_get_default_options();
    $current_options = videogall_get_options();
    if(count($current_options) != count($default_options)) {
        $default_keys = array_keys($default_options);
        foreach($default_keys as $entry) {
            if(array_key_exists($entry,$current_options)) {
                $default_options[$entry] = $current_options[$entry];
            }
        }
        update_option('videogall_options',$default_options);
    }
    register_setting('videogall_options', 'videogall_options', 'videogall_validate_options');
    videogall_video_action();
}
add_action('admin_init', 'videogall_init_options');

/**
 * Adding theme options menu item
 */
function videogall_activate_options() {
    $videogall_plugin_page = add_options_page(__('Videogall Settings','videogall'), __('Videogall Settings','videogall'), 'manage_options', 'videogall_plugin_options', 'videogall_options_page');
    add_action('admin_print_styles-' . $videogall_plugin_page, 'videogall_enqueue_admin_scripts');
}
add_action('admin_menu', 'videogall_activate_options');

/**
 * Enqeueing the javascripts & stylesheets
 */
function videogall_enqueue_admin_scripts($hook_suffix) {
    global $videogall_url;
    wp_enqueue_script('jquery');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
    wp_enqueue_script('videogall_color_picker', $videogall_url.'admin/jscolor.js', false, false);
    wp_enqueue_script('videogall_admin_js', $videogall_url.'admin/plugin-options.js', 'jquery', false);
    wp_enqueue_style('videogall_admin_css', $videogall_url.'admin/plugin-options.css', false, false, 'all');
}

/**
 * Retreive theme options
 */
function videogall_get_options() {
    return get_option('videogall_options', videogall_get_default_options());
}

/**
 * Default theme options
 */
function videogall_get_default_options() {
    $options = array(
	'video_size' => '1024|720',
        'number_of_columns' => '3',
        'enable_pagination' => false,
        'videos_per_page' => 10,
        'show_categories' => false,
        'sort_by_category' => false,
        'video_order' => 'new_to_old',
        'enable_border' => false,
        'border_color' => 'f5f5f5',
        'shadowbox_images' => true,
	'autoplay' => false,
    );
    return apply_filters('videogall_get_default_options', $options);
}

/**
 * Dropdown list
 */
function videogall_video_size_list() {
    $list = array(
	'480|320' => array('value' => '480|320', 'label' => __('Small','videogall')),
	'640|480' => array('value' => '640|480', 'label' => __('Medium','videogall')),
	'1024|720' => array('value' => '1024|720', 'label' => __('Large','videogall')),
    );
    return apply_filters('videogall_video_size_list', $list);
}

function videogall_column_list() {
    $list = array(
	'1' => array('value' => '1', 'label' => __('1','videogall')),
	'2' => array('value' => '2', 'label' => __('2','videogall')),
	'3' => array('value' => '3', 'label' => __('3','videogall')),
	'4' => array('value' => '4', 'label' => __('4','videogall')),
	'5' => array('value' => '5', 'label' => __('5','videogall')),
	'6' => array('value' => '6', 'label' => __('6','videogall'))
    );
    return apply_filters('videogall_column_list', $list);
}

function videogall_video_order_list() {
    $list = array(
	'new_to_old' => array('value' => 'new_to_old', 'label' => __('New to Old','videogall')),
	'old_to_new' => array('value' => 'old_to_new', 'label' => __('Old to New','videogall')),
    );
    return apply_filters('videogall_video_order_list', $list);
}

/**
 * List of plugin options tabs
 */
function videogall_options_tabs() {
    $tabs = array(
        "1" => array("value" => "1", "label" => __("My Videos","videogall")),
        "2" => array("value" => "2", "label" => __("Add new video","videogall")),
        "3" => array("value" => "3", "label" => __("Video categories","videogall")),
        "4" => array("value" => "4", "label" => __("Additional Settings","videogall"))
    );
    return apply_filters("videogall_options_tabs", $tabs);
}

/**
 * Display the options page
 */
function videogall_options_page() {
    global $videogall_url;
    if(isset($_POST['settings-reset'])) {
        delete_option('videogall_options');
        add_settings_error('videogall_options','reset',__('Default settings restored','videogall'),'updated');
    }
    ?>
    <div id="settings-wrap">
        <h1 class="settings-title"><img src="<?php echo $videogall_url; ?>admin/images/options.png"/><?php _e('Videogall Settings','videogall'); ?></h1>
        <form method="post" id="settings-form" action="options.php">
            <?php
                settings_fields('videogall_options');
                $videogall_options = videogall_get_options();
                $videogall_default_options = videogall_get_default_options();
            ?>
            <div class="settings-fields-wrap">
                <div class="settings-nav">
                    <?php
                    $first = true;
                        foreach(videogall_options_tabs() as $entry) {
                            if($first) $current_class = " current-tab"; else $current_class = "";
                            echo '<a class="tab'.$current_class.'" id="tab-'.$entry['value'].'" href="javascript:void(0)"><img src="'.$videogall_url.'admin/images/tab_'.$entry['value'].'.png"/>'.$entry['label'].'</a>';
                            $first = false;
                        }
                    ?>
                </div>
                <div class="settings-fields">
                    <?php settings_errors(); ?>
                    <div class="section current-section" id="section-1">
                        <p>
                            <?php
				$videos = videogall_get_results("videogall_videos");
				foreach($videos as $entry) {
			    ?>
			    <div class="edit-video">
				<img class="edit-video-item" id="edit-video-item-<?php echo $entry['id']; ?>" height="150" src="<?php echo $entry['thumbnail']; ?>"/>
				<div class="edit-links">
				    <a class="edit" id="edit-<?php echo $entry['id']; ?>" href="javascript:void(0)"><?php _e('Edit','videogall'); ?></a>
				    <input class="delete" type="submit" name="delete-<?php echo $entry['id']; ?>" id="delete-<?php echo $entry['id']; ?>" value="<?php _e('Delete','videogall'); ?>"/>
				</div>
			    </div>
			    <div class="edit-video-form" id="edit-video-form-<?php echo $entry['id']; ?>">
				<div class="edit-video-form-wrap">
				    <p>
					<strong><?php _e('Video url *','videogall'); ?></strong>&nbsp;&nbsp;&nbsp;
					<input type="text" name="edit-video-url-<?php echo $entry['id']; ?>" id="edit-video-url-<?php echo $entry['id']; ?>" value="<?php echo $entry['url']; ?>"/>
				    </p>
				    <p>
					<strong><?php _e('Video thumbnail','videogall'); ?></strong>&nbsp;&nbsp;&nbsp;
					<input type="text" name="edit-video-thumb-<?php echo $entry['id']; ?>" id="edit-video-thumb-<?php echo $entry['id']; ?>" value="<?php echo $entry['thumbnail']; ?>"/>
					<input id="edit-video-thumb-<?php echo $entry['id']; ?>_upload" type="button" class="button-secondary image_upload" value="<?php _e('Upload thumbnail','videogall'); ?>" />
				    </p>
				    <p>
					<strong><?php _e('Video category','videogall'); ?></strong>&nbsp;&nbsp;&nbsp;
					<select name="edit-video-category-<?php echo $entry['id']; ?>" id="edit-video-category-<?php echo $entry['id']; ?>">
					    <option value="0"><?php _e('Uncategorized','videogall'); ?></option>
					    <?php
						$categories = videogall_get_results("videogall_categories");
						foreach($categories as $cat) {
						    if($cat['id'] == $entry['category']) $selected = "selected"; else $selected = "";
					    ?>
					    <option value="<?php echo $cat['id']; ?>"<?php echo $selected; ?>><?php echo ucwords($cat['name']); ?></option>
					    <?php } ?>
					</select>
				    </p>
				    <p>
					<strong><?php _e('Video caption','videogall'); ?></strong>&nbsp;&nbsp;&nbsp;
					<input type="text" name="edit-video-caption-<?php echo $entry['id']; ?>" id="edit-video-caption-<?php echo $entry['id']; ?>" value="<?php echo $entry['caption']; ?>"/>
				    </p>
				    <p>
					<strong><?php _e('Video description','videogall'); ?></strong>&nbsp;&nbsp;&nbsp;
					<textarea rows="3" cols="60" style="vertical-align:middle;" name="edit-video-description-<?php echo $entry['id']; ?>" id="edit-video-description-<?php echo $entry['id']; ?>"><?php echo $entry['description']; ?></textarea>
				    </p>
				    <?php submit_button(__('Save Video Changes','videogall'),'primary edit-video-submit edit-video-submit-'.$entry['id'],'edit-video-submit'); ?>
				    <img class="edit-close" src="<?php echo $videogall_url; ?>admin/images/close_btn.png"/>
				</div>
			    </div>
			    <?php } ?>
			    <input type="hidden" name="edit-id" id="edit-id" value=""/>
			    <input type="hidden" name="delete-id" id="delete-id" value=""/>
                        </p>
                    </div>
		    <div class="section" id="section-2">
                        <p>
                            <label><?php _e('Add video url *','videogall'); ?></label>
			    <input type="text" name="add-video-url" id="add-video-url" value=""/>
                        </p>
			<p>
                            <label><?php _e('Select video category','videogall'); ?></label>
			    <select name="add-video-category" id="add-video-category">
				<option value="0"><?php _e('Uncategorized','videogall'); ?></option>
				<?php
				    $categories = videogall_get_results("videogall_categories");
				    foreach($categories as $entry) {
				?>
				<option value="<?php echo $entry['id']; ?>"><?php echo ucwords($entry['name']); ?></option>
				<?php } ?>
			    </select>
                        </p>
			<p>
			    <label><?php _e('Add video thumbnail','videogall'); ?></label>
			    <input type="text" name="add-video-thumb" id="add-video-thumb" value=""/>
			    <input id="add-video-thumb_upload" type="button" class="button-secondary image_upload" value="<?php _e('Upload thumbnail','videogall'); ?>" />
			</p>
			<p>
			    <label><?php _e('Add video caption','videogall'); ?></label>
			    <input type="text" name="add-video-caption" id="add-video-caption" value=""/>
			</p>
			<p>
			    <label><?php _e('Add video description','videogall'); ?></label>
			    <textarea rows="3" cols="60" name="add-video-description" id="add-video-description"></textarea>
			</p>
			<p><?php submit_button(__('Add new video','videogall'),'primary','add-video-submit'); ?></p>
                    </div>
		    <div class="section" id="section-3">
                        <p>
			    <label><?php _e('Add category name *','videogall'); ?></label>
			    <input type="text" name="add-category-name" id="add-category-name" value=""/>
			    <?php submit_button(__('Add new category','videogall'),'primary','add-category-submit'); ?>
			</p>
			<p>
			    <label><?php _e('Update or Delete category','videogall'); ?></label>
			    <select name="update-video-category" id="update-video-category">
				<option value="0"><?php _e('Select category','videogall'); ?></option>
			    <?php
				$categories = videogall_get_results("videogall_categories");
				foreach($categories as $entry) {
			    ?>
				<option value="<?php echo $entry['id']; ?>"><?php echo $entry['name']; ?></option>
			    <?php } ?>
			    </select>
			    <span id="update-cat-section"><input type="text" name="update-category-name" id="update-category-name" value=""/><input type="submit" name="update-category-submit" id="update-category-submit" class="button-primary" value="<?php _e('Rename category','videogall') ?>"/></span>
			    <?php submit_button(__('Delete category','videogall'),'primary','delete-category-submit'); ?>
			</p>
                    </div>
		    <div class="section" id="section-4">
                        <p>
			    <label><?php _e('Number of columns','videogall'); ?></label>
			    <select name="videogall_options[number_of_columns]">
				<?php foreach (videogall_column_list() as $entry) { ?>
				    <option value="<?php echo $entry['value']; ?>" <?php selected($videogall_options['number_of_columns'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
				<?php } ?>
			    </select>
			</p>
			<p>
			    <label><?php _e('Video Size','videogall'); ?></label>
			    <select name="videogall_options[video_size]">
				<?php foreach (videogall_video_size_list() as $entry) { ?>
				    <option value="<?php echo $entry['value']; ?>" <?php selected($videogall_options['video_size'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
				<?php } ?>
			    </select>
			</p>
			<p>
			    <label><?php _e('Enable Pagination ?','videogall'); ?></label>
			    <input type="checkbox" name="videogall_options[enable_pagination]" value="false" <?php checked(true,$videogall_options['enable_pagination']); ?> />
			</p>
			<p>
			    <label><?php _e('Videos Per Page','videogall'); ?></label>
			    <input type="text" name="videogall_options[videos_per_page]" value="<?php echo esc_attr($videogall_options['videos_per_page']); ?>"/>
			</p>
			<p>
			    <label><?php _e('Show categories','videogall'); ?></label>
			    <input type="checkbox" name="videogall_options[show_categories]" value="false" <?php checked(true,$videogall_options['show_categories']); ?> />
			</p>
			<p>
			    <label><?php _e('Sort videos by category','videogall'); ?></label>
			    <input type="checkbox" name="videogall_options[sort_by_category]" value="false" <?php checked(true,$videogall_options['sort_by_category']); ?> />
			</p>
			<p>
			    <label><?php _e('Video Order','videogall'); ?></label>
			    <select name="videogall_options[video_order]">
				<?php foreach (videogall_video_order_list() as $entry) { ?>
				    <option value="<?php echo $entry['value']; ?>" <?php selected($videogall_options['video_order'], $entry['value']); ?>><?php echo $entry['label']; ?></option>
				<?php } ?>
			    </select>
			</p>
			<p>
			    <label><?php _e('Show border around thumbnail','videogall'); ?></label>
			    <input type="checkbox" name="videogall_options[enable_border]" value="false" <?php checked(true,$videogall_options['enable_border']); ?> />
			</p>
			<p>
			    <label><?php _e('Border Color','videogall'); ?></label>
			    <input type="text" class="color" name="videogall_options[border_color]" value="<?php echo esc_attr($videogall_options['border_color']); ?>"/>
			</p>
			<p>
			    <label><?php _e('Use shadowbox for images','videogall'); ?></label>
			    <input type="checkbox" name="videogall_options[shadowbox_images]" value="false" <?php checked(true,$videogall_options['shadowbox_images']); ?> />
			</p>
			<p>
			    <label><?php _e('Autoplay videos on launch ?','videogall'); ?></label>
			    <input type="checkbox" name="videogall_options[autoplay]" value="false" <?php checked(true,$videogall_options['autoplay']); ?> />
			</p>
			<?php submit_button(); ?>
                    </div>
                </div>
            </div>
        </form>
        <div class="settings-bottom-bar">
	    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" id="paypal-form">
		    <input type="hidden" name="cmd" value="_s-xclick">
		    <input type="hidden" name="hosted_button_id" value="NR5ENJ5DRLHJN">
		    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="<?php _e('PayPal - The safer, easier way to pay online!','videogall'); ?>">
		    <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	    </form>
            <form method="post" id="settings-reset-form">
                <input type="submit" class="button-secondary" name="settings-reset" id="settings-reset" value="<?php _e('Reset Settings','videogall'); ?>" />
            </form>
        </div>
    </div>
    <?php
}

/**
 * Validate theme options
 */
function videogall_validate_options($input) {
    $output = $defaults = videogall_get_default_options();

    if(isset($input['number_of_columns']) && array_key_exists($input['number_of_columns'], videogall_column_list()))
	$output['number_of_columns'] = $input['number_of_columns'];
    if(isset($input['video_size']) && array_key_exists($input['video_size'], videogall_video_size_list()))
	$output['video_size'] = $input['video_size'];
    if(isset($input['video_order']) && array_key_exists($input['video_order'], videogall_video_order_list()))
	$output['video_order'] = $input['video_order'];

    if(is_numeric($input['videos_per_page'])) {
        $output['videos_per_page'] = intval(esc_attr($input['videos_per_page']));
    } else add_settings_error('videogall_options','error',__('Videos per page should be a number','videogall'),'error');

    $output['border_color'] = esc_attr($input['border_color']);

    $chkboxinputs = array('enable_pagination','show_categories','sort_by_category','enable_border','show_facebook_like','shadowbox_images','autoplay');
    foreach($chkboxinputs as $chkbox) {
        if (!isset($input[$chkbox]))
            $input[$chkbox] = null;
        $output[$chkbox] = ($input[$chkbox] == true ? true : false);
    }

    return apply_filters('videogall_validate_options', $output, $input, $defaults);
}

/**
 * Add/Update video/categories
 */
function videogall_video_action() {
    global $videogall_url;

    if(isset($_POST['delete-id']) and trim($_POST['delete-id']) != "") {
	$delete_id = videogall_sanitize($_POST['delete-id']);
	if($delete_id != 0 and $delete_id != "") {
	    $result = videogall_bulk_delete("videogall_videos",$delete_id);
	    if(!$result) add_settings_error('videogall_options','error',__('Videos cannot be deleted','videogall'),'error');
	    else add_settings_error('videogall_options','success',__('Videos deleted','videogall'),'updated');
	}
	else add_settings_error('videogall_options','error',__('No videos selected. Select/Unselect videos to delete by clicking on them','videogall'),'error');
    }

    if(isset($_POST['edit-video-submit'])) {
        $id = videogall_sanitize($_POST['edit-id']);
        if($id != 0 and $id != "") {
            $url = videogall_process_url(esc_attr(videogall_sanitize($_POST['edit-video-url-'.$id])));
            if($url != "") {
                $thumbnail = esc_attr(videogall_sanitize($_POST['edit-video-thumb-'.$id]));
                if($thumbnail == "") $thumbnail = videogall_get_thumbnail($url);
                if($thumbnail == "") $thumbnail = $videogall_url.'images/default.png';
		if(preg_match('/blip\.tv/i',$url) > 0) $url = videogall_blip_url($url);
                $category = esc_attr(videogall_sanitize($_POST['edit-video-category-'.$id]));
                $caption = esc_attr(videogall_sanitize($_POST['edit-video-caption-'.$id]));
                $description = videogall_sanitize($_POST['edit-video-description-'.$id]);
                $update_str = "url='".$url."', thumbnail='".$thumbnail."', category='".$category."', caption='".$caption."', description='".$description."'";
                $result = videogall_update("videogall_videos",$id,$update_str);
                if(!$result) add_settings_error('videogall_options','error',__('Video not updated','videogall'),'error');
                else add_settings_error('videogall_options','success',__('Video Updated','videogall'),'updated');
            } else {
                add_settings_error('videogall_options','error',__('Name & URL are required','videogall'),'error');
            }
        }
    }

    if(isset($_POST['add-video-submit'])) {
        $url = videogall_process_url(esc_attr(videogall_sanitize($_POST['add-video-url'])));
        if($url != "") {
            $thumbnail = esc_attr(videogall_sanitize($_POST['add-video-thumb']));
            if($thumbnail == "") $thumbnail = videogall_get_thumbnail($url);
            if($thumbnail == "") $thumbnail = $videogall_url.'images/default.png';
	    if(preg_match('/blip\.tv/i',$url) > 0) $url = videogall_blip_url($url);
            $category = esc_attr(videogall_sanitize($_POST['add-video-category']));
            $caption = esc_attr(videogall_sanitize($_POST['add-video-caption']));
            $description = videogall_sanitize($_POST['add-video-description']);
            $video = array("url" => $url, "thumbnail" => $thumbnail, "category" => $category, "caption" => $caption, "description" => $description);
            $result = videogall_insert("videogall_videos",$video);
            if(!$result) add_settings_error('videogall_options','error',__('Video cannot be added','videogall'),'error');
            else add_settings_error('videogall_options','success',__('New Video Added','videogall'),'updated');
        } else {
            add_settings_error('videogall_options','error',__('URL is required','videogall'),'error');
        }
    }

    if(isset($_POST['update-category-submit'])) {
        $existing_category = videogall_sanitize($_POST['update-video-category']);
        $new_category = videogall_sanitize($_POST['update-category-name']);
        if($existing_category != "0") {
            if($new_category != "") {
                $update_str = "name = '".$new_category."'";
                $result = videogall_update("videogall_categories",$existing_category,$update_str);
                if(!$result) add_settings_error('videogall_options','error',__('Category cannot be updated','videogall'),'error');
                else add_settings_error('videogall_options','success',__('Category Updated','videogall'),'updated');
            }
        }
        else add_settings_error('videogall_options','error',__('Select category from dropdown to update','videogall'),'error');
    }

    if(isset($_POST['delete-category-submit'])) {
        $existing_category = videogall_sanitize($_POST['update-video-category']);
        if($existing_category != "0") {
            $result = videogall_delete("videogall_categories",$existing_category);
            if(!$result) add_settings_error('videogall_options','error',__('Category cannot be deleted','videogall'),'error');
            elseif($result > 0) {
                $update_str = "category = 0";
                $result = videogall_update_video_by_category($existing_category,$update_str);
                add_settings_error('videogall_options','success',__('Category deleted','videogall'),'updated');
            }
        }
    }

    if(isset($_POST['add-category-submit'])) {
        $name = videogall_sanitize($_POST['add-category-name']);
        if($name != "") {
            $category = array("name" => $name);
            $result = videogall_insert("videogall_categories",$category);
            if(!$result) add_settings_error('videogall_options','error',__('Category cannot be added','videogall'),'error');
            else add_settings_error('videogall_options','success',__('New Category Added','videogall'),'updated');
        } else {
            add_settings_error('videogall_options','error',__('Category name is required','videogall'),'error');
        }
    }
}

/**
 * Validation helper functions
 */
function videogall_validate_image_url($url) {
    $exp = "/^https?:\/\/(.)*\.(jpg|png|gif|ico)$/i";
    if(!preg_match($exp,$url))
        return false;
    else
        return true;
}

function videogall_validate_image_size($url,$width,$height) {
    $size = getimagesize($url);
    if($size[0] > $width or $size[1] > $height)
        return false;
    else
        return true;
}

function videogall_validate_number($value) {
    if(is_numeric($value) and $value > 0) {
        return true;
    } else return false;
}

/**
 * Sanitize field
 */
function videogall_sanitize($field) {
    if(isset($field) and trim($field) != "")
        return $field;
    else
        return "";
}
?>