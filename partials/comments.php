<div class="comments">
    <h3 class="mb35 title-underblock custom">Komentarze</h3>
    <?= belli_comments_list(); ?>
</div><!-- End .comments -->

<div id="respond" class="comment-respond">
<?php belli_comment_form( $post->ID ); ?>
</div>