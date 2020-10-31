<?php get_header(); ?>

<main>
<div class="about-page-header">
<?php $image = get_field('about_page_image');
if( !empty( $image ) ): ?>
    <img class="about-page-header__img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
<div class="about-page-header__text">
<h2><?php echo get_field('about_header_name');?></h2>
<h5><?php echo get_field('about_header_title');?></h5>
<?php echo get_field('about_header_description');?>
</div> <!-- about page header text -->
</div> <!-- about page header -->

<div class="about-page-info">
<?php
		while ( have_posts() ) :
            the_post(); ?>
            
            <div class="about-page-info__text">
                <?php the_content(); ?>
            </div>
        
	<?php endwhile; // End of the loop. ?>

</div> <!-- about page info -->
</main>

<?php get_footer(); ?>