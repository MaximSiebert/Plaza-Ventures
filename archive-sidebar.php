<div class="w-grid-3-l w-100 ml-auto db-l bg-none-l bg-gray-ms">
    <div class="db-l flex flex-wrap container-m container-so pv0-l pv5">
        <div class="mb4-l pb2-l w-grid-7-m w-100 order-0-ns order-2">
            <div class="twitter-iframe-container">
                <a class="twitter-timeline mb4" data-height="900" data-link-color="#3E96F1" href="https://twitter.com/PlazaVentures/lists/pv-community-buzz">Tweets by The PV Family</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <div class="w-grid-4-m w-100 ml-auto-m mb0-ns mb4">
            <div class="bg-blue ph3 pv4 white">
                <?php
                $newsletter = get_field('newsletter', 'option');	
                if( !empty($newsletter) ): ?>
                    <img class="style-svg mb4" src='<?php echo $newsletter['image']['url']; ?>'>
                    <p class="f4 lh-title mt0"><?php echo $newsletter['description']; ?></p>
                    <!-- Begin MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                        <form action="https://plazaventures.us15.list-manage.com/subscribe/post?u=a499b4edc8cb38f75eccdaf36&amp;id=f4eaea4142" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div class="fw4 f6" id="mc_embed_signup_scroll">
                                <input class="br2 sans-serif input-reset ba b--light-silver pa3 w-100" type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="yourname@email.com" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a499b4edc8cb38f75eccdaf36_f4eaea4142" tabindex="-1" value=""></div>
                                <input class="mt2 mb1 input-reset button-reset bn bg-black-20 bg-animate hover-bg-black-30 button white pointer sans-serif br2 pa3" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>