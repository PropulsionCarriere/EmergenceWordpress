<?php
/**
 * App Layout: layouts/nosidebar.php
 *
 * This is the template that is used for displaying all pages by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WPEmergeTheme
 */

?>
<?php
if(is_front_page())
{?>
	<div  class="mainH mx-auto d-block">
	<h1>
		<?php 
		$term = get_term_by('slug', 'nos-forfaits', 'product_cat'); 
		echo $term->name; 
		?>
	</h1>
	
	<?php 
		$product_categories=get_terms('slug','product_cat',$args);
		$thumbnail_id=get_term_meta($term->term_id,'thumbnail_id',true);
		$thumbnail_result=wp_get_attachment_image($thumbnail_id,'mainheader',false,["class" => "img-fluid"]);
		echo $thumbnail_result;
	?>
	</div>


	<h3>
		Tout nos forfaits inclus dans le forfait : Panier Cadeaux d’une valeur de $ 100.00/pers.
	</h3>
	<div>
		<ul class="productsForfaits">
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
	</div>


	<div class="secondH ">
	<h1>
		<?php $term = get_term_by('slug', 'produits-morille-quebec', 'product_cat'); echo "".$term->name; 
		?>
	</h1>
		<?php 
			$product_categories=get_terms('slug','product_cat',$args);
			$thumbnail_id=get_term_meta($term->term_id,'thumbnail_id',true);
			$thumbnail_result=wp_get_attachment_image($thumbnail_id,'secondheader',false,["class" => "img-fluid"]);
			echo $thumbnail_result;
		?>	

	</div>

	<div>
		<ul class="productsMorille ">
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
	</div>

	
	<?php
 
		$argsPart = array(
			'post_type' => 'partenaires',
			'slug' => 'partenaire',
			'posts_per_page' => 12
			);
	
		$partenaire = new WP_Query($argsPart);
 

		if ( $partenaire->have_posts() ) 
		{
			echo '<div class="tablepartenaire"><ul id="horizontal-part">';
			while ( $partenaire->have_posts() ) 
			{
				$partenaire->the_post();

				echo '<li>' . get_the_post_thumbnail() . '</li>';
			}
				echo '</ul></div>';
		}else{ echo 'Aucun partenaires';}

		wp_reset_postdata();

}
else
{?>
	<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div <?php post_class(); ?>>
		<div class="page__content">
			<?php
			the_content();
			carbon_pagination( 'custom' );
			edit_post_link( __( 'Edit this entry.', 'app' ), '<p>', '</p>' );
			?>
		</div>
	</div>
<?php endwhile; }?>


