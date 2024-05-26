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
			'persoan_contact-info_section',
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
						<?php foreach($settings['persona_contact_list'] as $item): ?>
                           <div class="contact__list-item-9 flex-wrap d-flex align-items-start">
                              <div class="contact__list-icon-9">
                                 <span>
                                    <svg width="24" height="24" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M18.973 15.697C18.973 16.021 18.901 16.354 18.748 16.678C18.595 17.002 18.397 17.308 18.136 17.596C17.695 18.082 17.209 18.433 16.66 18.658C16.12 18.883 15.535 19 14.905 19C13.987 19 13.006 18.784 11.971 18.343C10.936 17.902 9.901 17.308 8.875 16.561C7.84 15.805 6.859 14.968 5.923 14.041C4.996 13.105 4.159 12.124 3.412 11.098C2.674 10.072 2.08 9.046 1.648 8.029C1.216 7.003 1 6.022 1 5.086C1 4.474 1.108 3.889 1.324 3.349C1.54 2.8 1.882 2.296 2.359 1.846C2.935 1.279 3.565 1 4.231 1C4.483 1 4.735 1.054 4.96 1.162C5.194 1.27 5.401 1.432 5.563 1.666L7.651 4.609C7.813 4.834 7.93 5.041 8.011 5.239C8.092 5.428 8.137 5.617 8.137 5.788C8.137 6.004 8.074 6.22 7.948 6.427C7.831 6.634 7.66 6.85 7.444 7.066L6.76 7.777C6.661 7.876 6.616 7.993 6.616 8.137C6.616 8.209 6.625 8.272 6.643 8.344C6.67 8.416 6.697 8.47 6.715 8.524C6.877 8.821 7.156 9.208 7.552 9.676C7.957 10.144 8.389 10.621 8.857 11.098C9.343 11.575 9.811 12.016 10.288 12.421C10.756 12.817 11.143 13.087 11.449 13.249C11.494 13.267 11.548 13.294 11.611 13.321C11.683 13.348 11.755 13.357 11.836 13.357C11.989 13.357 12.106 13.303 12.205 13.204L12.889 12.529C13.114 12.304 13.33 12.133 13.537 12.025C13.744 11.899 13.951 11.836 14.176 11.836C14.347 11.836 14.527 11.872 14.725 11.953C14.923 12.034 15.13 12.151 15.355 12.304L18.334 14.419C18.568 14.581 18.73 14.77 18.829 14.995C18.919 15.22 18.973 15.445 18.973 15.697Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10"/>
                                       <path opacity="0.4" d="M15.8492 7.30039C15.8492 6.76039 15.4262 5.93239 14.7962 5.25739C14.2202 4.63639 13.4552 4.15039 12.6992 4.15039" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       <path opacity="0.4" d="M18.9992 7.3C18.9992 3.817 16.1822 1 12.6992 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <img class="contact-icon-shape" src="<?php echo esc_url(get_template_directory_uri().'assets/img/contact/contact-icon-shape.png'); ?> " alt="">
                                 </span>
                              </div>
                              <div class="contact__list-content-9">
                                 <h5><?php echo esc_html( $item['contact_list_title'] ); ?></h5>
                                 <p><a href="tel:67000-000-9012"><?php echo esc_html( $item['contact_list_sub_title'] ); ?></a></p>
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
