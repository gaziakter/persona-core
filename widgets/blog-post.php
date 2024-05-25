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
class Persona_Blog_post_Widget extends Widget_Base {

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
		return 'persona-blog-post-widget';
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
		return __( 'Persona Blog Post', 'persona' );
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
			'persoan_blog_post_section',
			[
				'label' => esc_html__( 'Persona post', 'persona-core' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
			]
		);

		$this->add_control(
			'cat_list',
			[
				'label' => esc_html__( 'Select Category', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => post_cat(),
			]
		);

		$this->add_control(
			'cat_exclude',
			[
				'label' => esc_html__( 'Select Exclude Category', 'persona-core' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => post_cat(),
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

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => !empty($settings['post_per_page']) ? $settings['post_per_page']: -1,
			'tax_query' => array(
				array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => !empty($settings['cat_exclude']) ? $settings['cat_exclude'] : $settings['cat_list'],
				'operator' => !empty($settings['cat_exclude']) ? 'NOT IN' : 'IN',
				),
			),
		);

		$query = new \WP_Query($args);
		?>

         <!-- blog area start -->
         <section class="blog__area grey-bg-12 pt-115 pb-90 p-relative z-index-1">
            <div class="container">
               <div class="row">

				<?php if($query->have_posts()): ?>
					<?php while($query->have_posts()): $query->the_post();?>
						<?php $category = get_the_category( get_the_ID()); ?>

						<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
							<div class="blog__item-9 mb-30 wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1s">
								<div class="blog__thumb-9 w-img fix">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								</div>
								<div class="blog__content-9">
								<div class="blog__meta-9">
									<span>
										<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
									</span>
									<span>
									<a href="#"><?php echo esc_html($category[0]->name); ?></a>
									</span>
								</div>
								<h3 class="blog__title-9">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								</div>
							</div>
						</div>
				  <?php endwhile; ?>
				  <?php wp_reset_postdata(); ?>
				<?php endif; ?>

               </div>
            </div>
         </section>
         <!-- blog area end -->
		<?php
	}
}
