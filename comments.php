<div class="yorumYap col-lg-12 blog-comment-form">
<div class="mb-15px">
<?php $num = get_comments_number(); if ($num > 0) : ?>
<?php endif; ?>

<?php if ( have_comments() ) : ?>




  		                  <?php foreach ($comments as $comment) : ?>

  												<!-- .Comment Item -->
                          <div class="row">

                            <div class="col-sm-2">
                              <?php echo get_avatar($comment->comment_author,30);?>      </div>
                            <div class="col-sm-10">
                              <h5><?php comment_author() ?> <a href="#"><i class="mdi mdi-reply mdi-24px"></i></a></h5>
                              <p class="mb-10px"><i></i>  <?php comment_date('F jS, Y') ?></p>
                              <p> <?php echo $comment->comment_content; ?>  </p>
                            </div>
                          </div>
  												<!-- /.Comment Item -->



  			<?php
  				/* Changes every other comment to a different class */
  				$oddcomment = ( empty( $oddcomment ) ) ? 'class="comments-alt" ' : '';
  			?>

  			<?php endforeach; /* end for each comment */ ?>

<?php else : ?>
<?php if ( comments_open() ) : ?>
<?php else : ?>

<p class="nocomments">Bu yazı yorumlara kapatılmıştır.</p>

<?php endif; ?>
<?php endif; ?>

<?php ?>
<?php global $trackbacks; ?>
<?php if ($trackbacks) : ?>
<?php $comments = $trackbacks; ?>

<div id="pingback-trackback">

<h3 id="trackbacks">Geri bildirimler: <?php echo sizeof($trackbacks); ?></h3>

<?php foreach ($comments as $comment) : ?>
<!-- Geriizleme başlangıç -->
<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
<cite><?php comment_author_link() ?></cite>
<?php if ($comment->comment_approved == '0') : ?>
<em>Yorumunuz denetim için bekliyor.</em>
<?php endif; ?>
</li>
<!-- Geriizleme bitiş -->
<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>
<?php endforeach; ?>

</div>



<div class="yorum-sayfalama">
<?php paginate_comments_links(); ?>
</div>



<?php endif; ?>
<?php ?>

</div>
</div>
<div class="yorumYap col-lg-12 blog-comment-form">
<style>
#respond a{color: #FF5732; font-size: 12px; font-weight: 700;text-decoration: none;}
#respond strong {
    color: #454545;
    font-size: 12px;
    font-weight: 400!important;
    margin-bottom: 5px;
    display: block;
    text-decoration: none;
}
</style>
<?php
//if (//!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
//die ('Lütfen bu sayfaya doğrudan yükleme yapmayınız, teşekkürler.');

if ( comments_open() ) : ?>
<div id="respond">
<strong>
<?php comment_form_title( '', 'Şuanda %s adlı kişinin yorumuna cevap yazıyorsunuz.' ); ?>
<span class="cancel-comment-reply">
<small><?php cancel_comment_reply_link(); ?></small>
</span>
</strong>
<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Yorum yapabilmek için <a href="<?php echo wp_login_url( get_permalink() ); ?>">giriş</a> yapmalısınız.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment">
  <div class="row d-flex align-items-center">

<?php if ( is_user_logged_in() ) : ?>
<?php else : ?>
<script type="text/javascript">
(function() {
document.write('<div class="col-lg-6  col-form-control"><div class="form-group"><input type="text" name="author" id="author" class="form-control" placeholder="Adınız" /></div></div>');
document.write('<div class="col-lg-6  col-form-control"><div class="form-group"><input type="text" name="email" id="email" class="form-control" placeholder="E-posta" /></div></div>');
})();
</script>

<?php endif; ?>
<div class="<?php if(is_user_logged_in()){ echo 'yorumText2 p-0 col-lg-12'; }else{ echo 'p-0 yorumText2 col-lg-12';} ?>">
<script type="text/javascript">
(function() {
document.write('<div class="col-lg-12 col-form-control"><div class="form-group"><textarea class="form-control comment" name="comment"  rows="6" placeholder="Mesajınızı Yazınız"></textarea></div></div>');
})();
</script>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
</div>
<div class="col-lg-3 col-form-control">
  <button type="submit" name="submit" id="submit" class="btn mt-2 bg-blue btn-block">Yorumu Gönder</button>
</div>
</div>
</form>
<?php if ( is_user_logged_in() ) : ?>
<?php else : ?>
<script type="text/javascript">function closeuyari(){$('.yasalUyari').remove();$.ajax();}</script>
<div class="yasalUyari mt-4" style="background: #1f7bdd;color: #dccbaa;padding: 15px;">
  <a href="javascript:void(0);" onclick="return closeuyari();" style="color: #D4BC8F; font-size: 12px; font-weight: bold;float: right;"><i class="fa fa-times"></i></a>
<b>YASAL UYARI!</b> Suç teşkil edecek, yasadışı, tehditkar, rahatsız edici, hakaret ve küfür içeren, aşağılayıcı, küçük düşürücü, kaba, pornografik, ahlaka aykırı, kişilik haklarına zarar verici ya da benzeri niteliklerde içeriklerden doğan her türlü mali, hukuki, cezai, idari sorumluluk içeriği gönderen kişiye aittir.
</div>
<?php endif; ?>

<?php endif; ?>
</div>
<?php endif; ?>

</div>
