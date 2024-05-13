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
class Persona_Heading_Widget extends Widget_Base {

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
		return 'persona-heading-widget';
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
		return __( 'Persona Heading', 'persona' );
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
			'persoan_title_section',
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
		

		$this->end_controls_section();


		/** Button Section */
		$this->start_controls_section(
			'persoan_button_section',
			[
				'label' => esc_html__( 'Button', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                           <h3 class="about-title"><?php echo wp_kses_post( $settings['persona_title'] ); ?></h3>
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

         <!-- slider area start -->
         <section class="slider__area pt-40 p-relative fix d-none">
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
