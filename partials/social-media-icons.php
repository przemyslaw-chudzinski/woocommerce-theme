<?php

$facebook_url = belli_get_redux_text_field_value('social-media-facebook-url');
$instagram_url = belli_get_redux_text_field_value('social-media-instagram-url');
$google_plus_url = belli_get_redux_text_field_value('social-media-google-plus-url');
$twitter_url = belli_get_redux_text_field_value('social-media-twitter-url');
$linkedin_url = belli_get_redux_text_field_value('social-media-linkedin-url');

?>

<?php if ($facebook_url): ?>
    <a href="<?= $facebook_url; ?>" class="social-icon icon-facebook add-tooltip" data-placement="top" title="Facebook">
        <i class="fa fa-facebook"></i>
    </a>
<?php endif; ?>
<?php if($twitter_url): ?>
    <a href="<?= $twitter_url; ?>" class="social-icon icon-twitter add-tooltip" data-placement="top"  title="Twitter">
        <i class="fa fa-twitter"></i>
    </a>
<?php endif; ?>
<?php if($google_plus_url): ?>
    <a href="<?= $google_plus_url; ?>" class="social-icon icon-google-plus add-tooltip" data-placement="top"  title="Google Plus">
        <i class="fa fa-google-plus"></i>
    </a>
<?php endif; ?>
<?php if($linkedin_url): ?>
    <a href="<?= $linkedin_url; ?>" class="social-icon icon-linkedin add-tooltip" data-placement="top"  title="Linkedin">
        <i class="fa fa-linkedin"></i>
    </a>
<?php endif; ?>
