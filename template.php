<?php
/**
 * Add / modify variables before the page renders.
 */

// add viewport metatag for mobile display:
function acorn_preprocess_html(&$vars) {
	$meta_viewport = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
			'name' => 'viewport',
			'content' => 'width=device-width, initial-scale=1'
		)
	);
	drupal_add_html_head($meta_viewport, 'meta_viewport');
}

// add script code for image slider:
function acorn_preprocess_page(&$vars) {
	if (in_array($vars['node']->type, array('front_page', 'home_page', 'protect_landing_page', 'support_landing_page'))) {
		drupal_add_js("jQuery(document).ready(function () {
			jQuery('.bxslider').bxSlider({
				mode: 'fade',
				speed: 1000,
				auto: true,
				autoControls: true,
				adaptiveHeight: true
			})
		});", array('type' => 'inline', 'scope' => 'header'));
	}

	// inject search_box variable back into Drupal 7
	$search_box = drupal_render(drupal_get_form('search_form'));
	$vars['search_box'] = $search_box;

}

// load newer version of jquery:
function acorn_js_alter(&$javascript) {
	$javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'acorn'). '/js/jquery.min.js';
	$javascript['misc/jquery.js']['version'] = '1.10.2';
}

// remove inline width/height attributes from images:
function acorn_preprocess_image(&$variables) {
	foreach (array('width', 'height') as $key) {
		unset($variables[$key]);
	}
}

// add caption if image has class "title-caption" and title is set
function acorn_image(&$variables) {


   $attributes = $variables['attributes'];
   $attributes['src'] = file_create_url($variables['path']);

	if (!empty($variables['attributes']['class']) && in_array('title-caption', $variables['attributes']['class']) !== false)
	{
		// wrap in a div so that caption floats with image:
		$style = $variables['attributes']['style'] . "padding-bottom: 10px";
		// $variables['attributes']['style'] = "";

	   return '<div style="' . $style . '"><img' . drupal_attributes($attributes) . ' /><span class="image-caption">' . $variables['attributes']['title'] . '</span></div>';
	}
	else
	{
	   return '<img' . drupal_attributes($attributes) . ' />';
     }

}

// render feature menu links as styled buttons:
function acorn_menu_link__menu_feature_menu(array $vars) {
	return '<div class="home-button"><a href="' . $vars['element']['#href'] . '"><span class="link-text">'
			. $vars['element']['#title'] . '</span><span class="right-arrow test"></span></a></div>';
}