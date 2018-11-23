<?php
/**
 * The template part for topbar
 *
 * @package VW Painter 
 * @subpackage vw_painter
 * @since VW Painter 1.0
 */
?>

<div id="topbar">
	<div class="container">
		<div class="contact_details">
			<div class="row">
	        	<div class="col-lg-4 col-md-3">
	        		<?php if(get_theme_mod('vw_painter_location') != ''){ ?>
						<i class="fas fa-location-arrow"></i><span><?php echo esc_html(get_theme_mod('vw_painter_location',''));?></span>
					<?php }?>
				</div>
	        	<div class="col-lg-3 col-md-3">
	        		<?php if(get_theme_mod('vw_painter_email_address') != ''){ ?>
	        			<i class="fas fa-envelope-open"></i><span><?php echo esc_html(get_theme_mod('vw_painter_email_address',''));?></span>
	        		<?php }?>
	        	</div>
	        	<div class="col-lg-3 col-md-3">
	        		<?php dynamic_sidebar('social-widget'); ?>
	        	</div>
	        	<div class="col-lg-2 col-md-3">
	        		<?php if(get_theme_mod('vw_painter_button_text') != ''){ ?>
	        			<div class="top-button">
	        				<a href="<?php echo esc_html(get_theme_mod('vw_painter_button_url','#'));?>"><?php echo esc_html(get_theme_mod('vw_painter_button_text',''));?></a>
	        			</div>
	        		<?php }?>
	        	</div>
	        </div>
		</div>
	</div>
</div>