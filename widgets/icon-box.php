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
	protected function register_controls() {

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
                                 <svg width="47" height="42" viewBox="0 0 47 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.06035 29.4262L12.5801 37.0285C17.8613 42.3677 19.6652 42.2798 24.8812 37.0285L36.9867 24.79C41.203 20.5275 42.2679 17.6931 36.9867 12.3539L29.467 4.75152C23.838 -0.939241 21.3821 0.488942 17.1659 4.75152L5.06035 16.99C-0.133935 22.2633 -0.568603 23.7354 5.06035 29.4262Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path opacity="0.4" d="M38.5975 32.1286L37.1631 34.5236C35.1419 37.9292 36.7067 40.7197 40.6405 40.7197C44.5742 40.7197 46.139 37.9292 44.1178 34.5236L42.6834 32.1286C41.5533 30.239 39.7059 30.239 38.5975 32.1286Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path opacity="0.4" d="M1.21484 22.1312C13.2986 18.8134 26.0344 18.7036 38.1616 21.8456L39.2483 22.1312" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>  
                                 <img src="assets/img/services/9/services-icon-shape.png" alt="">                               
                              </span>
                           </div>
                           <div class="services__btn-9">
                              <a href="services-details.html"><i class="fa-light fa-arrow-up-right"></i></a>
                           </div>
                        </div>
                        <div class="services__content-9">
                           <span class="services-project">86 Project</span>
                           <h3 class="services__title-9">
                              <a href="services-details.html">Website design</a>
                           </h3>
                        </div>
                     </div>

		<?php
	}
}
