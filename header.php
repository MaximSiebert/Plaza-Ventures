<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="sans-serif website fw4">
        <header role="banner" class="relative-ns fixed w-100 z-2 top-0 header-mobile">
            <nav class="nav-secondary f8 ttu db-ns dn" role="navigation">
                <div class="container">
                    <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) ); ?>
                </div>
            </nav>
            <div class="relative z-1 bg-white">
                <div class="relative z-1 bg-white container flex items-end-ns items-center container-nav-primary pv0-ns pv3">
                    <section id="branding">
                        <div class="site-title flex items-end">
                            <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1 class="ma0">'; } ?>
                            <a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
                                
                            <?php if (is_front_page() || is_home() || is_front_page() && is_home()) : ?>
                            
                                <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
                                    <img class="style-svg db-ns dn" src='<?php bloginfo('stylesheet_directory'); ?>/images/plaza-ventures.svg' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                                    <img class="style-svg dn-ns w1 h-auto" src='<?php bloginfo('stylesheet_directory'); ?>/images/plaza-ventures-small.svg' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                                <?php else : ?>
                                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                                <?php endif; ?>
                                
                            <?php else : ?>

                                <?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
                                    <img class="style-svg w-auto-ns w1 h-auto" src='<?php bloginfo('stylesheet_directory'); ?>/images/plaza-ventures-small.svg' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                                <?php else : ?>
                                    <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                                <?php endif; ?>

                            <?php endif; ?>

                            </a>
                            <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
                        </div>
                    </section>
                    <div class="menu-button ml-auto flex items-center dn-ns">
                        <div class="menu-item-object-custom menu-item-443 lh-solid">
                            <a href="javascript:void(0);" class="db bn ttu f8 dark-gray tracked">Contact</a>
                        </div>
                        <div class="hamburger ml4">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <nav class="nav-primary ml-auto f4 fw3 db-ns dn" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    </nav>
                </div>
            </div>
            <nav class="nav-primary nav-mobile ml-auto f4 fw3 fixed left-0 top-0 w-100 bg-white pt5 pb2 dn-ns db" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </nav>
        </header>
        <div class="loading-overlay">
        </div>
        <div id="main" class="m-scene overflow-x-hidden">
            <section class="fixed-nav fixed w-100 bg-white top-0 z-2 nav-up db-ns dn">
                <nav class="nav-secondary f8 ttu db-ns dn" role="navigation">
                    <div class="container">
                        <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) ); ?>
                    </div>
                </nav>
                <div class="container flex items-end container-nav-primary">
                    <a class="link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home">
                        <?php if ( get_theme_mod( 'themeslug_logo_small' ) ) : ?>
                            <img class="style-svg" src='<?php bloginfo('stylesheet_directory');?>/images/plaza-ventures-small.svg' alt='<?php echo esc_attr(get_bloginfo('name', 'display')); ?>'>
                        <?php else : ?>
                            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                        <?php endif; ?>
                    </a>
                    <nav class="nav-primary ml-auto f4 fw3" role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    </nav>
                </div>
            </section>