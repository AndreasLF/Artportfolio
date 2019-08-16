<?php
/**
 * List View Nav Template
 * This file loads the list view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/nav.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */
if ( ! $wp_query = tribe_get_global_query_object() ) {
	return;
}

$events_label_plural = tribe_get_event_label_plural();

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<nav class="tribe-events-nav-pagination" aria-label="<?php echo esc_html( sprintf( esc_html__( '%s List Navigation', 'the-events-calendar' ), $events_label_plural ) ); ?>">
	<ul class="tribe-events-sub-nav">
		<!-- Left Navigation -->
		<?php if ( tribe_has_previous_event() ) : ?>
			<a href="<?php echo esc_url( tribe_get_listview_prev_link() ); ?>" rel="prev">
				<li class="<?php echo esc_attr( tribe_left_navigation_classes() ); ?>">
					<span><i class="fas fa-chevron-left"></i></span> <?php echo esc_html( sprintf( __( 'Previous %s', 'the-events-calendar' ), $events_label_plural ) ); ?>
				</li><!-- .tribe-events-nav-left -->
			</a>
		<?php endif; ?>
		<!-- /Left Navigation -->

		<!-- Right Navigation -->
		<?php if ( tribe_has_next_event() ) : ?>
			<a href="<?php echo esc_url( tribe_get_listview_next_link() ); ?>" rel="next">
				<li class="<?php echo esc_attr( tribe_right_navigation_classes() ); ?>">
					<?php echo esc_html( sprintf( __( 'Next %s', 'the-events-calendar' ), $events_label_plural ) ); ?> <span><i class="fas fa-chevron-right"></i></span>
				</li><!-- .tribe-events-nav-right -->
			</a>
		<?php endif; ?>
		<!-- /Right Navigation -->

	</ul>
</nav>
