<?php
/**
 * Template name: O nas
 * The template for displaying about page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @author Rafał Puczel
 */

get_header(); ?>
	
<?php page_header_image_title($post->ID); ?>

<?php show_breadcrumbs(); ?>

<?php  
$about_cols_1 				= get_field('_about_cols_1');
$about_col_1_left_header 	= get_field('_about_col_1_left_header');
$about_col_1_left 			= get_field('_about_col_1_left');
$about_col_1_right_header 	= get_field('_about_col_1_right_header');
$about_col_1_right 			= get_field('_about_col_1_right');
$about_sep_type 			= get_field('_about_sep_type');
$about_sep_image 			= get_field('_about_sep_image');
$about_sep_text 			= get_field('_about_sep_text');
$about_cols_2 				= get_field('_about_cols_2');
$about_col_2_left_header 	= get_field('_about_col_2_left_header');
$about_col_2_left 			= get_field('_about_col_2_left');
$about_col_2_right_header 	= get_field('_about_col_2_right_header');
$about_col_2_right 			= get_field('_about_col_2_right');

$about_col_1_left_class		= $about_cols_1 == 2 ? 'col-md-6 col-sm-6' : 'col-md-12 col-sm-12';
$about_col_2_left_class		= $about_cols_2 == 2 ? 'col-md-6 col-sm-6' : 'col-md-12 col-sm-12';
?>
<div class="container page-container">
    <div class="row">
        <div class="about-col-1-left <?php echo $about_col_1_left_class; ?> col-xs-12">
        <?php if($about_col_1_left_header) : ?>
            <h1 class="h1 about-header color2"><strong><?php echo esc_html($about_col_1_left_header); ?></strong><span></span></h1>
        <?php endif; ?>
            <?php echo $about_col_1_left; ?>
        </div><!--end about col 1 left-->
        <?php if($about_cols_1 == 2) : ?>
        <div class="about-col-1-right col-md-6 col-sm-6 col-xs-12">
            <?php if($about_col_1_right_header) : ?>
                <h4 class="about-header color2"><strong><?php echo esc_html($about_col_1_right_header); ?></strong><span></span></h4>
            <?php endif; ?>
            <?php echo $about_col_1_right; ?>
        </div><!--end about col 1 right-->
        <?php endif; ?>
    </div><!--end row-->
</div><!--end container--> 
<?php if($about_sep_image) : ?>
	<?php if($about_sep_type == 'parallax') : ?>
    <div class="about-sep about-parallax relative" style="background-image:url(<?php echo esc_url($about_sep_image['sizes']['max-image']); ?>);">
		<?php if($about_sep_text) : ?>
        <div class="about-sep-text relative container text-center">
            <?php echo $about_sep_text; ?>
        </div><!--end about sep text-->
        <?php endif; ?>
        <div class="about-sep-mask"></div>
    </div>
    <?php endif; ?>
	<?php if($about_sep_type == 'static') : ?>
    <div class="container-fluid about-sep relative">
 		<img src="<?php echo esc_url($about_sep_image['sizes']['sep-image']); ?>" alt="<?php echo esc_attr($about_sep_image['alt']); ?>"/>
		<?php if($about_sep_text) : ?>
        <div class="about-sep-text relative container text-center">
            <?php echo $about_sep_text; ?>
        </div><!--end about sep text-->
        <?php endif; ?>
        <div class="about-sep-mask"></div>
    </div><!--end about sep-->
    <?php endif; ?>   
<?php endif; ?>
<div class="container page-container">
    <div class="row about-row">
        <div class="about-col-2-left <?php echo $about_col_2_left_class; ?> col-xs-12">
            <?php if($about_col_2_left_header) : ?>
                <h4 class="about-header color2"><strong><?php echo esc_html($about_col_2_left_header); ?></strong><span></span></h4>
            <?php endif; ?>
            <?php echo $about_col_2_left; ?>
        </div><!--end about col 2 left-->
        <?php if($about_cols_2 == 2) : ?>
        <div class="about-col-2-right col-md-6 col-sm-6 col-xs-12">
            <?php if($about_col_2_right_header) : ?>
                <h4 class="about-header color2"><strong><?php echo esc_html($about_col_2_right_header); ?></strong><span></span></h4>
            <?php endif; ?>
            <?php echo $about_col_2_right; ?>
        </div><!--end about col 2 right-->
        <?php endif; ?>
    </div><!--end row-->
</div><!--end container--> 

<?php get_footer(); ?>
