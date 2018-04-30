
<?php

    $posts = get_posts(array(
        'meta_query' => array(
            array(
                'key' => 'featured',
                'compare' => '==',
                'value' => '1',
            ),
        ),
    ));

    $counter = 0;
    $max = 1;

    if ($posts): ?>
        <?php foreach ($posts as $post):
            setup_postdata($post)
        ?>
            <? if (($counter < $max) && (has_post_thumbnail())): ?>
                <article class="container pb5 mb2 pt4 mt2 flex flex-wrap items-center">
                    <p class="ttu tracked dark-gray mb4-ns mb3 pb2-ns pb3 f8 dn-l db"><?php the_time( get_option( 'date_format' ) ); ?></p>
                    <div class="w-grid-4-l w-100 order-0-l order-3 mt0-l mt4">
                        <p class="ttu tracked dark-gray mb4 pb2 f8 db-l dn"><?php the_time( get_option( 'date_format' ) ); ?></p>
                        <a class="link db dark-gray f2-med ma0 mb3 fw3 lh-title" href="<?php the_permalink();?>"><?php the_title();?></a>
                        <a class="link blue db" href="<?php the_permalink(); ?>">
                            Read more
                            <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                        </a>
                    </div>
                    <div class="w-grid-7-l w-100 ml-auto-l">
                        <a class="relative db featured-post-image cover" href="<?php the_permalink();?>" style="background: url(<?php echo get_the_post_thumbnail_url($post->ID,'full') ?>) no-repeat center center;">
                            <img class="style-svg absolute right-0 top-0" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-featured.svg'>
                        </a>
                    </div>
                    <div class="w-grid-7-l w-100 ml-auto-l">
                        <div class="flex pt3 mt2 items-center">
                            <div class="featured-item w-30">
                                <span class="cat-links ttu f8 dark-gray tracked"><?php the_category( ' ' ); ?></span>
                            </div>
                            <div class="ml-auto">
                                <a href="<?php the_permalink();?>" class="client-logo db flex items-center">
                                    <img class="w-auto h-100" src='<?php the_field('client_logo'); ?>'>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                <?php $counter++; ?>
            <?php endif; 
        endforeach;?>
        <?php wp_reset_postdata();?>
    <?php endif;?>
<div class="bg-gray pv4">
    <div class="container">
        <p class="ttu tracked dark-gray f8 ma0 mb3 pb2 mt2">
            Sort articles
        </p>
        <nav class="f4 archive-nav" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'archive-menu' ) ); ?>
        </nav>
    </div>
</div>