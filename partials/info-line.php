<?php global $redux; ?>
<div class="mb90 mb80-sm"></div><!-- space -->

<div class="info-line-section custom">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="service">

					<?php if(isset($redux['box-info-1-icon']) && !empty($redux['box-info-1-icon'])): ?>
                        <span class="service-icon"><i class="<?= $redux['box-info-1-icon'] ?>"></i></span>
                    <?php endif; ?>
					<div class="service-content">
						<?php if(isset($redux['box-info-1-header']) && !empty($redux['box-info-1-header'])): ?>
                            <h3 class="service-title text-uppercase"><?= $redux['box-info-1-header'] ?></h3>
                        <?php endif; ?>

						<?php if(isset($redux['box-info-1-desc']) && !empty($redux['box-info-1-desc'])): ?>
                            <p><?= $redux['box-info-1-desc'] ?></p>
                        <?php endif; ?>
					</div><!-- End .service-content -->

				</div><!-- End .service -->
			</div><!-- End .col-md-4 -->
			<div class="col-md-4">
				<div class="service">

                    <?php if(isset($redux['box-info-2-icon']) && !empty($redux['box-info-2-icon'])): ?>
                        <span class="service-icon"><i class="<?= $redux['box-info-2-icon'] ?>"></i></span>
                    <?php endif; ?>
                    <div class="service-content">
                        <?php if(isset($redux['box-info-2-header']) && !empty($redux['box-info-1-header'])): ?>
                            <h3 class="service-title text-uppercase"><?= $redux['box-info-2-header'] ?></h3>
                        <?php endif; ?>

                        <?php if(isset($redux['box-info-2-desc']) && !empty($redux['box-info-2-desc'])): ?>
                            <p><?= $redux['box-info-2-desc'] ?></p>
                        <?php endif; ?>

				</div><!-- End .service -->
			</div><!-- End .col-md-4 -->
		</div><!-- End .row -->
			<div class="col-md-4">
				<div class="service">

                    <?php if(isset($redux['box-info-3-icon']) && !empty($redux['box-info-3-icon'])): ?>
                        <span class="service-icon"><i class="<?= $redux['box-info-3-icon'] ?>"></i></span>
                    <?php endif; ?>
                    <div class="service-content">
                        <?php if(isset($redux['box-info-3-header']) && !empty($redux['box-info-3-header'])): ?>
                            <h3 class="service-title text-uppercase"><?= $redux['box-info-3-header'] ?></h3>
                        <?php endif; ?>

                        <?php if(isset($redux['box-info-3-desc']) && !empty($redux['box-info-3-desc'])): ?>
                            <p><?= $redux['box-info-3-desc'] ?></p>
                        <?php endif; ?>

				</div><!-- End .service -->
			</div><!-- End .col-md-4 -->
		</div><!-- End .row -->
	</div><!-- End .container -->
</div><!-- end .info-line-section -->