<?php get_header();?>
<section id="content" class="bg-light-gray pt4-ns pb5-ns article mb5" role="main">
    <div class="container-ns bg-white mt2-ns">
        <?php if (have_posts()): while (have_posts()): the_post();?>
            <?php get_template_part('entry');?>
            <?php if (!post_password_required()) { comments_template('', true); }?>
        <?php endwhile;endif;?>
    </div>
    <?php echo strip_tags($post->post_excerpt); ?>
    <div class="bg-blue container-ns ph5-l ph4-m pv4">
        <div class="mh4-ns flex flex-nowrap-ns flex-wrap items-center container-so">
            <p class="f4 white ma0 mb0-ns mb3 pb2 mr4 w-auto-ns w-100">Share this article:</p>
            <div class="flex flex-wrap">
                <div data-network="twitter" class="st-custom-button pointer social-share link white pl2 pv2 pr3 tc f6 br2 mr2 mb0-ns mb2 bg-black-20 flex items-center">
                    <img class="style-svg mr3" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/social-share-twitter.svg'>
                    Twitter
                </div>
                <div data-network="facebook" class="st-custom-button pointer social-share link white pl2 pv2 pr3 tc f6 br2 mr2 mb0-ns mb2 bg-black-20 flex items-center">
                    <img class="style-svg mr3" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/social-share-facebook.svg'>
                    Facebook
                </div>
                <div data-network="linkedin" class="st-custom-button pointer social-share link white pl2 pv2 pr3 tc f6 br2 bg-black-20 flex items-center">
                    <img class="style-svg mr3" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/social-share-linkedin.svg'>
                    LinkedIn
                </div>
            </div>
        </div>
    </div>
    <?php
        $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
        $posts = get_field('related_articles');
        if(($related) || ($posts)): ?>
            <section class="bg-light-gray-ns pt5">
                <div class="container flex flex-wrap items-start w-grid-9-m center pb0-ns pb5">
                    <div class="w-20-l w-100 border-right-l pr5-l pt2 pb4">
                        <p class="ma0 f1-ns f2 fw3 ma0 lh-solid">Related news</p>
                    </div>
                    <?php if ($posts): ?>
                        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>
                            <div class="w-20-l w-100 ml5-l pt3-l pb0-l pb4 mb0-l mb4 bn-l bb last recent-news b--dotted b--dark-gray">
                                <a class="link dark-gray mb3 db f5 lh-large" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                <a class="link blue db f5" href="<?php the_permalink(); ?>">
                                    Read more
                                    <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                                </a>
                            </div>
                            <?php wp_reset_postdata();
                        endforeach; ?>
                    <?php else : ?>
                        <?php foreach( $related as $post ) {
                        setup_postdata($post); ?>
                            <div class="w-20-l w-100 ml5-l pt3-l pb0-l pb4 mb0-l mb4 bn-l bb last recent-news b--dotted b--dark-gray">
                                <a class="link dark-gray mb3 db f5 lh-large" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                <a class="link blue db f5" href="<?php the_permalink(); ?>">
                                    Read more
                                    <img class="style-svg dib ml2 pl1 icon-link" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-link.svg'>
                                </a>
                            </div>
                        <?php } ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif;
    wp_reset_postdata(); ?>
</section>
<?php //get_sidebar();?>
<script>
	(function(document) {
		var shareButtons = document.querySelectorAll(".st-custom-button[data-network]");
		for(var i = 0; i < shareButtons.length; i++) {
			var shareButton = shareButtons[i];
			shareButton.addEventListener("click", function(e) {
				var elm = e.target;
				var network = elm.dataset.network;
			});
		}
	})(document);
</script>
<?php get_footer();?>