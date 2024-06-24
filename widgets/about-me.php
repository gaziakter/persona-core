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
class Persona_About_me_Widget extends Widget_Base {

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
		return 'persona-about-me-widget';
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
		return __( 'About Me', 'persona' );
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
			'persoan_design_section',
			[
				'label' => esc_html__( 'Select Design', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'design_style',
			[
				'label' => esc_html__( 'Selct Style', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style_01',
				'options' => [
					'style_01' => esc_html__( 'Style 01', 'persona-core' ),
					'style_02' => esc_html__( 'Style 02', 'persona-core' ),
					'style_03' => esc_html__( 'Style 03', 'persona-core' ),
				]
			]
		);

		$this->add_control(
			'persona_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ABOUT ME', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your sub title here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'persona_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'My name is micael, I’m a Designer based in Australia and this is a selection of my personal and professional work.', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'persona_text',
			[
				'label' => esc_html__( 'Description', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Over the past 12 years, I have worked with a diverse range of clients, from startups to fortune 500 companies. I love crafting interfaces that delight users and help businesses grow. lorem ipsum dolor sit amet, consectet adipiscing spendisse iperdiet.', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your content here', 'persona-core' ),
			]
		);

		$this->add_control(
			'persona_button_text',
			[
				'label' => esc_html__( 'Button Text', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'DOWNLOAD CV', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your button text here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'persona_button_url',
			[
				'label' => esc_html__( 'Button URL', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
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
		if ( ! empty( $settings['persona_button_url']['url'] ) ) {
			$this->add_link_attributes( 'persona_button_url', $settings['persona_button_url'] );
		}

		?>
		<?php if($settings['design_style'] == 'style_01'): ?>
		<!-- about area start -->
         <section class="about__area about__space-145">
            <div class="about__inner-9 black-bg wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-xxl-10 col-xl-10 col-lg-11 col-md-10">
                        <div class="about__wrapper-9">
						   <?php if(!empty($settings['persona_sub_title'])): ?>
                           <span class="about-subtitle"><?php echo esc_html( $settings['persona_sub_title'] ); ?></span>
						   <?php endif; ?>
						   <?php if(!empty($settings['persona_title'])): ?>
                           <h3 class="about-title"><?php echo persona_kses( $settings['persona_title'] ); ?></h3>
						   <?php endif; ?>

						   <?php if(!empty($settings['persona_text'])): ?>
                           <p><?php echo esc_html( $settings['persona_text'] ); ?></p>
						   <?php endif; ?>

						   <?php if(!empty($settings['persona_button_text'])): ?>
                           <div class="about__btn-9">
                              <a <?php $this->print_render_attribute_string( 'persona_button_url' ); ?> class="tp-btn-5 tp-btn-5-white"> 
							  <?php echo esc_html( $settings['persona_button_text'] ); ?> 
                              </a>
                           </div>
						   <?php endif; ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about area end -->
		<?php elseif($settings['design_style'] == 'style_02'): ?>
			<h1>Design style 02</h1>					
		<?php else: ?>	
			<h1>Design style 03</h1>					
		<?php endif; ?>					
		<?php
	}
}
