<?php get_header();?>

<!-- CONTENT -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part('templates/parts/content', 'page-header'); ?>
            <div class="container has-sidebar">
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
                <?php get_sidebar( 'page' ); ?>
            </div>
        </main>
    </div>
</div>
<!-- CONTENT ENDS -->

<?php get_footer(); ?>