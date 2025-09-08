<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artrix_shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta name="author" content="artrixglobal.com" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="renderer" content="webkit" />
	<meta name="screen-orientation" content="portrait" />
	<meta name="x5-orientation" content="portrait" />
	<meta name="format-detection" content="telephone=no,email=no,address=no" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=3, shrink-to-fit=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo ARTRIX_THEME_FRONT_URL ?>/assets/images/favicon.png" />
	<link rel="stylesheet" href="<?php echo ARTRIX_THEME_FRONT_URL ?>/styles/main.css?v=2db">
	<link rel="stylesheet" href="<?php echo ARTRIX_THEME_FRONT_URL ?>/styles/webfont.css?2a3">
	<?php wp_head(); ?>
</head>

<?php global $body_class, $body_attr; ?>

<body class="<?php echo $body_class ?? '' ?>" <?php echo $body_attr ?? '' ?>>
	<input type="hidden" name="lang" value="en" id="lang">
	<div class="wrapper overflow-hidden new-nav-page">
		<?php include get_template_directory() . "/template-parts/nav.php"; ?>