<?php
/**
 * Theme basic setup
 *
 * @package Freshshop
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'freshshop_setup' );

if ( ! function_exists( 'freshshop_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function freshshop_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on freshshop, use a find and replace
		 * to change 'freshshop' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'freshshop', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'freshshop' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'gallery',
				'video',
				'quote',
				'link',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'freshshop_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Set up the WordPress Theme logo feature.
		add_theme_support( 'custom-logo' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

        // For woocommerce support
        add_theme_support('woocommerce');
	}
}

///// add stylesheet and scripts file
add_action('wp_enqueue_scripts', 'freshshop_scripts_call');
function freshshop_scripts_call(){
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
    wp_enqueue_style('main', get_theme_file_uri('/css/style.css'));
    wp_enqueue_style('responsive', get_theme_file_uri('/css/responsive.css'));
    wp_enqueue_style('poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800');
    wp_enqueue_style('Dosis-font', 'https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700');

	wp_enqueue_style('stylesheet', get_stylesheet_uri());

	/////////// Js files
	wp_enqueue_script('proper', get_theme_file_uri('/js/popper.min.js'), array('jquery'), '', true);
	wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap.min.js'), array('jquery' ,'proper'), '', true);
	wp_enqueue_script('super-slider', get_theme_file_uri('/js/jquery.superslides.min.js'), array('jquery'), '', true);
	wp_enqueue_script('bootstrap-select', get_theme_file_uri('/js/bootstrap-select.js'), array('jquery'), '', true);
	wp_enqueue_script('inews-sticker', get_theme_file_uri('/js/inewsticker.js'), array('jquery'), '', true);
	wp_enqueue_script('bootnav', get_theme_file_uri('/js/bootsnav.js'), array('jquery'), '', true);
	wp_enqueue_script('imageloaded', get_theme_file_uri('/js/images-loded.min.js'), array('jquery'), '', true);
	wp_enqueue_script('isotope', get_theme_file_uri('/js/isotope.min.js'), array('jquery'), '', true);
	wp_enqueue_script('owl-carousel', get_theme_file_uri('/js/owl.carousel.min.js'), array('jquery'), '', true);
	wp_enqueue_script('baguetteBox', get_theme_file_uri('/js/baguetteBox.min.js'), array('jquery'), '', true);
	wp_enqueue_script('form-validator', get_theme_file_uri('/js/form-validator.min.js'), array('jquery'), '', true);
	wp_enqueue_script('custom', get_theme_file_uri('/js/custom.js'), array('jquery'), '', true);
}