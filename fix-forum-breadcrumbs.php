<?php
/**
 * @author            Kona Macphee <kona@fidgetylizard.com>
 * @since             1.0
 * @package           Fix_Forum_Breadcrumbs
 *
 * @wordpress-plugin
 * Plugin Name:       Fix Forum Breadcrumbs 
 * Plugin URI:        https://wordpress.org/plugins/fix-forum-breadcrumbs/
 * Description:       Removes duplicate root breadcrumb in bbPress forum breadcrumbs. 
 * Version:           1.0
 * Author:            Fidgety Lizard
 * Author URI:        http://www.fidgetylizard.com
 * Contributors:      fliz, kona
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fix-forum-breadcrumbs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

if ( ! class_exists( 'Fix_Forum_Breadcrumbs' ) )
{
  class Fix_Forum_Breadcrumbs
  {
    /**
     * Construct the plugin object
     */
    public function __construct()
    {
      // Apply our breadcrumb fix
      add_filter('bbp_before_get_breadcrumb_parse_args', 
              array( $this, 'fix_bbpress_breadcrumbs' ) );

      // Prepare for i18n translations
      add_action( 'plugins_loaded', array( $this, 'load_my_textdomain' ) );
    } // END public function __construct

    /**
     * Activate the plugin
     */
    public static function activate()
    {
      // Nothing to do here
    } // END public static function activate

    /**
     * Deactivate the plugin
     */
    public static function deactivate()
    {
      // Nothing to do here
    } // END public static function deactivate


    //Customise breadcrumbs 
    public function fix_bbpress_breadcrumbs()
    {
      if (TRUE == bbp_is_forum_archive() ) {
        // Hide duplicate current item on main forum page
        $args['include_current'] = FALSE;
      }
      else {
        // Show current item if not on main forum page
        $args['include_current'] = TRUE;
      }
      // Enable single root breadcrumb, avoid duplicate
      $args['include_home'] = TRUE;
      $args['include_root'] = FALSE;
      return $args;
    }
    /**
     * Set things up for i18n
     */
    public function load_my_textdomain() 
    {
      load_plugin_textdomain( 
        'fix-forum-breadcrumbs', 
        FALSE, 
        basename( dirname( __FILE__ ) ) . '/languages/' 
      );
    }

  } // END class Fix_Forum_Breadcrumbs
} // END if ( ! class_exists( 'Fix_Forum_Breadcrumbs' ) )



if ( class_exists( 'Fix_Forum_Breadcrumbs' ) )
{
  // Installation and uninstallation hooks
  register_activation_hook(
    __FILE__, 
    array( 'Fix_Forum_Breadcrumbs', 'activate' )
  );
  register_deactivation_hook(
    __FILE__, 
    array( 'Fix_Forum_Breadcrumbs', 'deactivate' )
  );
  // instantiate the plugin class
  $wp_plugin_template = new Fix_Forum_Breadcrumbs();
}
?>
