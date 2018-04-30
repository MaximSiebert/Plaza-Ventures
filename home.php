<?php /* Template Name: Home */?>
<?php get_header();?>
<section id="content" class="scene_element scene_element--fadein" role="main">
    <?php if (have_posts()): while (have_posts()): the_post();?>
        <section class="container pb5">
            <div class="home-landing pt6-ns pt5 pb6-l pb4-ns flex flex-wrap items-center relative">
                <div class="w-grid-7-l mb5-ns mb4 home-heading mw7">
                    <h2 class="ma0 fw3 f-subheadline-ns f2-med lh-title-ns lh-small">
                        <?php the_field('heading'); ?>
                    </h2>
                </div>
                <div class="w-grid-4-l ml-auto db-l flex flex-row-reverse-m flex-column-ns flex-column-reverse f5 lh-large mid-gray bird-content">
                    <div class="w-grid-6-m tc mt0-ns mt4">
                        <img class="style-svg nl4-l pl1-l dib-m" src='<?php the_field('image'); ?>'>
                    </div>
                    <div class="w-grid-6-m mb0-ns mb2">
                    <?php the_content();?>
                    <?php
                    $philosophy = get_field('our_philosophy_link');	
                    if( $philosophy ): ?>
                        <a class="link blue" href="<?php echo $philosophy['link']['url']; ?>">
                            <?php echo $philosophy['label']; ?>
                            <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                        </a>
                    <?php endif; ?>
                    </div>
                </div>
                <img class="style-svg db-l dn absolute bottom-0 mb5" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-down.svg'>
            </div>
        </section>
        <section class="relative mb5-l container">
            <div class="swiper-container relative">
                <?php if( have_rows('slideshow') ): ?>
                    <div class="absolute z-2 w-100 swiper-navigation">
                        <div class="flex justify-center">
                            <div class="w-90 w-grid-10-m flex">
                                <div class="swiper-button swiper-prev pointer">
                                    <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-left-arrow.svg'>
                                </div>
                                <div class="swiper-button swiper-next pointer ml-auto">
                                    <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-right-arrow.svg'>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-wrapper">
                    <?php while( have_rows('slideshow') ): the_row(); 
                        // vars
                        $image = get_sub_field('slideshow_image');
                        $client_logo = get_sub_field('client_logo');
                        $description = get_sub_field('description');
                        $link = get_sub_field('link');
                        $link_label = get_sub_field('link_label');
                        ?>
                        <div class="swiper-slide relative">
                            <div class="cover slider-image" style="background: url('<?php echo $image['url']; ?>') no-repeat center center"></div>
                            <div class="absolute-l bottom-0 left-0 w-100 pb4-l mb2-l slideshow-details">
                                <div class="container flex-m justify-center">
                                    <div class="bg-white w-grid-5-l w-grid-10-ns w-100 pb4-l pl4-l pr4-l pt3 pb5 mt2">
                                        <div class="flex mb3 pb1 items-center mt2">
                                            <p class="ttu f8 dark-gray tracked ma0">Recent Investments</p>
                                            <div class="swiper-pagination ml-auto"></div>
                                        </div>
                                        <div class="flex-m">
                                            <div class="w-grid-3-m w-100">
                                                <a href="<?php echo $link; ?>" class="mb2-ns mb3 client-slider-logo h-auto-m db">
                                                    <img class="w-auto h-auto" src='<?php echo $client_logo; ?>'>
                                                </a>
                                            </div>
                                            <div class="w-grid-6-m ml-auto">
                                                <p class="mid-gray lh-copy f6 mt3-l mt0 mb3"><?php echo $description; ?></p>
                                                <a href="<?php echo $link; ?>" class="dib ttu tracked dark-gray bb f8"><?php echo $link_label; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section class="container-ns bg-light-gray mb6-ns mb4 flex flex-wrap justify-center pt5 pb5-l pb0-m pb3">
            <?php
            $community = get_field('community_support');	
            if( $community ): ?>
            <div class="w-grid-10-ns w-90">
                <div class="flex flex-wrap mb5">
                    <div class="w-grid-4-l">
                        <h3 class="mw5-5 f1-ns f2 fw3 ma0 mb0-l mb3 lh-solid"><?php echo $community['heading']; ?></h3>
                    </div>
                    <div class="w-grid-7-l ml-auto-l f5 lh-large mid-gray">
                        <div class="nl1-l">
                            <p><?php echo $community['description']; ?></p>
                            <a class="link blue" href="<?php echo $community['link']['url']; ?>">
                                <?php echo $community['link_label']; ?>
                                <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if( have_rows('lp_network_partners', 196 ) ): ?>
                <ul class="list ma0 pa0 flex flex-wrap w-grid-10-ns w-90 partners">
                    <?php 
                    $counter = 0;
                    $max = 5;
                    while( (have_rows('lp_network_partners', 196 )) and ($counter < $max) ): the_row(); 
                        // vars
                        $image = get_sub_field('image');
                        $name = get_sub_field('name');
                        $title = get_sub_field('title');
                        $company = get_sub_field('company');
                        $interview_link = get_sub_field('interview_link');

                        ?>
                        <?php if (get_sub_field('show_on_homepage')):
                            $counter++;
                        ?>
                            <li class="ma0 partner w-20-l w-third-m w-100 db-ns flex items-center mb5-m mb0-l mb4 pb0-ns pb2">
                                <div class="mb3-ns w-grid-4 w-auto-ns">
                                    <div class="member-image cover" style="background: url('<?php echo $image['url']; ?>') no-repeat center center;"></div>
                                </div>
                                <div class="pt1 pr3-m pl0-ns pl3 ml0-ns ml2 w-auto-ns w-grid-8">
                                    <p class="dark-gray lh-title ma0 mb3-ns mb2 f4 fw4 mw4-ns"><?php echo $name ?></p>
                                    <p class="mid-gray f7 lh-medium mt1 mb2"><?php echo $title ?></p>
                                    <?php if(get_sub_field('company')): ?>
                                        <p class="mid-gray f7 lh-medium mv1"><?php echo $company ?></p>
                                    <?php endif;?>
                                    <?php if(get_sub_field('interview_link')): ?>
                                        <a href="<?php echo $interview_link['url'] ?>" class="dib ttu tracked dark-gray bb f8 pa0 mt3 pointer">Read Interview</a>
                                    <?php endif;?>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php endif; ?>
        </section>
        <section class="container mb5-ns mb4 pt0-ns pt3">
            <?php
            $fund = get_field('new_kind_of_fund');	
            if( $fund ): ?>
                <h3 class="f-headline-ns f-subheadline ma0 mb5 mw5-6-ns mw5-7 fw3 lh-title remove-p"><?php echo $fund['heading']; ?></h3>
                <div class="flex flex-wrap">
                    <?php while ( have_rows( 'new_kind_of_fund' ) ) : the_row();
                        if ( have_rows( 'column' ) ) : ?>
                            <?php
                            while ( have_rows( 'column' ) ) : the_row();

                                $image = get_sub_field('image');
                                $heading = get_sub_field('heading');
                                $description = get_sub_field('description');
                                $link = get_sub_field('link');
                                $link_label = get_sub_field('link_label');
                            ?>
                            <div class="w-grid-3-l mr5-l mb0-l mb4 pb0-l pb2 flex-m">
                                <div class="h3-l w-grid-2-m pv5-l pv0-m pb4 mb2 mr5-m flex items-center-l items-start">
                                    <img class="style-svg" src="<?php echo $image['url'] ?>">
                                </div>
                                <div class="w-grid-8-m">
                                    <h4 class="ma0 f4 fw4 mb3 lh-title"><?php echo $heading ?></h4>
                                    <p class="mid-gray f5 lh-large"><?php echo $description ?></p>
                                    <?php if ( $link ) : ?>
                                        <a class="link blue f5" href="<?php echo $link['url']; ?>">
                                            <?php echo $link_label ?>
                                            <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </section>
    <?php endwhile;endif;?>
</section>
<?php // get_sidebar();?>

<?php get_footer();?>