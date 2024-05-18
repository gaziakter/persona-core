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
class Persona_Awards_Widget extends Widget_Base {

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
		return 'persona-awards-widget';
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
		return __( 'Persona Awards', 'persona' );
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
			'persoan_exprience_section',
			[
				'label' => esc_html__( 'Persona Exprience List', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Award Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Modern painting award jump' , 'persona-core' ),
				'label_block' => true,
			]
		);
          
		$repeater->add_control(
			'item_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Runner Up - Decor of the week' , 'persona-core' ),
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

        $repeater->add_control(
			'item_duration',
			[
				'label' => esc_html__( 'Award year', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Art direction 2021' , 'persona-core' ),
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
                    <div class="award__item-wrapper-9">
                    <?php foreach($settings['persona_item_list'] as $key => $item): ?>
                        <div class="award__item-9 p-relative wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                           <div class="row align-items-center">
                              <div class="col-xl-3 col-lg-3 col-md-3">
                                 <div class="award__topic">
                                    <p><?php echo esc_html( $item['item_duration'] ); ?></p>
                                 </div>
                              </div>
                              <div class="col-xl-7 col-lg-7 col-md-7">
                                 <div class="award__content-9">
                                    <h3 class="award__title-9">
                                       <a href="<?php echo esc_url( $item['item_url'] ); ?>" class="tp-img-reveal tp-img-reveal-item" data-img="<?php echo esc_url( $item['item_image']['url']); ?>" data-fx="1" style=""><?php echo esc_html( $item['item_title'] ); ?><div class="tp-img-reveal-wrapper" style="top: 331px; left: 1030px; opacity: 0;"><div class="tp-img-reveal-wrapper__inner" style="overflow: hidden; transform: translate(100%, 0%) matrix(1, 0, 0, 1, 0, 0);">
                <div class="tp-img-reveal-wrapper__img" style="background-image: url(<?php echo esc_url( $item['item_image']['url']); ?>); transform: translate(-100%, 0%) matrix(1, 0, 0, 1, 0, 0);">
                    <div class="tp-hover-wrapper"> 
                        <span class="tp-hover-subtitle"></span>
                        <h3 class="tp-hover-title"></h3>
                        <p></p>
                        <div class="tp-hover-meta">
                            <span>
                                <a href="#"></a>
                            </span>
                            <span>
                                <a href="#"></a>
                            </span>
                            <span>
                                <a href="#"></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div></div></a>
                                    </h3>
                                    <p><?php echo esc_html( $item['item_sub_title'] ); ?></p>
                                 </div>
                              </div>
                              <div class="col-xl-2 col-lg-2 col-md-2">
                                 <div class="award__btn-9 text-md-end">
                                    <a href="<?php echo esc_url( $item['item_url'] ); ?>" class="career-link-btn">
                                       <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M12.7334 1L21 9.00007L12.7334 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          <path d="M0.999999 8.99756H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                       </svg>                                          
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                    <?php endforeach; ?>

                     </div>

		<?php
	}
}