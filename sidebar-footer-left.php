<?php if ( is_active_sidebar( 'footer-left' ) ): ?>
<section class="sidebar footer-section">
    <div class="logo"><?php the_custom_logo(); ?></div>
    <?php dynamic_sidebar( 'footer-left' ); ?>
</section>
<?php endif; ?>