<?php get_header();?>

<!-- CONTENT -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="hero">
                <h1>HERO!</h1>
            </section>
            <section class="services">
                SERVICES
            </section>
            <sections class="home-blog">
                <div class="container">
                    <div class="blog-grid">
                        <?php 
                            if ( have_posts() ):
                                while ( have_posts() ): the_post();
                                ?>
                        <article class="blog-item">
                            <h2><?php the_title(); ?></h2>
                            <div class="meta-info">
                                <p><?php echo get_the_date(); ?>
                                    <!-- by <?php the_author_posts_link(); ?> -->
                                </p>
                                <p class="categories"><?php the_category( ' ' ); ?></p>
                                <p class="tags"><?php the_tags( '#', ', ' ); ?></p>
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
<!-- CONTENT ENDS -->

<?php get_footer(); ?>