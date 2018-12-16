<article class="entry wow fadeInUp">
    <span class="entry-date"><?= the_time('j'); ?><span><?= the_time('M'); ?></span></span>
    <span class="entry-format"><i class="fa fa-file-image-o"></i></span>
    <div class="row">
        <div class="col-md-5">

            <div class="entry-media">
                <figure>
                    <a href="<?= the_permalink(); ?>">
                        <?= the_post_thumbnail('blog_thumbnail'); ?>
                    </a>
                </figure>
            </div><!-- End .entry-media -->

        </div><!-- End .col-md-5 -->

        <div class="col-md-7">

            <h2 class="entry-title"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></h2>

            <div class="entry-content">
                <p><?= the_excerpt(); ?></p>
            </div><!-- End .entry-content -->

            <footer class="entry-footer clearfix">
                <?= belli_post_categories(); ?>
                <span class="entry-separator">/</span>
                <a href="#" class="entry-comments"><?= get_comments_number(); ?> Komentarzy</a>
                <span class="entry-separator">/</span>
                by <a href="#" class="entry-author"><?= get_the_author_meta('display_name');  ?></a>

            </footer>
        </div><!-- End .col-md-7 -->
    </div><!-- End .row -->
</article>