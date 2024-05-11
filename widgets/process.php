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
class Persona_Processs_Widget extends Widget_Base {

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
		return 'persona-process-widget';
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
		return __( 'Process', 'persona' );
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

		/** Process Section */
		$this->start_controls_section(
			'persoan_process_section',
			[
				'label' => esc_html__( 'Process List', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'process_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'STRATEGY' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'process_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Concept' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'process_content',
			[
				'label' => esc_html__( 'Content', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'I design beautifully simple things,and i love what i do.' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'process_image',
			[
				'label' => esc_html__( 'Choose Image', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'process_author_image',
			[
				'label' => esc_html__( 'Choose Author Image', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'persona_process_list',
			[
				'label' => esc_html__( 'Process List', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'textdomain' ),
					],
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
		if ( ! empty( $settings['hero_button_url']['url'] ) ) {
			$this->add_link_attributes( 'hero_button_url', $settings['hero_button_url'] );
		}

		?>

         <!-- slider area start -->
         <section class="slider__area pt-40 p-relative fix">
            <div class="slider__item-9">
               <div class="container">
                  <div class="row align-items-end">
                     <div class="col-xl-7 col-lg-6 col-md-7">
                        <div class="slider__content-9">
							<?php if(!empty($settings['hero_sub_title'])): ?>
                           <span class="slider__title-pre-9"><?php echo esc_html( $settings['hero_sub_title'] ); ?></span>
						   <?php endif; ?>
						   <?php if(!empty($settings['hero_title'])): ?>
                           <h3 class="slider__title-9"><?php echo wp_kses_post( $settings['hero_title'] ); ?></h3>
						   <?php endif; ?>
						   <?php if(!empty($settings['hero_text'])): ?>
                           <p><?php echo esc_html( $settings['hero_text'] ); ?></p>
						   <?php endif; ?>

						   <?php if(!empty($settings['hero_button_text'])): ?>
                           <div class="slider__btn-9 mb-85">
                              <a <?php $this->print_render_attribute_string( 'hero_button_url' ); ?> class="tp-btn-5 tp-link-btn-3"> 
							  <?php echo esc_html( $settings['hero_button_text'] ); ?> 
                                 <span>
                                    <i class="fa-regular fa-arrow-right"></i>
                                 </span>
                              </a>
                           </div>
						   <?php endif; ?>

                           <div class="slider__social-9 d-flex flex-wrap align-items-center">
                              <span>Check out my:</span>
                              <ul>
								<?php foreach($settings['list'] as $item): ?>
                                 <li>
                                    <a href="<?php echo esc_url( $item['icon_url'] ); ?>">
									<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </a>
                                 </li>
                                <?php endforeach; ?>
                              </ul>
                           </div>
                        </div>
                     </div>
					 <?php if(!empty($settings['hero_image']['url'])): ?>
                     <div class="col-xl-5 col-lg-6 col-md-5 order-first order-md-last">
                        <div class="slider__thumb-9 p-relative scene">
                           <div class="slider__shape">
                              <div class="slider__shape-20">
                                 <img class="layer" data-depth=".2" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/9/slider-shape-1.png" alt="">
                              </div>
                              <div class="slider__shape-21">
                                 <img class="layer" data-depth=".3" src="<?php echo get_template_directory_uri(); ?>/assets/img/slider/9/slider-shape-2.png" alt="">
                              </div>
                           </div>
                           <img class="slider__thumb-9-main" src="<?php echo esc_url( $settings['hero_image']['url'] );?>" alt="">
                        </div>
                     </div>
					 <?php endif; ?>
                  </div>
               </div>
            </div>
         </section>
         <!-- slider area end -->

		<?php
	}
}
