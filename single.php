<?php get_template_part('header-page'); ?>

<?php get_template_part('partials/blog-banner'); ?>

<?php the_post(); ?>

<div class="container">
    <div class="row">

        <div class="col-md-9">
            <article class="entry single">

                <div class="entry-media">
                    <?php
                    switch (get_post_format()) {
                        case 'gallery':
                            get_template_part('partials/gallery-slider');
                            break;
                        default:
                            the_post_thumbnail();
                            break;
                    }
                    ?>
                </div><!-- End .entry-media -->

                <span class="entry-date"><?= the_time('j'); ?><span><?= the_time('M'); ?></span></span>
                <span class="entry-format"><i class="fa fa-file-image-o"></i></span>
                <h2 class="entry-title"><?= the_title(); ?></h2>

                <div class="entry-content">
                    <?= the_content(); ?>
                </div><!-- End .entry-content -->

                <footer class="entry-footer clearfix">
                    <?= belli_post_categories(); ?>
                    <span class="entry-separator">/</span>
                    <a href="#" class="entry-comments"><?= get_comments_number(); ?> Komentarzy</a>
                    <span class="entry-separator">/</span>
                    by <a href="#" class="entry-author"><?= get_the_author_meta('display_name');  ?></a>

                </footer>

                <?php get_template_part('partials/about-author'); ?>

            </article>

            <?php get_template_part('partials/related-posts'); ?>

            <?php
                if($post->comment_status === 'open'){
                    get_template_part('partials/comments');
                }
            ?>

        </div>

        <div class="mb60 clearfix visible-sm visible-xs"></div><!-- space -->

        <?php get_template_part('sidebar-blog'); ?>

    </div><!-- End .row -->
</div><!-- End .container -->

<div class="mb60 mb20-sm"></div><!-- space -->

</div><!-- End #content -->

<?php get_template_part('footer-blog'); ?>
