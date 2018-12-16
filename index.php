<?php get_template_part('header-page'); ?>

        <?php get_template_part('partials/blog-banner'); ?>

        <div class="container">
            <div class="row">

                <div class="col-md-9">

                    <?php get_template_part('partials/loop-blog'); ?>

                    <nav class="pagination-container text-right">
                        <?= belli_blog_pagination(); ?>
                    </nav>

                </div><!-- End .col-md-9 -->

                <div class="mb60 clearfix visible-sm visible-xs"></div><!-- space -->

                <?php get_template_part('sidebar-blog'); ?>

            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb60 mb20-sm"></div><!-- space -->

    </div><!-- End #content -->

<?php get_footer(); ?>