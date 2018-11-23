<?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tastybite
 */

$tastybite_overlay_section = get_theme_mod('tastybite_intro_section_overlay','no');
$tastybite_hours_section = get_theme_mod( 'tastybite_hours_section_hideshow','hide');
$intro_pages[]          =  get_theme_mod( "tastybite_intro_page", 1 );
$tastybite_btntxt     = get_theme_mod( "tastybite_intro_btntxt"  );
$tastybite_btnurl      = get_theme_mod( "tastybite_intro_btnurl" );
$tastybite_hours_title   = get_theme_mod( "tastybite_hours_title" );

$info_no        = 4;

$intro_args  = array(
	'post_type' => 'page',
	'post__in' => array_map( 'absint', $intro_pages ),
	'posts_per_page' => absint($info_no),
	'orderby' => 'post__in'
); 


$tastybite_intro_icon     = array();
$tastybite_intro_name     = array();
$tastybite_intro_time     = array();


for( $i = 1; $i <= $info_no; $i++ ) {
	$tastybite_intro_icon[]    =  get_theme_mod( "tastybite_intro_icon_$i", '' );
	$tastybite_intro_name[]    =  get_theme_mod( "tastybite_intro_name_$i",  '');
	$tastybite_intro_time[]    =  get_theme_mod( "tastybite_intro_time_$i", '' );

}

$intro_query = new wp_Query( $intro_args );
if($intro_query->have_posts()){
    ?>
<section class="sliders">
		<div class="testy-slider owl-carousel" data-items="1" data-loop="false" data-smart-speed="400" data-dots="false" data-nav="false"
			data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="false"
			data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="1"
			data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="false" data-r-large-dots="false">
		   <?php
			
				$intro_query->the_post();
				if(has_post_thumbnail()) 
				{ ?>
					<div class="item">
						<?php if ($tastybite_overlay_section =='yes') { ?>
							<div class="overlay"></div>
						<?php } ?>

						  <?php if(has_post_thumbnail()) : ?>
							<?php the_post_thumbnail(); ?>
						<?php endif; ?>
						
						<div class="container">
							<div class="slider-text">
								<h2>
									<?php the_title(); ?>
									<span><?php the_excerpt(); ?></span>
								</h2>
								<?php the_content(); ?>
								<?php
									if (!empty($tastybite_btntxt)) {
								?>
								<a href="<?php echo esc_url($tastybite_btnurl); ?>" class="btn-custom"><?php echo esc_html($tastybite_btntxt); ?></a>
									<?php } ?>
									<?php if($tastybite_hours_section == "show")
											{ ?>
								<div class="hours-box">
									<?php if (!empty($tastybite_hours_title)){ ?>
									<h3><?php echo esc_html($tastybite_hours_title) ; ?></h3>
								<?php }?>
									<div class="row">
										<!-- hours  -->

										<?php
				   
									   for( $i = 0; $i <= 3; $i++ ) {
											?>
										<div class="col-xs-6">
											<div class="hours">
												<?php if($tastybite_intro_icon[$i] !="")
												{ ?>
													<div class="icon">
													<i aria-hidden="true" class="fa <?php echo esc_attr($tastybite_intro_icon[$i]); ?>"></i>
													</div>
												<?php } ?>
												<?php if($tastybite_intro_name[$i] !="")
												 { ?>
													<h4 class="hours-title"><?php echo esc_html($tastybite_intro_name[$i]); ?></h4>
												<?php } ?>
												<?php if($tastybite_intro_time[$i] !="")
												{ ?>
													<p class="hours-text"><?php echo esc_html($tastybite_intro_time[$i]); ?></p>
												<?php } ?>
											</div>
										</div>
										<?php
											}
										?> 
										<!-- hours ends  -->
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<?php
				}
				
				wp_reset_postdata();
			?> 
		</div>
	</section> 
<?php } else { ?>

 <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
	<div class="container">
		<?php if (is_home() || is_front_page()) { ?>						
			<h2 class="title"><?php the_title(); ?></h2>
		<?php } else { ?>
			<h2 class="title"><?php wp_title(''); ?></h2>						
		<?php } ?>	
	</div>
</section>
<!-- End page-title -->

<?php } ?>