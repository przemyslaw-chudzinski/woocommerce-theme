<div class="about-author clearfix">
    <h3 class="title-underblock custom">Autor wpisu: <a href="#"><?= get_the_author_meta('display_name')?></a></h3>

    <figure class="pull-left"><img src="<?= ASSETS_PATH ?>/images/blog/eon.jpg" class="img-circle" alt="Eon Dean"></figure>
    <div class="author-content">
            <p><?= get_the_author_meta('description'); ?></p>
    </div><!-- End .athor-content -->
    <div class="social-icons">
        <?php get_template_part('partials/social-media-icons'); ?>
    </div><!-- End .social-icons -->

</div><!-- End .about-author -->