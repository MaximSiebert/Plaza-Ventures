<section class="entry-content">
    <?php // the_content(); ?>
    <?php

    // check if the flexible content field has rows of data
    if( have_rows('content') ):

         // loop through the rows of data
        while ( have_rows('content') ) : the_row();

            // check current row layout
            if( get_row_layout() == 'event' ): 
                $image = get_sub_field('image');
                $date = get_sub_field('date');
                $time = get_sub_field('time');
                $location = get_sub_field('location');
                $details = get_sub_field('details');
            ?>

                <div class="mt5 mb5 pa0-ns pa3 event flex flex-wrap bg-light-gray bt bw2 b--light-silver">
                    <div class="w-third-ns w-50">
                        <img class="mb0 bg-white" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                    <div class="pa4-ns pv4 w-two-thirds-ns w-100">
                        <div class="ph3-ns">
                            <h3 class="mt0">Event Details</h3>
                            <p class="mb2"><strong>Date:</strong> <?php echo $date; ?></p>
                            <p class="mb2 mt0"><strong>Time:</strong> <?php echo $time; ?></p>
                            <span class="db remove-p p-inline mb4"><strong>Location:</strong> <?php echo $location; ?></span>
                            <span class="db remove-p"><?php echo $details; ?></span>
                        </div>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'person_card' ): 
                $image = get_sub_field('image');
                $name = get_sub_field('name');
                $title = get_sub_field('title');
                $company = get_sub_field('company');
                $company_url = get_sub_field('company_url');
                $description = get_sub_field('description');
                $twitter = get_sub_field('twitter');
                $linkedin = get_sub_field('linkedin');
            ?>

                <div class="mt5 mb5 pa0-ns pa3 event flex flex-wrap bg-light-gray bt bw2 b--light-silver">
                    <div class="w-third-ns w-50">
                        <img class="mb0 bg-white" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                    <div class="pa4-ns pv4 w-two-thirds-ns w-100">
                        <div class="ph3-ns">
                            <h3 class="mt0"><?php echo $name; ?></h3>
                            <p class="mb0"><?php echo $title; ?></p>
                            <p class="mb3 mt0"><a href="<?php echo $company_url; ?>" target="_blank"><?php echo $company; ?></a></p>
                            <p class="mb3 pb1 f5 lh-large mid-gray"><?php echo $description; ?></p>
                            <div class="f5">
                                <?php if ($twitter): ?>
                                    <a href="<?php echo $twitter; ?>" target="_blank">Twitter</a>
                                <?php endif; ?>
                                <?php if ($twitter && $linkedin): ?>
                                    <span class="dib mh1">•</span>
                                <?php endif; ?>
                                <?php if ($linkedin): ?>
                                    <a href="<?php echo $linkedin; ?>" target="_blank">LinkedIn</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'info_card' ): 
                $image = get_sub_field('image');
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
            ?>

                <div class="mt5 mb5 pa0-ns pa3 event flex flex-wrap bg-light-gray bt bw2 b--light-silver">
                    <div class="w-third-ns w-50">
                        <img class="mb0 bg-white" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                    <div class="pa4-ns pv4 w-two-thirds-ns w-100">
                        <div class="ph3-ns">
                            <h3 class="mt0"><?php echo $heading; ?></h3>
                            <div class="mb3 pb1 f5 lh-large mid-gray"><?php echo $description; ?></div>
                        </div>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'info_card_link' ): 
                $image = get_sub_field('image');
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');
            ?>

                <div class="mt5 mb5 pa0-ns pa3 event flex flex-wrap bg-light-gray bt bw2 b--light-silver">
                    <div class="w-third-ns w-50">
                        <img class="mb0 bg-white" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    </div>
                    <div class="pa4-ns pv4 w-two-thirds-ns w-100">
                        <div class="ph3-ns">
                            <h3 class="mb0 mt0"><?php echo $heading; ?></h3>
                            <div class="mb3 f5 lh-large mid-gray"><?php echo $description; ?></div>
                            <?php // check if the nested repeater field has rows of data
                            if( have_rows('links') ):

                                 echo '<div class="f5 link-list list ma0 pt3 pa0 flex">';

                                 // loop through the rows of data
                                while ( have_rows('links') ) : the_row();

                                    $link = get_sub_field('link');

                                    echo '<div><a href="' . $link['url'] .'" target="'. $link['target'] .'">'. $link['title'] .'</a></div>';

                                endwhile;

                                echo '</div>';

                            endif; ?>
                        </div>
                    </div>
                </div>

            <?php elseif( get_row_layout() == 'blockquote' ): 
                $quote = get_sub_field('quote');
                $author = get_sub_field('author');
            ?>

                <div class="mt5 mb5 pa4-ns pa3 event bg-light-gray">
                    <div class="f4 fw4 pa3 ma0 remove-p lh-medium">
                        <?php echo $quote; ?>
                    </div>
                    <?php if ($author): ?>
                        <div class="remove-p ph3 pt2">
                            <?php echo $author; ?>
                        </div>
                    <?php endif; ?>
                </div>

            <?php elseif( get_row_layout() == 'stats' ): 
                
                if( have_rows('stat') ):
                ?>

                    <div class="flex flex-wrap">

                    <?php while ( have_rows('stat') ) : the_row();

                        $number = get_sub_field('number');
                        $description = get_sub_field('description');

                        ?>

                        <div class="w-grid-5-ns w-100 mb4 stat">
                            <span class="f-headline ma0 fw3 lh-title"><?php echo $number ?></span>
                            <div class="entry-content stats">
                                <?php echo $description ?>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    </div>

                <?php endif; ?>

            <?php elseif ( get_row_layout() == 'content' ):
                $text = get_sub_field('text');
            ?>
                <?php echo $text; ?>
            <?php endif;
        endwhile;

    else :

        // no layouts found

    endif;

    ?>
</section>