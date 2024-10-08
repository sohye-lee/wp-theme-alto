<?php 
/*
Template Name: General Template
*/

get_header();

?>

<div id="content" class="site-content general-template">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part( 'templates/parts/content','page-header'); ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>