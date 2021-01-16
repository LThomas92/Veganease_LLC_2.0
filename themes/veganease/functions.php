<?php
/**
 * Veganease functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Veganease
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'veganease_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function veganease_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Veganease, use a find and replace
		 * to change 'veganease' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'veganease', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails', 'full' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'veganease' ),
				'menu-2' => esc_html__( 'Secondary', 'veganease' ),
				'menu-3' => esc_html__( 'Third', 'veganease' ),
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
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'veganease_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
endif;
add_action( 'after_setup_theme', 'veganease_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function veganease_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'veganease_content_width', 640 );
}
add_action( 'after_setup_theme', 'veganease_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function veganease_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'veganease' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'veganease' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'veganease_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function veganease_scripts() {
	$manifest = json_decode(file_get_contents('dist/assets.json', true));
$main = $manifest->main;

wp_enqueue_style( 'veganease-style', get_template_directory_uri() . $main->css, false, null );

wp_enqueue_script('veganease-js', get_template_directory_uri() . $main->js, ['jquery, slick-js'], null, true);
wp_enqueue_style( 'slick-style',"//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css");
// wp_register_script( 'slick', "//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js");
// wp_enqueue_script("slick");
wp_enqueue_script('slick-js', "//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js", ['jquery'], null, true);

wp_enqueue_script('veganease-styles-js', get_template_directory_uri() . $main->js, ['jquery', 'slick-js'], null, true);
wp_style_add_data( 'veganease-style', 'rtl', 'replace' );

wp_enqueue_script( 'veganease-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'veganease_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> - <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

//LOGIN CSS

function custom_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/login/login-styles.css' );
}
add_action( 'login_enqueue_scripts', 'custom_login_stylesheet' );

function custom_login_css() {
    wp_enqueue_style('login-styles', get_template_directory_uri() . '/login/login-styles.css');
}
add_action('login_enqueue_scripts', 'custom_login_css');

//POST THUMBNAIL FUNCTION 
add_theme_support( 'post-thumbnails , full' );

if ( ! function_exists( 'woocommerce_content' ) ) {

function woocommerce_content() {

    if ( is_singular( 'product' ) ) {

        while ( have_posts() ) : the_post();

            // Template depends from category slug
        
            if ( has_term( 'my-cat-slug', 'product_cat' ) ) {

              woocommerce_get_template_part( 'content', 'single-product-dogs' );  

            } else {

              woocommerce_get_template_part( 'content', 'single-product' ); 

            }

        endwhile;

    } else { ?>

        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

            <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>

        <?php if ( have_posts() ) : ?>

            <?php do_action('woocommerce_before_shop_loop'); ?>

            <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'product' ); ?>

                <?php endwhile; // end of the loop. ?>

            <?php woocommerce_product_loop_end(); ?>

            <?php do_action('woocommerce_after_shop_loop'); ?>

        <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

            <?php wc_get_template( 'loop/no-products-found.php' ); ?>

        <?php endif;

    }
  }
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/** 
 * Enables the HTTP Strict Transport Security (HSTS) header in WordPress. 
 */
function tg_enable_strict_transport_security_hsts_header_wordpress() {
    header( 'Strict-Transport-Security: max-age=10886400' );
}
add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );
