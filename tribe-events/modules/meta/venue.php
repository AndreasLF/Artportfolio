<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

// Get phone and website
$phone   = tribe_get_phone();
$website = tribe_get_venue_website_url($post_id);

?>


<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h2 class="tribe-events-single-section-title"> <?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?> </h2>
	<dl>

		<dd class="tribe-venue"> <?php echo tribe_get_venue() ?> </dd>

		<?php
		// if address exists
		if ( tribe_address_exists() ) : ?>
				<!-- address -->
				<address class="tribe-events-address">
					<?php echo tribe_get_full_address(); ?>

					<?php if ( tribe_show_google_map_link() ) : ?>

						<br /><br />

						<!-- Google maps link -->
						<a class="ap-cal-venue-link" target="_blank" href="<?php echo esc_url(tribe_get_map_link()); ?>">
							<i class="fas fa-map-marked-alt"></i>&nbsp;
							<?php esc_html_e('Åben i maps','artportfolio') ?>
						</a>
						<!-- /Google maps link -->

						<br />
					<?php endif; ?>
				</address>
				<!-- /address -->
		<?php endif; ?>

		<?php
		// if venue has website
		if ( ! empty( $website ) ): ?>

			<!-- Website link -->
			<a class="ap-cal-venue-link" href="<?php echo esc_url($website); ?>" target="_blank">
				<i class="fas fa-link"></i> &nbsp;
				<?php esc_html_e('Besøg websted', 'artportfolio'); ?>
			</a>
			<!-- /Website link -->

		<?php endif ?>

		<br /><br />

	</dl>
</div>
