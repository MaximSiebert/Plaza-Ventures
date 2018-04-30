<?php get_header();?>
<section id="content" class="mb5 mt4-ns scene_element scene_element--fadein" role="main">
    <div class="mb5-l pb3-l container-ns">
        <div class="swiper-container relative portfolio-archive-swiper">
            <?php if( have_rows('slideshow', 'option') ): ?>
                <div class="absolute z-2 w-100 swiper-navigation">
                    <div class="container flex">
                        <div class="swiper-button swiper-prev pointer">
                            <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-left-arrow.svg'>
                        </div>
                        <div class="swiper-button swiper-next pointer ml-auto">
                            <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-right-arrow.svg'>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                <?php while( have_rows('slideshow', 'option') ): the_row(); 
                    // vars
                    $image = get_sub_field('image');
                    $client_logo = get_sub_field('client_logo');
                    $description = get_sub_field('description');
                    $link = get_sub_field('link');
                    $link_label = get_sub_field('link_label');
                    ?>
                    <div class="swiper-slide relative">
                        <div class="cover slider-image" style="background: url('<?php echo $image['url']; ?>') no-repeat center center"></div>
                        <div class="absolute-l bottom-0 left-0 w-100 pb4-l mb2-l slideshow-details">
                            <div class="container flex-ns justify-center justify-end-l">
                                <div class="bg-white w-grid-5-l w-100 pb4-l pl4-l pr4-l pt3 pb5 mt2">
                                    <div class="flex mb3 pb1 items-center mt2">
                                        <p class="ttu f8 dark-gray tracked ma0">Recent Highlights</p>
                                        <div class="swiper-pagination ml-auto"></div>
                                    </div>
                                    <div class="flex-m">
                                        <div class="w-grid-3-m w-100">
                                            <a href="<?php echo $link['url']; ?>" class="mb2-ns mb3 client-slider-logo h-auto-m db">
                                                <img class="w-auto h-auto" src='<?php echo $client_logo['url']; ?>'>
                                            </a>
                                        </div>
                                        <div class="w-grid-6-m ml-auto">
                                            <p class="mid-gray lh-copy f6 mt3-l mt0 mb3"><?php echo $description; ?></p>
                                            <a href="<?php echo $link['url']; ?>" class="dib ttu tracked dark-gray bb f8"><?php echo $link_label; ?></a>
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
    </div>
    <div class="container">
        <header class="header">
            <h1 class="entry-title f1-ns f2 fw3 ma0 mb4 pb2 lh-solid">
                <?php if (is_day()) {printf(__('Daily Archives: %s', 'blankslate'), get_the_time(get_option('date_format')));} elseif (is_month()) {printf(__('Monthly Archives: %s', 'blankslate'), get_the_time('F Y'));} elseif (is_year()) {printf(__('Yearly Archives: %s', 'blankslate'), get_the_time('Y'));} else {_e('Our Portfolio Companies', 'blankslate');} ?>
            </h1>
        </header>
        <?php if (have_posts()): while (have_posts()): the_post();?>
            <?php get_template_part('entry-portfolio');?>
            <?php endwhile;endif;?>
        <?php // get_template_part('nav', 'below');?>
    </div>
</section>
<?php // get_sidebar();?>
<?php get_footer();?>