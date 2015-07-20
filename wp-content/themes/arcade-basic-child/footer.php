    <?php wp_footer(); ?>
    <footer id="footer" role="contentinfo">
        <div id="footer-content" class="container">
            <div class="row">
                <div class="copyright col-lg-12">
                    <span class="pull-left"><?php printf( __( 'Copyright &copy; %s %s. All Rights Reserved.', 'arcade' ), date( 'Y' ), ' <a href="' . home_url() . '">' . get_bloginfo( 'name' ) .'</a>' ); ?></span>
                    <span class="credit-link pull-right"><i class="fa fa-leaf"></i><?php printf( __( 'The %s Theme by %s.', 'arcade' ), BAVOTASAN_THEME_NAME, '<a href="http://themes.bavotasan.com/themes/arcade">bavotasan.com</a>' ); ?></span>
                </div><!-- .col-lg-12 -->
            </div><!-- .row -->
        </div><!-- #footer-content.container -->
    </footer><!-- #footer -->
</div><!-- #page -->

</body>
</html>