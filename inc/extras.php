<?php
/** 
* Custom function of the theme template
*
*
* @package swiftionportfolio
*/

if ( ! function_exists( 'swiftionportfolio_social_icons' ) ) :
	/**
	 * Display social links in footer widgets
	 *
	 * @package swiftionportfolio
	 */
	function swiftionportfolio_social_icons() {
		if ( has_nav_menu( 'social-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'social-menu',
					'container'       => 'nav',
					'container_id'    => 'menu-social',
					'container_class' => 'social-icons',
					'menu_id'         => 'menu-social-items',
					'menu_class'      => 'social-menu',
					'depth'           => 1,
					'fallback_cb'     => '',
					'link_before'     => '<i class="social_icon"><span>',
					'link_after'      => '</span></i>',
				)
			);
		}
	}
endif;