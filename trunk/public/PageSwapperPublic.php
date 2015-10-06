<?php namespace Pub;

    /**
     * The public-facing functionality of the plugin.
     *
     * @link       https://github.com/crazypsycho
     * @since      1.0.0
     *
     * @package    PageSwapper
     * @subpackage PageSwapper/public
     */
use MagicAdminPage\MagicAdminPage;

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    PageSwapper
 * @subpackage PageSwapper/public
 * @author     Sascha Hennemann <shennemann@rto.de>
 */
class PageSwapperPublic
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $pluginName The ID of this plugin.
     */
    private $pluginName;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $pluginName The name of the plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct( $pluginName, $version )
    {

        $this->pluginName = $pluginName;
        $this->version = $version;

        // Embed footerscript
        add_action( 'wp_footer', array ( $this, 'insertFooterScript' ) );
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueueStyles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in PageSwapperLoader as all of the hooks are defined
         * in that particular class.
         *
         * The PageSwapperLoader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( $this->pluginName, plugin_dir_url( __FILE__ ) . 'css/page-swapper-public.css', array(), $this->version, 'all' );

        $owlPath = plugin_dir_url( __FILE__ ) . '../bower_components/owl.carousel/dist';
        wp_enqueue_style( 'owl.carousel', $owlPath . '/assets/owl.carousel.min.css' );
        wp_enqueue_style( 'owl.carousel.theme', $owlPath . '/assets/owl.theme.default.min.css' );
        wp_enqueue_style( 'animate.css', plugin_dir_url( __FILE__ ) . '../bower_components/animate.css/animate.min.css' );
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueueScripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in PageSwapperLoader as all of the hooks are defined
         * in that particular class.
         *
         * The PageSwapperLoader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        #wp_enqueue_script( $this->pluginName, plugin_dir_url( __FILE__ ) . 'js/page-swapper-public.js', array( 'jquery' ), $this->version, false );

        $owlPath = plugin_dir_url( __FILE__ ) . '../bower_components/owl.carousel/dist';
        wp_enqueue_script( 'owl.carousel', $owlPath . '/owl.carousel.min.js', array ( 'jquery' ) );


        $pswPath = plugin_dir_url( __FILE__ ) . '../bower_components/page-swapper';
        wp_enqueue_script( 'page-swapper', $pswPath . '/page-swapper.min.js', array ( 'owl.carousel' ) );
    }

    /**
     * Embed the script with the given settings
     *
     * @param string $footer
     */
    public function insertFooterscript( $footer )
    {
        $current_site = str_replace( get_bloginfo( 'wpurl' ), '', $_SERVER[ 'REQUEST_URI' ] );
        $current_site = substr( $current_site, 1, strlen( $current_site ) - 1 );

        if ( empty( $current_site ) ) {
            $current_site = '';
        }

        // get options
        $options = MagicAdminPage::getOption('page-swapper');
        $selector = !empty($options['selector']) ? $options['selector'] : 'body';
        $owlConfig = !empty($options['owlConfig']) ? $options['owlConfig'] : '';

        $script = '<script>';
        $script .= 'jQuery("' . $selector . '").pageSwapper({
            owlConfig: {' . $owlConfig . '},
            ' . ( isset( $_REQUEST['pswdebug'] ) ? 'debug: true' : '' ) . '
        });';
        $script .= '</script>';

        $footer = $footer . $script;

        echo $footer;
    }
}
