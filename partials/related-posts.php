<h3 class="mb30 title-underblock custom">Powiązane wpisy</h3>
<div class="blog-related-carousel owl-carousel small-nav">
    <?php

    $related = new WP_Query([
        'post-type' => 'posts',
        'posts_per_page' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'cat' => belli_get_post_category_ids(),
        'terms' => ['gallery', 'post']
    ]);

    while ($related->have_posts()):
    $related->the_post();
    ?>
    <article class="entry entry-box">
        <div class="entry-media">
            <figure>
                <a href="<?= the_permalink() ?>">
                    <?= the_post_thumbnail('blog_thumbnail'); ?>
                </a>
            </figure>
        </div><!-- End .entry-media -->

        <div class="entry-content-wrapper">
            <span class="entry-date"><?= the_time('j'); ?><span><?= the_time('M'); ?></span></span>
            <span class="entry-format"><i class="fa fa-file-image-o"></i></span>

            <h2 class="entry-title"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>


            <div class="entry-content">
                <?= belli_the_excerpt(10); ?>
            </div><!-- End .entry-content -->
        </div><!-- End .entry-content-wrapper -->

        <footer class="entry-footer clearfix">
            <?= belli_post_categories(false); ?>
            <a href="#" class="entry-readmore text-right">Więcej <i class="fa fa-angle-right"></i></a>
        </footer>
    </article>
    <?php endwhile; ?>

</div><!-- End .blog-related-carousel -->