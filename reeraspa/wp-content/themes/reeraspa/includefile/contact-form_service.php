<?php

function ses_add_service_list_to_contact_form ( $tag, $unused ) {  
  
    if ( $tag['name'] != 'service-list' )  
        return $tag;  
  
    $args = array ( 'post_type' => 'plan_pricing', 
                    'orderby' => 'title',  
                    'order' => 'DESC' );
    $plugins = get_posts($args);  
  
    if ( ! $plugins )  
        return $tag;  
  
    foreach ( $plugins as $plugin ) {  
        $tag['raw_values'][] = $plugin->post_title;  
        $tag['values'][] = $plugin->post_title;  
        $tag['labels'][] = $plugin->post_title;  
        /* $tag['pipes']->pipes[] = array ( 'before' => $plugin->post_title, 'after' => $plugin->post_title);  */ 
    }  
  
    return $tag;  
}  
add_filter( 'wpcf7_form_tag', 'ses_add_service_list_to_contact_form', 10, 2);