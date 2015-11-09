<?php namespace Admin;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/crazypsycho
 * @since      1.0.0
 *
 * @package    PageSwapper
 * @subpackage PageSwapper/admin
 */
use MagicAdminPage\MagicAdminPage;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    PageSwapper
 * @subpackage PageSwapper/admin
 * @author     Sascha Hennemann <shennemann@rto.de>
 */
class PageSwapperAdmin
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
     * @param      string $pluginName The name of this plugin.
     * @param      string $version The version of this plugin.
     */
    public function __construct( $pluginName, $version )
    {
        load_plugin_textdomain( 'page-swapper', false, '/page-swapper/languages' );
        $textdomain = 'page-swapper';

        $this->pluginName = $pluginName;
        $this->version = $version;

        $pswAdminPage = new MagicAdminPage(
            'page-swapper',
            'PageSwapper',
            'PageSwapper'
        );

        $pswAdminPage->addFields( array (
            'debugmode'   => array (
                'type'    => 'checkbox',
                'title'   => __( 'Debug-Mode', $textdomain ),
            ),
            'useOldOwl'   => array (
                'type'    => 'checkbox',
                'title'   => __( 'Use old owl-carousel (v1.3)', $textdomain ),
            ),
            'selector'    => array (
                'type'    => 'text',
                'title'   => __( 'Selector', $textdomain ),
                'default' => 'body',
            ),
            'owlConfig'   => array (
                'type'        => 'textarea',
                'title'       => __( 'Owl-Slider-Config', $textdomain ),
                'description' => '<b>' . __( 'Presets', $textdomain ) . '</b>:'
                    . '<select id="owl-slider-presets" data-lang="' . get_locale() . '">
                    <option value="">Slide (' . __( 'Default', $textdomain ) . ')</option>
                    <option value="fade">Fade</option>
                    <option value="slidevertical">SlideVertical</option>
                    <option value="zoominout">Zoom In/out</option>
                    </select>',
                'class'       => 'owl-slider-config',
            ),
            'owlDesc'     => array (
                'type'        => 'description',
                'title'       => __( 'Description', $textdomain ),
                'description' => __( 'You can use these options', $textdomain ) . ':<br />' .
                    '<a href="http://www.owlcarousel.owlgraphic.com/docs/api-options.html" target="_blank">
                OwlCarousel Options
            </a>
            <br />' .
                    __( 'You can use these animations', $textdomain ) . ':<br />
            <a href="http://daneden.github.io/animate.css/" target="_blank">
                Animate.css
            </a>
        </div>'
            ),
        ) );
    }

    /**
     * Register the stylesheets for the admin area.
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

        wp_enqueue_style( $this->pluginName, plugin_dir_url( __FILE__ ) . 'css/page-swapper-admin.css', array (), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
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

        wp_enqueue_script( $this->pluginName, plugin_dir_url( __FILE__ ) . 'js/page-swapper-admin.js', array ( 'jquery' ), $this->version, false );

    }

}
