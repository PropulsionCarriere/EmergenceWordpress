<?php
/**
 * "The Loop" partial.
 *
 * @package WPEmergeTheme
 */

?>
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
<h1>
	Nos forfaits
</h1>
<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'nos-forfaits',
			'posts_per_page' => 12
			);
	
		$loop = new WP_Query( $args );
	

		if ( $loop->have_posts() ) {
			
			while ( $loop->have_posts() ) : $loop->the_post();
			
				wc_get_template_part( 'content', 'product' );
			
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->

<h1>
	Produits Morille Québec
</h1>
<hr>
<ul class="products">
	<?php
		$args = array(
			'post_type' => 'product',
			'product_cat' => 'produits-morille-quebec',
			'posts_per_page' => 12
			);
	
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			
			while ( $loop->have_posts() ) : $loop->the_post();
				wc_get_template_part( 'content', 'product' );
			
			endwhile;
		} else {
			echo __( 'No products found' );
		}
		wp_reset_postdata();
	?>
</ul><!--/.products-->


