<?php 
    get_header();
?>

<!-- CONTENT -->

<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php get_template_part('templates/parts/content', 'page-header'); ?>

            <sections class="page-blog">
                <div class="container">
                    <div class="blog-grid">
                        <?php 
                            $service_categories = get_terms( 'categories' );
                            $args = array( 
                                'post_type' => 'service',
                                'post_status' => 'publish',
                                'orderby' => 'title',
                                'order' => 'ASC'
                                // 'posts_per_page' => 2,
                                // 'category__not-in' => array(30), 
                                // 'tax_query' => array(
                                //     array(
                                //         'taxonomy' => 'categories',
                                //         'field' => 'slug', 
                                //         'terms' => $service_categories[0]->slug,
                                //     )
                                // )
                            );

                            $postList = new WP_Query( $args );
                            if ( $postList->have_posts() ):
                                while ( $postList->have_posts() ): $postList->the_post();

                                $terms = get_the_terms( get_the_ID(), 'categories' );
                                $terms = join(' | ', wp_list_pluck( $terms, 'name'));
                                ?>
                        <article class="service-item blog-item">
                            <figure class="service-item__thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </figure>
                            <h2><a href="<?php the_permalink(); ?>" class="hover-title"><?php the_title(); ?></a></h2>
                            <div class="meta-info">
                                <!-- <p><?php echo get_the_date(); ?></p> -->
                                <p class="categories"><?php echo $terms; ?></p>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                        </article>
                        <?php
                                endwhile;
                                wp_reset_postdata();
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