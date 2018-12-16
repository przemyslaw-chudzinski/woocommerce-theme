<?php global $redux; ?>
</div>
<?php
get_template_part('partials/info-line');
?>
<footer id="footer" class="footer-inverse" role="contentinfo">
	<div id="footer-inner">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-push-3 col-xs-10 col-xs-push-1">
					<div class="widget">
						<div class="corporate-widget text-center">
							<span class="footer-logo bigger">BOSS</span><!-- End .footer-logo -->
							<?php if(isset($redux['footer-desc']) && !empty($redux['footer-desc'])): ?>
                                <p><?= $redux['footer-desc'] ?></p>
							<?php endif; ?>

							<span class="social-icons-label mb15">Follow us on:</span>
							<div class="social-icons social-icons-bg social-icons-bg-hover social-icons-circle no-margin text-center">
                                <?php get_template_part('partials/social-media-icons'); ?>
							</div><!-- End .social-icons -->

						</div><!-- End corporate-widget -->
					</div><!-- End .widget -->
				</div><!-- End .col-md-3 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End #footer-inner -->
	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-6">
                    <?php belli_get_footer_menu() ?>
				</div><!-- End .col-md-6 -->
				<div class="col-md-6 col-md-pull-6">
<!--					<p class="copyright">Designed and Developed by Eon.  All rights reserved. &copy; <a href="#">www.eonythemes.com</a></p>-->
				</div><!-- End .col-md-6 -->
			</div><!-- End .row -->
		</div><!-- End .container -->
	</div><!-- End #footer-bottom -->
</footer><!-- End #footer -->
</div><!-- End #wrapper -->
<a href="#top" id="scroll-top" title="Back to Top"><i class="fa fa-angle-up"></i></a>
<!-- END -->
</div>
</div>
<script src="<?= ASSETS_PATH ?>/js/vendor/bundle.js"></script>
<?php wp_footer(); ?>
<script>
    (function () {
        "use strict";
        // Slider Revolution
        jQuery('#revslider').revolution({
            delay:8000,
            startwidth:1170,
            startheight:500,
            fullWidth:"on",
            fullScreen:"on",
            hideTimerBar: "on",
            spinner:"spinner4",
            navigationStyle: "preview4",
            soloArrowLeftHOffset:20,
            soloArrowRightHOffset:20
        });
    }());
</script>

</body>
</html>