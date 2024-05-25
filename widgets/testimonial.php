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
class Persona_Testimonial_Widget extends Widget_Base {

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
		return 'persona-testimonial-widget';
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
		return __( 'Persona Testimonial', 'persona' );
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
			'persoan_testimonial_section',
			[
				'label' => esc_html__( 'Persona Testimonial List', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Testimonial Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Awesome product features' , 'persona-core' ),
				'label_block' => true,
			]
		);
        
		$repeater->add_control(
			'item_sub_title',
			[
				'label' => esc_html__( 'Client Name', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Shanelle Blake' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_image',
			[
				'label' => esc_html__( 'Choose Image', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater->add_control(
			'item_content',
			[
				'label' => esc_html__( 'Text Content', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( ' majority suffered alteration in some form by injected humour randomised look embarrassing in middle text ” ' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'persona_item_list',
			[
				'label' => esc_html__( 'Portfolio List', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'process_title' => esc_html__( 'Title #1','persona-core' ),
						'process_content' => esc_html__( 'Title #1','persona-core' ),
					],
					[
						'process_title' => esc_html__( 'Title #1','persona-core' ),
						'process_content' => esc_html__( 'Title #1','persona-core' ),
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
        if ( ! empty( $settings['item_url']['url'] ) ) {
			$this->add_link_attributes( 'item_url', $settings['item_url'] );
        }
		?>

<section class="testimonial__area pt-130 pb-135">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="section__title-wrapper-9 is-center mb-60">
                        <span class="section__title-pre-9">TESTIMONIAL</span>
                        <h3 class="section__title-9">People talk about us</h3>
                     </div>
                  </div>
               </div>
               <div class="row justify-content-center">
                  <div class="col-xxl-12">
                     <div class="testimonial__slider-9 p-relative">
                        <div class="testimonial__slider-active-9 slick-initialized slick-slider"><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 3580px;"><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 716px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"><div><div class="testimonial__item-9" style="width: 100%; display: inline-block;">
                              <div class="testimonial__content-9 text-center">
                                 <div class="testimonial__shape-quote-9">
                                    <img src="assets/img/testimonial/9/testimonial-quote-1.png" alt="">
                                 </div>
                                 <h4 class="testimonial-heading">Great Effort From Team</h4>
                                 <p>“ There are many variations passages Lorem Ipsum available the <br> majority suffered alteration in some form by injected humour randomised look embarrassing in middle text ” </p>
                          
                                 <div class="testimonial__avater-info-9">
                                    <h3 class="testimonial__avater-title-9">Shahnewaz Sakil</h3>
                                 </div>
                              </div>
                           </div></div></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 716px; position: relative; left: -716px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms linear 0s;" tabindex="-1"><div><div class="testimonial__item-9" style="width: 100%; display: inline-block;">
                              <div class="testimonial__content-9 text-center">
                                 <div class="testimonial__shape-quote-9">
                                    <img src="assets/img/testimonial/9/testimonial-quote-1.png" alt="">
                                 </div>
                                 <h4 class="testimonial-heading">Happy to deal with them</h4>
                                 <p>“ There are many variations passages Lorem Ipsum available the <br> majority suffered alteration in some form by injected humour randomised look embarrassing in middle text ” </p>
                          
                                 <div class="testimonial__avater-info-9">
                                    <h3 class="testimonial__avater-title-9">Shanelle Blake</h3>
                                 </div>
                              </div>
                           </div></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 716px; position: relative; left: -1432px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms linear 0s;" tabindex="-1"><div><div class="testimonial__item-9" style="width: 100%; display: inline-block;">
                              <div class="testimonial__content-9 text-center">
                                 <div class="testimonial__shape-quote-9">
                                    <img src="assets/img/testimonial/9/testimonial-quote-1.png" alt="">
                                 </div>
                                 <h4 class="testimonial-heading">Awesome product features</h4>
                                 <p>“ There are many variations passages Lorem Ipsum available the <br> majority suffered alteration in some form by injected humour randomised look embarrassing in middle text ” </p>
                          
                                 <div class="testimonial__avater-info-9">
                                    <h3 class="testimonial__avater-title-9">Steven Smith</h3>
                                 </div>
                              </div>
                           </div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 716px; position: relative; left: -2148px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms linear 0s;" tabindex="-1"><div><div class="testimonial__item-9" style="width: 100%; display: inline-block;">
                              <div class="testimonial__content-9 text-center">
                                 <div class="testimonial__shape-quote-9">
                                    <img src="assets/img/testimonial/9/testimonial-quote-1.png" alt="">
                                 </div>
                                 <h4 class="testimonial-heading">Design is a plan for elements</h4>
                                 <p>“ There are many variations passages Lorem Ipsum available the <br> majority suffered alteration in some form by injected humour randomised look embarrassing in middle text ” </p>
                          
                                 <div class="testimonial__avater-info-9">
                                    <h3 class="testimonial__avater-title-9">Jahanara Bibi</h3>
                                 </div>
                              </div>
                           </div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 716px; position: relative; left: -2864px; top: 0px; z-index: 998; opacity: 0; transition: opacity 500ms linear 0s;" tabindex="-1"><div><div class="testimonial__item-9" style="width: 100%; display: inline-block;">
                              <div class="testimonial__content-9 text-center">
                                 <div class="testimonial__shape-quote-9">
                                    <img src="assets/img/testimonial/9/testimonial-quote-1.png" alt="">
                                 </div>
                                 <h4 class="testimonial-heading">Their support is so cool</h4>
                                 <p>“ There are many variations passages Lorem Ipsum available the <br> majority suffered alteration in some form by injected humour randomised look embarrassing in middle text ” </p>
                          
                                 <div class="testimonial__avater-info-9">
                                    <h3 class="testimonial__avater-title-9">Jinny Carter</h3>
                                 </div>
                              </div>
                           </div></div></div></div></div></div>
                        <div class="row justify-content-center">
                           <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-10 col-sm-8">
                              <div class="testimonial__slider-nav-9 mt-35 mb-15 ml-25 mr-25 slick-initialized slick-slider"><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1036px; transform: translate3d(-296px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-4" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-2.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="-3" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-3.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="-2" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-14.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-15.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 74px;"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-1.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 74px;"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-2.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 74px;"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-3.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 74px;"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-14.jpg" alt="">
                                 </div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-15.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="5" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-1.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="6" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-2.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-3.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="8" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-14.jpg" alt="">
                                 </div></div></div><div class="slick-slide slick-cloned" data-slick-index="9" id="" aria-hidden="true" style="width: 74px;" tabindex="-1"><div><div class="testimonial__slider-9-thumb-nav" style="width: 100%; display: inline-block;">
                                    <div class="tp-border-loader">
                                       <svg width="116" height="116" viewBox="0 0 116 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <circle cx="58" cy="58" r="56.5" stroke-width="0"></circle> 
                                          <circle cx="58" cy="58" r="56.5" stroke-width="3" stroke-linecap="round" style="stroke-dashoffset: -356px; stroke-dasharray: 0px, 366px;"></circle>
                                      </svg>
                                    </div>
                                    <img src="assets/img/users/user-15.jpg" alt="">
                                 </div></div></div></div></div></div>
                              
                           </div>
                        </div>
                        <div class="testimonial__slider-arrow-9 d-none d-md-block"><button type="button" class="slick-prev testimonial-9-button-prev slick-arrow" style=""><i class="fa-regular fa-arrow-left"></i><span>Preview</span></button>
                           
                        <button type="button" class="slick-next testimonial-9-button-next slick-arrow" style=""><span>Next</span><i class="fa-regular fa-arrow-right"></i></button></div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

















                        <?php foreach($settings['persona_item_list'] as $key => $item): ?>
                        <div class="career__item transition-3 white-bg d-sm-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                           <div class="career__info d-sm-flex align-items-center">
                              <div class="career__logo mr-20">
                                 <span>
                                    <img src="<?php echo esc_url( $item['item_image']['url']); ?>" alt="">
                                 </span>
                              </div>
                              <div class="career__info-content">
                                 <h3 class="career__info-title"><?php echo esc_html( $item['item_title'] ); ?></h3>
                                 <span class="career__info-designation"><?php echo esc_html( $item['item_sub_title'] ); ?></span>
                              </div>
                           </div>
                           <div class="career__year text-sm-end">
                              <div class="career__btn">
                                 <a href="<?php echo esc_url( $item['item_url'] ); ?>" class="career-link-btn">
                                    <span>
                                       <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M17.7392 15.2608L18.0502 5.05021L7.83967 5.36134" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M5.32384 17.7797L18.0518 5.05176" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>                                                                               
                                    </span>                                       
                                 </a>
                              </div>
                              <div class="career__year-info">
                                 <p><?php echo esc_html( $item['item_duration'] ); ?></p>
                              </div>
                           </div>
                        </div>
                        <?php endforeach; ?>
		<?php
	}
}