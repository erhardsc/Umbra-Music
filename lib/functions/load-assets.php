<?php
/**
 * Asset loader handler.
 *
 * @package     ErhardLabs\Virtuoso
 * @since       1.0.0
 * @author      ErhardLabs
 * @link        https://sumnererhard.com https://graysonerhard.com
 * @license     GNU General Public License 2.0+
 */
namespace ErhardLabs\Virtuoso;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue Scripts and Styles.
 *
 * @since 1.0.2
 *
 * @return void
 */
function enqueue_assets() {

	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-fonts', '//fonts.googleapis.com/css?family=Roboto:300,400,900', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( CHILD_TEXT_DOMAIN . '-ion-icons', 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-responsive-menu', CHILD_URL . '/assets/js/dist/responsive-menu.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

//	$localized_script_args = array(
//		'mainMenu' => __( 'Menu', CHILD_TEXT_DOMAIN ),
//		'subMenu'  => __( 'Menu', CHILD_TEXT_DOMAIN ),
//	);
//	wp_localize_script( CHILD_TEXT_DOMAIN . '-responsive-menu', 'developersL10n', $localized_script_args );
}

/**
 * Enqueue .min file if the environment is Production and not a Development (e.g localhost, staging)
 *
 * @since 1.0.4
 *
 * @return string
 */
add_filter( 'stylesheet_uri', __NAMESPACE__ . '\replace_default_style_sheet', 10, 2 );
function replace_default_style_sheet() {

	if( get_site_url() == 'http://tylerpaulsonpictures.com' || get_site_url() == 'https://tylerpaulsonpictures.com'){
		return CHILD_URL . '/style.min.css';
	}
	return CHILD_URL . '/style.css';

}