<?php

namespace PersonaCore\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Persona_Page_bannner_Widget extends Widget_Base
{

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name()
	{
		return 'persona-page-banner-widget';
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
	public function get_title()
	{
		return __('Persona Page Banner', 'persona');
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
	public function get_icon()
	{
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
	public function get_categories()
	{
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
	public function get_script_depends()
	{
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
	protected function register_controls()
	{

		$this->start_controls_section(
			'persoan_page_banner',
			[
				'label' => esc_html__('Page Banner Content', 'persona-core'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'is_breadcrumb',
			[
				'label' => esc_html__('Enable Breadcrumb', 'persona-core'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__('On', 'persona-core'),
				'label_off' => esc_html__('Off', 'persona-core'),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'persona_title',
			[
				'label' => esc_html__('Title', 'persona-core'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('We Offer a Wide Range of Services', 'persona-core'),
				'placeholder' => esc_html__('Type your title here', 'persona-core'),
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_bg',
			[
				'label' => esc_html__( 'Choose Image', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
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
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$is_breadcrumb = $settings['is_breadcrumb'];

?>
		<!-- breadcrumb area start -->
		<section class="breadcrumb__area breadcrumb__style-6 p-relative include-bg pt-200 pb-120">
			<div class="breadcrumb__bg-2 breadcrumb__overlay include-bg" style="background-image: url(<?php echo esc_url( $settings['banner_bg']['url'] );?>);"></div>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xxl-8 col-xl-8 col-lg-10">
						<div class="breadcrumb__content text-center p-relative z-index-1">
							<?php if (!empty($settings['persona_title'])) : ?>
							<h3 class="breadcrumb__title"><?php echo wp_kses_post($settings['persona_title']); ?></h3>
							<?php endif; ?>
							<?php if(function_exists('bcn_display') && !empty($is_breadcrumb)): ?>
							<div class="breadcrumb__list">
								<?php bcn_display(); ?>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- breadcrumb area end -->
<?php
	}
}
