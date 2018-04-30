old loops
<!-- the loop -->

<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

<?php if ( $wpb_all_query->have_posts() ) : ?>


<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>

    <article class="list-item bg-white flex flex-column items-start">
        <?php if(has_post_thumbnail()): ?>
            <a class="h3 db article-image" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
            </a>
        <?php endif; ?>
        <div class="ph4 pv5 relative flex flex-grow-1 items-center">
            <div class="absolute right-0 top-0 pa3 cat-links ttu f8 dark-gray tracked">
                <?php the_category( ' ' ); ?>
            </div>
            <div>
                <a class="f4 link db dark-gray lh-title mb3 pb1" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <a class="link blue db" href="<?php the_permalink(); ?>">
                    Read more
                    <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                </a>
            </div>
        </div>
    </article>

<?php endwhile; ?>
<!-- end of the loop -->
<?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>