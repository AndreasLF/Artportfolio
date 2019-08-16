<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<!-- Loop -->
<div class="tribe-events-loop">

	<?php while ( have_posts() ) : the_post(); ?>

		<!-- Month / Year Headers -->
		
		<?php tribe_events_list_the_date_headers(); ?>


			<?php

			/**
			 * Filters the event type used when selecting a template to render
			 *
			 * @param $event_type
			 */
			// $event_type = apply_filters( 'tribe_events_list_view_event_type', $event_type );
			$event_type = 'event';

			tribe_get_template_part( 'list/single-event' );
			?>


	<?php endwhile; ?>

</div><!-- .tribe-events-loop -->
<!-- /Loop -->
