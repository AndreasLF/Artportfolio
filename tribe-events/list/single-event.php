<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @version 4.6.19
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>


<!-- Container -->
	<div class="ap-cal-list-container" onclick="location.href='<?php echo esc_url(tribe_get_event_link()); ?>';">
			<!-- Event Title -->
			<h3 class="tribe-events-list-event-title">
					<?php the_title() ?>
			</h3>
			<hr />

			<!-- Event Meta -->
			<div class="tribe-events-event-meta">
				<div class="author <?php echo esc_attr( $has_venue_address ); ?>">

					<!-- Schedule & Recurrence Details -->
					<div class="tribe-event-schedule-details">
						<!-- date -->
						<i class="fas fa-calendar"></i> &nbsp;
						<?php echo esc_html(tribe_get_start_date($event_id, false));?>
						<?php if (tribe_get_start_date($event_id, false) != tribe_get_end_date($event_id, false)) :	?>
							<?php echo esc_html(" - ".tribe_get_end_date($event_id, false));?>
						<?php endif;?>
						<!-- /date -->

						<br />

						<!-- time -->
						<?php if (tribe_get_start_time($event_id)) :	?>
							<i class="far fa-clock"></i> &nbsp;
							<?php echo esc_html(tribe_get_start_time($event_id)); ?>
						<?php endif;?>
						<?php if (tribe_get_start_time($event_id) != tribe_get_end_time($event_id)) :	?>
							<?php echo esc_html(" - ".tribe_get_end_time($event_id));?>
						<?php endif;?>
						<!-- /time -->

						<!-- cost -->
						<?php if ( tribe_get_cost() ) : ?>
							<br />
							<span class="tribe-events-cost"><i class="fas fa-coins"></i> &nbsp; <?php echo tribe_get_cost( null, true ) ?></span>
						<?php endif; ?>		</div>
						<!-- /cost -->


					<!-- Venue Details -->
					<?php	if ( $venue_details ) : ?>
						<div class="tribe-events-venue-details">
						<?php
							if (isset($venue_details['linked_name']) && !empty($venue_details['linked_name'])){
								?>
								<i class="fas fa-map-pin"></i> &nbsp;
								<span class="ap-cal-venue-name"><?php echo esc_html($venue_details['linked_name']); ?></span>
								<br />
							<?php }

							if (isset($venue_details['address']) && !empty($venue_details['address'])){
								?>
								<span class="ap-cal-venue-address"><?php echo $venue_details['address']; ?></span>
							<?php }

							// If the maps link is supposed to be shown
							if ( tribe_show_google_map_link() ) {
								?>
								<br /><br />
								<!-- Maps link -->
								<a class="ap-cal-venue-link" target="_blank" href="<?php echo esc_url(tribe_get_map_link()); ?>">
									<i class="fas fa-map-marked-alt"></i>&nbsp;
									<?php esc_html_e('Åben i maps','artportfolio') ?>
								</a>
								<!-- /Maps link -->
								<?php
							}
						?>
						</div> <!-- .tribe-events-venue-details -->
					<?php endif; ?>
					<!-- /Venue details -->

				</div>
			</div><!-- .tribe-events-event-meta -->
			<!-- /Event meta -->

			<hr />

			<!-- Event Content -->
			<div class="ap-cal-list-content">
				<?php if(!empty(tribe_event_featured_image( null, 'medium' ))): ?>
					<?php echo tribe_event_featured_image( null, 'medium' ); ?>
					<br />
				<?php endif; ?>
				<div class="ap-cal-list-summary">
					<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
				</div>
			</div>
			<!-- /Event Content -->


		</div> <!-- /Container -->
