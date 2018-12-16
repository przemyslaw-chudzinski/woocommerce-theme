<?php global $redux; ?>

<!--<div class="shop-newsletter-section bg-image overlay-container pt65 pb65" data-bgattach="--><?//= ASSETS_PATH ?><!--/images/samples_for_belli/newsletter-bg.jpg">-->
    <div class="shop-newsletter-section bg-image overlay-container pt65 pb65" data-bgattach="<?= $redux['newsletter-bg']['url'] ?>">
	<div class="overlay darker"></div><!-- End .overlay -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-push-2">
				<header class="title-block text-center">
					<?php if(isset($redux['newsletter-header']) && !empty($redux['newsletter-header'])): ?>
                        <h2 class="title-underblock text-white white mb20"><?= $redux['newsletter-header']; ?></h2>
                    <?php endif; ?>
					<?php if (isset($redux['newsletter-desc']) && !empty($redux['newsletter-desc'])): ?>
                        <p class="text-white max620"><?= $redux['newsletter-desc'] ?></p>
                    <?php endif; ?>
				</header>
				<form action="#">
					<?php if (isset($redux['newsletter-form-label']) && !empty($redux['newsletter-form-label'])): ?>
                        <label for="newsletter-email-section" class="input-desc text-white mb15"><?= $redux['newsletter-form-label'] ?></label>
                    <?php endif; ?>

					<input
                            type="email"
                            class="form-control white mb20 text-center"
                            id="newsletter-email-section"
                            name="newsletter-email-section"
                            placeholder="<?= $redux['newsletter-input-placeholder'] ?>"
                            required>

					<button type="submit"  class="btn btn-white min-width btn-border"><?= $redux['newsletter-send-btn'] ?></button>
				</form>
			</div><!-- End .col-md-8 -->
		</div><!-- End .row -->
	</div><!-- End. container -->
</div><!-- End .shop-newsletter-section -->

<div class="mb70"></div><!-- space -->