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
        $(".footer-button").addClass("rendered");
    },3000);
    
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
            
            if(get_livestream().live_status){
                var xx=5;
                
                if(get_livestream().live_status.type=="connected"){
                    
                    if(connected!=1){
                        connected=1;
                        $(".live-cover-desc").removeClass("hide");
                        $(".list-container .list").append("video connected</br>");
                        $(".live-cover-desc").html("<div>متصل شد، در حال آماده سازی...</div>");
                        $(".live-cover-disconnect").addClass("hide");
                        
                        
                        $(".live-cover-mid").addClass("hide");
                        $(".cover-content").addClass("in-play");
                        
                            
                        player = flowplayer('#player_live', {
                                ratio: 5/12,
                                autoplay: true,
                                title: "LIVE: "+get_playing().title,
                                live: true,
                                background: false,
                                muted: false,
                                mutedAutoplay: false,
                                share: false,
                                splash: true,
                                coverImage: get_livestream().live_status.attributes.cover,
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
                            
                            $(".fp-play").click();
                            
                            
                            
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
                        $(".list-container .list").append("video disconnected</br>");
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
            
            
            
            if(get_playing().id!=playing_id){
                
                
                
            }
            
            
            if(!parseInt(get_session().ban)){
                if(session!=1){
                    session=1;
                    $(".list-container .list").append("you can watch</br>");
                }
            }
            else{
                if(session!==0){
                    session=0;
                    $(".list-container .list").append("you banned</br>");
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
    });
        