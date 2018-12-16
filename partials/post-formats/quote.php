<article class="entry wow fadeInUp">

    <span class="entry-date"><?= the_time('j'); ?><span><?= the_time('M'); ?></span></span>
    <span class="entry-format"><i class="fa fa-quote-left"></i></span>

    <div class="entry-content entry-blockquote">
        <blockquote>
            <?= the_content(); ?>
        </blockquote>
    </div><!-- End .entry-content -->

</article>