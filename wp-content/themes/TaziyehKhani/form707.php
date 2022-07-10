<?php
$content = get_the_content();
if(strpos($content,"form707")){

        function before($obj, $inthat){
            return substr($inthat, 0, strpos($inthat, $obj));
        }
        
        
        function after($obj, $inthat){
            if(!is_bool(strpos($inthat, $obj)))
                return substr($inthat, strpos($inthat,$obj)+strlen($obj));
            else
                return false;
        }
        
        
        function between($obj, $that, $inthat){
            return before($that, after($obj, $inthat));
        }
	
	$formid = between('id="','"]',$content);
	if($formid==1){
		//
	}
}
else{
	echo $content;
}
?>