<?php /* Template Name: Philosophy */?>
<?php get_header();?>
<section id="content" class="mb5 mt4-ns mt2 scene_element scene_element--fadein" role="main">
    <?php if (have_posts()): while (have_posts()): the_post();?>
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <div class="flex flex-wrap container relative flex-column-reverse-so">
                <div class="w-grid-6-ns w-100 nl-grid-1-ns pr6-l absolute-ns mb0-ns mb5">
                    <?php 
                    $illustration = get_field('illustration');
                    if( !empty($illustration) ): ?>
                        <div class="nr4-ns">
                            <img class="mw-5-so style-svg w-100 h-auto philo-image" src="<?php echo $illustration['url']; ?>" alt="<?php echo $illustration['alt']; ?>">
                        </div>
                    <?php endif; ?>
                </div>
                <section class="w-grid-7-l w-grid-6-m ml-auto pt5 mb6-m">
                    <h1 class="entry-title offscreen"><?php the_title();?></h1> <?php edit_post_link();?>
                    <h2 class="f-subheadline-l f2 ma0 mb4 fw3 lh-title remove-p"><?php the_field('heading'); ?></h2>
                    <p class="f5 lh-large mid-gray mb5 w-grid-10-l w-100"><?php the_field('description'); ?></p>
                </section>
            </div>
            <div class="flex flex-wrap container relative">
                <div class="w-grid-7-l w-100 ml-auto mb4-ns">
                    <?php
                    $defined = get_field('defined_by');	
                    if( $defined ): ?>
                        <p class="ttu tracked dark-gray bb f8 pb3 mb4">
                            <?php echo $defined['label']; ?>
                        </p>
                    <?php endif; ?>
                    <?php if( have_rows('defined_by_value' ) ): ?>
                        <div class="flex flex-wrap pt2 justify-between pr5-m">
                            <?php while( have_rows('defined_by_value' ) ): the_row(); 
                                // vars
                                $heading = get_sub_field('heading');
                                $description = get_sub_field('description');

                                ?>
                                <div class="mb5 w-50-l w-grid-5-m w-100 pr5-l">
                                    <h4 class="ma0 pb1 red f4 fw4"><?php echo $heading ?></h4>
                                    <p class="lh-copy f6 mid-gray mb0"><?php echo $description ?></p>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-100 container mb5-ns mb4 pb0-ns pb2">
                <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            </div>
            <section class="bg-light-gray pv5-l pt5 pb4">
                <div class="container mb3-l mb4">
                    <?php 
                    $fund = get_field('fund_structure');
                    if( !empty($fund) ): ?>
                        <p class="ttu tracked dark-gray f8 mb4">
                            <?php echo $fund['label']; ?>
                        </p>
                        <div class="flex flex-wrap mb5-l mb4">
                            <div class="w-grid-4-l w-grid-6-m w-100">
                                <h3 class="f1-ns f2 fw3 ma0 mb0-l mb4 lh-solid-ns lh-title remove-p"><?php echo $fund['heading']; ?></h3>
                            </div>
                            <div class="w-grid-6-l w-grid-9-m w-100 ml-auto-l pl5-l">
                                <p class="f5 lh-large mid-gray mt2">
                                    <?php echo $fund['description']; ?>
                                </p>
                            </div>
                            <div class="w-grid-1 ml-auto"></div>
                        </div>
                        <div class="flex flex-wrap pt4-l">
                            <div class="w-third-l w-100 pv4 ph4-ns ph3 bg-white br-l bb bbn-l mb0-l mb4 arrow-right relative">
                                <div class="ph3-ns flex-m items-top">
                                    <div>
                                        <?php 
                                        $image = get_field('fund_structure_growth_investing_image');
                                        if( !empty($image) ): ?>
                                            <img class="style-svg mb4-l" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-grid-9-m ml-auto-m">
                                        <p class="f4 mt0-m w-100-ns"><?php the_field('fund_structure_growth_investing_heading'); ?></p>
                                        <p class="f5 lh-large mid-gray mb0"><?php the_field('fund_structure_growth_investing_description'); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-third-l w-100 flex items-center justify-center mv0-l mv2">
                                <div class="circle bg-blue white tc br-100 pa4 f2 fw3">
                                    <?php echo $fund['circle_label']; ?>
                                </div>
                            </div>
                            <div class="w-third-l w-100 pv4 ph4-ns ph3 bg-white bl-l bt btn-l mt0-l mt4 arrow-left relative">
                                <div class="ph3-ns flex-m items-top">
                                    <div>
                                        <?php 
                                        $image = get_field('fund_structure_opportunity_investing_image');
                                        if( !empty($image) ): ?>
                                            <img class="style-svg mb4-l" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="w-grid-9-m ml-auto-m">
                                        <p class="f4 mt0-m w-100-ns"><?php the_field('fund_structure_opportunity_investing_heading'); ?></p>
                                        <p class="f5 lh-large mid-gray mb0"><?php the_field('fund_structure_opportunity_investing_description'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
                <section class="container flex flex-wrap pv5 mb4">
                    <div class="w-grid-4-l w-100 content mb0-l mb5">
                        <p class="intro mt1 mb5"><?php the_field('growing_companies_heading'); ?></p>
                        <div class="swiper-container relative philosophy-swiper">
                            <?php if( have_rows('growing_companies_testimonials') ): ?>
                                <div class="swiper-pagination tl mb4"></div>
                                <div class="swiper-wrapper flex">
                                    <?php while( have_rows('growing_companies_testimonials') ): the_row(); 
                                        // vars
                                        $testimonial = get_sub_field('testimonial');
                                        $image = get_sub_field('image');
                                        $name = get_sub_field('name');
                                        $title = get_sub_field('title');
                                        $company = get_sub_field('company');
                                        ?>
                                        <div class="swiper-slide ma0 bg-white flex-grow-1">
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
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="w-grid-7-l w-100 ml-auto">
                        <p class="ttu tracked dark-gray bb f8 pb3 mb0">
                            <?php the_field('growing_companies_label'); ?>
                        </p>
                        <?php if( have_rows('growing_companies_support' ) ): ?>
                            <?php while( have_rows('growing_companies_support' ) ): the_row(); 
                                // vars
                                $image = get_sub_field('image');
                                $heading = get_sub_field('heading');
                                $description = get_sub_field('description');

                                ?>
                                <div class="flex flex-wrap items-center bb b--dotted b--dark-gray pv4 last">
                                    <div class="w-grid-3-ns w-100 mb0-ns mb4 pb0-ns pb2">
                                        <img class="style-svg" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                    <div class="w-75-l w-grid-9-m w-100 pl4-l pr5-m ml-auto">
                                        <h4 class="ma0 f4 fw4"><?php echo $heading ?></h4>
                                        <p class="lh-copy f6 mid-gray mb0"><?php echo $description ?></p>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>
                <section class="bg-gray criteria" id="investment-criteria">
                    <div class="container-l mb3 flex flex-wrap">
                        <div class="w-grid-7-l container-sm pv5 pr5-l">
                            <p class="ttu tracked dark-gray f8 mb0">
                                <?php the_field('criteria_label'); ?>
                            </p>
                            <div class="dark-gray f2 fw3 mb4 pb3 remove-p mt4">
                                <?php the_field('criteria_heading'); ?>
                            </div>
                            <div class="flex flex-wrap mb5">
                                <p class="f5 lh-large mid-gray ma0 w-50-ns w-100 pr4-ns mb0-ns mb4">
                                    <?php the_field('criteria_description_one'); ?>
                                </p>
                                <p class="f5 lh-large mid-gray ma0 w-50-ns w-100 pl4-ns">
                                    <?php the_field('criteria_description_two'); ?>
                                </p>
                            </div>
                            <div class="dn">
                                <p class="f5 lh-large dark-gray mt0 mb4">
                                    <?php the_field('criteria_graph_label'); ?>
                                </p>
                                <?php 
                                $image = get_field('criteria_graph');
                                if( !empty($image) ): ?>
                                    <img class="style-svg w-100 h-auto" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="w-grid-5-l w-100 bg-light-gray pt5-l pl5-l pb5">
                            <div class="container-sm pt0-l pt5">
                                <h4 class="mt5-l mt0 mb4 pt1 f4 fw4"><?php the_field('moment_in_time_heading'); ?></h4>
                                <?php if( have_rows('moment_in_time_moment' ) ): ?>
                                    <ul class="list pa0 pt2 ma0">
                                        <?php while( have_rows('moment_in_time_moment' ) ): the_row(); 
                                            // vars
                                            $description = get_sub_field('description');
                                            ?>
                                            <li class="mb3 f5 lh-large flex items-start">
                                                <div class="w-grid-1">
                                                    <img class="style-svg dib" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-checkmark.svg'>
                                                </div>
                                                <div class="w-grid-11 pl3">
                                                    <?php echo $description ?>
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="entry-content pt1">
                                    <?php the_field('moment_in_time_description'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

		</article>
		<?php if (!post_password_required()) {
            comments_template('', true);
        }
        ?>
    <?php endwhile;endif;?>
</section>
<?php // get_sidebar();?>
<?php get_footer();?>