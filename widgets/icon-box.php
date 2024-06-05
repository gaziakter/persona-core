<?php
namespace PersonaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Persona_Icon_box_Widget extends Widget_Base {

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
		return 'persona-icon-box-widget';
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
		return __( 'Persona Icon Box', 'persona' );
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
		return [ 'persona-category' ];
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
		return [ 'elementor-hello-world' ];
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

	 protected function register_controls(){
		$this->resister_content_section();
		$this->resister_style_section();
	 }

	 /** Content Section */
	protected function resister_content_section() {

		$this->start_controls_section(
			'persona_icon_box_section',
			[
				'label' => esc_html__( 'Title and Content', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'persona_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '86 Projects', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your sub title here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'persona_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Website Design', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your sub title here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'persona_select_icon',
			[
				'label' => esc_html__( 'Choose Icon Method', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'svg',
				'options' => [
					'icon' => esc_html__( 'Icon', 'persona-core' ),
					'svg'  => esc_html__( 'SVG', 'persona-core' ),
				],
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
				'condition' => [
					'persona_select_icon' => 'icon',
				],
			]
		);

		$this->add_control(
			'persona_svg_icon',
			[
				'label' => esc_html__( 'SVG', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '', 'persona-core' ),
				'placeholder' => esc_html__( 'SVG icon code here', 'persona-core' ),
				'label_block' => true,
				'condition' => [
					'persona_select_icon' => 'svg',
				],
			]
		);

		$this->add_control(
			'icon_url',
			[
				'label' => esc_html__( 'URL', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

	}

	/** Style section */
	protected function resister_style_section() {

		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style Section', 'textdomain' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .services-project' => 'color: {{VALUE}}',
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

					<div class="services__item-9 mb-30 transition-3">
                        <div class="services__item-9-top d-flex align-items-start justify-content-between">
                           <div class="services__icon-9">
                              <span>
							  	<?php if(!empty($settings['persona_select_icon'] == 'icon')): ?>
									<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php else: ?>
									<?php echo $settings['persona_svg_icon']; ?>
									<img src="<?php echo get_template_directory_uri().'/assets/img/services/9/services-icon-shape.png'; ?>" alt="">                               
								<?php endif; ?>
                              </span>
                           </div>
						   <?php if(!empty($settings['icon_url'])): ?>
                           <div class="services__btn-9">
                              <a href="<?php echo esc_url($settings['icon_url']); ?>"><i class="fa-light fa-arrow-up-right"></i></a>
                           </div>
						   <?php endif; ?>
                        </div>
                        <div class="services__content-9">
							<?php if(!empty($settings['persona_sub_title'])): ?>
                           <span class="services-project"><?php echo esc_html($settings['persona_sub_title']); ?></span>
						   <?php endif; ?>
						   <?php if(!empty($settings['persona_title'])): ?>
                           <h3 class="services__title-9">
						   <?php if(!empty($settings['icon_url'])): ?>
							<a href="<?php echo esc_url($settings['icon_url']); ?>"><?php echo esc_html($settings['persona_title']); ?></a>
							<?php else: ?>
								<?php echo esc_html($settings['persona_title']); ?>
							<?php endif; ?>


                           </h3>
						   <?php endif; ?>
                        </div>
                     </div>

		<?php
	}
}
