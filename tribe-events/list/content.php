<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>



<div id="tribe-events-content" class="tribe-events-list">

	<?php
	/**
	 * Fires before any content is printed inside the list view.
	 */
	?>

	<!-- Notices -->
	<?php tribe_the_notices() ?>
	<!-- /Notices -->

	<!-- Events Loop -->
	<?php if ( have_posts() ) : ?>
		<?php tribe_get_template_part( 'list/loop' ) ?>
	<?php endif; ?>
	<!-- /Events Loop -->

	<!-- List Footer -->
	<div id="tribe-events-footer">
		<!-- Footer Navigation -->
		<?php tribe_get_template_part( 'list/nav', 'footer' ); ?>
		<!-- /Footer Navigation -->
	</div>
	<!-- /List Footer	 -->

</div><!-- #tribe-events-content -->
