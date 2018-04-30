<article class="mb5 scene_element scene_element--fadein" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <figure class="featured-image ma0">
        <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
    </figure>
    <div class="relative">
        <?php if (get_field('exited', $post->ID)) : ?>
            <img class="style-svg absolute exit-flag h-auto left-0 top-0" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-exit-red.svg'>
        <?php endif; ?>
    </div>
    <div class="container flex flex-wrap flex-row-l flex-column-reverse items-center-m pt5">
        <div class="w-grid-7-l w-grid-10-m content pt0-l pt4-m">
            <header class="db-l dn">
                <?php if ( is_singular() ) { echo '<h1 class="entry-title ma0 offscreen">'; } else { echo '<h2 class="entry-title">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> <?php edit_post_link(); ?>
                <?php
                $brand = get_field('brand');	
                if( $brand ): ?>
                    <div class="w-grid-4 details-client-logo  mb5 mt2">
                        <img class="w-100" src='<?php echo $brand['logo_coloured']['url']; ?>' alt="<?php echo $brand['logo_coloured']['alt']; ?>">
                    </div>
                <?php endif; ?>
                <?php if(get_field('intro')): ?>
                    <p class="ma0 mb5 intro"><?php the_field('intro'); ?></p>
                <?php endif; ?>
            </header>
            <div class="mb5"><?php get_template_part( 'portfolio', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?></div>
            <?php if( have_rows('stats' ) ): ?>
                <div class="flex flex-wrap mb5">
                    <?php while( have_rows('stats' ) ): the_row(); 
                        // vars
                        $number = get_sub_field('number');
                        $description = get_sub_field('description');
                        ?>
                        <div class="w-grid-6-ns w-100 mb4 stat">
                            <p class="f-headline ma0 fw3 lh-title"><?php echo $number ?></p>
                            <div class="entry-content stats">
                                <?php echo $description ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
            <?php if( have_rows('testimonials' ) ): ?>
                <div class="mb5">
                    <ul class="list ma0 pa0">
                        <?php while( have_rows('testimonials' ) ): the_row(); 
                            // vars
                            $testimonial = get_sub_field('testimonial');
                            $image = get_sub_field('image');
                            $name = get_sub_field('name');
                            $title = get_sub_field('title');
                            $company = get_sub_field('company');

                            ?>
                            <li class="ma0 mb5 bt bw2 b--light-gray pt4">
                                <div class="entry-content testimonial mb4">
                                    <p><?php echo $testimonial ?></p>
                                </div>
                                <div class="flex">
                                    <div class="w4 mr2">
                                        <img class="w-100 h-auto" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                                    </div>
                                    <div class="bg-white flex-auto ph3 flex items-center">
                                        <div>
                                            <p class="dark-gray f7 lh-copy ma0"><?php echo $name ?></p>
                                            <p class="dark-gray f7 lh-copy ma0"><?php echo $title ?></p>
                                            <p class="dark-gray f7 lh-copy ma0"><?php echo $company ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if( have_rows('additional_images' ) ): ?>
                <div class="pt3-ns image-list">
                        <?php while( have_rows('additional_images' ) ): the_row(); 
                            // vars
                            $image = get_sub_field('image');

                            ?>
                                <img class="w-100 h-auto mb5-ns mb4" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                        <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="w-grid-4-l w-100 pl4-l ml-auto db-l">
            <header class="dn-l db content w-grid-10-ns center">
                <?php if ( is_singular() ) { echo '<h1 class="entry-title ma0 offscreen">'; } else { echo '<h2 class="entry-title">'; } ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> <?php edit_post_link(); ?>
                <?php
                $brand = get_field('brand');	
                if( $brand ): ?>
                    <div class="details-client-logo w-grid-4-l w-grid-5-m w-grid-8 mb5-ns mb4 mt2">
                        <img class="w-100" src='<?php echo $brand['logo_coloured']['url']; ?>' alt="<?php echo $brand['logo_coloured']['alt']; ?>">
                    </div>
                <?php endif; ?>
                <?php if(get_field('intro')): ?>
                    <p class="ma0 mb5 intro"><?php the_field('intro'); ?></p>
                <?php endif; ?>
            </header>
            <div class="bg-red" style="background-color:<?php echo $brand['colour']; ?>;">
                <p class="f4 white ph4-l ph0-m ph3 ma0 pv3 w-grid-10-m center">
                    Overview
                </p>
            </div>
            <div class="bg-light-gray pt4 pb4-l ph4-l ph0-m ph3 pb5-m pb3 mb5-ns mb4">
                <div class="flex-m flex-wrap w-grid-10-m center">
                    <?php
                    $overview = get_field('overview');	
                    if( $overview ): ?>
                        <div class="w-grid-6-m">
                            <p class="f5-l f4-m f5 lh-large-l lh-medium-m lh-large mid-gray mb4 mt0"><?php echo $overview['description']; ?></p>
                            <div class="team mb4">
                                <?php
                                $team = $overview['team'];	
                                if( $team ): ?>
                                    <p class="ttu f8 dark-gray tracked mb2 pb1"><?php echo $team['label']; ?></p>
                                    <?php if( have_rows('overview_team_employee' ) ): ?>
                                        <ul class="list ma0 pa0">
                                            <?php while( have_rows('overview_team_employee' ) ): the_row(); 
                                                // vars
                                                $image = get_sub_field('image');
                                                $name = get_sub_field('name');
                                                $title = get_sub_field('title');
                                                $url = get_sub_field('url');

                                                ?>
                                                <li class="ma0 mb2 pt1">
                                                    <div class="flex bg-white">
                                                        <?php if ($url) : ?>
                                                            <a class="w3 flex-shrink-0" href="<?php echo $url ?>" target="_blank">
                                                        <?php else : ?>
                                                            <div class="w3 flex-shrink-0">
                                                        <?php endif; ?>
                                                                <img class="w-100 h-auto" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                                                        <?php if ($url) : ?>
                                                            </a>
                                                        <?php else : ?>
                                                            </div>
                                                        <?php endif; ?>
                                                        <div class="bg-white flex-auto ph3 pv2 flex items-center">
                                                            <div>
                                                                <p class="dark-gray f7 lh-copy ma0"><?php echo $name ?></p>
                                                                <p class="dark-gray f7 lh-copy ma0"><?php echo $title ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="pt1 w-grid-5-m ml-auto-m">
                            <div class="bb b--dotted b--dark-gray pb3 mb3">
                                <p class="ttu f8 dark-gray tracked mb2">Industry</p>
                                <p class="f4 mid-gray ma0 pb1"><?php echo $overview['industry']; ?></p>
                            </div>
                            <div class="bb b--dotted b--dark-gray pb3 mb3">
                                <p class="ttu f8 dark-gray tracked mb2 pt2">Year Founded</p>
                                <p class="f4 mid-gray ma0 pb1"><?php echo $overview['year_founded']; ?></p>
                            </div>
                            <div class="bb b--dotted b--dark-gray pb3 mb3">
                                <p class="ttu f8 dark-gray tracked mb2 pt2">Investment Series</p>
                                <p class="f4 mid-gray ma0 pb1 funds">
                                    <?php if( have_rows('overview_investment_series' ) ): ?>
                                            <?php while( have_rows('overview_investment_series' ) ): the_row(); 
                                                // vars
                                                $fund = get_sub_field('fund');

                                                ?>
                                                    <span><?php echo $fund ?></span>
                                            <?php endwhile; ?>
                                    <?php endif; ?>
                                </p>
                            </div>
                            <div class="pb3 mb3">
                                <p class="ttu f8 dark-gray tracked mb2 pt2">Visit</p>
                                <a class="db dark-gray ma0 pb1" href="<?php echo $overview['website']; ?>" target="_blank"><?php echo $overview['website']; ?></a>
                            </div>
                            <div class="flex items-center mb4">
                                <?php if( have_rows('overview_social_networks') ): ?>
                                    <?php while( have_rows('overview_social_networks') ): the_row(); 
                                        // vars
                                        $icon = get_sub_field('icon');
                                        $link = get_sub_field('link');
                                        ?>
                                            <a class="db mr4" href="<?php echo $link; ?>" target="_blank">
                                                <img class="style-svg social-icon" src="<?php echo $icon['url']; ?>">
                                            </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="pt1 w-100 mt0-l mt3 db-ns dn">
                        <?php
                        $brand = get_field('brand');	
                        if( $brand ): ?>
                            <a class="twitter-timeline" data-height="900" data-link-color="<?php echo $brand['colour']; ?>" href="<?php echo $overview['twitter_feed_url']; ?>">Tweets by <?php the_title(); ?></a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if( have_rows('highlights' ) ): ?>
                <div class="db-l dn">
                    <p class="f2 fw3 mb4">Recent highlights</p>
                    <div>
                        <ul class="list ma0 pa0">
                            <?php while( have_rows('highlights' ) ): the_row(); 
                                // vars
                                $image = get_sub_field('image');
                                $description = get_sub_field('description');
                                $url = get_sub_field('url');
                                ?>
                                <li class="bb b--dotted b--dark-gray pb3 mb3 highlight-image">
                                    <div class="flex">
                                        <?php if ($url) : ?>
                                            <a href="<?php echo $url ?>" target="_blank" class="w-grid-6 pa2 tc">
                                        <?php else : ?>
                                            <div class="w-grid-6 pa2 tc">
                                        <?php endif; ?>
                                                <img class="dib" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                                        <?php if ($url) : ?>
                                            </a>
                                        <?php else : ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="w-grid-6 bg-white flex-auto pl3 pr2 pv2 flex items-center">
                                            <div>
                                                <p class="dark-gray f7 lh-copy ma0"><?php echo $description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="w-grid-10-m center">
            <?php if( have_rows('highlights' ) ): ?>
                <div class="dn-l db">
                    <p class="f1-ns f2 fw3 mb5-ns mb4 mt5">Recent highlights</p>
                    <div>
                        <ul class="list ma0 pa0">
                            <?php while( have_rows('highlights' ) ): the_row(); 
                                // vars
                                $image = get_sub_field('image');
                                $description = get_sub_field('description');
                                $url = get_sub_field('url');
                                ?>
                                <li class="bb b--dotted b--dark-gray pb3 mb3 highlight-image">
                                    <div class="flex">
                                        <?php if ($url) : ?>
                                            <a href="<?php echo $url ?>" target="_blank" class="w-grid-6-l w-third pa2 tc">
                                        <?php else : ?>
                                            <div class="w-grid-6-l w-third pa2 tc">
                                        <?php endif; ?>
                                                <img class="dib" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                                        <?php if ($url) : ?>
                                            </a>
                                        <?php else : ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="w-grid-6 bg-white flex-auto pl3 pr2 pv2 flex items-center">
                                            <div>
                                                <p class="dark-gray f7 lh-copy ma0"><?php echo $description ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <?php
                $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
                if( $related ): ?>
                    <section class="pt5 mb5-ns mb4">
                        <div class="flex flex-wrap items-start">
                            <div class="w-20-l w-100 border-right-l pr5 pt2 pb4">
                                <p class="ma0 f1-ns f2 fw3 ma0 lh-solid">Recent news</p>
                            </div>
                            <?php foreach( $related as $post ) {
                            setup_postdata($post); ?>
                                <div class="w-20-l w-100 ml5-l pt3-l pb0-l pb4 mb0-l mb4 last bn-l bb b--dotted b--dark-gray">
                                    <a class="link dark-gray mb3 db f5 lh-large" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                    <a class="link blue db f5" href="<?php the_permalink(); ?>">
                                        Read more
                                        <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </section>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <section class="pv4-ns pt4">
        <div class="bg-gray pv5-ns pv4">
            <nav id="nav-below" class="container flex flex-wrap" role="navigation">
                <?php $prev_post = get_adjacent_post( false, '', true); ?>
                <?php if ( is_a( $prev_post, 'WP_Post' ) && (get_field('hide_detail', $prev_post->ID ) == false)  ) { ?>
                    <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="flex db portfolio-pagination nav-previous w-50-ns w-100 relative">
                        <div class="mr2-ns mb0-ns mb3 mt0-ns mt2 bg-white bl pv4 bw2 w-100" style="border-color: <?php the_field('brand_colour', $prev_post->ID ); ?>">
                            <span class="absolute left-0 pl4-ns pl3 ml0-ns ml2 top-0 arrow">
                                <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-left-arrow-dark.svg'>
                            </span>
                            <p class="ttu tracked dark-gray mt0 mb3 f8">Previous</p>
                            <p class="pt2 f1-l f3 fw3-l ma0 lh-solid dark-gray title"><?php echo get_the_title( $prev_post->ID ); ?></p>
                            <p class="f5 lh-large mid-gray mb0"><?php the_field('overview_description', $prev_post->ID ); ?></p>
                        </div>
                    </a>
                <?php } ?>
                <?php $next_post = get_adjacent_post( false, '', false); ?>
                <?php if ( is_a( $next_post, 'WP_Post' ) && (get_field('hide_detail', $next_post->ID ) == false) ) { ?>
                    <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="flex db portfolio-pagination nav-next w-50-ns w-100 ml-auto relative tr-ns">
                        <div class="ml2-ns mb0-ns mb2 bg-white br pv4 bw2 w-100" style="border-color: <?php the_field('brand_colour', $next_post->ID ); ?>">
                            <span class="absolute right-0 pr4-ns pr3 mr0-ns mr2 top-0 arrow">
                                <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-right-arrow-dark.svg'>
                            </span>
                            <p class="ttu tracked dark-gray mt0 mb3 f8">Next</p>
                            <p class="pt2 f1-l f3 fw3-l ma0 lh-solid dark-gray title"><?php echo get_the_title( $next_post->ID ); ?></p>
                            <p class="f5 lh-large mid-gray mb0"><?php the_field('overview_description', $next_post->ID ); ?></p>
                        </div>
                    </a>
                <?php } ?>
            </nav>
        </div>
    </section>
</article>