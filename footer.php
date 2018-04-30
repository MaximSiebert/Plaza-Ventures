</div> 
<!-- Closing div in Header.php -->
<footer id="footer" role="contentinfo">
    <section class="container">
        <h4 class="f1-ns f2 fw3 ma0 mb4 lh-solid"><?php the_field('contact_heading', 'option'); ?></h4>
        <?php 
            $location = get_field('map', 'option');
            if( !empty($location) ):
        ?>
            <div class="acf-map mv2-ns mt2 mb4">
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div>
        <?php endif; ?>
        <div class="flex flex-wrap pv4">
            <section class="w-grid-8-l w-100 mb4-m pb3-m">
                <p class="ma0 f4 mb3"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
                <div class="flex flex-wrap flex-nowrap-ns directions-wrapper">
                    <?php
                    $contact = get_field('contact_information', 'option');	
                    if( !empty($contact) ): ?>
                        <div class="w-100 mr4 directions">
                            <div class="mt0 f5 mid-gray lh-large mb1 remove-p"><?php echo $contact['address']; ?></div>
                            <button class="f5 tl input-reset sans-serif bg-transparent bn pa0 link blue trigger-directions pointer">
                                <?php echo $contact['directions']; ?>
                            </button>
                            <div class="fixed left-0 right-0 top-0 bottom-0 z-3 directions-overlay overlay-container">
                                <div class="overlay fixed left-0 right-0 top-0 bottom-0 bg-black-70"></div>
                                <div class="bg-white overflow-y-auto ph5-ns pv5 ph3 container absolute absolute-center">
                                    <button class="input-reset bn pointer bg-transparent close absolute ma3 pa0 right-0 top-0">
                                        <img class="style-svg" src='<?php bloginfo('stylesheet_directory'); ?>/images/icons/icon-close.svg'>
                                    </button>
                                    <div>
                                        <p class="f4 ma0 mb2 red"><?php echo $contact['directions']; ?></p>
                                        <div class="f4 ma0 mb4 pb3 remove-p"><?php echo $contact['address']; ?></div>
                                        <p class="f4 ma0 mb3">By car</p>
                                        <p class="f5 lh-large mid-gray mb4 pb3"><?php echo $contact['directions_by_car']; ?></p>
                                        <p class="f4 ma0 mb3">By subway</p>
                                        <p class="f5 mb0 lh-large mid-gray"><?php echo $contact['directions_by_subway']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-left-ns w-auto-ns w-100 pl4-ns pt0-ns pt4 mt0-ns mt4 bt b--dotted mr4-ns">
                            <p class="mt0 f5 mid-gray lh-large mb0">
                                Tel:
                                <a class="link blue" href="tel:<?php echo $contact['telephone']; ?>" target="_blank">
                                    <?php echo $contact['telephone']; ?>
                                </a>
                            </p>
                            <p class="f5 mid-gray lh-large ma0">
                                Fax:
                                <a class="link blue" href="tel:<?php echo $contact['fax']; ?>" target="_blank">
                                    <?php echo $contact['fax']; ?>
                                </a>
                            </p>
                        </div>
                        <div class="border-left-ns w-auto-ns w-100 pl4-ns pt0-ns pt4 mt0-ns mt4 mb0-ns mb5 bt b--dotted mr4-ns">
                            <p class="mt0 f5 mid-gray lh-large mb0">
                                For all general inquiries,
                                <a class="link blue db" href="mailto:<?php echo $contact['email']; ?>" target="_blank">
                                    <?php echo $contact['email_label']; ?>
                                </a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            <section class="w-grid-4-l w-grid-7-ns w-100 ml-auto-l mb0-ns mb4">
                <?php
                $newsletter = get_field('newsletter', 'option');	
                if( !empty($newsletter) ): ?>
                    <p class="ma0 mb3 f4"><?php echo $newsletter['heading']; ?></p>
                    <p class="mt0 f5 mid-gray lh-large"><?php echo $newsletter['description']; ?></p>
                    <!-- Begin MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                        <form action="https://plazaventures.us15.list-manage.com/subscribe/post?u=a499b4edc8cb38f75eccdaf36&amp;id=f4eaea4142" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div class="fw4 f6 flex flex-wrap" id="mc_embed_signup_scroll">
                                <input class="br2 sans-serif input-reset ba b--light-silver mr1 pa3 flex-auto-ns w-auto-ns w-100" type="email" value="" name="EMAIL" id="mce-EMAIL" placeholder="yourname@email.com" required>
                                <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_a499b4edc8cb38f75eccdaf36_f4eaea4142" tabindex="-1" value=""></div>
                                <input class="ml1-ns mt0-ns mt2 input-reset button-reset bn bg-blue button white pointer sans-serif br2 pa3" type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe">
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </section>
        </div>
        <section class="bt pt4 pb5 mt2 b--dark-gray flex flex-wrap items-center">
            <div class="w-50-l w-100 mb4">
                <?php
                $copyright = get_field('copyright', 'option');	
                if( !empty($copyright) ): ?>
                    <p class="ttu f8 dark-gray tracked mb1">
                        <?php echo $copyright['copyright_text']; ?>
                    </p>
                    <div class="site-design">
                        <?php echo $copyright['site_design']; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="w-50-l ml-auto-l flex justify-end items-center social-icons">
                <?php if( have_rows('social_networks', 'option') ): ?>
                    <?php while( have_rows('social_networks', 'option') ): the_row(); 
                        // vars
                        $icon = get_sub_field('icon');
                        $link = get_sub_field('link');
                        ?>
                            <a class="db mr4" href="<?php echo $link; ?>" target="_blank">
                                <img class="style-svg social-icon" src="<?php echo $icon['url']; ?>">
                            </a>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </section>
    </section>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php if (is_front_page() || is_home() || is_front_page() && is_home() || is_post_type_archive('portfolio') || is_page_template('philosophy.php')) : ?>
    <!-- Swiper -->
    <script src="<?php bloginfo('stylesheet_directory');?>/js/swiper.min.js"></script>
<?php endif; ?>

<?php if (is_post_type_archive('portfolio')) : ?>
    <!-- Portfolio Swiper -->
    <script src="<?php bloginfo('stylesheet_directory');?>/js/portfolio-archive.js"></script>
<?php endif; ?>

<?php if (is_front_page() || is_home() || is_front_page() && is_home()) : ?>
    <!-- Home Swiper -->
    <script src="<?php bloginfo('stylesheet_directory');?>/js/home.js"></script>
<?php endif; ?>

<?php if (is_page_template('people.php')) : ?>
    <!-- People Biography Overlay -->
    <script src="<?php bloginfo('stylesheet_directory');?>/js/people.js"></script>
<?php endif; ?>

<?php if (is_page_template('philosophy.php')): ?>
    <!-- Philosophy Swiper -->
    <script src="<?php bloginfo('stylesheet_directory');?>/js/philosophy.js?ver=12"></script>
<?php endif;?>

<script src="<?php bloginfo('stylesheet_directory');?>/js/scripts.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjMI2ks8YnOOjyNBYjYfxpLV0QXCABB5g"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	    marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 15 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;
var marker = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

        map.addListener('click', function() {
          window.open('https://goo.gl/maps/VQUmYg285V82');
          return false;
        });

        marker.addListener('click', function() {
          window.open('https://goo.gl/maps/VQUmYg285V82');
          return false;
        });

	});

});

})(jQuery);
</script>
<?php wp_footer();?>
</body>
</html>