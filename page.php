<?php get_header('page'); ?>

<?php the_post(); ?>

<?php get_template_part('partials/page-header'); ?>

<div class="container">
	<?php the_content(); ?>
</div>


<div class="mb40"></div><!-- space -->

<?php get_footer(); ?>
