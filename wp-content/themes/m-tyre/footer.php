<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package m-tyre
 */

?>
    <?php get_template_part('inc/mailing'); ?>  <!-- Блок про компанию -->
	<footer id="footer" class="footer">

	</footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
<script src="<?php echo get_template_directory_uri() ?>/dist/js/common.js" defer></script>
<?php wp_footer(); ?>

</body>
</html>
