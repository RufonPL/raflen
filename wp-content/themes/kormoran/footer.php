<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @author Rafał Puczel
 */
?>

</div>	
    
<footer>

<?php require_template_part('contact-details', 'footer'); ?>  

<?php if(!is_page(template_id('contact'))) : ?>
	<?php require_template_part('google-map', 'footer'); ?> 
<?php endif; ?>
 
<?php require_template_part('partners', 'footer'); ?> 

<?php require_template_part('copyrights', 'footer'); ?>      

</footer>
   

<?php wp_footer(); ?> 
<?php enqueue_footer_css(); ?>

<?php require_template_part('google-remarketing', 'GA'); ?>      


</body>
</html>