<?php get_header(); ?>

<div class="posts">
<?php
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        if( !is_single() && !is_page() ){
            ?><a href="<?php the_permalink(); ?>" class="title"><h1><?php the_title(); ?></h1></a><?php
            if(get_post_type() == "post") {
                ?>
                <div class="written-by"><img src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( get_the_author_meta('user_email') ) ) ) . "?d=mp"; ?>" class="author-avatar" /><span><?php the_author_posts_link(); ?></span></div>
                <?php
                echo get_the_date();
            }
            the_excerpt();
        } else {
            if(has_post_thumbnail()) {
                the_post_thumbnail();
            }
            ?> <h1 class="underline"><?php the_title(); ?></h1> <?php
            if( is_single() ){
                ?>
                <div class="written-by"><img src="<?php echo "https://www.gravatar.com/avatar/" . md5( strtolower( trim( get_the_author_meta('user_email') ) ) ) . "?d=mp"; ?>" class="author-avatar" /><span><?php the_author_posts_link(); ?></span></div>
                <?php
                echo get_the_date();
            }
            the_content();
        }
    endwhile; 
endif;

?>
</div>

<?php get_footer(); ?>