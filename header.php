<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adens News
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">

            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div> 

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-left',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>
            </nav>
        </div>
	</header><!-- #masthead -->

    <div class="search-header py-3">
        <form class="row justify-content-center" style="width:auto" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" class="form-control search-field mx-2" style="width: 60%;" placeholder="Search ..." value="<?php get_search_query() ?>" name="s">
            <button type="submit" class="btn btn-secondary" >Search</button>
        </form>
    </div>


    <!-- <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_title_setting' ) );
                    }else{
                        echo 'WordPress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo esc_attr( get_theme_mod( 'header_banner_tagline_setting' ) );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?> -->
    
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
    
    <div id="banner-head" class="container" 
        style="margin-top: 1rem;"
    
    >
        <!-- Get the posts -->
        <h2>Latest News</h2>
        <div class="container">
        <div class="row">
            <?php 
                $args = array(
                    'posts_per_page' => 5,
                    'post_type' => 'post',
                );
                
                $latest_posts = new WP_Query($args);
                $count = 0;
                while ($latest_posts->have_posts()): $latest_posts->the_post();
                    if($count == 0):
                ?>  
                    <div class="col-lg-6 col-sm-12" style="background: url('<?php the_post_thumbnail_url('large'); ?>') no-repeat; background-size: cover; height:340px;">
                        <a class="row" href="<?php the_permalink(); ?>">
                        <div class="align-bottom"style="position:absolute; bottom: 0; color: white; background-color: rgba(0,0,0,0.3); padding-left: 10px; width:100%">
                        <h4 class="" style="color: white"><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                        </div>
                        </a>
                    </div>
                    <div class="row col-lg-6 col-sm-12 p-3">
                <?php else: ?>
                    <div class="col-lg-5 col-sm-5 mx-2 mb-2" style="background: url('<?php the_post_thumbnail_url('large'); ?>') no-repeat; background-size: cover; min-height:150px;">
                        <a class="row" href="<?php the_permalink(); ?>">
                        <div class="align-bottom"style="position:absolute; bottom: 0; color: white; background-color: rgba(0,0,0,0.3); padding-left: 10px; width:100%">
                        <p class="" style="color: white"><?php the_title(); ?></p>
                        <!-- <?php the_excerpt(); ?> -->
                        </div>
                        </a>
                    </div>
                <?php if(($count % 2) == 0):?>
                <!-- <div class="w-100"></div> -->
                <?php endif; ?>
                <?php
                endif;
                
                $count++;
                endwhile;
                

            ?>
        </div> 
        </div> 
        </div>
        <h4 class="mt-4">Featured</h4>
        <div class="container">
            <?php
                
                
                $newargs = array(
                    'posts_per_page' => 5,
                    'post_type' => 'post',
                    'category_name' => 'featured',

                );
                $featured = new WP_Query($newargs);
            ?>
            <div class="row mb-4">
                <?php 
                $count = 0;
                while($featured->have_posts()): $featured->the_post();
                ?> 
                    
                    <div class="col-lg-2 col-sm-4 col-6" style="">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail() ?>
                        <p class="entry-title">
                        <?php the_title(); ?>
                        </p>
                        </a>
                    </div>
                    

                <?php 
                if($count == 4) {
                    break;
                }
                $count++;
                endwhile; 
                ?>

            </div>

        </div>

    </div>
    <?php endif;?>
    
	<div id="content" class="site-content">
        <?php  
            if( !is_page_template('elementor_header_footer')) { ?>
            <div class="container">
            <div class="row">
        <?php } ?>
			
<?php endif; ?>