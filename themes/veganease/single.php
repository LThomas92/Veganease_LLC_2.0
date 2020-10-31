<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Veganease
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<section class="blog-post-single">

			<div class="blog-post-single__main-img">
				<?php the_post_thumbnail(); ?>
			</div>

			<h1 class="blog-post-single__title"><?php the_title();?></h1>
			<?php $category = get_the_category();
			$firstCategory = $category[0]->cat_name; 
			$link = get_category_link( $category[0]->term_id );
			?>
			<a href="<?php echo $link ?>"><p class="blog-post-single__author-cat"><?php echo $firstCategory;?></a> | <span><?php the_date();?></span></p>

			<div class="blog-single-content-margins">
			<div class="blog-single-main-content">
			<div class="blog-single-main-content__text">
			<?php the_content(); ?>

			<div class="blog-post-single__tags">
			<?php
			$posttags = get_the_tags();
			$count=0; $sep='';
			if ($posttags) {
				echo 'Tags: ';
				foreach($posttags as $tag) {
					$count++;
					echo $sep . '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
			$sep = ' | ';
					if( $count > 4 ) break; //change the number to adjust the count
				}
} ?>
			</div> <!-- blog post single tags -->

			</div> <!-- main content text -->

	

			<div class="related-posts-section">
			<h3>Related Posts</h3>
			<?php $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
		if( $related ) foreach( $related as $post ) {
		setup_postdata($post); ?>
				<ul style="list-style: none"> 
				<li>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</li>
			</ul>   
		<?php }
		wp_reset_postdata(); ?>


			</div> <!-- releated posts section -->

			</div> <!-- blog single main content -->
			
		
		

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</div> <!-- blog single content margins -->

	</main><!-- #main -->
	
	</section>

<?php
get_footer();
