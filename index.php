<?php get_header();?>

<!-- CONTENT -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <sections>
                <div class="container">
                    <div class="blog-grid">
                        <?php 
                           
                                while ( have_posts() ): the_post();
                                ?>
                        <article class="page-item">
                            <?php the_content(); ?>
                        </article>
                        <?php
                                endwhile;
                    
                        ?>
                    </div>
                </div>
            </sections>
        </main>
    </div>
</div>
<!-- CONTENT ENDS -->

<?php get_footer(); ?>