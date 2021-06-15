<?php
/**
 * Theme header partial.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WPEmergeTheme
 *<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-items-container" aria-controls="navbar-items-container" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
		
		
	</head>
	<body <?php body_class(); ?>>
		<?php app_shim_wp_body_open(); ?>
		<nav id="nav" class="fixed-top navbar navbar-expand-md at-top<?=is_admin_bar_showing()?" admin-bar-showing":"" ?>" role="navigation">
		  <div class="container">
				<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
					<img src="<?=carbon_get_theme_option('dark_logo')?>" alt="Logo sombre <?=bloginfo('name')?>" class="logo logo-dark">
					<img src="<?=carbon_get_theme_option('light_logo')?>" alt="Logo <?=bloginfo('name')?>" class="logo logo-light">
				</a>
				
					<?php
					wp_nav_menu( array(
						'theme_location'    => 'main-menu',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'navbar-items-container',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					) );
					?>
				
		<i class="fas fa-cart-arrow-down"></i><a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Voir votre panier' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> </a>	
			</div>

		</nav>
		

		<div id="popUp" style="display: none; "><i class="fas fa-check"></i>L'item a été ajouté! </div>
		
