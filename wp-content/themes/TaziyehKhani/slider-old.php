<?
$con = mysqli_connect('localhost','rir1_taziyeh','930RAF77#!','rir1_taziyeh');
mysqli_set_charset($con,"utf8");


if (!$con) {
die('Could not connect: ' . mysqli_error($con));
}

$pid=$_GET['p'];
$cnt=$_GET['c'];
?>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="Swiper-master/dist/css/swiper.min.css">

<style>
    .swiper-container {
        width: 100%;
        height: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    .swiper-slide {
        background-size: cover;
        background-position: center;
    }
    .gallery-top {
        height: 90%;
        width: 100%;
    }
    .gallery-thumbs {
        height: 10%;
        box-sizing: border-box;
        padding: 10px 0;
    }
    .gallery-thumbs .swiper-slide {
        width: 10%;
        height: 100%;
        opacity: 0.4;
    }
    .gallery-thumbs .swiper-slide-active {
        opacity: 1;
    }
    
    </style>





      <!-- Swiper -->
    <div class="swiper-container gallery-top" dir="rtl">
        <div class="swiper-wrapper">
            
<?
for($ii=1;$ii<=$cnt;$ii++){
$select="SELECT * FROM R_postmeta WHERE post_id='$pid' and meta_key='عکس$ii'";
$query = mysqli_query($con,$select);
$result = mysqli_fetch_array($query);
$imgid = $result['meta_value'];

$select="SELECT * FROM R_posts WHERE ID='$imgid'";
$query = mysqli_query($con,$select);
$result = mysqli_fetch_array($query);
?>

<div class="swiper-slide" style="background-image:url(<? echo $result['guid'];?>)"></div>


<? } ?>
            


        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
    <div class="swiper-container gallery-thumbs" dir="rtl">
        <div class="swiper-wrapper">
            
<?
for($ii=1;$ii<=$cnt;$ii++){
$select="SELECT * FROM R_postmeta WHERE post_id='$pid' and meta_key='عکس$ii'";
$query = mysqli_query($con,$select);
$result = mysqli_fetch_array($query);
$imgid = $result['meta_value'];

$select="SELECT * FROM R_posts WHERE ID='$imgid'";
$query = mysqli_query($con,$select);
$result = mysqli_fetch_array($query);
?>

<div class="swiper-slide" style="background-image:url(<? echo $result['guid'];?>)"></div>


<? } ?>
            
        </div>
    </div>





    <!-- Swiper JS -->
    <script src="Swiper-master/dist/js/swiper.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var galleryTop = new Swiper('.gallery-top', {
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 10,
    });
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: 'auto',
        touchRatio: 0.2,
        slideToClickedSlide: true
    });
    galleryTop.params.control = galleryThumbs;
    galleryThumbs.params.control = galleryTop;
    
    </script>
