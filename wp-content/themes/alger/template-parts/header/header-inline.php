<?php
	
	$menu_position = esc_attr(alger_option('inline_header_menu_position', 'right'));
	$header_classes = 'lq-header lq-inline-header '.$menu_position;
	$header_full_width = alger_option('header_full_width');
	if( $header_full_width == '1' ){
		$header_classes .= ' fullwidth';
		}
	
	$header_classes = apply_filters( 'lqt_header_classes', $header_classes );
?>
<header id="masthead" class="<?php echo esc_attr($header_classes);?>">
  <?php get_template_part( 'template-parts/header/header', 'top-bar' ); ?>
  <div class="lq-main-header">
    <div class="lq-logo">
    <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
    </div>
    <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
  </div>
  
  <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
  
</header>
<div class="lq-fixed-header-wrap" style="display: none;">
  <div class="lq-header lq-inline-header <?php echo $menu_position;?>">
    <?php get_template_part( 'template-parts/header/header', 'top-bar' ); ?>
    <div class="lq-main-header">
      <div class="lq-logo"> 
      <?php get_template_part( 'template-parts/header/header', 'logo' ); ?>
      </div>
      <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
    </div>
    
    <?php get_template_part( 'template-parts/navigation/navigation', 'mobile' ); ?>
  </div>
</div>
