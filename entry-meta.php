<section class="entry-meta bb b--dotted b--dark-gray">
    <div class="bt b--dotted b--dark-gray pv3 flex flex-nowrap-ns flex-wrap items-center">
        <div class="flex items-center w-auto-ns w-100 mb0-ns mb3">    
            <div class="w2 mr3">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 56 ); ?>
            </div>
            <div class="ttu f8 dark-gray tracked lh-title entry-content">
                <span class="author vcard">Posted by <?php echo get_the_author_meta('nickname'); ?></span>
                <span class="entry-date db"><?php the_time( get_option( 'date_format' ) ); ?></span>
            </div>
        </div>
        <div class="ml-auto-ns w-50-ns w-100">
            <div class="flex w-100 items-center justify-end-ns">
                <span class="cat-links ttu f8 dark-gray tracked w-50 tr-ns"><?php the_category( ' ' ); ?></span>
                <?php if (get_field('client_logo')) : ?>
                    <div class="ml3-ns ml-auto db client-logo" href="<?php the_permalink();?>"><img class="w-auto h-100" src='<?php the_field('client_logo'); ?>'></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>