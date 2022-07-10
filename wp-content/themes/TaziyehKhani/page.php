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




<div class="page-content-container thought">
<div id="content-text" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 post-content" style="padding-bottom: 20px;">

	<?php the_content();?>

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

