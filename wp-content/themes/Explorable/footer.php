<?php if ( ! et_is_listing_page() || ( is_single() && 'listing' == get_post_type() ) ) : ?>
	<footer id="main-footer">
		<div class="container">
			<?php get_sidebar( 'footer' ); ?>

			<p id="copyright"><?php printf( __( ' %1$s |  %2$s', 'Explorable' ), '<a href="http://www.doap.com" title="doap.com">by DevOps and Platforms</a>', 'doap.com' ); ?></p>
		</div> <!-- end .container -->
	</footer> <!-- end #main-footer -->
<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>