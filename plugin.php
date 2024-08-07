<?php
namespace PersonaCore;

use PersonaCore\PageSettings\Page_Settings;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Persona_Core_Plugin {

    /**
     * Instance
     *
     * @since 1.2.0
     * @access private
     * @static
     *
     * @var Plugin The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.2.0
     * @access public
     *
     * @return Plugin An instance of the class.
     */
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * widget_scripts
     *
     * Load required plugin core files.
     *
     * @since 1.2.0
     * @access public
     */
    public function widget_scripts() {
        wp_register_script( 'elementor-hello-world', plugins_url( '/assets/js/hello-world.js', __FILE__ ), ['jquery'], false, true );
    }

    /**
     * Widgets Category
     *
     * @param [type] $elements_manager
     * @return void
     */
    public function persona_add_elementor_widget_categories( $persona_add_cat ) {

        $persona_add_cat->add_category(
            'persona-category',
            [
                'title' => esc_html__( 'Persona Core', 'persona-core' ),
                'icon'  => 'fa fa-plug',
            ]
        );
    }

    /**
     * Editor scripts
     *
     * Enqueue plugin javascripts integrations for Elementor editor.
     *
     * @since 1.2.1
     * @access public
     */
    public function editor_scripts() {
        add_filter( 'script_loader_tag', [$this, 'editor_scripts_as_a_module'], 10, 2 );

        wp_enqueue_script(
            'elementor-hello-world-editor',
            plugins_url( '/assets/js/editor/editor.js', __FILE__ ),
            [
                'elementor-editor',
            ],
            '1.2.1',
            true
        );
    }

    /**
     * Force load editor script as a module
     *
     * @since 1.2.1
     *
     * @param string $tag
     * @param string $handle
     *
     * @return string
     */
    public function editor_scripts_as_a_module( $tag, $handle ) {
        if ( 'elementor-hello-world-editor' === $handle ) {
            $tag = str_replace( '<script', '<script type="module"', $tag );
        }

        return $tag;
    }

    /**
     * Register Widgets
     *
     * Register new Elementor widgets.
     *
     * @since 1.2.0
     * @access public
     *
     * @param Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register_widgets( $widgets_manager ) {
        // Its is now safe to include Widgets files
        require_once __DIR__ . '/widgets/inline-editing.php';
        require_once __DIR__ . '/widgets/hero.php';
        require_once __DIR__ . '/widgets/about-me.php';
        require_once __DIR__ . '/widgets/process.php';
        require_once __DIR__ . '/widgets/icon-box.php';
        require_once __DIR__ . '/widgets/heading.php';
        require_once __DIR__ . '/widgets/heading.php';
        require_once __DIR__ . '/widgets/button.php';
        require_once __DIR__ . '/widgets/portfolio-list.php';
        require_once __DIR__ . '/widgets/skill.php';
        require_once __DIR__ . '/widgets/exprience.php';
        require_once __DIR__ . '/widgets/awards.php';
        require_once __DIR__ . '/widgets/testimonial.php';
        require_once __DIR__ . '/widgets/blog-post.php';
        require_once __DIR__ . '/widgets/contact-info.php';
        require_once __DIR__ . '/widgets/about-bg.php';
        require_once __DIR__ . '/widgets/brand.php';
        require_once __DIR__ . '/widgets/page-banner.php';

        // Register Widgets
        $widgets_manager->register( new Widgets\Persona_Hero_Widget() );
        $widgets_manager->register( new Widgets\Persona_About_me_Widget() );
        $widgets_manager->register( new Widgets\Persona_Processs_Widget() );
        $widgets_manager->register( new Widgets\Persona_Icon_box_Widget() );
        $widgets_manager->register( new Widgets\Persona_Heading_Widget() );
        $widgets_manager->register( new Widgets\Persona_Button_Widget() );
        $widgets_manager->register( new Widgets\Persona_Portfolio_list_Widget() );
        $widgets_manager->register( new Widgets\Inline_Editing() );
        $widgets_manager->register( new Widgets\Persona_skill_Widget() );
        $widgets_manager->register( new Widgets\Persona_Exprience_Widget() );
        $widgets_manager->register( new Widgets\Persona_Awards_Widget() );
        $widgets_manager->register( new Widgets\Persona_Testimonial_Widget() );
        $widgets_manager->register( new Widgets\Persona_Blog_post_Widget() );
        $widgets_manager->register( new Widgets\Persona_Contact_Info_Widget() );
        $widgets_manager->register( new Widgets\Persona_About_Bg_Widget() );
        $widgets_manager->register( new Widgets\Persona_Brand_Widget() );
        $widgets_manager->register( new Widgets\Persona_Page_bannner_Widget() );
    }

    /**
     * Add page settings controls
     *
     * Register new settings for a document page settings.
     *
     * @since 1.2.1
     * @access private
     */
    private function add_page_settings_controls() {
        require_once __DIR__ . '/page-settings/manager.php';
        new Page_Settings();
    }

    /**
     *  Plugin class constructor
     *
     * Register plugin action hooks and filters
     *
     * @since 1.2.0
     * @access public
     */
    public function __construct() {

        // Add New Category
        add_action( 'elementor/elements/categories_registered', [$this, 'persona_add_elementor_widget_categories'] );

        // Register widget scripts
        add_action( 'elementor/frontend/after_register_scripts', [$this, 'widget_scripts'] );

        // Register widgets
        add_action( 'elementor/widgets/register', [$this, 'register_widgets'] );

        // Register editor scripts
        add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'editor_scripts'] );

        $this->add_page_settings_controls();
    }
}

// Instantiate Plugin Class
Persona_Core_Plugin::instance();
