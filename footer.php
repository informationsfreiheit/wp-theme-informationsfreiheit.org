<?php
/**
 * Template for displaying the footer
 *
 * Contains the closing of the id=main div and all content
 * after. Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

		</div><!-- #colophon -->
	</div><!-- #footer -->
</div><!-- #shadowrapper -->

<script>
function toggle(obj) {
    var el = document.getElementById(obj);
    el.style.display = (el.style.display != 'none' ? 'none' : 'block' );
}
</script>
<?php
	/*
	 * Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();

    /* from https://www.sitepoint.com/add-javascript-single-wordpress-posts/ */
    echo get_post_meta( get_the_ID(), 'single-post-js', true)  ;
?>
</body>
</html>
