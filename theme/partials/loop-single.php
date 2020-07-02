<?php
/**
 * Single post partial.
 *
 * @package WPEmergeTheme
 */
global $post;
?>
<?php 
if(is_front_page()== TRUE)
{
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
}
else
{
<div  class="mainH mx-auto d-block">
		<h1>
	<?php 
	$term = get_term_by('slug', 'nos-forfaits', 'product_cat'); 
	echo "".$term->name;?>
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
			'posts_per_page' => -1
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
	<?php $term = get_term_by('slug', 'produits-morille-quebec', 'product_cat'); echo "".$term->name; ?>
</h1>
	<?php 
	$product_categories=get_terms('slug','product_cat',$args);
	$thumbnail_id=get_term_meta($term->term_id,'thumbnail_id',true);
	$thumbnail_result=wp_get_attachment_image($thumbnail_id,'secondheader',false,["class" => "img-fluid"]);
	echo $thumbnail_result;
	?>	
	
</div>

<div>
	

<ul class="products ">
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
    echo '<div class="table"><ul id="horizontal-part">';
	while ( $partenaire->have_posts() ) 
	{
        $partenaire->the_post();
        
		echo '<li>' . get_the_post_thumbnail() . '</li>';
    }
    	echo '</ul></div>';
} else {
    
}

wp_reset_postdata();

?>
}

?>

