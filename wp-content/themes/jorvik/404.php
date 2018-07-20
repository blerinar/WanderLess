<?php
/**
 * The template for displaying 404 page
 *
 * @package Jorvik
 */

get_header();
?>

	<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'jorvik' ); ?></p>

	<p><?php esc_html_e( 'Maybe try a search?', 'jorvik' ); ?> <?php get_search_form(); ?></p>

	<p><?php esc_html_e( 'Browse our pages.', 'jorvik' ); ?></p>
	<ul>
	<?php wp_list_pages( array( 'title_li' => '' ) ); ?>
	</ul>

<?php get_footer(); ?>
