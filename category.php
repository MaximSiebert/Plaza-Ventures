<?php get_header(); ?>
<?php get_template_part('archive-header'); ?>
    <section id="content" role="main" class="bg-light-gray pv5 mb5">
        <header class="header container mb4">
            <h1 class="entry-title ttc f-subheadline ma0 mb4 fw3 lh-title"><?php single_cat_title(); ?></h1>
            <?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
        </header>
        <div class="container-l flex flex-wrap">
            <div class="w-grid-8-l w-100 container-m container-so">
                <div>
                    <?php 
                        $cat = get_query_var('cat');
                        $category = get_category ($cat);
                        echo do_shortcode( '[ajax_load_more container_type="div" post_type="post" posts_per_page="10" scroll="false" button_label="Load more articles" button_loading_label="Loading..." category="'.$category->slug.'"]' );
                    ?>
                </div>
            </div>
            <?php get_template_part('archive-sidebar'); ?>
        </div>
        <?php // get_template_part( 'nav', 'below' ); ?>
    </section>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>