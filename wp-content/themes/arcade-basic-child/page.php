<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @since 1.0.0
 */
get_header();
?>
    <div class="container">
        <div class="row">
            <div id="primary">
                <?php
                while ( have_posts() ) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <style>
                            h1.entry-title{
                                text-align:center;
                            }
                        </style>
                        <div class="entry-content description clearfix">
                            <?php the_content( __( 'Read more', 'arcade') ); ?>
                        </div><!-- .entry-content -->

                        <?php get_template_part( 'content', 'footer' ); ?>
                    </article><!-- #post-<?php the_ID(); ?> -->

                    <?php
                    comments_template( '', true );
                endwhile;
                ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>