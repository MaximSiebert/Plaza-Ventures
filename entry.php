<article id="post-<?php the_ID(); ?>" <?php post_class('scene_element scene_element--fadein'); ?>>
    <?php if (get_the_post_thumbnail_url($post->ID,'full')) : ?>
        <div class="post-image-article cover" style="background: url(<?php echo get_the_post_thumbnail_url($post->ID,'full') ?>) no-repeat center center;"></div>
    <?php endif; ?>
    <div class="pv5 ph5-ns mh4-l container-so">
        <header class="mb5-ns mb4">
            <h1 class="entry-title ma0 mb5 f1-ns f2-med fw3 lh-title"><?php the_title(); ?></h1>
            <?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
        </header>
        <?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>

        <?php // if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
    </div>
</article>