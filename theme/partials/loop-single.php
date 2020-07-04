<?php
/**
 * Single post partial.
 *
 * @package WPEmergeTheme
 */
global $post;
?>
<?php 
var_dump(is_front_page());

	while ( have_posts() ) : ?>
	<?php the_post(); ?>

	<article <?php post_class( 'article--single' ); ?>>

			<?php
			$title = apply_filters('emergence_render_post_title', 'partials/page-title', $post);
			WPEmerge\render($title);
			?>

		<div class="article__body">
			<div class="article__entry">
				<?php
					do_action('emergence_content_before_content', $post);
				 ?>
				<?php the_content(); ?>
				<?php
					do_action('emergence_content_after_content', $post);
				 ?>
			</div>
		</div>
	</article>

	<?php comments_template(); ?>

	<?php
	$pagination_next_label = apply_filters('emergence_show_pagination_single_loop', 'Next Article', $post);
	$pagination_back_label = apply_filters('emergence_show_pagination_single_loop', 'Previous Article', $post);
	if($pagination_next_label && $pagination_back_label){
		carbon_pagination(
			'post',
			[
				'prev_html' => '<a href="{URL}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> ' . esc_html__( 	$pagination_next_label, 'app' ) . '</a>',
				'next_html' => '<a href="{URL}" class="btn btn-primary">' . esc_html__( $pagination_back_label, 'app' ) . ' 	<i class="fas fa-arrow-right"></i></a>',
			]
		);
	}<?php endwhile; ?>



?>

