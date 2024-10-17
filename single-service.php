<?php 
    get_header();
?>

<!-- CONTENT -->

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php get_template_part('templates/parts/content', 'page-header'); ?>

            <sections class="page-blog">
                <div class="container has-sidebar">
                    <div class="blog-item">
                        <?php 
                            if ( have_posts() ):
                                // while ( have_posts() ): the_post();
                                ?>
                        <article class="blog-item">
                            <!-- <?php the_post_thumbnail(); ?> -->
                            <!-- <p><?php echo get_the_date(); ?> -->
                            <!-- </p> -->
                            <!-- <h2><a href="<?php the_permalink(); ?>" class="hover-title"><?php the_title(); ?></a></h2> -->
                            <div class="meta-info">
                                <p class="categories"><?php the_content(); ?></p>
                                <!-- <p><?php the_excerpt(); ?></p> -->
                            </div>
                        </article>
                        <?php
                                // endwhile;
                            else:
                                ?>
                        <p>Nothing to be displayed yet.</p>
                        <?php
                            endif;
                        ?>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
                <div class="goback-wrapper container"><a href="/services" class="button btn-white goback">View All</a>
                </div>
            </sections>
        </main>
    </div>
</div>

<!-- CONTENT ENDS -->

<?php get_footer(); ?>