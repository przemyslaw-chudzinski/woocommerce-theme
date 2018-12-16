<?php

    global $redux;

    $post_ids = [];
    $posts_count = isset($redux) && isset($redux['blog-banner-posts']) ? count($redux['blog-banner-posts']) : 0;

    if($posts_count > 0) {
        foreach ($redux['blog-banner-posts'] as $key => $item) {
            $post_ids[$key] = (int) $redux['blog-banner-posts'][$key];
        }
    }

?>
<div class="page-top-carousel">
    <div class="owl-carousel home-blog-carousel">
        <?php

        $recent_posts = new WP_Query([
            'post-type' => 'posts',
            'post__in' => $post_ids,
            'posts_per_page' => $posts_count,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);

        while ($recent_posts->have_posts()):
        $recent_posts->the_post();
        ?>
        <div class="entry-wrapper">
            <article class="entry entry-overlay">

                <div class="entry-media">
                    <figure>
                        <a href="<?= the_permalink(); ?>">
                            <?= the_post_thumbnail('blog_thumbnail_banner'); ?>
                        </a>
                    </figure>
                </div><!-- End .entry-media -->

                <div class="entry-overlay-meta">
                    <h2 class="entry-title"><a href="<?= the_permalink() ?>"><?= the_title(); ?></a></h2>
                    <span class="entry-overlay-date"><i class="fa fa-calendar"></i><?= the_time('j'); ?><span><?= the_time('M'); ?></span></span>
                    <span class="entry-separator">/</span>
                    <a href="#" class="entry-comments"><i class="fa fa-comments"></i><?= comments_number(); ?></a>
                    <span class="entry-separator">/</span>
                    <a href="#" class="entry-author"><i class="fa fa-user"></i><?= the_author_meta('first_name').the_author_meta('last_name')  ?></a>
                </div><!-- End .entry-overlay-meta -->

            </article>
        </div><!-- End .entry-wrapper -->
        <?php endwhile; ?>
    </div><!-- end .owl-carousel -->
</div><!-- End .page-top-carousel -->