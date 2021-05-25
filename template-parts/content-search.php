<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adens News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
</article><!-- #post-## -->
