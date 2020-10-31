<?php get_header(); ?>

<main>
    <div class="blog-container-margins">
    <?php $loop = new WP_Query(array( 
'post_type' => 'post', 
'posts_per_page' => -1,
'orderby' => 'date'
)); 
?>

<?php if ( have_posts() ) : ?>
            
          
        <?php $i = 1; while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php if( $i == 1 ){ ?>
                    <div class="featured-blog-container">
                    <div class="featured-blog-container__img">
                    <a href="<?php the_permalink();?>">
                    <figure>
                    <?php the_post_thumbnail(); ?>
                    </figure>
                    </div> <!-- featured blog container img -->
                    </a>

    

                    <div class="featured-blog-container__text">
                    <p><?php echo get_the_category()[0]->cat_name; ?> | <span><?php the_date( get_option( 'date_format' ) ); ?></span></p>
                    <a href="<?php the_permalink();?>"><h1 class="featured-blog-container__title"><?php the_title() ;?></h1></a>
                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    <div class="author-container">
                    <?php echo get_avatar( get_the_author_meta('user_email')); ?>
                    <p><?php echo get_the_author(); ?></p>
                    </div> <!-- author container --> 
                    </div> <!-- featured blog container text -->

                     </div> <!-- featured blog container -->
           
                    <div class="blog-post-container">
               <?php } else if($i == 2 || $i == 3) { ?>
                    <div class="blog-post-container__single">
                    <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail(); ?>
                    </a>
                    <div class="blog-post-container__single__text">
                    <p><?php echo get_the_category()[0]->cat_name; ?> | <span><?php the_date( get_option( 'date_format' ) ); ?></span></p>
                    <h1 class="blog-post-container__single__title"><?php the_title() ;?></h1>
                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    <div class="author-container">
                    <?php echo get_avatar( get_the_author_meta('user_email')); ?>
                    <p><?php echo get_the_author(); ?></p>
                    </div> <!-- author container --> 
                    </div> <!-- featured blog container text -->
                     </div> <!-- blog-post-container 2 -->
              <?php  } 
               $i++; endwhile; ?>
              </div> <!-- right container -->
        
        
        <?php endif; ?>
        
        

    </div> <!-- container margins -->
</main>

<?php get_footer(); ?>