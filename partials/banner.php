<?php global $redux; ?>

<div id="revslider-container">
	<div id="revslider">
		<ul>
			<?php foreach (pc_theme_slider_get_slides() as $key => $slide): ?>
                <li data-transition="fade" data-slotamount="8" data-masterspeed="800" data-title="Summer Season" data-thumb="<?= $slide->slide_image; ?>">
                    <!-- background image -->

                    <?= pc_theme_slider_get_image('', [
                            'alt' => "",
                            'data-lazyload' => $slide->slide_image,
                            'data-bgposition'=> "center center",
                            'data-bgfit' => "cover",
                            'data-bgrepeat' =>"no-repeat",
                    ]); ?>

                    <div class="tp-caption rev-subtitle lfb ltt"
                         data-x="center"
                         data-y="160"
                         data-speed="1000"
                         data-start="900"
                         data-easing="Power3.easeInOut"
                         data-endspeed="400"
                         style="z-index: 10"><?= $slide->slide_subheader; ?>
                    </div>

                    <?php if(isset($slide->slide_title) && !empty($slide->slide_title)): ?>
                    <div class="tp-caption rev-title lfb ltt"
                         data-x="center"
                         data-y="210"
                         data-speed="1000"
                         data-start="1000"
                         data-easing="Power3.easeInOut"
                         data-endspeed="600"
                         style="z-index: 6"><?= $slide->slide_title ?>
                    </div>
                    <?php endif; ?>

                    <?php if(isset($slide->slide_description) && !empty($slide->slide_description)): ?>
                    <div class="tp-caption rev-text lfb ltt"
                         data-x="center"
                         data-y="285"
                         data-speed ="1000"
                         data-start="1200"
                         data-easing="Power3.easeInOut"
                         data-endspeed="700"
                         style="z-index: 12"><?= $slide->slide_description ?>
                    </div>
                    <?php endif; ?>

                    <div class="tp-caption rev-btn lfb ltt"
                         data-x="center"
                         data-y="355"
                         data-speed="1000"
                         data-start="1400"
                         data-easing="Power3.easeInOut"
                         data-endspeed="800"
                         style="z-index: 14">
                        <a href="<?= $slide->slide_link_url; ?>" class="btn btn-white btn-border radius-lger min-width"><strong><?= $slide->slide_link_label; ?></strong></a>
<!--                        <a href="#" class="btn btn-white radius-lger min-width"><strong>Shop Now</strong></a>-->
                    </div>
                </li>
            <?php endforeach; ?>
		</ul>
	</div><!-- End #revslider -->
	<a href="#content-products" class="scroll-btn light" data-offset="-96" data-0="opacity:1" data-top-bottom="opacity:0;" title="Start Shopping"><span></span></a>
</div><!-- End #revslider-container -->

<?= get_template_part('partials/boxes'); ?>

<div class="mb60"></div><!-- space -->