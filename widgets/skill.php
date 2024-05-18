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
class Persona_skill_Widget extends Widget_Base {

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
		return 'persona-skill-widget';
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
		return __( 'Persona Skill', 'persona' );
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
			'persoan_item_list_section',
			[
				'label' => esc_html__( 'Portfolio List', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'item_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'STRATEGY' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Concept' , 'persona-core' ),
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
			'item_url',
			[
				'label' => esc_html__( 'URL', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'persona-core' ),
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
	
		?>


         <!-- skill area start -->
         <section class="skill__area pt-95 grey-bg-12 pb-125">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-5 col-xl-5 col-lg-5">
                     <div class="skill__wrapper-9">
                        <div class="section__title-wrapper-9 mb-55">
                           <span class="section__title-pre-9">Experience</span>
                           <h3 class="section__title-9">Skills & <br>Experience</h3>
                        </div>
                        <div class="skill__item-wrapper-9">
                           <div class="row">
                              <div class="col-xxl-6 col-md-6 col-sm-6 col-6">
                                 <div class="skill__item-9">
                                    <div class="skill__icon-9">
                                       <span>
                                          <img src="assets/img/skill/9/skill-icon-1.png" alt="">
                                       </span>
                                    </div>
                                    <div class="skill__content-9">
                                       <h4>Figma <span>(<span data-purecounter-duration="1" data-purecounter-end="90"  class="purecounter">0</span>%)</span></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-6 col-md-6 col-sm-6 col-6">
                                 <div class="skill__item-9">
                                    <div class="skill__icon-9">
                                       <span>
                                          <img src="assets/img/skill/9/skill-icon-2.png" alt="">
                                       </span>
                                    </div>
                                    <div class="skill__content-9">
                                       <h4>Xd <span>(<span data-purecounter-duration="1" data-purecounter-end="66"  class="purecounter">0</span>%)</span></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-6 col-md-6 col-sm-6 col-6">
                                 <div class="skill__item-9">
                                    <div class="skill__icon-9">
                                       <span>
                                          <img src="assets/img/skill/9/skill-icon-3.png" alt="">
                                       </span>
                                    </div>
                                    <div class="skill__content-9">
                                       <h4>Photoshop <span>(<span data-purecounter-duration="1" data-purecounter-end="80"  class="purecounter">0</span>%)</span></h4>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xxl-6 col-md-6 col-sm-6 col-6">
                                 <div class="skill__item-9">
                                    <div class="skill__icon-9">
                                       <span>
                                          <img src="assets/img/skill/9/skill-icon-4.png" alt="">
                                       </span>
                                    </div>
                                    <div class="skill__content-9">
                                       <h4>Sketch <span>(<span data-purecounter-duration="1" data-purecounter-end="86"  class="purecounter">0</span>%)</span></h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-7 col-xl-7 col-lg-7">
                     <div class="career__wrapper career__style-2 pl-60">
                        <h4 class="career__title">Experience</h4>
                        <div class="career__item transition-3 white-bg d-sm-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                           <div class="career__info d-sm-flex align-items-center">
                              <div class="career__logo mr-20">
                                 <span>
                                    <img src="assets/img/skill/company/9/company-icon-1.png" alt="">
                                 </span>
                              </div>
                              <div class="career__info-content">
                                 <h3 class="career__info-title">Product designer</h3>
                                 <span class="career__info-designation">Microsoft Edge</span>
                              </div>
                           </div>
                           <div class="career__year text-sm-end">
                              <div class="career__btn">
                                 <a href="portfolio-details.html" class="career-link-btn">
                                    <span>
                                       <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M17.7392 15.2608L18.0502 5.05021L7.83967 5.36134" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M5.32384 17.7797L18.0518 5.05176" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                                                               
                                    </span>                                       
                                 </a>
                              </div>
                              <div class="career__year-info">
                                 <p>April 2020 - Present</p>
                              </div>
                           </div>
                        </div>
                        <div class="career__item transition-3 white-bg d-sm-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                           <div class="career__info d-sm-flex align-items-center">
                              <div class="career__logo mr-20">
                                 <span>
                                    <img src="assets/img/skill/company/9/company-icon-2.png" alt="">
                                 </span>
                              </div>
                              <div class="career__info-content">
                                 <h3 class="career__info-title">UX/UX designer</h3>
                                 <span class="career__info-designation">Amazon Inc</span>
                              </div>
                           </div>
                           <div class="career__year text-sm-end">
                              <div class="career__btn">
                                 <a href="portfolio-details.html" class="career-link-btn">
                                    <span>
                                       <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M17.7392 15.2608L18.0502 5.05021L7.83967 5.36134" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M5.32384 17.7797L18.0518 5.05176" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                    </span>                                       
                                 </a>
                              </div>
                              <div class="career__year-info">
                                 <p>April 2016 - March 2020</p>
                              </div>
                           </div>
                        </div>
                        <div class="career__item transition-3 white-bg d-sm-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                           <div class="career__info d-sm-flex align-items-center">
                              <div class="career__logo mr-20">
                                 <span>
                                    <img src="assets/img/skill/company/9/company-icon-3.png" alt="">
                                 </span>
                              </div>
                              <div class="career__info-content">
                                 <h3 class="career__info-title">Product designer</h3>
                                 <span class="career__info-designation">Google</span>
                              </div>
                           </div>
                           <div class="career__year text-sm-end">
                              <div class="career__btn">
                                 <a href="portfolio-details.html" class="career-link-btn">
                                    <span>
                                       <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M17.7392 15.2608L18.0502 5.05021L7.83967 5.36134" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M5.32384 17.7797L18.0518 5.05176" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                    </span>                                       
                                 </a>
                              </div>
                              <div class="career__year-info">
                                 <p>April 2012 - March 2016</p>
                              </div>
                           </div>
                        </div>
                        <div class="career__item transition-3 white-bg d-sm-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
                           <div class="career__info d-sm-flex align-items-center">
                              <div class="career__logo mr-20">
                                 <span>
                                    <img src="assets/img/skill/company/9/company-icon-4.png" alt="">
                                 </span>
                              </div>
                              <div class="career__info-content">
                                 <h3 class="career__info-title">UI Designer</h3>
                                 <span class="career__info-designation">Dribbble</span>
                              </div>
                           </div>
                           <div class="career__year text-sm-end">
                              <div class="career__btn">
                                 <a href="portfolio-details.html" class="career-link-btn">
                                    <span>
                                       <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M17.7392 15.2608L18.0502 5.05021L7.83967 5.36134" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M5.32384 17.7797L18.0518 5.05176" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>                                          
                                    </span>                                       
                                 </a>
                              </div>
                              <div class="career__year-info">
                                 <p>April 2008 - March 2012</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- skill area end -->

         <!-- portfolio area start -->
         <section class="portfolio__area portfolio__overlay-9 fix">
            <div class="container-fluid gx-0">
               <div class="row gx-0">
                  <div class="col-xxl-12">
                     <div class="portfolio__slider-9 has-scrollbar p-relative">
                        <div class="portfolio__slider-active-9 swiper-container">
                           <div class="swiper-wrapper">

						   	<?php foreach($settings['persona_item_list'] as $key => $item): ?>

                              <div class="portfolio__item-9 w-img swiper-slide wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
								<?php if(!empty($item['item_image'])): ?>
                                 <div class="portfolio__thumb-9" style="background-image: url(<?php echo esc_url( $item['item_image']['url']); ?>)"></div>
                                 <?php endif; ?>
								 <div class="portfolio__content-9">

								 	<?php if(!empty($item['item_sub_title'])): ?>
                                    <div class="portfolio__tag-9">
                                       <span>
                                          <a href="#"><?php echo esc_html( $item['item_sub_title'] ); ?></a>
                                       </span>
                                    </div>
									<?php endif; ?>

									<?php if(!empty($item['item_title'])): ?>
                                    <h3 class="portfolio__title-9">
                                       <a href="<?php echo esc_url( $item['item_url'] ); ?>"><?php echo esc_html( $item['item_title'] ); ?></a>
                                    </h3>
									<?php endif; ?>
                                 </div>
                              </div>
							  <?php endforeach; ?>

                           </div>
                        </div>
                        <div class="portfolio__nav-9 d-none d-sm-block">
                           <button type="button" class="portfolio-button-prev-9"><i class="fa-regular fa-chevron-left"></i></button>
                           <button type="button" class="portfolio-button-next-9"><i class="fa-regular fa-chevron-right"></i></button>
                        </div>
                        <div class="tp-scrollbar mt-70 mb-50 grey-bg-12"></div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- portfolio area end -->

		<?php
	}
}
