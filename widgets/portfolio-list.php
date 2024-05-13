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
		if ( ! empty( $settings['hero_button_url']['url'] ) ) {
			$this->add_link_attributes( 'hero_button_url', $settings['hero_button_url'] );
		}

		?>

		<!-- features area start -->
         <section class="features__area pt-140 pb-140">
            <div class="container">
               <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-6">
                     <div class="features__wrapper-9 mr-30">

					 	<?php foreach($settings['persona_process_list'] as $key => $item): 
							
							$active = ($key == 1)? 'active' : '';
							$index = $key+1;
						?>
                        <div class="features__content-9 features-item-content <?php echo esc_attr($active); ?>" rel="features-img-<?php echo esc_attr($index); ?>">
                           <span><?php echo esc_html( $item['process_sub_title'] ); ?></span>
                           <h3 class="features__title-9"><?php echo esc_html( $item['process_title'] ); ?> </h3>
                        </div>
						<?php endforeach; ?>

                     </div>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-6 d-none d-md-block">
                     <div class="features__thumb-wrapper-9 pl-20">
                        <div id="features-item-thumb" class="features-img-2">
								
							<?php foreach($settings['persona_process_list'] as $key => $item): 
								$active = ($key == 1)? 'active' : '';
								$index = $key+1;
							?>
                           <div class="features__thumb-9 transition-3 features-img-<?php echo esc_attr($index); ?> <?php echo esc_attr($active); ?>">
                              <img src="<?php echo esc_url( $item['process_image']['url'] ); ?>" alt="">
                              <div class="features__thumb-9-content">
                                 <p><?php echo esc_html( $item['process_content'] ); ?></p>

                                 <div class="features-users">
                                    <img src="<?php echo esc_url( $item['process_author_image']['url'] ); ?>" alt="">
                                 </div>
                              </div>
                           </div>
						   <?php endforeach; ?>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- features area end -->

		<?php
	}
}
