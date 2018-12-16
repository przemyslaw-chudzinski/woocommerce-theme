<?php

    if (!function_exists('pc_multiple_images_get_images')) {
        return;
    }

?>

<?php $images = pc_multiple_images_get_images(); ?>

<?php if(count($images) > 0): ?>
    <div id="post-id-<?= $post->ID; ?>" class="entry-media carousel slide" data-ride="carousel" data-interval="7000">
        <div class="entry-media carousel-inner">
            <?php foreach ($images as $key => $img): ?>
                <div class="item <?= $key === 0 ? 'active' : null; ?>">
                    <a href="<?= the_permalink(); ?>"><img src="<?= $img['sizes']['thumbnail']['url']; ?>" class="img-responsive" alt="<?= $img['alt']; ?>"></a>
                </div><!-- End .item -->
            <?php endforeach; ?>
        </div><!-- End .carousel-inner -->

        <!-- Controls -->
        <a class="left carousel-control" href="#post-id-<?= $post->ID ?>" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
        <a class="right carousel-control" href="#post-id-<?= $post->ID; ?>" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
    </div><!-- End .entry-media -->
<?php endif; ?>