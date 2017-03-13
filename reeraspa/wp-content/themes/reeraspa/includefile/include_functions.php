<?php

function topViewPost($postID){
	$countKey		= '_wpb_post_views_count';
	$count			= get_post_meta($postID, $countKey, true);
	if($count==''){
		$count = 1;
		delete_post_meta($postID, $countKey);
		add_post_meta($postID, $countKey, '1');
	}else{
		$count++;
		update_post_meta($postID, $countKey, $count);
	}
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_get_post_views($postID){
	    $count_key = '_wpb_post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
}