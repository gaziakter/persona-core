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
class Persona_Hero_Widget extends Widget_Base {

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
		return 'persona-hero-widget';
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
		return __( 'Hero', 'persona' );
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
			'hero_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Hy ! I am Brian miller', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your sub title here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Creative UI/UX designer', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your title here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_text',
			[
				'label' => esc_html__( 'Description', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Hi! I am a UI/UX Designer - creating bold & brave interface design for companies all across the world.', 'persona-core' ),
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
			'hero_button_text',
			[
				'label' => esc_html__( 'Button Text', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'book a call', 'persona-core' ),
				'placeholder' => esc_html__( 'Type your button text here', 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'hero_button_url',
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
                           <h3 class="slider__title-9"><?php echo esc_html( $settings['hero_title'] ); ?></h3>
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
                                 <li>
                                    <a href="#">
                                       <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M11.5 1H4.5C2.567 1 1 2.567 1 4.5V11.5C1 13.433 2.567 15 4.5 15H11.5C13.433 15 15 13.433 15 11.5V4.5C15 2.567 13.433 1 11.5 1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M10.7992 7.55891C10.8856 8.14148 10.7861 8.73646 10.5148 9.25922C10.2436 9.78197 9.81441 10.2059 9.28835 10.4707C8.76228 10.7355 8.16612 10.8276 7.58466 10.7341C7.0032 10.6405 6.46604 10.366 6.0496 9.94952C5.63315 9.53307 5.35862 8.99592 5.26506 8.41445C5.17149 7.83299 5.26365 7.23683 5.52844 6.71077C5.79322 6.1847 6.21714 5.75552 6.7399 5.48427C7.26266 5.21303 7.85764 5.11352 8.44021 5.19991C9.03445 5.28803 9.5846 5.56493 10.0094 5.98972C10.4342 6.41451 10.7111 6.96466 10.7992 7.55891Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M11.8496 4.15009H11.8596" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M12.5516 2.95306C10.7316 6.13806 7.22455 7.96507 3.57055 7.63607L1.35156 7.43306" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M3.45215 13.159C5.27215 9.97401 8.77916 8.147 12.4332 8.476L14.6521 8.67901" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M4.94043 1.70007L7.16642 4.46508C8.65742 6.31308 9.71443 8.46208 10.2744 10.7651L11.1214 14.2581" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                                                                  
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M1 6.72744H7.30022C8.79428 6.72744 10.0003 8.00656 10.0003 9.59115C10.0003 11.1757 8.79428 12.4549 7.30022 12.4549H1.90003C1.40501 12.4549 1 12.0253 1 11.5003V1.95457C1 1.42956 1.40501 1 1.90003 1H6.40019C7.89425 1 9.10029 2.27913 9.10029 3.86372C9.10029 5.44831 7.89425 6.72744 6.40019 6.72744H1Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"/>
                                          <path d="M11.7998 8.63659H19.0001C19.0001 6.52698 17.389 4.8183 15.3999 4.8183C13.4109 4.8183 11.7998 6.52698 11.7998 8.63659ZM11.7998 8.63659C11.7998 10.7462 13.4109 12.4549 15.3999 12.4549H16.903" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M16.7479 2.43195H14.0479" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                                                                   
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-5 col-lg-6 col-md-5 order-first order-md-last">
                        <div class="slider__thumb-9 p-relative scene">
                           <div class="slider__shape">
                              <div class="slider__shape-20">
                                 <img class="layer" data-depth=".2" src="assets/img/slider/9/slider-shape-1.png" alt="">
                              </div>
                              <div class="slider__shape-21">
                                 <img class="layer" data-depth=".3" src="assets/img/slider/9/slider-shape-2.png" alt="">
                              </div>
                           </div>
                           <img class="slider__thumb-9-main" src="assets/img/slider/9/slider-1.png" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- slider area end -->

		<?php
	}
}
