        <!-- FOOTER -->
        <footer class="site-footer">
            <section class="footer">
                <div class="container">
                    <?php get_sidebar( 'footer-left' ); ?>
                    <?php get_sidebar( 'footer-center' ); ?>
                    <?php get_sidebar( 'footer-right' ); ?>
                </div>
            </section>
            <section class="bottom-bar">
                <div class="bottom-logo">
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_site_icon_url(); ?>"
                            alt="site icon"></a>
                </div>
                <div class="copyright">
                    <?php 
                        $footer_text = get_theme_mod( 'footer_bottom_bar_text' );
                        echo esc_html($footer_text);
                    ?>
                </div>
            </section>
        </footer>
        <!-- FOOTER ENDS -->
        </div>

        <?php wp_footer(); ?>
        </body>

        </html>