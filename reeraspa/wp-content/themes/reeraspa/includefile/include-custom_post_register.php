<?php
/**
*	Plugin Name: Custom Post Type
**/

class custom_type_loaded {

	function custom_slider_post_type() {
		register_post_type('reera_slider', array(
			'label'			=> __('Reera Slider', 'reera_text'),
			'public'		=> false,
			'show_ui'		=> true,
			'capability_type'=> 'post',
			'supports'		=> array('title', 'thumbnail'),
		));
	}
	
	function custom_service_post_type() {
		register_post_type('reera_service', array(
			'label'		=> __('Services', 'reera_text'),
			'public'	=> false,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'editor', 'thumbnail'),
		));
	}
	function custom_offer_post_type() {
		register_post_type('reera_offer', array(
			'label'		=> __('Promotional Offers', 'reera_text'),
			'public'	=> false,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'editor', 'thumbnail'),
		));
	}
	
	function custom_TeamMember_post_type() {
		register_post_type('reera_team', array(
			'label'		=> __('Team Member', 'reera_text'),
			'public'	=> false,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'editor', 'thumbnail'),
		));
	}
	
	function custom_plansprice_post_type() {
		register_post_type('plan_pricing', array(
			'label'		=> __('Plans and Pricing', 'reera_text'),
			'public'	=> true,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'editor'),
		));
	}
	
	function custom_rsSlider_post_type() {
		register_post_type('middle_slider', array(
			'label'		=> __('Middle Slider', 'reera_text'),
			'public'	=> false,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'thumbnail'),
		));
	}
	
	function custom_branches_post_type() {
		register_post_type('reera_branch', array(
			'label'		=> __('Branch', 'reera_text'),
			'public'	=> false,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'editor', 'thumbnail'),
		));
	}
	
	function custom_skillExperience_post_type() {
		register_post_type('skill_experience', array(
			'label'		=> __('Skill & Experience', 'reera_text'),
			'public'	=> false,
			'show_ui'	=> true,
			'capability_type'	=> 'post',
			'supports'	=> array('title', 'editor'),
		));
	}
	
}
add_action('init', array('custom_type_loaded', 'custom_slider_post_type'));
add_action('init', array('custom_type_loaded', 'custom_service_post_type'));
add_action('init', array('custom_type_loaded', 'custom_offer_post_type'));
add_action('init', array('custom_type_loaded', 'custom_TeamMember_post_type'));
add_action('init', array('custom_type_loaded', 'custom_plansprice_post_type'));
add_action('init', array('custom_type_loaded', 'custom_rsSlider_post_type'));
add_action('init', array('custom_type_loaded', 'custom_branches_post_type'));
add_action('init', array('custom_type_loaded', 'custom_skillExperience_post_type'));


/*===== Gallery Custom Type =====*/
class custom_gallery_post_type_loaded {
	
	function __construct() {
	
		add_action('restrict_manage_posts', array(__CLASS__, 'restrict_gallery_by_gallery_category'));
		add_action('init', array(__CLASS__, 'register_gallery_post_type'));
		add_action('init', array(__CLASS__, 'gallery_category_taxonomy'));
		add_filter('manage_gallery_post_posts_columns', array(__CLASS__, 'add_gallery_category_column_to_gallery_list'));
		add_action('manage_posts_custom_column', array(__CLASS__, 'show_gallery_categories_column_for_gallery_list'),10,2);
	}
	
	function restrict_gallery_by_gallery_category() {
		global $typenow;
		global $wp_query;
		if ($typenow=='gallery_post') {
			$taxonomy = 'gallery_category';
			$video_taxonomy = get_taxonomy($taxonomy);
			wp_dropdown_categories(array(
				'show_option_all' =>  __("All {$video_taxonomy->label}"),
				'taxonomy'        =>  $taxonomy,
				'name'            =>  'gallery_category',
				'orderby'         =>  'name',
				'selected'        =>  $wp_query->query['term_id'],
				'hierarchical'    =>  true,
				'depth'           =>  3,
				'show_count'      =>  true, // Show # video in parens
				'hide_empty'      =>  false,
			));
		}
	}

	
	function register_gallery_post_type() {
		register_post_type('gallery_post', array(
			'label'		=> __('Gallery', 'ss_text'),
			'public'	=> true,
			'publicly_queryable'	=> true,
			'show_ui'	=> true,
			'query_var' => true,
			'has_archive'	=> true,
			//'rewrite'	=> array( 'slug' => 'gallery' ),
			'capability_type'	=> 'post',
			'hierarchical'	=> false,
			'supports'	=> array('title', 'editor', 'thumbnail', 'author', 'comments'),
		));
	}


	
	function gallery_category_taxonomy() {
		register_taxonomy('gallery_category', array('gallery_post'), array(
			'label'		=> __('Gallery Category', 'ss_text'),
			'public'	=> true,
			'hierarchical'	=> true,
			'show_ui'	=> true,
			'query_var'	=> true,
		));
	}


	
	function add_gallery_category_column_to_gallery_list( $posts_columns ) {
		if (!isset($posts_columns['author'])) {
			$new_posts_columns = $posts_columns;
		} else {
			$new_posts_columns = array();
			$index = 0;
			foreach($posts_columns as $key => $posts_column) {
				if ($key=='author') {
				$new_posts_columns['gallery_categories'] = null;
				}
				$new_posts_columns[$key] = $posts_column;
			}
		}
		$new_posts_columns['gallery_categories'] = 'Categories';
		return $new_posts_columns;
	}

	
	function show_gallery_categories_column_for_gallery_list( $column_id,$post_id ) {
		global $typenow;
		if ($typenow=='gallery_post') {
			$taxonomy = 'gallery_category';
			switch ($column_id) {
			case 'gallery_categories':
				$gallery_categories = get_the_terms($post_id,$taxonomy);
				if (is_array($gallery_categories)) {
					foreach($gallery_categories as $key => $gcategory) {
						$edit_link = get_term_link($gcategory,$taxonomy);
						$gallery_categories[$key] = '<a href="'.$edit_link.'">' . $gcategory->name . '</a>';
					}
					echo implode(' | ',$gallery_categories);
				}
				break;
			}
		}
	}
		
}
$gallery = new custom_gallery_post_type_loaded('__construct');
