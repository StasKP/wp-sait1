<?php 
if(get_header_image()){
    $title   = "title" ;
 }
 else{
    $title   = "notitle";
 }
?> 
 <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
	<div class="container">
		<?php if (is_home() || is_front_page()) { ?>						
			<h2 class="<?php echo esc_attr($title); ?>"><?php the_title(); ?></h2>
		<?php } else { ?>
			<h2 class="<?php echo esc_attr($title); ?>"><?php wp_title(''); ?></h2>						
		<?php } ?>	
	</div>
</section>
<!-- End page-title -->