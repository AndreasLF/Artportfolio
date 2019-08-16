<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

//Gets the id
$event_id = get_the_ID();

?>

<!-- Event content -->
<div id="tribe-events-content" class="tribe-events-single">

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<!-- event title -->
	<?php the_title( '<h1 class="tribe-events-single-event-title">', '</h1>' ); ?>

	<!-- Event information -->
	<div class="tribe-events-schedule tribe-clearfix">

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
				<span class="tribe-events-cost"><i class="fas fa-coins"></i> &nbsp; <?php echo tribe_get_cost( null, true ) ?></span>
			<?php endif; ?>
			<!-- /cost -->

	</div>
	<!-- /Event information -->

	<!-- Post-->
	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event featured image, but exclude link -->

			<!-- Event content -->
			<?php if (!empty(get_the_content())  || !empty(tribe_event_featured_image( $event_id, 'full', false )) ) :?>
			<div class="ap-cal-block tribe-events-single-event-description tribe-events-content">
				<h2 class=""><?php esc_html_e('Information','artportfolio')?></h2>
				<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
				<?php the_content(); ?>
			</div>
		<?php endif; ?>

			<!-- Event meta -->
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<!-- /Event mata -->

		</div> <!-- #post-x -->
	<?php endwhile; ?>
	<!-- /Post -->


</div><!-- #tribe-events-content -->
<!-- /Event content -->
