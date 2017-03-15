<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Freeman Capital Theme' );
define( 'CHILD_THEME_URL', 'http://freemancapital.co/' );
define( 'CHILD_THEME_VERSION', '1.0' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Oxygen:300,400,700|Rufina:400,700|Lato:100,200,300,400,500', array(), CHILD_THEME_VERSION );
	
	wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array(), CHILD_THEME_VERSION);
	
	wp_enqueue_script('bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), CHILD_THEME_VERSION);
	
	wp_enqueue_script('scrollmagic-script', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array(), CHILD_THEME_VERSION);
	
	wp_enqueue_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), CHILD_THEME_VERSION);

}

// Register responsive menu script
add_action( 'wp_enqueue_scripts', 'prefix_enqueue_scripts' );
/**
 * Enqueue responsive javascript
 * @author Ozzy Rodriguez
 * @todo Change 'prefix' to your theme's prefix
 */
function prefix_enqueue_scripts() {
	wp_enqueue_script( 'freemancapital-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true ); // Change 'prefix' to your theme's prefix
	
	wp_enqueue_style('responsive-menu-css', get_stylesheet_directory_uri() . '/css/responsive-menu.css', array(), CHILD_THEME_VERSION);
}



//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


function social_header() {
	echo '<div class="social-icons"><a href="https://www.instagram.com/freemancapital/" target="_blank"><span class="fa fa-instagram"></span></a><a href="http://www.medium.com/freeman-capital" target="_blank"><span class="fa fa-medium"></span></a><a href="http://www.facebook.com/freemancapital" target="_blank"><span class="fa fa-facebook"></span></a></div>';
}
add_action( 'genesis_site_description', 'social_header' );


//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_site_description', 'genesis_do_nav' );



remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'je_genesis_do_footer' );
/**
 * Echo the contents of the footer.
 *
 * Execute any shortcodes that might be present.
 *
 * Applies `genesis_footer_backtotop_text`, `genesis_footer_creds_text` and `genesis_footer_output` filters.
 *
 * For HTML5 themes, only the credits text is used (back-to-top link is dropped).
 *
 * @since 1.0.1
 *
 * @uses genesis_html5() Check for HTML5 support.
 *
 */
function je_genesis_do_footer() {

?>
	<span class="copyright-text" style="padding-right: 50px;">
© Freeman Capital 2016. All Rights Reserved.</span>
	<span><a href="http://www.nfa.futures.org/basicnet/complaint.aspx" target="_blank">File a Complaint</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="#" data-toggle="modal" data-target="#disclosure-modal">Full Disclosure</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="#" data-toggle="modal" data-target="#privacy-modal">Privacy Policy</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="#" data-toggle="modal" data-target="#terms-modal">Terms of Use</a> &nbsp;&nbsp; | &nbsp;&nbsp; <a href="https://freemancapital.typeform.com/to/bNzER8" target="_blank">Contact</a></span>
<?php
}

/*
add_filter( 'nav_menu_link_attributes', 'modal_menu_atts', 10, 3 );
function modal_menu_atts( $atts, $item, $args )
{
  // The ID of the target menu item
  $menu_target = 31;

  // inspect $item
  if ($item->ID == $menu_target) {
    $atts['data-toggle'] = 'modal';
    $atts['data-target'] = '.signup-modal';
  }
  return $atts;
}
*/