<!DOCTYPE HTML>
<?php 
function channel_info($want){
    
    $channel=[
        'name'=>"Taziyekhani",
        'title'=>"تعزیه خوانی نوقاب - گناباد",
        'description'=>"مراسم تعزیه خوانی نوقاب-گناباد در سال 1391 در فهرست آثار میراث معنوی کشور به شماره 703 و 704 ثبت ملی شده است.",
        'main_url'=>"http://taziyehkhani.ir/Live",
        'logo'=>"//r707.ir/live_stream/images/TaziyeKhani.png",
        'cover'=>"http://taziyehkhani.ir/wp-content/uploads/photo_2017-10-05_22-40-03.jpg",
        'telegram'=>"//www.aparat.com/video/video/liveframe/username/Taziyekhani/player/telegram"
        ];
    
    echo $channel[$want];
}
?>
<html lang="fa">
    
    <head>
        
        <title>پخش زنده - <?php channel_info("title");?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta property="og:description" content="<?php channel_info("description");?>"/>
        <meta property="og:type" content="video">
        <meta property="og:site_name" content="پخش زنده - <?php channel_info("title");?>">
        <meta property="og:url" content="<?php channel_info("main_url");?>">
        <meta property="og:title" content="پخش زنده - <?php channel_info("title");?>">
        <meta property="og:image" content="<?php channel_info("cover");?>">
        <meta property="og:type" content="video">
        <meta property="og:video" content="">
        <meta property="og:video:secure_url" content="">
        <meta property="og:video:type" content="video/mp4">
        <meta property="og:video:width" content="320">
        <meta property="og:video:height" content="260">
        
        <meta name="twitter:card" content="player"/>
    	<meta name="twitter:site" content="<?php channel_info("main_url");?>" />
    	<meta name="twitter:title" content="پخش زنده - <?php channel_info("title");?>" />
    	<meta name="twitter:description" content="<?php channel_info("description");?>" />
    	<meta name="twitter:player" content="//releases.flowplayer.org/swf/flowplayer-3.2.18.swf">
        <meta name="twitter:player:stream" content="">
        <meta name="twitter:player:stream:content_type" content="">
        <meta name="twitter:player:height" content="640">
        <meta name="twitter:player:width" content="1280">
        <meta name="twitter:player:stream:content_type" content="video/mp4">
        
        <meta http-equiv="content-language" content="fa">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="css/app-ie8.min.css">
        <link type="text/css" rel="stylesheet" href="css/app-v5-2.min.css">
        <link type="text/css" rel="stylesheet" href="css/saba-chat.min.css">
        <link type="text/css" rel="stylesheet" href="css/flow.saba-player.dd4a2b0e0dfae0445aec.css">
        <link type="text/css" rel="stylesheet" href="css/fonts.css">
        <link type="text/css" rel="stylesheet" href="css/skin.css">
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style>
            
            .footer-button {
                position: fixed;
                bottom: 50px;
                left: 30px;
                z-index: 99999;
                color: white !important;
                background: #48ab51;
                font-size: 13px;
                padding: 10px;
                border-radius: 30px;
                transition: .4s;
                visibility: hidden;
                opacity: 0;
                transform: translateX(-30px);
            }
            .footer-button a {
                color: white !important;
            }
            .footer-button.rendered {
                visibility: visible;
                opacity: 1;
                transform: translateX(0);
            }
            .footer-button:hover {
                background: #057955;
            }
            .footer-button span {
                position: absolute;
                top: -5px;
                right: -3px;
                font-size: 18px;
                background: #000;
                color: white;
                height: 20px;
                border-radius: 50%;
                width: 20px;
                text-align: center;
                line-height: 1.3;
                cursor: pointer;
            }
        </style>
    </head>
    
    <body class="live-wrapper">
        
        <div class="js__player_live_wrapper player_live_wrapper clearfix" style="width:100%; height: 100%;border:0px;">
            <!--<style>designer { display: block; position: fixed; z-index: 99999; right: -75px; bottom: 200px; -webkit-transform: rotate(90deg); -moz-transform: rotate(90deg); -o-transform: rotate(90deg); -ms-transform: rotate(90deg); transform: rotate(90deg);}designer a{ font: 10px iransans; color: beige !important;text-decoration: none !important; -webkit-transition-duration: 2s; transition-property: all; transition-duration: 2s;}designer a me{ color: #af3b3b;}designer a:hover{font-size:12px;right: -100px;}designer i{ color: beige;}.middleicon{ vertical-align: middle;}</style>
            <designer title="توسعه دهنده: رسول احمدی فر">
                <i class="material-icons middleicon">code</i>
                <a href="https://ahmadifarr.ir/" target="_blank">Devloped by: <me>Rasoul Ahmadifar</me></a>
                <i class="material-icons middleicon">code</i>
            </designer>-->
            <style>.alert{color: white;position: absolute;bottom: 5px;width: 100%;text-align: center;font-weight: 900;}.alert.success > label{color:#4CAF50;} .alert.danger > label{color:#F44336;} input.chat-input[name=phone] {bottom: 40px !important;width: 49%;float: left;right: 50% !important;direction: ltr;}input.chat-input[name=visitor_name] {bottom: 40px !important;width: 49%;float: right;}.cnt{font-family:farsi number;} i.icon.icon-next.prev::before { transform: translateX(-20px) rotateY(180deg); margin-left: 20px;} .live-cover-desc div{ direction: rtl !important;}.cover-content.in-play { background-color: transparent !important;}</style>
            <div class="live-section-wrapper ">
                <div class="live-chat is-hide">
                    <div class="live-chat-wrapper">
                        <div class="alert"></div>
                        <div class="chat-online">
                            <div class="list-container">
                                <div class="list">
                                    <h3>Logs:</h3>
                                </div>
                            </div>
                            <div class="chat-form">
                                <form id="chat_form" class="clearfix">
                                    <input name="visitor_name" class="chat-input" type="text" placeholder="نام" style="bottom:  40px;width:50%">
                                    <input name="phone" class="chat-input" type="tel" placeholder="موبایل" style="bottom:  40px;width:50%;">
                                    <textarea name="comment" class="chat-input" dir="" auto="" rows="1" id="chat_input" type="text" placeholder="دیدگاهتان را اینجا بنویسید"></textarea>
                                    <button type="submit" class="chat-submit">
                                        <i class="icon icon-backspace"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="player_live" class="aparat-player fp-is-first flowplayer is-live" style="direction: ltr;">
                    <div class="live-cover-ratio"></div>
                    <div class="cover-content">
                        <div class="live-cover-top clearfix ">
                            <a href="http://taziyehkhani.ir" target="_blank">
                                <div class="profile-pic" style="background-image: url(images/default.png)"></div>
                                <div class="profile-name" style="color:white !important;">-</div>
                            </a>
                            <div class="head-cnt">
                                <span class="total-cnt">
                                    <span class="cnt onlines-cnt">-</span>
                                    <span class="label" title="کاربران آنلاین"><i class="icon icon-play"></i></span>
                                    |
                                    <span class="cnt hits-cnt">-</span>
                                    <span class="label" title="تعداد بازدید"><i class="icon icon-refresh"></i></span> 
                                    |
                                    <span class="cnt visitors-cnt">-</span>
                                    <span class="label" title="تعداد بازدید کننده ها"><i class="icon icon-users"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="live-cover-mid hide">
                            <div class="profile-pic hide" style="background-image: url(images/default.png)"></div>
                            <div class="live-cover-title">-</div>
                            <div class="live-cover-profile-desc">-</div>
                            <div class="live-cover-desc hide">-</div>
                            <div class="live-cover-disconnect hide">
                                <div class="stat">در حال بررسی اتصال</div> 
                            </div>
                        </div>
                    </div>
                </div>
                <button class="chat-toggle"><i class="icon icon-comments"></i></button>
            </div>
        </div>
        
        
        
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/flowplayer.min.js"></script>
        <script type="text/javascript" src="js/flowplayer.hlsjs.light.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript">
            window.channel={name:'<?php channel_info("name");?>'};
            (function(){var script = document.createElement("script");script.src = '_widget.js';script.type = 'text/javascript'; script.setAttribute("charset","utf-8"); document.head.appendChild(script);})();
        </script>
        
    
    <div class="footer-button">
        <span onclick=$(this).parent().removeClass("rendered");>×</span>
        <a href="http://taziyehkhani.ir" target="_blank">
        وبسایت تعزیه خوانی نوقاب - گناباد
        </a>
    </div>
        

        
        
    </body>
    
    
</html>