<?php 
    if (is_home()) {
        $page_id = get_option( 'page_for_posts' );
        $title = get_the_title($page_id);
        $bg_img_url = get_the_post_thumbnail_url($page_id);
    } else {
        $title = get_the_title();
        $bg_img_url = get_the_post_thumbnail_url();
    }

    if ($bg_img_url) {
        $className= 'has-thumbnail';
    } else {
        $className = 'no-thumbnail';
    }
?>


<sections class="page-header  <?php echo $className; ?>" style="background-image: url('<?php echo $bg_img_url; ?>');">
    <div class="container">
        <div class="page-header__content">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</sections>