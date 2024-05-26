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
class Persona_Contact_Info_Widget extends Widget_Base {

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
		return 'persona-contact-info-widget';
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
		return __( 'Contact Info', 'persona' );
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
			'persona_contact-info_section',
			[
				'label' => esc_html__( 'Contact Info', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_title',
			[
				'label' => esc_html__( 'Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Start projects?' , 'persona-core' ),
				'label_block' => true,
			]
		);
		
		$repeater = new \Elementor\Repeater();


		$repeater->add_control(
			'contact_list_title',
			[
				'label' => esc_html__( 'Contact Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Phone Number' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'contact_list_sub_title',
			[
				'label' => esc_html__( 'Sub Title', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+67000-000 9012' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'contact_list_image',
			[
				'label' => esc_html__( 'Choose Image', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'contact_list_url',
			[
				'label' => esc_html__( 'url', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '#' , 'persona-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'persona_svg_icon',
			[
				'label' => esc_html__( 'SVG', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( '', 'persona-core' ),
				'placeholder' => esc_html__( 'SVG icon code here', 'persona-core' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'persona_contact_list',
			[
				'label' => esc_html__( 'Contact List', 'persona-core' ),
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

         <!-- contact area start -->
         <section class="contact__area pt-150 pb-150 p-relative z-index-1">
            <div class="contact__shape">
               <span class="contact__shape-1"></span>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6">
                     <div class="contact__wrapper-9">
                        <div class="section__title-wrapper-9 mb-85">
                           <h3 class="section__title-9"><?php echo esc_html( $settings['contact_title'] ); ?> </h3>
                        </div>
                        <div class="contact__list-9 mr-100">
						<?php foreach($settings['persona_contact_list'] as $key => $item): ?>
                           <div class="contact__list-item-9 flex-wrap d-flex align-items-start">
                              <div class="contact__list-icon-9">
                                 <span>

								 <?php echo $item['persona_svg_icon']; ?>

                                    <img class="contact-icon-shape" src="<?php echo esc_url( $item['contact_list_image']['url'] ); ?>" alt="">
                                 </span>
                              </div>
                              <div class="contact__list-content-9">
                                 <h5><?php echo esc_html( $item['contact_list_title'] ); ?></h5>
                                 <p><a href="<?php echo esc_url( $item['contact_list_url'] ); ?>"><?php echo esc_html( $item['contact_list_sub_title'] ); ?></a></p>
                              </div>
                           </div>
						   <?php endforeach; ?>
                        </div>
                     </div>
                  </div>
                  <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-6">
                     <div class="contact__form-9 pt-20 pl-70">
                        <h4 class="contact__form-9-title">Let's get in touch with us</h4>
                        <div class="contact__form-9-inner">
                           <form id="contact-form" action="assets/mail.php" method="POST">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="name" type="text" placeholder="Your name*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="email" type="email" placeholder="Your email address*">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="phone" type="text" placeholder="Mobile number">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="contact__input-9">
                                       <input name="subject" type="text" placeholder="Subject">
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="contact__input-9">
                                       <textarea name="message" placeholder="How can we help you?"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="contact__btn-9">
                                       <button type="submit" class="tp-btn-6 w-100">SEND MESSAGE</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <p class="ajax-response"></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- contact area end -->

		<?php
	}
}
