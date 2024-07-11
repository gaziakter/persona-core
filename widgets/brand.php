<?php
namespace PersonaCore\Widgets;

use Elementor\Widget_Base;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Persona_Brand_Widget extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'persona-brand-widget';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Persona Brands', 'persona' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-posts-ticker';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['persona-category'];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends() {
        return ['elementor-hello-world'];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function register_controls() {

        /** Process Section */
        $this->start_controls_section(
            'persona_brand',
            [
                'label' => esc_html__( 'Persona Brand List', 'persona-core' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'design_style',
            [
                'label'   => esc_html__( 'Selct Style', 'persona-core' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'style_01',
                'options' => [
                    'style_01' => esc_html__( 'Scroll From Right', 'persona-core' ),
                    'style_02' => esc_html__( 'Scroll From Left', 'persona-core' ),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'item_image',
            [
                'label'   => esc_html__( 'Choose Image', 'persona-core' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'persona_item_list',
            [
                'label'   => esc_html__( 'Portfolio List', 'persona-core' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'process_title'   => esc_html__( 'Title #1', 'persona-core' ),
                        'process_content' => esc_html__( 'Title #1', 'persona-core' ),
                    ],
                    [
                        'process_title'   => esc_html__( 'Title #1', 'persona-core' ),
                        'process_content' => esc_html__( 'Title #1', 'persona-core' ),
                    ],
                    'title_field' => '{{{process_title}}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
		<?php if ( $settings['design_style'] == 'style_02' ): ?>
<div class="brand__slider-5 brand__style-square">
                        <div class="brand__slider-5">
                           <div class="brand__slider-active-5">
						   <?php foreach ( $settings['persona_item_list'] as $key => $item ): ?>
                              <div class="brand__item-5">
                                 <img src="<?php echo esc_url( $item['item_image']['url'] ); ?>" alt="">
                              </div>
							  <?php endforeach;?>

                           </div>
                        </div>
</div>
<?php else: ?>
	<div class="brand__slider-5">
                           <div class="brand__slider-active-5-1" >
                              <div class="brand__item-5">
							  <img src="<?php echo esc_url( $item['item_image']['url'] ); ?>" alt="">
                              </div>
                           </div>
                        </div>

<?php endif;?>

		<?php
}
}