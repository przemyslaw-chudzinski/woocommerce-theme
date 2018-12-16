<?php global $redux; ?>
<div class="container-fluid no-padding">
    <div class="row no-margin">
        <?php if(isset($redux['home-boxes-box-1']) && !empty($redux['home-boxes-box-1'])): ?>
            <div class="col-sm-4 no-padding">
                <div class="banner zoom-hover mb0">
                    <a href="#">
                        <?= belli_get_image($redux['home-boxes-box-1']); ?>
                    </a>
                </div><!-- End .banner -->
            </div><!-- End .col-sm-4 -->
        <?php endif; ?>
        <?php if(isset($redux['home-boxes-box-2']) && !empty($redux['home-boxes-box-2'])): ?>
            <div class="col-sm-4 no-padding">
                <div class="banner zoom-hover mb0">
                    <a href="#">
                        <?= belli_get_image($redux['home-boxes-box-2']); ?>
                    </a>
                </div><!-- End .banner -->
            </div><!-- End .col-sm-4 -->
        <?php endif; ?>
        <?php if(isset($redux['home-boxes-box-3']) && !empty($redux['home-boxes-box-3'])): ?>
            <div class="col-sm-4 no-padding">
                <div class="banner zoom-hover mb0">
                    <a href="#">
                        <?= belli_get_image($redux['home-boxes-box-3']); ?>
                    </a>
                </div><!-- End .banner -->
            </div><!-- End .col-sm-4 -->
        <?php endif; ?>
    </div><!-- End .row -->
</div><!-- End .container-fluid -->