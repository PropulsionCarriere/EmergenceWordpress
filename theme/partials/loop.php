<?php
/**
 * "The Loop" partial.
 *
 * @package WPEmergeTheme
 *
 */
 <?php if ( have_posts() ) : ?>
	<div class="articles">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
				<?php Theme::partial('post-card')?>
		<?php endwhile; ?>
	</div>

	<?php
	carbon_pagination(
		'posts',
		[
			'enable_numbers' => true,
			'prev_html'      => '<a href="{URL}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> ' . esc_html__( 'Précédent', 'app' ) . '</a>',
			'next_html'      => '<a href="{URL}" class="btn btn-primary">' . esc_html__( 'Suivant', 'app' ) . ' <i class="fas fa-arrow-right"></i></a>',
			'first_html'     => '<a href="{URL}" class="btn btn-primary"></a>',
			'last_html'      => '<a href="{URL}" class="btn btn-primary"></a>',
			'limiter_html'   => '<li class="paging__spacer">...</li>',
		]
	);
	?>
<?php else : ?>
	<ul class="articles">
		<li class="article article--error404 article--not-found">
			<div class="article__body">
				<div class="article__entry">
					<p><?php echo esc_html( app_get_index_404_message() ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</li>
	</ul>
<?php endif; ?>
?>


