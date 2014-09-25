<?php
/*
Plugin Name: VideoGall
Plugin URI: http://nischalmaniar.com/videogall
Description: Automatically generate a beautiful video gallery by adding videos from different websites
Version: 3.2
Author: Nischal Maniar
Author URI: http://www.nischalmaniar.com
*/

/*  Copyright 2009

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Defining Variables
 */
ini_set('default_socket_timeout', 10);
$videogall_url = plugin_dir_url(__FILE__);
$videogall_path = plugin_dir_path(__FILE__);
$videogall_db_version = "3.1";

/**
 * Calling required functions & pages
 */
require($videogall_path.'inc/videogall-functions.php');
require($videogall_path.'admin/plugin-options.php');
$videogall_options = videogall_get_options();

/**
 * Embedding necessary javascripts & stylesheets
 */
function videogall_enqueue_scripts() {
    global $videogall_url;
    wp_enqueue_script('jquery');
    wp_enqueue_script('videogall-js', $videogall_url.'js/videogall.js', 'jquery');
	/* No se utilizaran, el theme ya los contienen
    wp_enqueue_script('videogall-fancybox-js', $videogall_url.'inc/fancybox/jquery.fancybox.pack.js', 'jquery');
    wp_enqueue_script('videogall-fancybox-js', $videogall_url.'inc/fancybox/jquery.easing-1.3.pack.js', 'jquery');
    wp_enqueue_script('videogall-fancybox-js', $videogall_url.'inc/fancybox/jquery.mousewheel-3.0.4.pack.js', 'jquery');
    wp_enqueue_style('videogall-fancybox-css', $videogall_url.'inc/fancybox/jquery.fancybox-1.3.4.css', false, false, 'all');
	*/
    wp_enqueue_style('videogall-css', $videogall_url.'css/videogall.css', false, false, 'all');
}
add_action('wp_enqueue_scripts', 'videogall_enqueue_scripts');

/**
 * Activating Shadowbox
 */
function videogall_shadowbox_init() {
    global $videogall_options;
    $video_size = explode("|",$videogall_options['video_size']);
    $video_width  = $video_size[0];
    $video_height = $video_size[1];
    echo '<script type="text/javascript">
        $(document).ready(function() { alert("Hola");
            $("a[rel=\"videogalls\"]").fancybox({
                "speedIn": 600, 
				"speedOut": 200,
                "showNavArrows": false,
                "overlayOpacity": 0.4,
                "overlayColor": "#000",
                "width": '.$video_width.',
                "height": '.$video_height.',
                "swf": {"allowfullscreen":"true"}
            });
        });
    </script>'."\n";
}
/*
Se elimina ya que el theme hace la funcion
add_action('wp_head','videogall_shadowbox_init');
*/

/**
 * Display VideoGall Gallery
 */
function videogall_display_videos($category_filter = "", $isWidget = false, $number_of_videos = "") {
    global $videogall_options, $videogall_url;    
    $filter_value = "";
    /* Create category filter */
    if(trim($category_filter) != "" and !$isWidget) {
        if(preg_match('/,/',$category_filter)) {
            $category_filter = rtrim($category_filter,",");
            $categories = explode(",",$category_filter);
            $first = true;
            foreach($categories as $entry) {
                $catid = videogall_get_category_id($entry);
                if($first) $filter_value .= $catid; else $filter_value .= ",".$catid;
                $first = false;
            }
        } else {
            $catid = videogall_get_category_id($category_filter);
            $filter_value = $catid;
        }
    } elseif(trim($category_filter) != "" and $isWidget) {
        $filter_value = $category_filter;
    }
    /* Sorts Videos */
    if($videogall_options['video_order'] == "new_to_old")
        $order_filter = "id desc";
    else
        $order_filter = "id asc";
    if($videogall_options['sort_by_category']) $order_filter = "category asc, ".$order_filter;
    /* Fetching videos from DB */
    $videos = videogall_get_videos_by_categories($filter_value,$order_filter,20);
    $output = '';
    $page_count = 1;
    $video_count = 1;
    $total_videos = count($videos);
    foreach($videos as $entry) {
        $output .= '<div id="videogall-item-'.$entry['id'].'" class="videogall-item videogall-page-item-'.$page_count.'">'."\n";
        if($videogall_options['autoplay']) {
            if(preg_match('/metacafe/i',$entry['url'])) $autoplay = 'ap=1'; elseif(preg_match('/blip/i',$entry['url'])) $autoplay = 'autoplay=true'; else $autoplay = 'autoplay=1';
            if(preg_match('/\?/',$entry['url']))
                $entry['url'] .= '&'.$autoplay; else $entry['url'] .= '?'.$autoplay;
        }
        $output .= "\t".'<a class="videogall-img-link iframe" rel="videogall" href="'.$entry['url'].'" >'."\n";
        $output .= "\t\t".'<div class="videogall-thumb-box"><img class="videogall-thumb" src="'.$entry['thumbnail'].'"/></div>'."\n";
        $output .= "\t".'</a>'."\n";

        if($entry['caption'] != "")
            $output .= "\t".'<p>'.$entry['caption'];
        if($entry['description'] != "" and !$isWidget)
            $output .= '<br><span>'.$entry['description'].'</span></p>'."\n";
			else{ $output .= '</div>'."\n"; }

        if($videogall_options['show_categories'] != "" and $entry['category'] != "0" and !$isWidget)
            $output .= "\t".'<p class="videogall-category">'.__('Category: ','videogall').ucwords(videogall_get_category_name_by_id($entry['category'])).'</p>'."\n";
		
        /*if(trim($entry['likes']) == "") $likes = 0; else $likes = count(explode(",",$entry['likes']));
        $output .= "\t".'<div class="videogall-meta" id="videogall-meta-'.$entry['id'].'"><a class="videogall-like" href="'.admin_url('admin-ajax.php').'">'.$likes.'</a></div>'."\n";
		*/
        $output .= '</div>'."\n";

        if($video_count % $videogall_options['videos_per_page'] == 0 and $video_count < $total_videos) $page_count++;
        $video_count++;
        if($number_of_videos != "") {
            if($video_count == $number_of_videos) break;
        }
    }
    if($output != "") {
        $output = '<div class="videogall-title">Videos 
				<input type="hidden" id="videogall-current-page" value="videogall-page-1">
				<div class="videogall-next" id="videogall-page-2"></div>
				<div class="videogall-prev" id="videogall-page-1"></div></div>
				<div id="videogall-container">'.$output.'</div>'."\n";
    }
    if($output != "" and $videogall_options['enable_pagination'] and !$isWidget) {
        $output .= '<div class="videogall-page-navigation">'."\n";
       /* for($p = 1; $p <= $page_count; $p++) {
            if($p == 1) $current_class = ' current_page'; else $current_class = '';
            $output .= "\t".'<a id="videogall-page-'.$p.'" class="videogall-page'.$current_class.'" href="javascript:void(0)">'.$p.'</a>';
        }*/
        $output .= '</div><br>'."\n";;
    }
	
    return $output;
}

/**
 * Updating Likes
 */
function videogall_update_likes() {
    $id = trim($_POST['id']);
    $clientip = $_SERVER['REMOTE_ADDR'];
    $current_video = videogall_get_results("videogall_videos","id",$id);
    $likes = "";
    foreach($current_video as $current_entry) {
        $likes = $current_entry['likes'];
        break;
    }
    $current_likes = explode(",",$likes);
    $new_likes = $current_likes;
    if(!in_array($clientip,$current_likes)) {
        array_push($new_likes,$clientip);
    }
    $like_str = trim(implode(",",$new_likes),",");
    $count = 0;
    foreach($new_likes as $like_entry) if(trim($like_entry) != "") $count++;

    $update_str = "likes='".$like_str."'";
    $result = videogall_update("videogall_videos",$id,$update_str);
    echo $count;
    die();
}
add_action('wp_ajax_nopriv_update_likes', 'videogall_update_likes');
add_action('wp_ajax_update_likes', 'videogall_update_likes');

/**
 * Additional Settings
 */
function videogall_additional_styling() {
    global $videogall_options;
    $output = '<style type="text/css">'."\n";
    $output .= "\t".'.videogall-item { width: '.(floor(100/$videogall_options['number_of_columns']) - 2).'%; }'."\n";
    if($videogall_options['enable_pagination']) {
        $output .= "\t".'.videogall-item { display: none; }'."\n";
        $output .= "\t".'.videogall-page-item-1 { display: min-height: 1px; display: -moz-inline-stack; display: inline-block; vertical-align: top; zoom: 1; *display: inline; _height: 1px; }'."\n";
    }
    if($videogall_options['enable_border']) {
        $output .= "\t".'.videogall-thumb { border: 5px #'.$videogall_options['border_color'].' solid !important;  -moz-box-shadow: 0 0 1px rgba(0,0,0,0.5); -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.5); box-shadow: 0 0 1px rgba(0,0,0,0.5); }'."\n";
    }
    $output .= '</style>'."\n";
    echo $output;
}
add_action('wp_head','videogall_additional_styling');

/**
 * Filter Shortcode
 */
function videogall_filter($content) {
    preg_match_all('/\[myvideogall:(.*)\]/',$content,$matches);
    for($i = 0; $i < count($matches[0]); $i++) {
        $shortcodestr = explode(":",$matches[0][$i]);
        $category = str_replace(']','',$shortcodestr[1]);
        if(preg_match('/all/i',$category)) $filter = ''; else $filter = $category;
        $content = str_ireplace("[myvideogall:$category]", videogall_display_videos($filter), $content);
    }
    return $content;
}
add_filter('the_content','videogall_filter');

/**
 * Adding Shadowbox Rel attribute to Images
 */
function videogall_add_image_shadowbox ($content) {
    global $videogall_options, $post;
    if($videogall_options['shadowbox_images']) {
        $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
        $replacement = '<a$1href=$2$3.$4$5 rel="videogall"$6>$7</a>';
        $content = preg_replace($pattern, $replacement, $content);
    }
    return $content;
}
add_filter('the_content','videogall_add_image_shadowbox');

/**
 * Activating the widget
 */
function videogall_activate_widget() {
    global $videogall_path;
    require($videogall_path.'inc/videogall-widget.php');
}
add_action('widgets_init','videogall_activate_widget');

/**
 * Shortcode functions
 */
function videogall_add_shortcode() {
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'videogall_add_shortcode_plugin');
        add_filter('mce_buttons', 'videogall_register_shortcode');
    }
}

function videogall_register_shortcode($buttons) {
    array_push($buttons,"videogall");
    return $buttons;
}

function videogall_add_shortcode_plugin($plugin_array) {
    global $videogall_url;
    $plugin_array['videogall'] = $videogall_url.'js/videogall-shortcodes.js';
    return $plugin_array;
}
add_action('init','videogall_add_shortcode');

/* Making Plugin Translation Ready */
load_theme_textdomain('videogall', $videogall_path.'languages' );
?>