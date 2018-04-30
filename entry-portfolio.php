<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="flex flex-wrap justify-end relative mb4 pb2">

        <div class="client-logo-list absolute left-0 w-grid-3-m w-55 ml0-ns nl-5" style="background-color:<?php the_field('brand_colour', $post->ID); ?>;">
            <?php if (get_field('exited', $post->ID)) : ?>
                <img class="z-1 style-svg absolute exit-flag h-auto left-0 top-0" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-exit.svg'>
            <?php endif; ?>
            <?php if (get_field('hide_detail', $post->ID) == false) : ?>
                <a class="flex items-center justify-center h-100 relative" href="<?php the_permalink(); ?>">
            <?php else : ?>
                <div class="flex items-center justify-center h-100 relative">
            <?php endif; ?>
                    <?php $logo = get_field('brand_logo_white', $post->ID); ?>
                    <div class="logo-wrap tc contain w-100 h-100" style="background: url(<?php echo $logo['url']; ?>) no-repeat center center"></div>
                    <header class="offscreen">
                        <h2 class="entry-title ma0"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    </header>
            <?php if (get_field('hide_detail', $post->ID) == false) : ?>
                </a>
            <?php else : ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="absolute right-0 pa3 ttu tracked dark-gray f8 flex-ns dn">
            <p class="ma0 lh-copy"><?php the_field('overview_industry', $post->ID); ?></p>
            <?php if( have_rows('overview_investment_series' ) ): ?>
                    <?php while( have_rows('overview_investment_series' ) ): the_row(); 
                        // vars
                        $fund = get_sub_field('fund');

                        ?>
                            <p class="ma0 lh-copy border-left ml3 pl3"><?php echo $fund ?></p>
                    <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <div class="w-grid-4-l w-grid-5-m w-100 post-image">
            <?php 
                $image = get_field('thumbnail', $post->ID); 
            ?>
            <?php if (get_field('hide_detail', $post->ID) == false) : ?>
                <a class="db h-100 cover" href="<?php the_permalink(); ?>" style="background: url(<?php echo $image['url'] ?>) no-repeat top right;"></a>
            <?php else : ?>
                <div class="db h-100 cover" style="background: url(<?php echo $image['url'] ?>) no-repeat top right;"></div>
            <?php endif; ?>
                
        </div>
        <div class="w-grid-7-l w-grid-6-m w-100 pa4-ns pt5-ns ph3 pv4 pb4-l pb5-m pb4 bg-light-gray">
            <div class="ph3-l pb3-l ph2-m pb2-m pt3-m">
                <p class="f4 lh-medium ma0 mb0-l mb3"><?php the_field('overview_description', $post->ID); ?></p>
                <p class="f6 lh-large mt3 mb0 mid-gray db-l dn"><?php the_field('overview_long_description', $post->ID); ?></p>
                <?php if (get_field('hide_detail', $post->ID) == false) : ?>
                    <a class="dib ttu tracked dark-gray bb f8 mb2 mt3" href="<?php the_permalink(); ?>">Learn about <?php the_title(); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>