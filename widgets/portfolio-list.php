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
class Persona_Portfolio_list_Widget extends Widget_Base {

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
		return 'persona-portfolio-list-widget';
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
		return __( 'Portfolio List', 'persona' );
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

		$this->end_controls_section();


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
			'popup_style',
			[
				'label' => esc_html__( 'Selct Style', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'image_popup',
				'options' => [
					'image_popup' => esc_html__( 'Image Popup', 'persona-core' ),
					'video_popup' => esc_html__( 'Video Popup', 'persona-core' ),
				]
			]
		);

		$repeater->add_control(
			'popup_video_url',
			[
				'label' => esc_html__( 'Popup Video URL', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'persona-core' ),
				'label_block' => true,
				'condition' => [
					'popup_style' => 'video_popup',
				],
			]
		);


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

		<?php if($settings['design_style'] == 'style_01'): ?>
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
		 <?php elseif($settings['design_style'] == 'style_02'): ?>
         <!-- portfolio area start -->
         <section class="portfolio__area">
            <div class="container">
               <div class="row tp-gx-4">
			   <?php foreach($settings['persona_item_list'] as $key => $item): ?>
                  <div class="col-xl-4 col-lg-4 col-md-6">
                     <div class="portfolio__grid-item mb-40 wow fadeInUp" data-wow-delay="1.1s" data-wow-duration="1s">
                        <div class="portfolio__grid-thumb w-img fix">
                           <a href="<?php echo esc_url( $item['item_url'] ); ?>">
                              <img src="<?php echo esc_url( $item['item_image']['url']); ?>" alt="">
                           </a>
						   <?php if(!empty($item['popup_style'] == 'video_popup')): ?>
						   <div class="portfolio__grid-video">
                              <a href="<?php echo esc_url( $item['popup_video_url']); ?>" class="portfolio-play-btn popup-video">
                                 <svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 11L0 21.3923V0.607696L18 11Z" fill="currentColor"/>
                                 </svg>                                    
                              </a>
                           </div>
						   <?php else: ?>
                           <div class="portfolio__grid-popup">
                              <a href="<?php echo esc_url( $item['item_image']['url']); ?>" class="popup-image">
                                 <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.1667 8.33341H0.833333C0.377778 8.33341 0 7.95564 0 7.50008C0 7.04453 0.377778 6.66675 0.833333 6.66675H14.1667C14.6222 6.66675 15 7.04453 15 7.50008C15 7.95564 14.6222 8.33341 14.1667 8.33341Z" fill="currentColor"/>
                                    <path d="M7.4974 15C7.04184 15 6.66406 14.6222 6.66406 14.1667V0.833333C6.66406 0.377778 7.04184 0 7.4974 0C7.95295 0 8.33073 0.377778 8.33073 0.833333V14.1667C8.33073 14.6222 7.95295 15 7.4974 15Z" fill="currentColor"/>
                                 </svg>                                    
                              </a>
                           </div>
						   <?php endif; ?>
                        </div>
                        <div class="portfolio__grid-content">
                           <h3 class="portfolio__grid-title">
						   <a href="<?php echo esc_url( $item['item_url'] ); ?>"><?php echo esc_html( $item['item_title'] ); ?></a>
                           </h3>
                           <div class="portfolio__grid-bottom">
                              <div class="portfolio__grid-category">
                                 <span>
                                    <a href="<?php echo esc_url( $item['item_url'] ); ?>"><?php echo esc_html( $item['item_sub_title'] ); ?></a>
                                 </span>
                              </div>
                              <div class="portfolio__grid-show-project">
                                 <a href="<?php echo esc_url( $item['item_url'] ); ?>" class="portfolio-link-btn">
                                    Show project 
                                    <span>
                                       <svg width="26" height="9" viewBox="0 0 26 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M21.6934 1L25 4.20003L21.6934 7.4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          <path d="M0.999999 4.19897H25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
				  <?php endforeach; ?>
               </div>
            </div>
         </section>
         <!-- portfolio area end -->
		 <?php else: ?>	
			<h1>Design style 03</h1>					
		 <?php endif; ?>		

		<?php
	}
}
