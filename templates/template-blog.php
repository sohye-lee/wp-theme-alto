<?php 
/*
Template Name: Blogs Template
*/
?>

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part( 'templates/parts/content', 'blog-header' ); ?>
            <sections class="page-blog">
                <div class="container">
                    <div class="blog-grid">
                        <?php 
                            if ( have_posts() ):
                                while ( have_posts() ): the_post();
                                ?>
                        <article class="blog-item">
                            <p><?php echo get_the_date(); ?>
                            </p>
                            <h2><a href="<?php the_permalink(); ?>" class="hover-title"><?php the_title(); ?></a></h2>
                            <div class="meta-info">
                                <p class="categories"><?php the_category( ' ' ); ?></p>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </article>
                        <?php
                                endwhile;
                            else:
                                ?>
                        <p>Nothing to be displayed yet.</p>
                        <?php
                            endif;
                        ?>
                    </div>
                </div>
            </sections>
        </main>
    </div>
</div>