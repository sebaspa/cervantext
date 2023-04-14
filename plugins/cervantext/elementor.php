<?php

if (!defined('ABSPATH')) exit();
/**
 * Elementor extencion main class
 * @since 1.0.0
 */

final class CervantextWidgets
{
    /**
     * Plugin Version
     *
     * @since 1.0.0
     * @var string The plugin version.
     */
    const VERSION = '1.0.0';

    /**
     * Minimum Elementor Version
     *
     * @since 3.0.0
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.0.0
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance
     */
    private static $_instance = null;

    /**
     * Singleton instance method
     */

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Construct method
     */

    public function __construct()
    {
        //Call constants method
        $this->define_constants();
        //add_action('wp_enqueue_scripts', [$this, 'scripts_styles']);
        //add_action('init', [$this, 'i18n']);
        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * Define plugin constants
     */

    public function define_constants()
    {
        define('CERVANTEXT_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));
        define('CERVANTEXT_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
    }

    /**
     * Load scripts and styles
     */

    public function scripts_styles()
    {
        //wp_register_style('myew-style', CERVANTEXT_PLUGIN_URL . 'assets/dist/css/app.css', [], rand(), 'all');
        //wp_register_script('myew-script', CERVANTEXT_PLUGIN_URL . 'assets/dist/js/app.js', ['jquery'], rand(), true);
        //wp_register_script('cervantext-carousel', CERVANTEXT_PLUGIN_URL . 'js/carousel-icon-text.js', ['jquery','elementor-frontend'], '1.0', true);

        //wp_enqueue_style('myew-style');
        //wp_enqueue_script('cervantext-carousel');
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     *
     * @since 1.0.0
     * @access public
     */
    public function i18n()
    {
        //load_plugin_textdomain('cervantext', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    /**
     * Initialize the plugin
     */

    public function init()
    {
        // Check if the ELementor installed and activated
        if( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        if( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        if( ! version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }
        
        add_action('elementor/init', [$this, 'init_category']);
        add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
    }

    /**
     * Initialize the widgets
     */

    public function init_widgets()
    {
        require_once CERVANTEXT_PLUGIN_PATH . '/widgets/questions.php';
    }

    /**
     * Initialize category section
     */

    public function init_category()
    {
        Elementor\Plugin::instance()->elements_manager->add_category(
            'cervantext-widgets',
            [
                'title' => __('Cervantext widgets')
            ],
            1
        );
    }

    /**
     * Admin notice
     * warning when the site dosen´t have elementor installed or activated
     */

    public function admin_notice_missing_main_plugin()
    {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" to be installed and activated', 'cervantext'),
            '<strong>' . esc_html__('My Elementor Widget', 'cervantext') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'cervantext') . '</strong>'
        );

        printf('<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin Notice
     * Warning when the site doesn't have a minimum required Elementor version.
     * @since 1.0.0
     */
    public function admin_notice_minimum_elementor_version()
    {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater', 'cervantext'),
            '<strong>' . esc_html__('My Elementor Widget', 'cervantext') . '</strong>',
            '<strong>' . esc_html__('Elementor', 'cervantext') . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin Notice
     * Warning when the site doesn't have a minimum required PHP version.
     * @since 1.0.0
     */
    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        $message = sprintf(
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater', 'cervantext'),
            '<strong>' . esc_html__('My Elementor Widget', 'cervantext') . '</strong>',
            '<strong>' . esc_html__('PHP', 'cervantext') . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message);
    }
}

CervantextWidgets::instance();
