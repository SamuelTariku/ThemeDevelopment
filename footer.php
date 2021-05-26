<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adens News
 */

?>
<div class="footer-banner">
<h4>You may have missed</h4>
<div class="footer-banner row">
<?php

//Gets the random posts from this week
$args = array(
	'posts_per_page' => 6,
	'post_type' => 'post',
	'orderby' => 'rand',
	'date_query' => array(
		'year' => date( 'Y' ),
		'week' => date( 'W' ),
	),
);

$latest_posts = new WP_Query($args);

while ($latest_posts->have_posts()): $latest_posts->the_post();
?>
	<div class="col-lg-2 col-sm-4 col-8">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail() ?>
		<p class="entry-title"><?php the_title(); ?></p>
		</a>
	</div>
<?php
endwhile;
?>
</div>

</div>



<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
		<?php  
			if( !is_page_template('elementor_header_footer')){ ?>
    			</div><!-- .row -->
				</div><!-- .container -->
    	<?php } ?>	
		
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>