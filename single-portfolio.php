<?php get_header();?>
<section id="content" role="main">
    <?php if (have_posts()): while (have_posts()): the_post();?>
        <?php get_template_part('portfolio');?>
        <?php if (!post_password_required()) {
            comments_template('', true);
        }
    ?>
    <?php endwhile;endif;?>
</section>
<?php // get_sidebar();?>
<?php get_footer();?>