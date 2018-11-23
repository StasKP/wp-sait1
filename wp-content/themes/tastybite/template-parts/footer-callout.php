  <?php 
// To display Footer Call Out section on front page
?>
<?php
$tastybite_contact_section_hideshow = get_theme_mod('tastybite_contact_section_hideshow','hide');
if ($tastybite_contact_section_hideshow =='show') { ?>
<?php $ctah_btn_text = get_theme_mod('ctah_btn_text'); ?> 

<!-- cloud Section -->

    <section class="call-out-section section-padding " <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
        <div class="container">
            <div class="row">
                  <div class="col-md-10">
                      <h2><?php echo esc_html(get_theme_mod('ctah_heading')); ?></h2>
                  </div>
                  <?php if (!empty($ctah_btn_text)) { ?>
                    <div class="col-md-2">
                        <div class="call-out-btn">
                            <a href="<?php echo esc_url(get_theme_mod('ctah_btn_url')); ?>" class="btn-custom"><?php echo esc_html($ctah_btn_text); ?></a>
                        </div>
                    </div>
                  <?php } ?>
            </div>
        </div>
    </section>

<?php } ?>