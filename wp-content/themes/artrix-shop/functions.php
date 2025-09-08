<?php

/**
 * artrix shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package artrix_shop
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}
if (! defined('ARTRIX_THEME_URL')) {
	define('ARTRIX_THEME_URL', get_template_directory_uri());
}
if (! defined('ARTRIX_THEME_FRONT_URL')) {
	define('ARTRIX_THEME_FRONT_URL', get_template_directory_uri() . '/front-end');
}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function artrix_shop_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on artrix shop, use a find and replace
		* to change 'artrix-shop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('artrix-shop', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'head-menu' => esc_html__('Header Menu', 'artrix-shop'),
			'footer-menu' => esc_html__('Footer Menu', 'artrix-suma'),
		)
	);


	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'artrix_shop_setup');



/**
 * composer autoload
 */
require get_template_directory() . '/vendor/autoload.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
