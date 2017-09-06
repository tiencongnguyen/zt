<?php
/**
 * Zorrataa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 */

/**
 * Zorrataa only works in TienCongNguyen 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various TienCongNguyen features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zorrataa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at TienCongNguyen.org. See: https://translate.wordpress.org/projects/wp-themes/zorrataa
	 * If you're building a theme based on Zorrataa, use a find and replace
	 * to change 'zorrataa' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'zorrataa' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let TienCongNguyen manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect TienCongNguyen to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'zorrataa-featured-image', 1920, 475, true );
	add_image_size( 'zorrataa-thumbnail-avatar', 480, 321, true );
	add_image_size( 'zorrataa-thumbnail-image', 160, 160, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'zorrataa' )
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 112,
		'height'      => 58,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', zorrataa_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'footer-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'footer-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'footer-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'zorrataa' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'zorrataa' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'zorrataa' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'zorrataa' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'zorrataa' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Zorrataa array of starter content.
	 *
	 * @since Zorrataa 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'zorrataa_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'zorrataa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zorrataa_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( zorrataa_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'footer-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Zorrataa content width of the theme.
	 *
	 * @since Zorrataa 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'zorrataa_content_width', $content_width );
}
add_action( 'template_redirect', 'zorrataa_content_width', 0 );

/**
 * Register custom fonts.
 */
function zorrataa_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'zorrataa' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Zorrataa 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function zorrataa_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'zorrataa-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'zorrataa_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zorrataa_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer sidebar', 'zorrataa' ),
		'id'            => 'footer-sidebar',
		'description'   => __( 'Các liên kết về thông tin cửa hàng, bên phải logo.', 'zorrataa' ),
		'before_widget' => '<div id="%1$s" class="desktop-3 tablet-half mobile-half %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Thông tin cửa hàng', 'zorrataa' ),
		'id'            => 'footer-1',
		'description'   => __( 'Thông tin cửa hàng phần footer dưới logo.', 'zorrataa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'zorrataa' ),
		'id'            => 'footer-3',
		'description'   => __( 'Các liên kết liên quan tới thông tin thanh toán.', 'zorrataa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'zorrataa_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Zorrataa 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function zorrataa_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'zorrataa' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'zorrataa_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Zorrataa 1.0
 */
function zorrataa_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'zorrataa_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function zorrataa_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'zorrataa_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function zorrataa_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'zorrataa-fonts', zorrataa_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'zorrataa-style', get_stylesheet_uri() );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'zorrataa-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'zorrataa-style' ), '1.0' );
		wp_style_add_data( 'zorrataa-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'zorrataa-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'zorrataa-style' ), '1.0' );
	wp_style_add_data( 'zorrataa-ie8', 'conditional', 'lt IE 9' );

	wp_enqueue_style( 'zorrataa-css', get_theme_file_uri( '/assets/css/stylesheet.css' ), array( ), '1.0' );
	wp_enqueue_style( 'zorrataa-custom', get_theme_file_uri( '/assets/css/custom.css' ), array( ), '1.0' );
	wp_enqueue_style( 'zorrataa-awesome', get_theme_file_uri( '/assets/css/font-awesome.css' ), array( ), '1.0' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	// wp_enqueue_script( 'jquery', get_theme_file_uri( '/assets/js/jquery.min.js' ), array(), '1.0' );
	wp_enqueue_script('zjquery', get_theme_file_uri( '/assets/js/jquery.min.js' ), array(), '1.9.1' );
	wp_enqueue_script( 'zorrataa-theme', get_theme_file_uri( '/assets/js/theme.js' ), array(), '1.0' );
	wp_enqueue_script( 'zorrataa-placeholder', get_theme_file_uri( '/assets/js/jquery.placeholder.js' ), array(), '1.0' );
	wp_enqueue_script( 'zorrataa-flexslider', get_theme_file_uri( '/assets/js/jquery.flexslider.js' ), array(), '1.0' );
	wp_enqueue_script( 'zorrataa-fancybox', get_theme_file_uri( '/assets/js/jquery.fancybox.js' ), array(), '1.0' );
	wp_enqueue_script( 'zorrataa-bxSlider', get_theme_file_uri( '/assets/js/jquery.bxslider.js' ), array(), '1.0' );
	if (is_single () ) {
		wp_enqueue_script( 'zorrataa-zom', get_theme_file_uri( '/assets/js/jquery.elevateZoom-2.5.5.min.js' ), array(), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'zorrataa_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Zorrataa 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function zorrataa_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'footer-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
// add_filter( 'wp_calculate_image_sizes', 'zorrataa_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Zorrataa 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function zorrataa_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'zorrataa_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Zorrataa 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function zorrataa_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'zorrataa_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Zorrataa 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function zorrataa_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'zorrataa_front_page_template' );
?>

<?php
//accordion
function zorrataa_accordion_shortcode( $atts, $content = null ) {
	return '<div class="pdp_details_block">' . do_shortcode($content) . '</div>';
}
add_shortcode( 'prd_description', 'zorrataa_accordion_shortcode' );

function zorrataa_process_shortcode( $atts, $content = null ) {
	return '<div class="pdp_details_block_head">
            	<a href="javascript:void(0);" class=""><i class="icon-minus"></i><i class="icon-plus"></i>'. $atts['title'] . '</a></div>
                <div class="pdp_details_block_content" >' . $content . '</div>';
}
add_shortcode( 'attribute', 'zorrataa_process_shortcode' );
// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');
add_filter('widget_custom_html','do_shortcode');
/**
 * The post thumbnail
 */
function zorrataa_get_post_thumbnail ( $post = null, $size = 'post-thumbnail', $attr = '') {
	if ( has_post_thumbnail( $post, $size, $attr) ) {
		return get_the_post_thumbnail( $post, $size, $attr);
	} else {
		return '<img class="' . $attr['class'] . '" src="' . get_theme_file_uri('assets/images/default-thumbnail.png') .'" alt="'. get_the_title() .'" />';
	}
}
add_filter( 'get_the_archive_title', function ( $title ) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});
/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Category dropdown custom control.
 */
require get_parent_theme_file_path( '/inc/category-dropdown-custom-control.php' );
require get_parent_theme_file_path( '/inc/breadscrumb.php' );
