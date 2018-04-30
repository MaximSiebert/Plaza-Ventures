<?php /* Template Name: Perspectives */?>
<?php get_header();?>
<section id="content" role="main">
    <?php get_template_part('archive-header'); ?>
    <section class="bg-light-gray pt5 pb5-l mb5">
        <header class="header container mb4">
            <h1 class="entry-title f-subheadline-ns f2 ma0 mb4 fw3 lh-title">
                <?php if (is_day()) {printf(__('Daily Archives: %s', 'blankslate'), get_the_time(get_option('date_format')));} elseif (is_month()) {printf(__('Monthly Archives: %s', 'blankslate'), get_the_time('F Y'));} elseif (is_year()) {printf(__('Yearly Archives: %s', 'blankslate'), get_the_time('Y'));} else {_e('All articles', 'blankslate');} ?>
            </h1>
        </header>
        <div class="container-l flex flex-wrap">
            <div class="w-grid-8-l w-100 container-m container-so">
                <div>
                    <?php the_content(); ?>
                    <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="10" scroll="false" button_label="Load more articles" button_loading_label="Loading..."]'); ?>
                </div>
            </div>
            <?php get_template_part('archive-sidebar'); ?>
        </div>
    </section>

<?php // get_template_part('nav', 'below');?>
</section>
<?php // get_sidebar();?>
<?php get_footer();?>