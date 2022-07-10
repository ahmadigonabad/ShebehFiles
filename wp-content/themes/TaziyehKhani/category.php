<?php get_header(); ?>








<div class="row" style="margin: 20px 0px 0px !important;">

<div class="section-title-container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul class="sub-section-titles">
		<li class="-list-color">
		<h2 class="-menu">
			<?php echo single_term_title('',true);?>
		</h2>
		</li>
		</ul>
		</div>
</div>	
	
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;margin-bottom: 10px;">

	
<!--Actors-->


<div class="cards-container">


<?php
while ( have_posts() ) :
the_post();

if( in_category('5')){
?>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 card-container right"  data-count="1">
<div class="card -section">
<div class="image-container">

<img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title(); ?>" title="<?php the_title();?>" width="100%">

</div>
<div class="text-container">
<div class="titles-container">

<h2 style="font-size: 17px;"><?php the_title(); ?></h2>

</div>
<div class="text-content" style="text-align: center;font: 17px iransans;">
<?php the_field(title); ?>

</div>
</div>
</div>
</div>	  

<?php
}
else{
?>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 card-container right">

<div class="card -section">
<div class="image-container">
<a href="<?php the_permalink(); ?>">
<img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_title(); ?>" title="<?php the_title();?>" width="100%">
</a>

</div>
<div class="text-container">
<div class="titles-container">
<a href="<?php the_permalink(); ?>">
<h2><?php the_title(); ?></h2>
</a>
</div>
<div class="text-content"  style="font-size: 14px;">

<?php if( in_category('3')){ ?>
<?php echo str_replace("(لطفا تا بارگذاری کامل تصاویر کمی صبر کنید…)","",get_the_excerpt());?>
<a href="<?php the_permalink(); ?>" class="btn-more"><i class="material-icons">slideshow</i> مشاهده تصاویر</a>
<?php }
elseif( in_category('2')){ ?>
<?php the_content();?>
<a href="<?php the_permalink(); ?>" class="btn-more"><i class="material-icons">more_horiz</i> ادامه مطلب</a>
<?php } 
elseif( in_category('4')){ ?>
<?php the_content();?>
<a href="<?php the_permalink(); ?>" class="btn-more"><i class="material-icons">videocam</i> مشاهده کلیپ</a>
<?php } ?>

</div>
</div>
</div>

</div>		
<?php
}
	endwhile;
?>

</div>	


</div>




</div>






<?php get_footer(); ?>

