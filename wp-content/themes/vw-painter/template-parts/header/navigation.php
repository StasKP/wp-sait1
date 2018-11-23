<?php
/**
 * The template part for header
 *
 * @package VW Painter 
 * @subpackage vw_painter
 * @since VW Painter 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','vw-painter'); ?></a></div>
<div id="header" class="menubar">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
	</div>
</div>