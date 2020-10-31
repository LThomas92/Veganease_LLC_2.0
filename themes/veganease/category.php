<?php get_header(); ?>

<main id="primary" class="site-main">

<div class="tag-main-container">
<div class="tax-container-margins">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title">
				<?php
				/* translators: %s: Category title. */
				printf( __( 'Category: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?>
				</h1>
			</header><!-- .archive-header -->

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post(); ?>

            <div class="tax-single">
            <div class="tax-single__text">
            <a href="<?php the_permalink();?>"><h3 class="tax-single__text__title"><?php the_title();?></h3></a>
            <p class="tax-single__text__date"><?php echo the_date()?></p>
            <p class="tax-single__text__excerpt"><?php echo wp_trim_words(get_the_content(), 15)?></p>
            </div> <!-- tax single text -->

            <figure class="tax-single__img">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
            </figure> <!-- tax single img -->
            
            </div> <!-- tax single  -->
            
			<?php endwhile;?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

        </div> <!-- tax container margins -->
</div> <!-- tag main container -->

        </main>


<?php get_footer(); ?>