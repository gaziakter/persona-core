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
				'condition' => [
					'design_style' => 'style_01',
				],
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
