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
			'persoan_skill_section',
			[
				'label' => esc_html__( 'Skill', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'item_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Figma' , 'persona-core' ),
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
			'item_number',
			[
				'label' => esc_html__( 'Level', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '90' , 'persona-core' ),
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

                        <div class="skill__item-wrapper-9">
                           <div class="row">
                            <?php foreach($settings['persona_item_list'] as $key => $item): ?>
                              <div class="col-xxl-6 col-md-6 col-sm-6 col-6">
                                 <div class="skill__item-9">
                                    <div class="skill__icon-9">
                                       <span>
                                          <img src="<?php echo esc_url( $item['item_image']['url']); ?>" alt="">
                                       </span>
                                    </div>
                                    <div class="skill__content-9">
                                       <h4><?php echo esc_html( $item['item_title'] ); ?> <span>(<span data-purecounter-duration="1" data-purecounter-end="<?php echo esc_html( $item['item_number'] ); ?>"  class="purecounter">0</span>%)</span></h4>
                                    </div>
                                 </div>
                              </div>
                              <?php endforeach; ?>
                           </div>
                        </div>

		<?php
	}
}
