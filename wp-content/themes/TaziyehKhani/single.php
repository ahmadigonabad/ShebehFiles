<?php get_header(); ?>

<div class="row">

<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 right" style="margin-top: 20px;margin-bottom: 10px;">
<?php
while ( have_posts() ) :
the_post();
?>
<ul class="page-content-info-container">
<a href="<?php the_permalink(); ?>">
<h3 class="title" id="content-title" data-cktype-input="" style="font-size: 17px;color: #2e2e38;"><?php the_title();?></h3>
</a>
</ul>

<?php if( in_category('3') or in_category('4')){ ?>

<?php } 
else{ ?>
<div class="content-head-container" data-equalizer="">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 image-column" style="text-align:center;">

<img alt="<?php the_title();?>" title="<?php the_title();?>" src="<?php the_post_thumbnail_url('slider'); ?>" width="100%" style="">

</div>

</div>
<?php } ?>



<div class="page-content-container thought">
<div id="content-text" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-content" style="padding-bottom: 20px;">
<?php the_content();?>


<?php if( in_category('3')){ ?>

<!-- 1. Link to jQuery (1.8 or later), -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> <!-- 33 KB -->

<!-- fotorama.css & fotorama.js. -->
<link  href="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script> <!-- 16 KB -->

<!-- 2. Add images to <div class="fotorama"></div>. -->
<div class="fotorama" data-width="100%" data-nav="thumbs" data-allowfullscreen="native" data-loop="false" data-autoplay="true" data-keyboard="true">
<?php 
	foreach(get_fields() as $value){
		if($value) echo '<a href="'.$value['url'].'"><img src="'.$value['sizes']['thumbnail'].'"></a>';
	}
?>
	
	
</div>




<?php } 
elseif( in_category('4')){ ?>

<style>.h_iframe-aparat_embed_frame{position:relative;border: none;} .h_iframe-aparat_embed_frame .ratio {display:block;width:100%;height:auto;border: none;} .h_iframe-aparat_embed_frame iframe {position:absolute;top:0;left:0;width:100%; height:100%;border: none;}</style>

<div class="h_iframe-aparat_embed_frame"> <span style="display: block;padding-top: 57%"></span>
<iframe src="<?php the_field(url); ?>" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" ></iframe>
</div>

<?php } ?>

</div>
</div>




<div class="foot-note-container clearfix thought">

</div>



<?php
	endwhile;
?>

</div>





<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-top: 15px;">
 
<div class="row top-related-section-container">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 last-contents-container thought">
<div class="title">اطلاعیه ها</div>
<div class="panel" style="max-height: none;padding-top: 20px;">
<ul class="link-list">

<?php
$my_query = new WP_Query('showposts=10&cat=2');
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>

<li>
<div>
<h5 class="rootitr" style="direction: ltr;text-align: left;"><?php the_date(); ?></h5>
<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
</div>
<div class="line"></div>
</li>


<?php endwhile; ?>


</ul></div>


</div>
</div>



<div class="row">
<div class="img-boxright" style="text-align:center;margin-top: 20px;">
<a href="#">
<img src="http://taziyehkhani.ir/wp-content/uploads/TaziyeKhani-logo.png" alt="" title="">
</a>
</div>
</div>

<div class="row">
<div class="img-boxright" style="text-align:center;">
<a href="http://taziyehkhani.ir/Live" target"_blank">
<img src="http://taziyehkhani.ir/wp-content/uploads/TaziyeKhani-live.png" alt="" title="">
</a>
</div>
</div>



</div>


</div>







<?php get_footer(); ?>

