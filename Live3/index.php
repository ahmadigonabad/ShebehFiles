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
        <link type="text/css" rel="stylesheet" href="css/app-ie8.css">
        <link type="text/css" rel="stylesheet" href="css/app-v5-2.css">
        <link type="text/css" rel="stylesheet" href="css/comments.css">
        <link type="text/css" rel="stylesheet" href="css/flowplayer.css">
        <link type="text/css" rel="stylesheet" href="css/fonts.css">
        <link type="text/css" rel="stylesheet" href="css/skin.css">
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <style>
            
            .footer-alert {
                position: fixed;
                bottom: 50px;
                left: 30px;
                z-index: 100007;
                color: white !important;
                background: #48ab51;
                font-size: 13px;
                padding: 10px;
                border-radius: 30px;
                transition: .4s;
                visibility: hidden;
                opacity: 0;
                transform: translateX(-30px);
                margin-right: 30px;
                text-align: center;
            }
            .footer-alert a {
                color: white !important;
            }
            .footer-alert.rendered {
                visibility: visible;
                opacity: 1;
                transform: translateX(0);
            }
            .footer-alert span {
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
                line-height: 1.1;
                cursor: pointer;
            }
            
            .fp-menu.fp-qsel-menu {
                z-index: 1000007;
            }
            .footer-alert.error {
                background: #F44336;
            }
            
            .screen-full {
                position: fixed;
                top: 35px;
                left: 10px;
                z-index: 100008;
                color: white !important;
                background: #ffd335;
                font-size: 13px;
                padding: 7px;
                border-radius: 50%;
                transition: .4s;
                visibility: hidden;
                opacity: 0;
                transform: translateX(-30px);
                text-align: center;
                padding-bottom: 0px;
                cursor: pointer;
            }
            
            .screen-full.rendered {
                visibility: visible;
                opacity: 1;
                transform: translateX(0);
            }
            
            .comment-body {
                background: #48ab51;
                padding: 6px;
                direction: rtl;
                text-align: right;
                border-radius: 10px;
                margin-top: 10px;
            }
            .comment-body b{
                display:block;
                font-size:12px;
                color: #ffffff;
                font-weight: 900;
            }
        </style>
    </head>
    
    <body class="live-wrapper">
        
        <div class="js__player_live_wrapper player_live_wrapper clearfix" style="width:100%; height: 100%;border:0px;">
            <style>designer { display: block; position: absolute;z-index: 99999; bottom: 80px;text-align: center;-webkit-transform: rotate(90deg);-moz-transform: rotate(90deg);-o-transform: rotate(90deg);-ms-transform: rotate(90deg); transform: rotate(90deg);right: -75px;}designer a{ font: 10px iransans; color: beige !important;text-decoration: none !important; -webkit-transition-duration: 2s; transition-property: all; transition-duration: 2s;}designer a me{ color: #af3b3b;}designer a:hover{font-size:12px;right: -100px;}designer i{ color: beige;}.middleicon{ vertical-align: middle;}</style>
            <style>.alert{color: white;position: absolute;bottom: 5px;width: 100%;text-align: center;font-weight: 900;}.alert.success > label{color:#4CAF50;} .alert.danger > label{color:#F44336;} input.chat-input[name=phone] {bottom: 40px !important;width: 49%;float: left;right: 50% !important;direction: ltr;}input.chat-input[name=visitor_name] {bottom: 40px !important;width: 49%;float: right;}.cnt{font-family:farsi number;} i.icon.icon-next.prev::before { transform: translateX(-20px) rotateY(180deg); margin-left: 20px;} .live-cover-desc div{ direction: rtl !important;}.cover-content.in-play { background-color: transparent !important;}</style>
            <div class="live-section-wrapper ">
                <div class="live-chat is-hide">
                    <div class="live-chat-wrapper">
                        <div class="alert"></div>
                        <div class="chat-online">
                            <designer title="توسعه دهنده: رسول احمدی فر"><i class="material-icons middleicon">code</i><a href="https://ahmadifarr.ir/" target="_blank">طراحی و توسعه: <me>رسول احمدی فر</me></a><i class="material-icons middleicon">code</i></designer>
                            <div class="list-container">
                                <div class="list">
                                    
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
            
            
var channel_data;
var statistics_data;
var schedule_data;
var playing_data;
var session_data;
var livestream_data;
function get_channel(){return channel_data;}
function get_livestream(){return livestream_data;}
function get_playing(){return playing_data;}
function get_schedule(){return schedule_data;}
function get_session(){return session_data;}
function get_statistics(){return statistics_data;}

var date = new Date();
var timestamp = date.getTime();

$.ajax({
    type: "GET",
    url: "process/process.php?"+timestamp,
    data: "name="+window.channel.name+"&page_url="+window.location.href+"&referrer="+document.referrer+"&action=get_channel",
    dataType: 'json',
    success: function(data){
        if(data.channel.result){
            channel_data=data.channel;
            schedule_data=data.schedule;
            statistics_data=data.statistics;
            playing_data=data.playing;
            session_data=data.session;
            livestream_data=data.livestream;
        }
        else{
            channel_data={
                'title':"کانال پیدا نشد",
                'logo':"images/default.png",
                'description':"آدرس وارد شده پیدا نشد",
                'comment':0,
            };
        }
    },
    complete: starter
});



function starter(){
    $(".profile-pic").css("background-image","url("+get_channel().logo+")");
    $(".live-cover-title").html(get_channel().title);
    $(".profile-name").html(get_channel().title);
    $(".live-cover-profile-desc").html(get_channel().description);
    if(!parseInt(get_channel().comment)){
        $(".live-chat").addClass("is-disable");
    }
    
    setTimeout(function(){
        check_rotation();
        $(".screen-full").addClass("rendered");
    },1000);
    
    doUpdate();
}



function poll(){
    date = new Date();
    timestamp = date.getTime();
    $.ajax({
        type: "GET",
        url: "process/process.php?"+timestamp,
        data: "name="+window.channel.name+"&page_url="+window.location.href+"&referrer="+document.referrer+"&action=check",
        success: function(data){
            statistics_data = data.statistics;
            playing_data = data.playing;
            session_data = data.session;
            livestream_data = data.livestream;
            doUpdate();
        },
        dataType: "json"
    });
}



var connected=5;
var session=5;
var playing_id=0;
var player;
function doUpdate(){
            
            if(connected){
                if($("#player_live > div.fp-player > a").length) $("#player_live > div.fp-player > a").remove();
                if($("#player_live div.fp-ui .fp-fullscreen").length) $("#player_live div.fp-ui .fp-fullscreen").remove();
            }
            
            if(get_livestream().live_status){
                var xx=5;
                
                if(get_livestream().live_status.type=="connected"){
                    
                    if(connected!=1){
                        connected=1;
                        $(".live-cover-desc").removeClass("hide");
                        $(".live-cover-desc").html("<div>متصل شد، در حال آماده سازی...</div>");
                        $(".live-cover-disconnect").addClass("hide");
                        
                        
                        $(".live-cover-mid").addClass("hide");
                        $(".cover-content").addClass("in-play");
                        
                            
                        player = flowplayer('#player_live', {
                                ratio: 5/12,
                                live: true,
                                muted: false,
                                mutedAutoplay: false,
                                share: false,
                                splash: false,
                                loading: true,
                                clip: {
                                    sources: [
                                        {
                                            type: 'application/x-mpegurl',
                                            src: get_livestream().stream_line.hls
                                        }
                                    ]
                                }
                            });
                            
                            
                    }
                }
                else if(get_livestream().live_status.type=="nolive"){
                    if(connected!==0){
                        $(".live-cover-mid").removeClass("hide");
                        $(".cover-content").removeClass("in-play");
                        
                        if(player){
                            player.shutdown();
                            $("#player_live").append('<div class="live-cover-ratio"></div><div class="cover-content"><div class="live-cover-top clearfix "> <div class="profile-pic" style="background-image: url(images/default.png)"></div> <div class="profile-name">-</div> <div class="head-cnt"><span class="total-cnt"> <span class="cnt onlines-cnt">-</span><span class="label" title="کاربران آنلاین"><i class="icon icon-play"></i></span> | <span class="cnt hits-cnt">-</span><span class="label" title="تعداد بازدید"><i class="icon icon-refresh"></i></span> | <span class="cnt visitors-cnt">-</span><span class="label" title="تعداد بازدید کننده ها"><i class="icon icon-users"></i></span> </span></div></div><div class="live-cover-mid hide"> <div class="profile-pic hide" style="background-image: url(images/default.png)"></div> <div class="live-cover-title">-</div> <div class="live-cover-profile-desc">-</div> <div class="live-cover-desc hide">-</div> <div class="live-cover-disconnect hide"><div class="stat">در حال بررسی اتصال</div> </div> </div></div>');
                            $(".profile-pic").css("background-image","url("+get_channel().logo+")");
                            $(".live-cover-title").html(get_channel().title);
                            $(".profile-name").html(get_channel().title);
                            $(".live-cover-profile-desc").html(get_channel().description);
                            $(".live-cover-mid").removeClass("hide");
                        }
                        
                        connected=0;
                        $(".live-cover-desc").removeClass("hide");
                        if(get_playing().result){
                            playing_id = get_playing().id;
                            $(".live-cover-desc").html("<div>داده ای دریافت نمی شود.</div>");
                            $(".live-cover-desc").append('<div><i class="icon icon-play"></i><b> در حال پخش: </b>'+get_playing().title+" از ساعت "+get_playing().start+" تا ساعت "+get_playing().stop+'</div>');
                            $(".live-cover-disconnect").removeClass("hide");
                        }
                        else{
                            if(get_schedule().result){
                                $(".live-cover-desc").html("<div>برنامه ها به اتمام رسیده</div>");
                                $.each(get_schedule(), function( index, value ){
                                    
                                    if(value.id==get_playing().lastid){
                                        $(".live-cover-desc").append('<div><i class="icon icon-next prev"></i><b> برنامه اخیر: </b>'+value.title+'، پخش شده در '+value.stop_date+' ساعت '+value.stop_time+'</div>');
                                    }
                                    if(value.id > get_playing().lastid){
                                        $(".live-cover-desc").append('<div><i class="icon icon-next"></i><b> برنامه بعدی: </b>'+value.title+'، '+value.start_date+' ساعت '+value.start_time+'</div>');
                                        return false; 
                                    }
                                    
                                });
                            }
                            else{
                                $(".live-cover-desc").html("برنامه ای جهت پخش یافت نشد");
                            }
                        }
                        
                        
                        $(".cover-content").css("background-image","url("+get_livestream().live_status.attributes.cover+")");
                    }
                }
            }
            
            else{
                    /*
                    
                    if(connected!==0){
                        $(".live-cover-mid").removeClass("hide");
                        $(".cover-content").removeClass("in-play");
                        
                        if(player){
                            player.shutdown();
                            $("#player_live").append('<div class="live-cover-ratio"></div><div class="cover-content"><div class="live-cover-top clearfix "> <div class="profile-pic" style="background-image: url(images/default.png)"></div> <div class="profile-name">-</div> <div class="head-cnt"><span class="total-cnt"> <span class="cnt onlines-cnt">-</span><span class="label" title="کاربران آنلاین"><i class="icon icon-play"></i></span> | <span class="cnt hits-cnt">-</span><span class="label" title="تعداد بازدید"><i class="icon icon-refresh"></i></span> | <span class="cnt visitors-cnt">-</span><span class="label" title="تعداد بازدید کننده ها"><i class="icon icon-users"></i></span> </span></div></div><div class="live-cover-mid hide"> <div class="profile-pic hide" style="background-image: url(images/default.png)"></div> <div class="live-cover-title">-</div> <div class="live-cover-profile-desc">-</div> <div class="live-cover-desc hide">-</div> <div class="live-cover-disconnect hide"><div class="stat">در حال بررسی اتصال</div> </div> </div></div>');
                            $(".profile-pic").css("background-image","url("+get_channel().logo+")");
                            $(".live-cover-title").html(get_channel().title);
                            $(".profile-name").html(get_channel().title);
                            $(".live-cover-profile-desc").html(get_channel().description);
                            $(".live-cover-mid").removeClass("hide");
                        }
                        
                        connected=0;
                        $(".live-cover-desc").removeClass("hide");
                        if(get_playing().result){
                            playing_id = get_playing().id;
                            $(".live-cover-desc").html("<div>مراسم بعدی: شام غریبان ساعت 20</div>");
                            $(".live-cover-desc").append('<div><i class="icon icon-play"></i><b> در حال پخش: </b>'+get_playing().title+" از ساعت "+get_playing().start+" تا ساعت "+get_playing().stop+'</div>');
                            $(".live-cover-disconnect").removeClass("hide");
                        }
                        else{
                            if(get_schedule().result){
                                $(".live-cover-desc").html("<div>برنامه ها به اتمام رسیده</div>");
                                $.each(get_schedule(), function( index, value ){
                                    
                                    if(value.id==get_playing().lastid){
                                        $(".live-cover-desc").append('<div><i class="icon icon-next prev"></i><b> برنامه اخیر: </b>'+value.title+'، پخش شده در '+value.stop_date+' ساعت '+value.stop_time+'</div>');
                                    }
                                    if(value.id > get_playing().lastid){
                                        $(".live-cover-desc").append('<div><i class="icon icon-next"></i><b> برنامه بعدی: </b>'+value.title+'، '+value.start_date+' ساعت '+value.start_time+'</div>');
                                        return false; 
                                    }
                                    
                                });
                            }
                            else{
                                $(".live-cover-desc").html("برنامه ای جهت پخش یافت نشد");
                            }
                        }
                        
                        
                        $(".cover-content").css("background-image","url(https://live.cdn.asset.aparat.com/4d608a556691b00e5ad41412b480d366/preview/e4268f37df92ed203874f19f63cbc06eb_small.jpg)");
                    }
                    */
                    
                    if(connected!=1){
                        connected=1;
                        $(".live-cover-desc").removeClass("hide");
                        $(".live-cover-desc").html("<div>متصل شد، در حال آماده سازی...</div>");
                        $(".live-cover-disconnect").addClass("hide");
                        
                        
                        $(".live-cover-mid").addClass("hide");
                        $(".cover-content").addClass("in-play");
                        
                            
                        player = flowplayer('#player_live', {
                                ratio: 5/12,
                                live: true,
                                muted: false,
                                mutedAutoplay: false,
                                share: false,
                                splash: false,
                                loading: true,
                                clip: {
                                    sources: [
                                        {
                                            type: 'application/x-mpegurl',
                                            src: 	"https://live.cdn.asset.aparat.com/cfbc650d9149489d1e0e84dc9f752fd1/eventhls/e4268f37df92ed203874f19f63cbc06eb.m3u8"
                                        }
                                    ]
                                }
                            });
                            
                            
                    }
            }
            
            if(get_playing().id!=playing_id){
                
                
                
            }
            
            
            if(!parseInt(get_session().ban)){
                if(session!=1){
                    session=1;
                }
            }
            else{
                if(session!==0){
                    session=0;
                        if(player){
                            player.shutdown();
                            $("#player_live").append('<div class="live-cover-ratio"></div><div class="cover-content"><div class="live-cover-top clearfix "> <div class="profile-pic" style="background-image: url(images/default.png)"></div> <div class="profile-name">-</div> <div class="head-cnt"><span class="total-cnt"> <span class="cnt onlines-cnt">-</span><span class="label" title="کاربران آنلاین"><i class="icon icon-play"></i></span> | <span class="cnt hits-cnt">-</span><span class="label" title="تعداد بازدید"><i class="icon icon-refresh"></i></span> | <span class="cnt visitors-cnt">-</span><span class="label" title="تعداد بازدید کننده ها"><i class="icon icon-users"></i></span> </span></div></div><div class="live-cover-mid hide"> <div class="profile-pic hide" style="background-image: url(images/default.png)"></div> <div class="live-cover-title">-</div> <div class="live-cover-profile-desc">-</div> <div class="live-cover-desc hide">-</div> <div class="live-cover-disconnect hide"><div class="stat">در حال بررسی اتصال</div> </div> </div></div>');
                            $(".profile-pic").css("background-image","url("+get_channel().logo+")");
                            $(".live-cover-title").html(get_channel().title);
                            $(".profile-name").html(get_channel().title);
                            $(".live-cover-profile-desc").html(get_channel().description);
                            $(".live-cover-mid").removeClass("hide");
                        }
                        $(".live-cover-desc").html("<div>شما دسترسی تماشای پخش برنامه را ندارید</div>");
                        $(".live-cover-disconnect").removeClass("hide");
                }
            }
            
            if($(".head-cnt .onlines-cnt").html()!=get_statistics().Total_onlines) $(".head-cnt .onlines-cnt").html(get_statistics().Total_onlines);
            if($(".head-cnt .hits-cnt").html()!=get_statistics().Total_hits) $(".head-cnt .hits-cnt").html(get_statistics().Total_hits);
            if($(".head-cnt .visitors-cnt").html()!=get_statistics().Total_visitors) $(".head-cnt .visitors-cnt").html(get_statistics().Total_visitors);
            
            
            setTimeout(function(){poll();},2500);
            
        }
        
        
    $("#chat_form").submit(function(){
        
        if($("#chat_form").valid()){
            
            date = new Date();
            timestamp = date.getTime();
            
            $.ajax({
                type: "GET",
                url: "process/process.php?"+timestamp,
                data: "name="+window.channel.name+"&"+$(this).serialize()+"&action=comment",
                dataType: 'json',
                success: function(data){
                    if(data.result){
                        $(".alert").removeClass("danger").addClass("success");
                        $(".alert").html("<label>پیغام شما ارسال شد</label>");
                    }
                    else{
                        $(".alert").addClass("danger").removeClass("success");
                        $(".alert").html("<label>شما توانایی ثبت نظر را ندارید</label>");
                    }
                    console.log(data);
                    
                    $("textarea[name=comment]").val("");
                    $("#chat_form input").val("");
                }
            });
            
        }
        
        return false;
    });
    
    $("#chat_form").validate({
    	rules: {
            visitor_name: {
                required: true
            },
            comment: {
                required: true,
                minlength: 5
            }
        },
            
        messages: {
            visitor_name: {
                required: "نام خود را وارد نکرده اید"
            },
            comment: {
                required: "متن پیام خالی است",
                minlength: "متن پیام حداقل باید 5 کاراکتر باشد"
            }    
        },
            
        highlight: function (input) {
            $(".alert").addClass('danger');
        },
        unhighlight: function (input) {
            $(".alert").removeClass('danger');
            $(".alert").html("");
        },
        errorPlacement: function (error, element) {
            $(".alert").html(error);
        }
    });
    
    $("textarea[name=comment]").keypress(function( event ) {
        if (event.keyCode == 13) {
            $("#chat_form").submit();
            event.preventDefault();
        }
    });
    
    $(".chat-toggle").click(function(){
        $(".live-chat").toggleClass("is-hide");
        get_comments();
    });
    
    function get_comments(){
            var comments="";
            $.ajax({
                type: "GET",
                url: "process/process.php?"+timestamp,
                data: "name="+window.channel.name+"&action=get_comments",
                dataType: 'json',
                success: function(data){
                    $.each(data, function(i, v){
                        comments+='<div class="comment-body"><b>'+v['name']+'</b>'+v['text']+'</div>';
                        
                    });
                    $(".list-container .list").html(comments);
                }
            });
        
        
    }
    
    
    $(window).resize(function () {
        check_rotation();
        openFullscreen();
    });
    
    function check_rotation(){
        var height = $(window).height();
        var width = $(window).width();
        if(height > width){
            $(".footer-alert .message").html("لطفا دستگاه خود را بچرخانید تا بهترین تصویر حاصل شود");
            $(".footer-alert").addClass("error");
            if(!$(".footer-alert").hasClass("rendered")){
                $(".footer-alert").addClass("rendered");
            }
        }
        else{
            if($(".footer-alert").hasClass("error")){
                $(".footer-alert").removeClass("rendered error");
                $(".footer-alert .message").html('');
            }
        }
    }
    
    
    
    function openFullscreen() {
      var elem = document.body;
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.mozRequestFullScreen) { /* Firefox */
        elem.mozRequestFullScreen();
      } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE/Edge */
        elem.msRequestFullscreen();
      }
    }
    
    
    function fullScreen(){
        if($(".screen-full i").hasClass("not-full")){
            openFullscreen();
            $(".screen-full").removeClass("rendered not-full");
        }
    }
    
            
        </script>
        
        
    
    <div class="footer-alert">
        <span onclick="$(this).parent().removeClass(&quot;rendered&quot;);" class="material-icons">close</span>
        <div class="message">
            <a href="http://taziyehkhani.ir" target="_blank">
            وبسایت تعزیه خوانی نوقاب - گناباد
            </a>
        </div>
    </div>
    
    <div class="screen-full" onclick="fullScreen();">
        <i class="material-icons not-full">fullscreen</i>
    </div>
        

        
        
    </body>
    
    
</html>