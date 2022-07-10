<?php get_header(); ?>



<!--Row1-->
<div class="row">


<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">


<div class="container_12">
  <div class="grid_12">
    <div class="slider_wrapper">

       <div class="camera_wrap" style="margin-bottom: 20px !important;" id="camera_wrap">

<?php
$my_query = new WP_Query('showposts=10&cat=2');
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>

<?php
//Show in main page
if( in_category('18')){ ?>



            <div data-thumb="<?php the_post_thumbnail_url('thumbnail');?>" data-src="<?php the_post_thumbnail_url();?>">

                <div class="caption fadeFromBottom" style="direction: rtl;">


<a href="<?php the_permalink(); ?>">
<span style="font-weight: 900;font-size: 18px;color: #ceaf0b;"><?php the_title();?></span>
<div class="hide-for-small">
<?php the_excerpt(); ?>
</div>
</a>

                </div>


            </div> 


<?php } ?>

<?php endwhile; ?>



        </div>
    </div>
  </div>
</div>

	
</div>	
	
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12" style="margin-top: 20px;">

<div class="row">
<div class="col-lg-12 img-boxright" style="text-align:center;">
<a>
<img src="http://shebeh.ir/wp-content/uploads/TaziyeKhani-logo.png" alt="" title="">
</a>
</div>
</div>

<div class="row">
<div class="col-lg-12 img-boxright" style="text-align:center;">
<a href="http://shebeh.ir/Live" target="_blank">
<img src="http://shebeh.ir/wp-content/uploads/TaziyeKhani-live.png" alt="" title="">
</a>
</div>
</div>

<div class="row">
<div class="col-xs-4 img-boxright" style="text-align:center;">
<a href="https://t.me/shebeh_ir" target="_blank">
<img src="http://shebeh.ir/wp-content/uploads/TaziyeKhani-telegram.png" alt="" title="">
</a>
</div>
<div class="col-xs-4 img-boxright" style="text-align:center;">
<a href="http://www.aparat.com/Taziyekhani" target="_blank">
<img src="http://shebeh.ir/wp-content/uploads/TaziyeKhani-aparat.png" alt="" title="">
</a>
</div>
<div class="col-xs-4 img-boxright" style="text-align:center;">
<a href="https://www.instagram.com/shebeh.ir/" target="_blank">
<img src="http://shebeh.ir/wp-content/uploads/TaziyeKhani-Web-instagram.png" alt="" title="">
</a>
</div>
</div>
	
</div>

	
</div>
	
	

<div class="row">

	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 right img-boxright" style="text-align:center;">
		
		<a href="http://shebeh.ir/sendmedia/" target="_blank">
			<img src="http://shebeh.ir/wp-content/uploads/TaziyeKhani-ersal.png" alt="" title="">
		</a>
		
	</div>
	
	<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 yaddasht-box" style="margin-top: 20px;">
		
		<a href="http://shebeh.ir/cat/actors/">
<div class="title">
دست اندرکاران 

</div>
</a>

<div class="panel admin-edit-btn-parent" style="min-height: 220px;overflow:hidden">



    <!-- Swiper -->
    <div class="swiper-container-Players">
        <div class="swiper-wrapper">

<?php
$my_query = new WP_Query('showposts=100&cat=5');
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>


<?php
//Show in main page
if( in_category('18')){ ?>

<div class="swiper-slide" style="">
<div class="img-con">
<img src="<?php the_post_thumbnail_url('medium');?>">
</div>
<div class="text-con">
<h5><?php the_title();?><h5>
<span><?php the_field(title); ?></span>
</div>
</div>

<?php } ?>

<?php endwhile; ?>
            
        </div>

        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>




</div>

</div>

</div>
	

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<hr>
</div>
</div>
		
		<div class="row section-title-container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul class="sub-section-titles">
		<li class="-list-color">
		<h2 class="-menu">
			<a href="http://shebeh.ir/cat/images/">تصاوير</a>
		</h2>
		</li>
		</ul>
		</div>
		</div>
		
		
		
		
      <div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="index-photo-container  photos-6">




<?php
$my_query = new WP_Query('showposts=12&cat=3');
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>

<?php
//Show in main page
if( in_category('18')){ ?>




<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 admin-edit-btn-parent">

<a href="<?php the_permalink(); ?>">

<div>

<div class="pic-con">
<?php

if ( has_post_thumbnail() ) {?>
	<img src='<?php the_post_thumbnail_url('medium');?>'>
<?php }
else {
	echo "<img src='http://shebeh.ir/wp-content/uploads/nopic.png' />";
}

?>

<div class="pictext-con">
<span><?php the_title(); ?></span>
</div>

</div>


</div>


</a>

</div>


<?php } ?>

<?php endwhile; ?>




</div>

</div>
		
		
	
</div>
	

		
		
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<hr>
</div>
</div>
		
		
		<div class="row section-title-container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ul class="sub-section-titles">
		<li class="-list-color">
		<h2 class="-menu">
			<a href="http://shebeh.ir/cat/clips/">ویدیوهای منتخب
		</h2>
		</li>
		</ul>
		</div>
		</div>
		

<div class="row cards-container">	
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 right" style="">

<div class="card-container">

<?php
$my_query = new WP_Query('showposts=1&cat=4');
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>

<?php
//Show in main page
if( in_category('18')){ ?>
<a name="videobox"></a>
<div class="card -section" style="height: auto;height: auto;">
<div class="image-container" style="height: auto;">

<style>.h_iframe-aparat_embed_frame{position:relative;border: none;} .h_iframe-aparat_embed_frame .ratio {display:block;width:100%;height:auto;border: none;} .h_iframe-aparat_embed_frame iframe {position:absolute;top:0;left:0;width:100%; height:100%;border: none;}</style>

<div class="h_iframe-aparat_embed_frame"> <span style="display: block;padding-top: 57%"></span>

<iframe id="videosrc" src="<?php the_field(url); ?>" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" ></iframe></div>


</div>



<div class="text-container" style="padding: 0 !important;">
<div class="titles-container" style="bottom: .5rem; display: none;">
<a href="<?php the_permalink(); ?>" ga-event="" data-category="user-navigation" data-action="-row" data-label="">
<h2 style="font-size: 18px;" id="video-title"><?php the_title();?></h2>
</a>
</div>

</div>

</div>



<?php } ?>

<?php endwhile; ?>

</div>
		</div>
		
	
<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

<div class=" card-container" data-count="3" style="overflow-y: hidden;height: 55rem;">
	

    <!-- Swiper -->
    <div class="swiper-container-videolist">
        <div class="swiper-wrapper" style="">
		
		
<?php
$my_query = new WP_Query('showposts=100&cat=4');
while ($my_query->have_posts()):
$my_query->the_post();
$do_not_duplicate = $post->ID;?>
<?php
//Show in main page
if( in_category('18')){ ?>

<div class="swiper-slide" style="cursor: pointer;" data-toggle="change-clip" data-clip-id="<?php the_id();?>" data-clip-src="<?php the_field(url); ?>" >

<div class="card thought-simple-card">
<div class="text-container">
<a>
<h2 style="font-size: 15px;"><?php the_title(); ?></h2>
</a>
</div>
<div class="image-container" style="text-align: left;height: 100%;">

<img src="<?php the_post_thumbnail_url('thumbnail');?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" style="height:  100%;">

</div>

</div>


			
</div>




<?php } ?>

<?php endwhile; ?>

			
        </div>
        <!-- Add Scroll Bar -->
        <div class="swiper-scrollbar"></div>
    </div>

	
</div>			
</div>
	
	</div>
	

		

		
		
		
		
		

</div>



	



<?php get_footer(); ?>


<script>




    var swiper = new Swiper('.swiper-container-videolist ', {
        scrollbar: '.swiper-scrollbar',
		direction: 'vertical',
        slidesPerView: 'auto',
        centeredSlides: true,
        spaceBetween: 2,
		mousewheelControl: true,
	
    });
	
	$(".swiper-container-videolist .swiper-wrapper").css("transform", "translate3d(0px, 0px, 0px)");
	


    var swiper = new Swiper('.swiper-container-Players', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 3,
        centeredSlides: false,
        paginationClickable: false,
        spaceBetween: 30,
        mousewheelControl: true,
        autoplayDisableOnInteraction: true        
    });

	
$('[data-toggle=change-clip]').click(function(){
	var id = $(this).attr("data-clip-id");
	var src = $(this).attr("data-clip-src");
	$("#videosrc").attr("src",src);
	location.href = "#videobox";
});
    </script>
	
