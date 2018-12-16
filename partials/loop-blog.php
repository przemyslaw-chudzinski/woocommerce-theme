<?php if (have_posts()): ?>
<?php while (have_posts()): the_post(); ?>
        <?php
            switch (get_post_format()) {
                case 'gallery':
                    get_template_part('partials/post-formats/gallery');
                    break;
                case 'quote':
                    get_template_part('partials/post-formats/quote');
                    break;
                default:
                    get_template_part('partials/post-formats/post');
                    break;
            }
        ?>

<?php endwhile; ?>
<?php endif; ?>