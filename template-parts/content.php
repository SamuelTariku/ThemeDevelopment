<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adens News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
if ( is_single() ) :
?>
	<div class="post-thumbnail" style="margin-bottom: 1rem">
		<?php the_post_thumbnail(); ?>
	</div>
	<header class="entry-header">
		<?php 
			the_title( '<h1 class="entry-title">', '</h1>' ); 
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta"> 
					<?php wp_bootstrap_starter_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer class="entry-footer">
		<?php wp_bootstrap_starter_entry_footer(); ?>
	</footer><!-- .entry-footer -->

<?php
else :
?>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
			</div>
			<div class="col-8">
				<header class="entry-header">
					<?php the_title( '<p class="entry-title" style="font-weight:bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' );?>
				</header><!-- .entry-header -->
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>


			</div>
		</div>
	</div>
<?php
//the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
endif;
?>


</article><!-- #post-## -->
