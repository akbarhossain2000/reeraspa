<?php

function custom_metabox_for_service() {
	$s_prefix		= "_svc_";
	
	$service		= new_cmb2_box(array(
		'id'		=> $s_prefix.'sbox',
		'title'		=> __('Add services icon and subtitle', 'reera_text'),
		'object_types' => array( 'reera_service' )
	));
	
	$service->add_field(array(
		'id'		=> $s_prefix.'icon',
		'name'		=> __('Add Flat Icon', 'reera_text'),
		'desc'		=> __('add css class for service icon here!', 'reera_text'),
		'type'		=> 'text_medium'
	));
	$service->add_field(array(
		'id'		=> $s_prefix.'subtitle',
		'name'		=> __('Add Subtitle', 'reera_text'),
		'desc'		=> __('add subtitle here!', 'reera_text'),
		'type'		=> 'text_medium'
	));
}
add_filter('cmb2_meta_boxes', 'custom_metabox_for_service');


function custom_metabox_for_reera_offers() {
	$offer_prefix	= "_roff_";
	
	$offers		= new_cmb2_box(array(
		'id'		=> $offer_prefix.'ofbox',
		'title'		=> __('Add Offers price and valid till', 'reera_text'),
		'object_types'=> array('reera_offer'),
	));
	
	$offers->add_field(array(
		'id'		=> $offer_prefix.'price',
		'name'		=> __('Add offer price', 'reera_text'),
		'type'		=> 'text_medium',
		'before_field'=> 'tk ',
	));
	
	$offers->add_field(array(
		'id'		=> $offer_prefix.'date',
		'name'		=> __('Add offer expire date', 'reera_text'),
		'desc'		=> __('Click input box show calendar', 'reera_text'),
		'type'		=> 'text_date',
		'date_format' => 'Y-m-d',
	));
	
	$offers->add_field(array(
		'id'		=> $offer_prefix.'time',
		'name'		=> __('Add offer expire time', 'reera_text'),
		'desc'		=> __('Click input box show time', 'reera_text'),
		'type'		=> 'text_time',
	));
}
add_filter('cmb2_meta_boxes', 'custom_metabox_for_reera_offers');


function custom_metabox_for_reerateam() {
	$rt_prefix = "_rtm_";
	
	$rtmember	= new_cmb2_box(array(
		'title'		=> __('Add Trainer type and social link', 'reera_text'),
		'id'		=> $rt_prefix.'rtmbox',
		'object_types'=> array('reera_team'),
	));
	
	$rtmember->add_field(array(
		'name'			=> __('Trainer Type', 'reera_text'),
		'id'			=> $rt_prefix.'ttype',
		'type'			=> 'text_medium',
	));
	
	$rtmfield_group = $rtmember->add_field(
		array(
			'id'			=> $rt_prefix.'rtmgroup',
			'type'			=> 'group',
			'options'		=> array(
				'group_title'	=> __('Add Social Link', 'reera_text'),
				'sortable'		=> true,
			),
			'repeatable'	=> false,
		)
	);
	
	$rtmember->add_group_field($rtmfield_group, array(
		'name'			=> __('Facebook', 'reera_text'),
		'id'			=> $rt_prefix.'fb',
		'type'			=> 'text_url',
	));
	
	$rtmember->add_group_field($rtmfield_group, array(
		'name'			=> __('Twitter', 'reera_text'),
		'id'			=> $rt_prefix.'twt',
		'type'			=> 'text_url',
	));
	
	$rtmember->add_group_field($rtmfield_group, array(
		'name'			=> __('Linkedin', 'reera_text'),
		'id'			=> $rt_prefix.'lin',
		'type'			=> 'text_url',
	));
	
	$rtmember->add_group_field($rtmfield_group, array(
		'name'			=> __('Google-plus', 'reera_text'),
		'id'			=> $rt_prefix.'gp',
		'type'			=> 'text_url',
	));
	
}
add_filter('cmb2_meta_boxes', 'custom_metabox_for_reerateam');


function custom_metabox_for_plansPricing() {
	$pp_prefix = "_prp_";
	
	$plpricing = new_cmb2_box(array(
		'id'		=> $pp_prefix.'prpbox',
		'title'		=> __('Add Pricing Options', 'reera_text'),
		'object_types'=> array('plan_pricing'),
	));
	
	$plpricing->add_field(array(
		'name'		=> __('Add Icon Class', 'reera_text'),
		'id'		=> $pp_prefix.'cssicon',
		'type'		=> 'text_medium',
	));
	
	$plpricing->add_field(array(
		'name'		=> __('Add VAT', 'reera_text'),
		'id'		=> $pp_prefix.'vat',
		'type'		=> 'text_money',
		'before_field'=> '%',
	));
	
	$plpricing_group = $plpricing->add_field(array(
		'id'		=> $pp_prefix.'gfield',
		'desc'		=> __('', 'reera_text'),
		'type'		=> 'group',
		'options'	=> array(
				'group_title'	=> __('Add Package item {#}', 'reera_text'),
				'add_button'		=> __('Add another entry', 'reera_text'),
				'remove_button'	=> __('Remove entry', 'reera_text'),
				'sortable'		=> true,
		),
	));
	
	$plpricing->add_group_field($plpricing_group, array(
		'name'		=> __('Item Title', 'reera_text'),
		'id'		=> $pp_prefix.'itemtitle',
		'type'		=> 'text',
	));
	
	$plpricing->add_group_field($plpricing_group, array(
		'name'		=> __('Item Price', 'reera_text'),
		'id'		=> $pp_prefix.'itemprice',
		'type'		=> 'text_medium',
		'before_field'=> 'tk ',
	));
	
	$plpricing->add_group_field($plpricing_group, array(
		'name'		=> __('Short Description', 'reera_text'),
		'id'		=> $pp_prefix.'shdesc',
		'type'		=> 'textarea_small',
	));
	
	
}
add_filter('cmb2_meta_boxes', 'custom_metabox_for_plansPricing');


function custom_metabox_for_reeraBranch() {
	$rb_prefix	= "_rbranch_";
	
	$rs_branch = new_cmb2_box(array(
		'id'		=> $rb_prefix.'rbbox',
		'title'		=> __('Add Branch Info', 'reera_text'),
		'object_types'=> array('reera_branch'),
	));
	
	$rs_branch->add_field(array(
		'name'		=> __('Address', 'reera_text'),
		'id'		=> $rb_prefix.'addr',
		'type'		=> 'text',
		'default'	=> 'Dhanmondi 26th street,  Dhaka-1205',
	));
	
	$rs_branch->add_field(array(
		'name'		=> __('Phone', 'reera_text'),
		'id'		=> $rb_prefix.'phone',
		'type'		=> 'text_medium',
		'default'	=> '+880 181 111 111',
	));
	
	$rs_branch->add_field(array(
		'name'		=> __('Email', 'reera_text'),
		'id'		=> $rb_prefix.'email',
		'type'		=> 'text_email',
		'default'	=> 'abc@gmail.com',
	));
}
add_filter('cmb2_meta_boxes', 'custom_metabox_for_reeraBranch');



