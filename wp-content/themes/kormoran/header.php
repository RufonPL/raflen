<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @author Rafał Puczel
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php $favicon = get_field('_favicon','option'); ?>
<?php if($favicon) : ?>
<link rel="shortcut icon" href="<?php echo esc_url($favicon['url']); ?>" />
<?php endif; ?>


<?php $logo = get_field('_logo','option'); ?>

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-83002875-1', 'auto');
  ga('send', 'pageview');

</script>

</head>
<body <?php body_class(); ?>>

	<header class="site-header">
    	<div class="top-bar container-fluid">
        	<div class="container">
            	<div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <?php require_template_part('social', 'header') ?>
                    </div><!--end col-->
                	<div class="col-md-6 col-sm-6 col-xs-12 text-center">
                    	<a href="<?php echo esc_url(get_bloginfo('url')); ?>" class="navbar-brand">
                            <?php if($logo) : ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>"/>
                            <h2 class="h1 site-name"><?php echo esc_html(get_bloginfo('name')); ?></h2>
                            <?php else : ?>
                            <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
                            <?php endif; ?>
                        </a>
                    </div><!--end col-->
                    <div class="col-md-3 col-sm-3 hidden-xs">
                        <?php require_template_part('contact', 'header') ?>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div><!--end top bar-->
    	<nav class="navbar navbar-default">
			<div class="container">
				<div class="row">
					<div class="navbar-header">
                        <div class="navbar-toggle transition" data-toggle="collapse" data-target=".navbar-collapse">
                        	<div class="pull-left">
                            	MENU
                            </div><!--end pull left-->
                        	<div class="pull-right">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </div><!--end pull right-->
                        </div><!--end navbar toggle-->
                        
                    </div><!--end navbar header-->
                    <?php 
                    $args = array(
						'theme_location' 	=> 'primary', 
						'container_class' 	=> 'navbar-collapse collapse', 
						'menu_class' 		=> 'nav navbar-nav',
						'fallback_cb'		=> '',
						'menu_id' 			=> 'main-menu',
						'before'			=> '<span class="m-item-before absolute-center-vertical"></span>',
						'after'				=> '<span class="m-item-after absolute-center-vertical"></span>',
						'walker' 			=> new Rfswp_Walker_Nav_Menu()); 
                    wp_nav_menu($args);
                    ?>
				</div><!--end row-->
			</div><!--end container-->
		</nav>
	</header><!--end header-->
	<div id="content" class="site-content overflow">