<?php
/**
 * Bootstrap theme.
 *
 * The purpose of this file is to bootstrap your theme by loading all dependencies and helpers.
 *
 * YOU SHOULD NORMALLY NOT NEED TO ADD ANYTHING HERE - any custom functionality unreleated
 * to boostrapping the theme should go into a separate helper file.
 * (refer to the directory structure in README.md)
 *
 * @package WPEmergeTheme
 */

use WPEmerge\Facades\WPEmerge;
use WPEmergeTheme\Facades\Theme;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Constant definitions.
 */
define( 'APP_APP_DIR_NAME', 'app' );
define( 'APP_APP_HELPERS_DIR_NAME', 'helpers' );
define( 'APP_APP_ROUTES_DIR_NAME', 'routes' );
define( 'APP_APP_SETUP_DIR_NAME', 'setup' );
define( 'APP_DIST_DIR_NAME', 'dist' );
define( 'APP_RESOURCES_DIR_NAME', 'resources' );
define( 'APP_THEME_DIR_NAME', 'theme' );
define( 'APP_VENDOR_DIR_NAME', 'vendor' );

define( 'APP_DIR', dirname( __DIR__ ) . DIRECTORY_SEPARATOR );
define( 'APP_APP_DIR', APP_DIR . APP_APP_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_HELPERS_DIR', APP_APP_DIR . APP_APP_HELPERS_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_ROUTES_DIR', APP_APP_DIR . APP_APP_ROUTES_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_APP_SETUP_DIR', APP_APP_DIR . APP_APP_SETUP_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_DIST_DIR', APP_DIR . APP_DIST_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_RESOURCES_DIR', APP_DIR . APP_RESOURCES_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_THEME_DIR', APP_DIR . APP_THEME_DIR_NAME . DIRECTORY_SEPARATOR );
define( 'APP_VENDOR_DIR', APP_DIR . APP_VENDOR_DIR_NAME . DIRECTORY_SEPARATOR );

/**
 * Load composer dependencies.
 */
if ( file_exists( APP_VENDOR_DIR . 'autoload.php' ) ) {
	require_once APP_VENDOR_DIR . 'autoload.php';
}

/**
 * Enable the global Theme:: shortcut so we don't have to type WPEmergeTheme:: every time.
 */
WPEmerge::alias( 'Theme', \WPEmergeTheme\Facades\Theme::class );

/**
 * Load helpers.
 */
require_once APP_APP_DIR . 'helpers.php';

/**
 * Bootstrap Theme after all dependencies and helpers are loaded.
 */
Theme::bootstrap( require APP_APP_DIR . 'config.php' );

/**
 * Register hooks.
 */
require_once APP_APP_DIR . 'hooks.php';

add_action(
	'after_setup_theme',
	function() {
		/**
		 * Load textdomain.
		 */
		load_theme_textdomain( 'app', APP_DIR . 'languages' );

		/**
		 * Register theme support.
		 */
		require_once APP_APP_SETUP_DIR . 'theme-support.php';

		/**
		 * Register menu locations.
		 */
		require_once APP_APP_SETUP_DIR . 'menus.php';
	}
);
add_action(
	'init',
	function() {
		/**
		 * Register post types.
		 */
		require_once APP_APP_SETUP_DIR . 'post-types.php';

		/**
		 * Register taxonomies.
		 */
		require_once APP_APP_SETUP_DIR . 'taxonomies.php';
	}
);

add_action(
	'widgets_init',
	function() {
		/**
		 * Register widgets.
		 */
		require_once APP_APP_SETUP_DIR . 'widgets.php';

		/**
		 * Register sidebars.
		 */
		require_once APP_APP_SETUP_DIR . 'sidebars.php';
	}
);
include_once APP_THEME_DIR.'partials/navwalker.php';
add_image_size( "post_image", 2000, 400, ['center', 'center'] );
add_image_size( "big_thumbnail", 200, 200, true);
add_image_size("mainheader",1024,600);
add_image_size("secondheader",1024,400);


add_action( 'widgets_init', function(){
	register_sidebar([
		'name' 					=> 'footer-left',
		'description'		=> __("Left footer widgetized area"),
		'id'						=> 'footerleft',
		'before_title'	=> '<h3>',
		'after_title'		=> '</h3>',
		'before_widget'	=> '<div class="widget flex-fill mt-5 ml-3">',
		'after_widget'	=> '</div>',
	]);
	register_sidebar([
		'name' 					=> 'footer-center',
		'description'		=> __("Center footer widgetized area"),
		'id'						=> 'footer-center',
		'before_title'	=> '<h3>',
		'after_title'		=> '</h3>',
		'before_widget'	=> '<div class="widget flex-fill mt-5 ml-3">',
		'after_widget'	=> '</div>',
	]);
	register_sidebar([
		'name' 					=> 'footer-right',
		'description'		=> __("Right footer widgetized area"),
		'id'						=> 'footer-right',
		'before_title'	=> '<h3>',
		'after_title'		=> '</h3>',
		'before_widget'	=> '<div class="widget flex-fill mt-5">',
		'after_widget'	=> '</div>',
	]);
} );
/**
 * Show cart contents / total Ajax
 */
/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
?>
<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> </a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}


function wc_empty_cart_redirect_url() {
	return 'https://boutique.propulsioncarriere.ca/';
}
add_filter( 'woocommerce_return_to_shop_redirect', 'wc_empty_cart_redirect_url' );
add_filter( 'wc_add_to_cart_message_html', '__return_false' );
function lv2_add_bootstrap_input_classes( $args, $key, $value = null ) {

	/* This is not meant to be here, but it serves as a reference
	of what is possible to be changed.
	$defaults = array(
		'type'			  => 'text',
		'label'			 => '',
		'description'	   => '',
		'placeholder'	   => '',
		'maxlength'		 => false,
		'required'		  => false,
		'id'				=> $key,
		'class'			 => array(),
		'label_class'	   => array(),
		'input_class'	   => array(),
		'return'			=> false,
		'options'		   => array(),
		'custom_attributes' => array(),
		'validate'		  => array(),
		'default'		   => '',
	); */

	// Start field type switch case
	switch ( $args['type'] ) {

		case "select" :  /* Targets all select input type elements, except the country and state select input types */
			$args['class'][] = 'form-group'; // Add a class to the field's html element wrapper - woocommerce input types (fields) are often wrapped within a <p></p> tag
			$args['input_class'] = array('form-control', 'input-lg'); // Add a class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('control-label');
			$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  ); // Add custom data attributes to the form input itself
		break;

		case 'country' : /* By default WooCommerce will populate a select with the country names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group single-country';
			$args['label_class'] = array('control-label');
		break;

		case "state" : /* By default WooCommerce will populate a select with state names - $args defined for this specific input type targets only the country select element */
			$args['class'][] = 'form-group'; // Add class to the field's html element wrapper
			$args['input_class'] = array('form-control', 'input-lg'); // add class to the form input itself
			//$args['custom_attributes']['data-plugin'] = 'select2';
			$args['label_class'] = array('control-label');
			$args['custom_attributes'] = array( 'data-plugin' => 'select2', 'data-allow-clear' => 'true', 'aria-hidden' => 'true',  );
		break;


		case "password" :
		case "text" :
		case "email" :
		case "tel" :
		case "number" :
			$args['class'][] = 'form-group';
			//$args['input_class'][] = 'form-control input-lg'; // will return an array of classes, the same as bellow
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;

		case 'textarea' :
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;

		case 'checkbox' :
		break;

		case 'radio' :
		break;

		default :
			$args['class'][] = 'form-group';
			$args['input_class'] = array('form-control', 'input-lg');
			$args['label_class'] = array('control-label');
		break;
	}

	return $args;
}
add_filter('woocommerce_form_field_args','lv2_add_bootstrap_input_classes',10,3);
add_action( 'woocommerce_add_to_cart_redirect', 'prevent_duplicate_products_redirect' );
function prevent_duplicate_products_redirect( $url = false ) {
  // if another plugin gets here first, let it keep the URL
  if( !empty( $url ) ) {
    return $url;
  }
  // redirect back to the original page, without the 'add-to-cart' parameter.
  // we add the 'get_bloginfo' part so it saves a redirect on https:// sites.
  return get_bloginfo( 'wpurl' ).add_query_arg( array(), remove_query_arg( 'add-to-cart' ) );
} // end function


?>
<?php // For implementation instructions see: https://aceplugins.com/how-to-add-a-code-snippet/

/**
 * JS for AJAX Add to Cart handling
 */
ob_start();
function ace_product_page_ajax_add_to_cart_js() {
    ?><script type="text/javascript" charset="UTF-8">
		jQuery(function($) {

			$('form.cart').on('submit', function(e) {
				e.preventDefault();

				var form = $(this);
			

				var formData = new FormData(form.context);
				formData.append('add-to-cart', form.find('[name=add-to-cart]').val() );

				// Ajax action.
				$.ajax({
					url: wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'ace_add_to_cart' ),
					data: formData,
					type: 'POST',
					processData: false,
					contentType: false,
					complete: function( response ) {
						response = response.responseJSON;

						if ( ! response ) {
							return;
						}

						if ( response.error && response.product_url ) {
							window.location = response.product_url;
							return;
						}

						// Redirect to cart option
						if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {
							window.location = wc_add_to_cart_params.cart_url;
							return;
						}

						var $thisbutton = form.find('.single_add_to_cart_button'); //
				var $thisbutton = null; 

						// Trigger event so themes can refresh other areas.
						$( document.body ).trigger( 'added_to_cart', [ response.fragments, response.cart_hash, $thisbutton ] );

						// Remove existing notices
						$( '.woocommerce-error, .woocommerce-message, .woocommerce-info' ).remove();

						// Add new notices
						form.closest('.product').before(response.fragments.notices_html)

						form.unblock();
					}
				});
			});
		});
	</script><?php
}

$form = ob_get_clean();
add_action( 'wp_footer', 'ace_product_page_ajax_add_to_cart_js' ); ?>
<?php // For implementation instructions see: https://aceplugins.com/how-to-add-a-code-snippet/

/**
 * Add to cart handler.
 */
function ace_ajax_add_to_cart_handler() {
	WC_Form_Handler::add_to_cart_action();
	WC_AJAX::get_refreshed_fragments();
}
add_action( 'wc_ajax_ace_add_to_cart', 'ace_ajax_add_to_cart_handler' );
add_action( 'wc_ajax_nopriv_ace_add_to_cart', 'ace_ajax_add_to_cart_handler' );

// Remove WC Core add to cart handler to prevent double-add
remove_action( 'wp_loaded', array( 'WC_Form_Handler', 'add_to_cart_action' ), 20 );

?>