<?php
/* == Videogall DB Functions == */

function videogall_db_install() {
    global $videogall_db_version;
    global $wpdb;
    $video_table = $wpdb->prefix."videogall_videos";
    $video_category_table = $wpdb->prefix."videogall_categories";
    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    $sql = "CREATE TABLE $video_table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        url longtext NOT NULL,
        thumbnail longtext,
        category mediumint(9) NOT NULL,
        caption longtext,
        description longtext,
        likes longtext,
        UNIQUE KEY id (id)
    );";
    dbDelta($sql);

    $sql = "CREATE TABLE $video_category_table (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        UNIQUE KEY id (id)
    );";
    dbDelta($sql);
    add_option("videogall_db_version", $videogall_db_version);
}
register_activation_hook(__FILE__,'videogall_db_install');

function videogall_db_updgrade() {
    global $videogall_db_version;
    global $wpdb;
    $video_table = $wpdb->prefix."videogall_videos";
    $video_category_table = $wpdb->prefix."videogall_categories";
    if(get_option("videogall_db_version") != $videogall_db_version) {
        require_once(ABSPATH.'wp-admin/includes/upgrade.php');
        $sql = "CREATE TABLE $video_table (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            url longtext NOT NULL,
            thumbnail longtext,
            category mediumint(9) NOT NULL,
            caption longtext,
            description longtext,
            likes longtext,
            UNIQUE KEY id (id)
        );";
        dbDelta($sql);

        $sql = "CREATE TABLE $video_category_table (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(100) NOT NULL,
            UNIQUE KEY id (id)
        );";
        dbDelta($sql);
        update_option("videogall_db_version", $videogall_db_version);
    }
}
add_action('plugins_loaded', 'videogall_db_updgrade');

function videogall_migrate() {
    $current_videos = get_option('videogall_videos');
    $current_categories = get_option('videogall_categories');
    if(!empty($current_categories)) {
        foreach($current_categories as $entry) {
            $category = array(
                'name' => $entry
            );
	    videogall_insert("videogall_categories",$category);
        }
        delete_option('videogall_categories');
    }
    if(!empty($current_videos)) {
        foreach($current_videos as $entry) {
	    $catid = videogall_get_category_id($entry['category']);
	    if($catid < 1) $catid = 0;
            $video = array(
                'url' => $entry['url'],
                'thumbnail' => $entry['thumbnail'],
                'category' => $catid,
                'caption' => $entry['caption'],
                'description' => $entry['description']
            );
	    videogall_insert("videogall_videos",$video);
        }
        delete_option('videogall_videos');
    }
}
add_action('plugins_loaded', 'videogall_migrate');

function videogall_insert($table,$row = array()) {
    global $wpdb;
    $table = $wpdb->prefix.$table;
    $result = $wpdb->insert($table,$row);
    return $result;
}

function videogall_update($table,$id,$update_str) {
    global $wpdb;
    $table = $wpdb->prefix.$table;
    $sql = "UPDATE $table SET $update_str WHERE id = $id";
    $result = $wpdb->query($sql);
    return $result;
}

function videogall_update_video_by_category($category_id,$update_str) {
    global $wpdb;
    $table = $wpdb->prefix."videogall_videos";
    $sql = "UPDATE $table SET $update_str WHERE category = $category_id";
    $result = $wpdb->query($sql);
    return $result;
}

function videogall_delete($table,$id) {
    global $wpdb;
    $table = $wpdb->prefix.$table;
    $sql = "DELETE FROM $table WHERE id = $id";
    $result = $wpdb->query($sql);
    return $result;
}

function videogall_bulk_delete($table,$id) {
    global $wpdb;
    $table = $wpdb->prefix.$table;
    $sql = "DELETE FROM $table WHERE id in ($id)";
    $result = $wpdb->query($sql);
    return $result;
}

function videogall_get_results($table,$filter_field = "", $filter_value = "") {
    global $wpdb;
    $table = $wpdb->prefix.$table;
    if(trim($filter_field) != "" and trim($filter_value) != "") {
        if(is_int($filter_field)) $filter = " WHERE ".$filter_field." = ".$filter_value;
        else $filter = " WHERE upper(".$filter_field.") = '".strtoupper($filter_value)."'";
    } else $filter = "";
    return $wpdb->get_results("SELECT * FROM $table$filter",ARRAY_A);
}

function videogall_get_videos_by_categories($filter_value = "", $order_value = "", $limit_value = "") {
    global $wpdb;
    $table = $wpdb->prefix."videogall_videos";  
    if(trim($order_value) != "") $order_value = " ORDER BY ".$order_value;
	if(trim($limit_value) != "") $limit_value = " LIMIT 0,".$limit_value;
    if($filter_value != "")
        return $wpdb->get_results("SELECT * FROM $table WHERE category in ($filter_value)$order_value$limit_value",ARRAY_A);
    else
        return $wpdb->get_results("SELECT * FROM $table$order_value",ARRAY_A);
}

function videogall_get_category_id($name) {
    global $wpdb;
    $table = $wpdb->prefix."videogall_categories";
    $row = $wpdb->get_row("SELECT id FROM $table WHERE upper(name) = '".strtoupper($name)."'",ARRAY_A);
    return $row['id'];
}

function videogall_get_category_name_by_id($id) {
    global $wpdb;
    $table = $wpdb->prefix."videogall_categories";
    $row = $wpdb->get_row("SELECT name FROM $table WHERE id = ".$id,ARRAY_A);
    return $row['name'];
}

/* == Videogall Video Processing Functions == */

function videogall_process_url($url) {
    $url = rtrim($url,'\/');
    $newurl = $url;
    // YouTube
    if(preg_match('/youtube\.com\/watch/i',$url) > 0) {
        $pos1 = strpos($url,"v=");
        $pos1 = $pos1 + 2;
        $id = substr($url,$pos1,11);
        $newurl = "http://www.youtube.com/v/".$id;
    } elseif(preg_match('/youtube\.com\/embed/i',$url) > 0) {
        $pos1 = strpos($url,"embed");
        $pos1 = $pos1 + 6;
        $id = substr($url,$pos1,11);
        $newurl = "http://www.youtube.com/v/".$id;
    } elseif(preg_match('/youtu\.be/i',$url) > 0) {
        $id = str_replace('http://youtu.be/','',$url);
        $newurl = "http://www.youtube.com/v/".$id;
    } elseif(preg_match('/youtube.com/',$url)) {
        $newurl = $url;
    }
    // Metacafe
    elseif(preg_match('/metacafe\.com\/watch\//i',$url) > 0) {
        $url = str_replace('/watch/','/fplayer/',$url);
        $newurl = $url.'.swf';
    }
    // Dailymotion
    elseif(preg_match('/dailymotion\.com\/video/i',$url) > 0) {
        $pos1 = strpos($url,"#");
        if($pos1 != false) {
            $substr = substr($url,$pos1);
            $url = str_replace($substr,"",$url);
        }
        $newurl = str_replace('video','embed/video',$url);
    }
    // Vimeo
    elseif(preg_match('/vimeo\.com/i',$url) > 0) {
        $url = rtrim($url,"/");
	$pos1 = strrpos($url,"/");
	$id = substr_replace($url,'',0,$pos1+1);
        $newurl = "http://player.vimeo.com/video/".$id;
    }
    return $newurl;
}

function videogall_blip_url($url) {
    if(preg_match('/blip\.tv/i',$url) > 0) {
	$newurl = videogall_process_content($url);
	$pos1 = strpos($newurl,"&");
	$newurl = substr($newurl,0,$pos1);
        return videogall_process_content($newurl);
    } else return $url;
}

function videogall_process_content($url) {
    $url = rtrim($url,'\/');
    $newurl = $url;
    if(get_http_response_code($url)) {
        $content = file_get_contents($url);
        if(preg_match('/<iframe/i',$content)) {
            preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $content, $matches);
            if($matches[1] != "")
                $newurl = $matches[1];
            else $newurl = $url;
        } elseif(preg_match('/<embed/i',$content)) {
            preg_match('/<embed.*src=\"(.*)\".*><\/embed>/isU', $content, $matches);
            if($matches[1] != "")
                $newurl = $matches[1];
            else $newurl = $url;
        }
    }
    return $newurl;
}

function videogall_get_thumbnail($url) {
    global $videogall_url;
    $url = rtrim($url,'\/');
    $thumb = $videogall_url.'/images/default.png';
    if(preg_match('/youtube.com\/v/i',$url) > 0) {
        $pos1 = strpos($url,"v/");
        $pos1 = $pos1 + 2;
        $id = substr($url,$pos1,11);
        $thumb = "http://img.youtube.com/vi/".$id."/0.jpg";
    } elseif(preg_match('/metacafe.com\/fplayer/i',$url) > 0) {
        $url = str_replace("http://www.metacafe.com/fplayer/","",$url);
        $substr = substr($url,0,7);
        $thumb = "http://www.metacafe.com/thumb/".$substr.".jpg";
    } elseif(preg_match('/dailymotion/i',$url) > 0) {
        $thumb = str_replace('embed/video','thumbnail/video',$url);
    } elseif(preg_match('/vimeo/i',$url) > 0) {
        $url = rtrim($url,"/");
	$pos1 = strrpos($url,"/");
	$id = substr_replace($url,'',0,$pos1+1);
        if(get_http_response_code("http://vimeo.com/api/v2/video/".$id.".php")) {
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".$id.".php"));
            $thumb = $hash[0]['thumbnail_large'];
        } else $thumb = $videogall_url.'images/default.png';
    } elseif(preg_match('/blip/i',$url) > 0) {
	if(get_http_response_code($url)) {
	    preg_match('/<meta property="og:image"(.+)content="(.+)"\/>/', file_get_contents($url), $matches);
	    $thumb = $matches[2];
	} else $thumb = $videogall_url.'images/default.png';
    } else {
        $thumb = $videogall_url.'images/default.png';
    }
    return $thumb;
}

function get_http_response_code($url) {
    $headers = get_headers($url);
    if(stripos($headers[0], '40') !== false || stripos($headers[0], '50') !== false)
        return false;
    else return true;
}
?>