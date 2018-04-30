<?php get_header();?>
<section id="content" role="main">
    <article id="post-0" class="post not-found container tc pv6 mv5">
        <header class="header">
            <h1 class="entry-title f-subheadline-ns f1 fw3 ma0"><?php _e('Not Found', 'blankslate');?></h1>
        </header>
        <section>
            <p class="f5 lh-large mid-gray"><?php _e('Sorry, the page you were looking for doesn’t exist.', 'blankslate');?></p>
            <a class="link blue" href="/">
                Return home
                <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
            </a>
        </section>
    </article>
</section>
<?php // get_sidebar();?>
<?php get_footer();?>