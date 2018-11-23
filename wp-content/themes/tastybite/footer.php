 <?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Tastybite
 */
 get_template_part( 'template-parts/footer-callout' );
?>

		<!-- footer  -->
        <footer class="footer section-padding">
            <div class="container">
                <div class="row">                    
                    <?php dynamic_sidebar('tastybite-footer-widget-area'); ?>                    
                </div>
            </div>
        </footer>
        <!-- footer ends -->

        <div class="copyright">
            <p>
                <?php if( get_theme_mod('tastybite_footer_text') ) : ?>
                    <span>
                        <?php echo wp_kses_post( html_entity_decode(get_theme_mod('tastybite_footer_text'))); ?>
                    </span>
                <?php else : 
                    /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                    printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'tastybite' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'tastybite' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
                    /* translators: 1: poweredby, 2: link, 3: span tag closed  */
                    printf( esc_html__( ' Theme: tastybite by: %1$sDesign By %2$s%3$s', 'tastybite' ), '<span>', '<a href="'. esc_url( __( 'http://operationwp.com/', 'tastybite' ) ) .'" target="_blank">Operation WP</a>', '</span>' );
                endif;  ?>
            </p>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>
</html>