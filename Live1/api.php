<div><input id="url" readonly style="width: 100%;"><span></span></div>
<div><input style="width: 100%;" placeholder="For peasting last string exites in clipboard and then recopy it :)"><span></span></div>
</br>
<script src="https://r707.ir/live_stream/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script>



function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#!_-";
  for (var i = 0; i < Math.ceil(Math.random()*10); i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  return text;
}

var pre = makeid();
var next = makeid();
var pre_len = pre.length;
var next_len = next.length;

var en = prompt(pre+"\r"+next+"\rPlease enter your name:");
if(en == pre_len*next_len){
    document.getElementById("url").value="rtmp://185.147.178.62:443/event/e4268f37df92ed203874f19f63cbc06eb?s=91d8362ef0c1e909";
    $("input").click(function(){
      var copyText = $(this);
      copyText.select();
      document.execCommand("copy");
      $(this).parent().find("span").html("copied!");
    });
}

else{
    alert("Thank you "+en);
}

</script>