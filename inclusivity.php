<?php /* Template Name: Inclusivity */?>
<?php get_header();?>
<section id="content" class="bg-light-gray pt4-ns pb5-ns mb5 article" role="main">
    <div class="container-ns bg-white mt2-ns">
        <article id="post-<?php the_ID(); ?>" <?php post_class('scene_element scene_element--fadein'); ?>>
            <div>
                <?php if( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
            </div>
            <div class="pt5 pb5-ns ph5-ns mh4-l container-so">
                <header class="mb4 pb2">
                    <h1 class="entry-title ma0 f1-ns f2 fw3 lh-title"><?php the_title(); ?></h1>
                </header>
                <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>

                <?php // if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
            </div>
        </article>
    </div>
</section>
<?php // get_sidebar();?>
<?php get_footer();?>