<?php

/**
 * artrix shop Theme Customizer
 *
 * @package artrix_shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artrix_shop_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'artrix_shop_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'artrix_shop_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'artrix_shop_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function artrix_shop_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function artrix_shop_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function artrix_shop_customize_preview_js()
{
	wp_enqueue_script('artrix-shop-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'artrix_shop_customize_preview_js');


// 开启session
add_action('init', function () {
	if (!session_id()) session_start();
}, 1);

require get_template_directory() . '/inc/template-fields.php';

require get_template_directory() . '/inc/artrix-init.php';

require get_template_directory() . '/inc/artrix-helper.php';

require get_template_directory() . '/inc/post-type/blog.php';

require get_template_directory() . '/inc/post-type/download.php';

require get_template_directory() . '/inc/post-type/faq.php';

require get_template_directory() . '/inc/post-type/life.php';

require get_template_directory() . '/inc/post-type/product.php';

require get_template_directory() . '/inc/service/Cache.php';

require get_template_directory() . '/inc/service/EmailCodeService.php';

require get_template_directory() . '/inc/service/UserHandler.php';

require get_template_directory() . '/inc/admin/AdminHandler.php';

UserHandler::init();
ARTRIXAdmin\AdminHandler::init();
