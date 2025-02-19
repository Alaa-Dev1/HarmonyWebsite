<?php

add_theme_support('menus');
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
add_theme_support('custom-logo', array(
	'height'      => 256,
	'width'       => 256,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array('site-title', 'site-description'),
));

function load_css()
{
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/rtl/bootstrap.min.css');
	wp_enqueue_style('bootstrap');

	wp_register_style('style', get_template_directory_uri() . '/style.css', array(), filemtime(get_template_directory() . '/style.css'));
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', '', 4, true);
	wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

function add_fonts()
{
	wp_register_style('font', get_template_directory_uri() . '/css/fonts/open-sans/OpenSansHebrew-Regular.ttf');
	wp_enqueue_style('font');
}
add_action('wp_enqueue_scripts', 'add_fonts');

function register_menu()
{
	register_nav_menu('header-menu', __('Header Menu'));
	register_nav_menu('header-menu2', __('Secondary Header Menu'));
	register_nav_menu('footer-menu', __('Footer Menu'));
	register_nav_menu('legal-menu', __('Legal Menu'));
}
add_action('init', 'register_menu');



if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Website Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Home Settings',
		'menu_title'	=> 'Home',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}

function get_dir($dir = 'nodir')
{
	if ($dir == 'nodir') {
		$tdir = get_template_directory_uri() . '/';
	} else {
		$tdir = get_template_directory_uri() . '/' . $dir;
	}
	return $tdir;
}
function get_img($file = '', $class = '', $alt = '')
{
	$img = get_dir('images/' . $file);
	$img = '<img src="' . $img . '" class="' . $class . '" alt="' . $alt . '"/>';
	return $img;
}
function trunc($phrase, $max_words)
{
	$phrase = strip_shortcodes($phrase);
	$phrase = strip_tags($phrase);
	$phrase_array = explode(' ', $phrase);
	if (count($phrase_array) > $max_words && $max_words > 0)
		$phrase = implode(' ', array_slice($phrase_array, 0, $max_words)) . '...';
	return $phrase;
}

// Register "Projects" Custom Post Type
function create_projects_cpt()
{
	$labels = array(
		'name'          => _x('Projects', 'Post Type General Name', 'textdomain'),
		'singular_name' => _x('Project', 'Post Type Singular Name', 'textdomain'),
		'menu_name'     => __('Projects', 'textdomain'),
		'all_items'     => __('All Projects', 'textdomain'),
		'add_new_item'  => __('Add New Project', 'textdomain'),
		'edit_item'     => __('Edit Project', 'textdomain'),
		'view_item'     => __('View Project', 'textdomain'),
		'search_items'  => __('Search Projects', 'textdomain'),
	);

	$args = array(
		'label'              => __('Projects', 'textdomain'),
		'description'        => __('Projects Custom Post Type', 'textdomain'),
		'labels'             => $labels,
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
		'taxonomies'         => array(), // 🔹 Removed 'category' and 'post_tag'
		'hierarchical'       => false,
		'public'             => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-portfolio',
		'show_in_admin_bar'  => true,
		'show_in_nav_menus'  => true,
		'can_export'         => true,
		'has_archive'        => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type'    => 'post',
		'show_in_rest'       => true, // Enable for Gutenberg editor
	);

	register_post_type('projects', $args);
}
add_action('init', 'create_projects_cpt');
function create_project_taxonomy()
{
	$labels = array(
		'name'              => _x('Project Categories', 'taxonomy general name', 'textdomain'),
		'singular_name'     => _x('Project Category', 'taxonomy singular name', 'textdomain'),
		'search_items'      => __('Search Project Categories', 'textdomain'),
		'all_items'         => __('All Project Categories', 'textdomain'),
		'parent_item'       => __('Parent Project Category', 'textdomain'),
		'parent_item_colon' => __('Parent Project Category:', 'textdomain'),
		'edit_item'         => __('Edit Project Category', 'textdomain'),
		'update_item'       => __('Update Project Category', 'textdomain'),
		'add_new_item'      => __('Add New Project Category', 'textdomain'),
		'new_item_name'     => __('New Project Category Name', 'textdomain'),
		'menu_name'         => __('Project Categories', 'textdomain'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array('slug' => 'project-category'),
		'show_in_rest'      => true, // Enable for Gutenberg editor
	);

	register_taxonomy('project-category', array('projects'), $args);
}
add_action('init', 'create_project_taxonomy');


function allow_svg_uploads($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

// Fixes SVG display in Media Library
function fix_svg_display()
{
	echo '<style>
        td.media-icon img[src$=".svg"], img[src$=".svg"] {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_display');
