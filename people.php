<?php /* Template Name: People */?>
<?php get_header();?>
<section id="content" class="mb5 mt4-ns scene_element scene_element--fadein" role="main">
    <?php if (have_posts()): while (have_posts()): the_post();?>
        <article id="post-<?php the_ID();?>" <?php post_class();?>>
            <div class="container content">
                <header class="header flex flex-wrap flex-row-l flex-column-reverse mb6-l mb5">
                    <div class="w-grid-5-l w-100 mt5-l pt3-l">
                        
                        <div class="flex-m">
                            <div class="w-grid-7-m mt0-ns mt5-m mt4">
                                <h1 class="entry-title offscreen"><?php the_title();?></h1> <?php edit_post_link();?>
                                <h2 class="f-subheadline-ns f1 ma0 mb4 mw6 fw3 lh-title remove-p"><?php the_field('heading'); ?></h2>
                                <p class="ma0 mb4 f4-ns f4-small lh-medium"><?php the_field('intro'); ?></p>
                            </div>
                            <div class="w-grid-4-m db-m dn ml-auto">
                                <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                            </div>
                            
                        </div>

                        <div class="entry-content w-grid-8-m">
                            <?php the_content();?>
                            <?php
                            $inclusivity = get_field('inclusivity');	
                            if( $inclusivity ): ?>
                                <a class="link blue pt2 db" href="<?php echo $inclusivity['link']['url']; ?>">
                                    <?php echo $inclusivity['link_label']; ?>
                                    <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="w-grid-6-l w-100 ml-auto dn-m">
                        <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                    </div>                    
                </header>
            </div>
            <section class="pb3-ns pb5">
                <div class="container">
                    <h2 class="f-subheadline-ns f2 ma0 mb4 mw6 fw3 lh-title-ns lh-solid"><?php the_field('pv_team_heading'); ?></h2>
                </div>
                <div class="container team">
                    <?php if( have_rows('pv_team_team_members' ) ): ?>
                        <ul class="list ma0 pa0 flex flex-wrap">
                            <?php while( have_rows('pv_team_team_members' ) ): the_row(); 
                                // vars
                                $image = get_sub_field('image');
                                $name = get_sub_field('name');
                                $title = get_sub_field('title');
                                $quote = get_sub_field('quote');
                                $biography = get_sub_field('biography');
                                $linkedin_url = get_sub_field('linkedin_url');
                                $email = get_sub_field('email');

                                ?>
                                <li class="ma0 mb5-ns team-member w-25-l w-third-m w-100 last">
                                    <div class="db-ns flex items-center bn-ns bb b--dotted b--dark-gray pb0-ns pb3 mb0-ns mb3">
                                        <div class="mb3-ns w-grid-4 w-auto-ns">
                                            <div class="member-image cover" style="background: url(<?php echo $image['url']; ?>) no-repeat center center;"></div>
                                        </div>
                                        <div class="pt1-ns pl0-ns pl3 ml0-ns ml2 w-auto-ns w-grid-8">
                                            <p class="dark-gray lh-medium ma0 f4 fw4 red"><?php echo $name ?></p>
                                            <p class="dark-gray lh-medium ma0 mb3 f4 fw4"><?php echo $title ?></p>
                                            <button class="dib sans-serif bg-transparent ttu tracked dark-gray bb b--dark-gray f8 pa0 mb2 pointer trigger-bio">Read Biography</button>
                                        </div>
                                        <div class="fixed left-0 right-0 top-0 bottom-0 z-4 biography-overlay overlay-container">
                                            <div class="overlay fixed left-0 right-0 top-0 bottom-0 bg-black-70"></div>
                                            <div class="bg-white ph5-ns ph3 pv5-ns pv4 container flex absolute absolute-center">
                                                <button class="input-reset bn pointer bg-transparent close absolute ma3 pa0 right-0 top-0">
                                                    <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-close.svg'>
                                                </button>
                                                <div class="w-grid-4 db-l dn">
                                                    <img class="w-100 h-auto" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                                                </div>
                                                <div class="w-grid-8-l w-100 pl5-l content-column">
                                                    <div class="db-l flex-m mb0-l mb4 pb0-l pb2 items-center">
                                                        <div class="w-grid-4-m w-grid-6 dn-l db mb0-ns mb4">
                                                            <img class="w-100 h-auto" src='<?php echo $image['url']; ?>' alt="<?php echo $image['alt']; ?>">
                                                        </div>
                                                        <div class="w-grid-7-m ml-auto-m">
                                                            <p class="dark-gray ma0 fw3-ns fw4 f2-med-ns f4 lh-title red"><?php echo $name ?></p>
                                                            <p class="dark-gray ma0 fw3-ns fw4 f2-med-ns f4 lh-title mb3 pb2"><?php echo $title ?></p>
                                                            <div class="flex items-center mb4-l pb3-l">
                                                                <a class="db mr4" href="mailto:<?php echo $email; ?>" target="_blank">
                                                                    <img class="style-svg social-icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/social-email.svg">
                                                                </a>
                                                                <a class="db mr4" href="<?php echo $linkedin_url; ?>" target="_blank">
                                                                    <img class="style-svg social-icon" src="<?php bloginfo('stylesheet_directory'); ?>/images/icons/social-linkedin.svg">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if(get_sub_field('quote')): ?>
                                                        <p class="f4 lh-medium mid-gray"><?php echo $quote ?></p>
                                                    <?php endif;?>
                                                    <div class="entry-content">
                                                        <?php echo $biography ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </section>
            <section class="bg-light-gray pt5-l pt4 pb0-ns pb4">
                <div class="container flex flex-wrap mt2 mb4 items-end">
                    <div class="w-grid-5-l w-grid-8-m w-100">
                        <h2 class="f-subheadline-ns f2 ma0 mb0-l mb4-m mb3 fw3 lh-title-ns lh-solid"><?php the_field('lp_network_heading'); ?></h2>
                    </div>
                    <div class="w-grid-6-l w-grid-8-m w-100 ml-auto-l">
                        <p class="ma0 mb2 f5 lh-large mid-gray network-description"><?php the_field('lp_network_description'); ?></p>
                    </div>
                </div>
                <div class="container network pt3">
                    <?php if( have_rows('lp_network_partners' ) ): ?>
                        <ul class="list ma0 pa0 flex flex-wrap">
                            <?php while( have_rows('lp_network_partners' ) ): the_row(); 
                                // vars
                                $image = get_sub_field('image');
                                $name = get_sub_field('name');
                                $title = get_sub_field('title');
                                $company = get_sub_field('company');
                                $company_website = get_sub_field('company_website');
                                $interview_link = get_sub_field('interview_link');

                                ?>
                                <li class="ma0 mb5-l mb4 partner w-grid-2-l w-25-m w-100 db-ns flex items-center mb5-m mb0-l mb4 pb0-ns pb2">
                                    <div class="mb3-ns w-grid-4 w-auto-ns">
                                        <div class="member-image cover" style="background: url(<?php echo $image['url']; ?>) no-repeat center center;"></div>
                                    </div>
                                    <div class="pt1 pr3-m pl0-ns pl3 ml0-ns ml2 w-auto-ns w-grid-8">
                                        <p class="dark-gray lh-title ma0 mb3 f4 fw4"><?php echo $name ?></p>
                                        <p class="mid-gray f7 lh-medium mt1 mb2"><?php echo $title ?></p>
                                        <?php if(get_sub_field('company_website')): ?>
                                            <a class="link blue f7 lh-medium mt1 db" href="<?php echo $company_website ?>" target="_blank"><?php echo $company ?></a>
                                        <?php elseif(get_sub_field('company')): ?>
                                            <div class="mid-gray f7 lh-medium mt1 db"><?php echo $company ?></div>
                                        <?php endif;?>
                                        <?php if(get_sub_field('interview_link')): ?>
                                            <a href="<?php echo $interview_link['url'] ?>" class="dib ttu tracked dark-gray bb f8 pa0 mt3 mb2 pointer">Read Interview</a>
                                        <?php endif;?>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
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