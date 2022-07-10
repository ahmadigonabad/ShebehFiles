<?php

date_default_timezone_set("Asia/Tehran");

class MySql{
    
    private $server='localhost';
    private $db_user='admin_tazingh';
    private $db_pass='VE4GvJ8KXz39BFs4';
    private $db_name='admin_tzyirdb';
    protected $conn = "";
    
    public function __construct(){
        $this->conn = $this->Connect();
    }
    
    public function Create_Connection($server,$db_user,$db_pass,$db_name){
        $this->server=$server;
        $this->db_user=$db_user;
        $this->db_pass=$db_pass;
        $this->db_name=$db_name;
    }
    
    public function Connect(){
        $con = mysqli_connect($this->server,$this->db_user,$this->db_pass,$this->db_name);
        mysqli_set_charset($con,"utf8");
        
        if(!$con) die("Could not connect: ".mysqli_connect_error($con));
        else return $con;
    }
    
    public function disConnect($con){
        mysqli_close($con);
    }
    
    protected function CreateDataBase($db_name){
        $query = "CREATE DATABASE ".$db_name;
        if(!mysqli_query($this->conn, $query)) return "Error: ".mysqli_error($this->conn);
        return mysqli_query($this->conn, $query);
    }
    
    protected function CreateTable($table,$structure){
        $query = "CREATE TABLE ".$table." ( ".$structure." )";
        if(!mysqli_query($this->conn, $query)) return "Error: ".mysqli_error($this->conn);
        return mysqli_query($this->conn, $query);
    }
    
    protected function InsertData($table,$columns,$datas){
        $query = "INSERT INTO ".$table." (".$columns.") VALUES (".$datas.")";
        if(!mysqli_query($this->conn, $query)) return "Error: ".mysqli_error($this->conn);
        return mysqli_insert_id($this->conn);
    }
    
    protected function UpdateData($table,$columns,$where){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $query = "UPDATE ".$table." SET ".$columns.$where;
        if(!mysqli_query($this->conn, $query)) return "Error: ".mysqli_error($this->conn);
        return $query;
    }
    
    protected function DeleteData($table,$where){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $query = "DELETE FROM ".$table.$where;
        if(!mysqli_query($this->conn, $query)) return "Error: ".mysqli_error($this->conn);
        return $query;
    }
    
    protected function CountsData($table,$where){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $query = mysqli_query($this->conn,"SELECT * FROM ".$table.$where);
        return mysqli_num_rows($query);
    }
    
    protected function CountColumnData($table,$where=null,$column){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $Query=mysqli_query($this->conn,"SELECT COUNT(".$column.") FROM ".$table.$where);
        return mysqli_fetch_row($Query)[0];
    }
    
    protected function SumColumnData($table,$where=null,$column){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $Query=mysqli_query($this->conn,"SELECT SUM(".$column.") FROM ".$table.$where);
        return mysqli_fetch_row($Query)[0];
    }
    
    protected function AvgColumnData($table,$where=null,$column){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $Query=mysqli_query($this->conn,"SELECT AVG(".$column.") FROM ".$table.$where);
        return mysqli_fetch_row($Query)[0];
    }
    
    protected function IsRowTB($table,$where){
        if($this->CountsData($table,$where)>=1) return $this->FetchData($table,"id",$where)[0]["id"];
        else return false;
    }
    
    protected function NextID($table,$where,$nameID){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        $Query = mysqli_query($this->conn,"SELECT * FROM ".$table.$where." ORDER BY ".$nameID." DESC LIMIT 1");
        $Result = mysqli_fetch_array($Query);
        return $Result[$nameID]+1;
    }
    
    protected function FetchData($table,$columns="*",$where=null){
        if(isset($where) and $where!="") $where=" WHERE ".$where;
        else $where="";
        if($columns=="") $columns="*";
        $Query=mysqli_query($this->conn,"SELECT ".$columns." FROM ".$table.$where);
        $Result = mysqli_fetch_all($Query,MYSQLI_ASSOC);
        return $Result;
    }
    

    
}



class main_methods extends MySql{
    
    public $channels = "R7LIVE_channels";
    public $programs = "R7LIVE_programs";
    
    public $visitors = "R7LIVE_visitors";
    public $visitorsinfo = "R7LIVE_visitors_informations";
    public $pages = "R7LIVE_visitors_pages";
    
    public $comments = "R7LIVE_comments";
    
    
    
    public function get_ip(){
        
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) $ip=$_SERVER['HTTP_CLIENT_IP']; //check ip from share internet
        
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; //to check ip is pass from proxy
        
        else $ip=$_SERVER['REMOTE_ADDR'];
        
        return $ip;
        
    }
    
    public function timeDiff($time2,$time1){
        $diff=$time2-$time1;
        
            if($diff < 10){
                return 'لحظاتی پیش';
            }
            elseif($diff < 60){
                return $diff.' ثانیه قبل';
            }
            elseif($diff < 3600){
                return round($diff / 60,0,1).' دقیقه قبل';
            }
            elseif($diff < 86400){
                return round($diff / 3600,0,1).' ساعت قبل';
            }
            elseif($diff < 7*86400){
                return round($diff / 86400,0,1).' روز قبل';
            }
            elseif($diff < 30*86400){
                return round($diff / (7*86400),0,1).' هفته قبل';
            }
            elseif($diff < 365*86400){
                return round($diff / (30*86400),0,1).' ماه قبل';
            }
            else{
                return round($diff / (365*86400),0,1).' سال قبل';
            }
        
    }
    
}


class stream_methods extends main_methods{
       
    private function channel_definer(){
        $name=$_GET['name'];
        $channel = $this->FetchData($this->channels,"","name='$name'")[0];
        
        if(!$channel){$result['result']=false; $result['error']="channel_not_found";}
        elseif(!$channel['st']){$result['result']=false; $result['error']="channel_not_active";}
        else{
            $result['result']=true;
            unset($channel['st']);
            $result = array_merge($result,$channel);
        }
        
        return $result;
    }
    
    
    private function channel_id(){
        return $this->channel_definer()['id'];
    }
    
    private function channel_name(){
        return $this->channel_definer()['name'];
    }
    
    
    private function get_session(){
        $channel_id = $this->channel_id();
        $token=$_COOKIE['live_sessions_'.$this->channel_name()];
        $id=$this->IsRowTB($this->visitors,"cid='$channel_id' and token='$token'");
        $now=time();
        if(isset($token) and $id){
            setcookie("live_sessions_".$this->channel_name(), $token, time()+(86400*365), "/");
            $session=$this->FetchData($this->visitors,"","id='$id'")[0];
            $visitor_id=$session['id'];
            $session_type="exsits";
            $session_ban = $session['ban'];
            
            if(!$session_ban) $this->UpdateData($this->visitors,"last_online='$now'","id='$id'");
            
        }
        else{
            do{
                $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXWZabcdefghijklmnopqrstuvwxyz0123456789_';
                $token = '';
                $max = strlen($characters) - 1;
                for ($i = 0; $i < 40; $i++) 
                    $token .= $characters[mt_rand(0, $max)];
            } while($this->IsRowTB($this->visitors,"cid='$channel_id' and session_token='$token'"));
            setcookie('live_sessions_'.$this->channel_name(), $token, time()+(86400*365), "/");
            $visitor_id=$this->InsertData($this->visitors,"cid,token,date,last_online","'$channel_id','$token','$now','$now'");
            $session_type="new";
            $session_ban=false;
        }
        
        $array=array('id'=>$visitor_id, 'session'=>$session_type, 'ban'=>$session_ban);
        
        return $array;
    }
    
    
    private function get_visitor_information(){
        $session = $this->get_session();
        $visitor_id = $session['id'];
        
        $ip=$this->get_ip();
        $useragent=$_SERVER['HTTP_USER_AGENT'];
        
        $visinfo=$this->IsRowTB($this->visitorsinfo,"visitor_id='$visitor_id' and ip='$ip' and useragent='$useragent'");
        $date=time();
        
        if($visinfo) $info_id=$visinfo;
        else $info_id=$this->InsertData($this->visitorsinfo,"visitor_id,ip,useragent,date","'$visitor_id','$ip','$useragent','$date'");
        
        $array=array( 'info_id'=>$info_id );
        $array = array_merge($session,$array);
        return $array;
    }
    
    private function record_page_visited(){
        $channel_id = $this->channel_id();
        $info = $this->get_visitor_information();
        $info_id = $info['info_id'];
        $url = $_GET['page_url'];
        $refrence = $_GET['referrer'];
        $now=time();
        
        $id=$this->IsRowTB($this->pages,"info_id='$info_id' and url='$url' and refrence='$refrence'");
        if($id){
            if(!$info['ban']) $this->UpdateData($this->pages,"hits=hits+1 , last_visit='$now'","id='$id'");
        }
        else{
            $this->InsertData($this->pages,"info_id,url,refrence,last_visit,first_visit","'$info_id','$url','$refrence','$now','$now'");
        }
        
        unset($info['info_id']);
        return $info;
    }
    
    
    
    private function get_program(){
        $channel_id = $this->channel_id();
        $now = time();
        $program=$this->FetchData($this->programs,"","cid='$channel_id' and start<='$now' and stop>='$now'")[0];
        if($program){
            $results['result']=true;
            unset($program['cid']);
            if($program['type']=="live") unset($program['media_url']);
            $program['start']=Jalali_Date::jdate("H:i",$program['start'],'','en');
            $program['stop']=Jalali_Date::jdate("H:i",$program['stop'],'','en');
            $array = array_merge($results,$program);
        }
        else{
            $results['result']=false;
            $results['error'] = "no_program_found";
            $results['lastid'] = $this->FetchData($this->programs,"id","cid='$channel_id' and start<='$now' ORDER by id DESC")[0]['id'];
            $array = $results;
        }
        return $array;
    }
    
    
    
    private function get_schedule(){
        $channel_id = $this->channel_id();
        $now = time();
        $program=$this->FetchData($this->programs,"","cid='$channel_id' ORDER BY `id` ASC");
        if($program){
            $results['result']=true;
            $ii=0;
            foreach($program as $prg){
                unset($program[$ii]['cid']); unset($program[$ii]['media_url']);
                $program[$ii]['start_date'] = Jalali_Date::jdate("l، j F Y",$prg['start'],'','fa');
                $program[$ii]['stop_date'] = Jalali_Date::jdate("l، j F Y",$prg['stop'],'','fa');
                $program[$ii]['start_time'] = Jalali_Date::jdate("H:i",$prg['start'],'','fa');
                $program[$ii]['stop_time'] = Jalali_Date::jdate("H:i",$prg['stop'],'','fa');
                unset($program[$ii]['start']); unset($program[$ii]['stop']); 
                $ii++;
            }
            
            $array = array_merge($results,$program);
            
        }
        else{
            $results['result']=false;
            $results['error'] = "no_program_found";
            $array = $results;
        }
        return $array;
    }    
    
    
    
    
    private function get_total_onlines(){
        $channel_id = $this->channel_id();
        $now=time();
        $check_time=$now-2;
        return $this->CountsData($this->visitors,"cid='$channel_id' and last_online>='$check_time'");
    }
    private function get_total_hits(){
        $channel_id = $this->channel_id();
        $Query = mysqli_query($this->conn,"SELECT SUM(hits) FROM ".$this->pages."
        INNER JOIN ".$this->visitorsinfo." ON ".$this->pages.".info_id=".$this->visitorsinfo.".id
        INNER JOIN ".$this->visitors." ON ".$this->visitorsinfo.".visitor_id=".$this->visitors.".id WHERE ".$this->visitors.".cid='$channel_id'");
        return mysqli_fetch_row($Query)[0];
    }
    private function get_total_visitors(){
        $channel_id = $this->channel_id();
        return $this->CountsData($this->visitors,"cid='$channel_id'");
    }
/*    
    private function get_page_onlines(){
        $url = $_GET['page_url'];
        $channel_id = $this->channel_id();
        $now=time();
        $check_time=$now-2;
        $Query = mysqli_query($this->conn,"SELECT * FROM ".$this->visitors."
        INNER JOIN ".$this->visitorsinfo." ON ".$this->visitors.".id=".$this->visitorsinfo.".visitor_id
        INNER JOIN ".$this->pages." ON ".$this->visitorsinfo.".id=".$this->pages.".info_id WHERE ".$this->visitors.".cid='$channel_id' and ".$this->visitors.".last_online>='$check_time'");
        return mysqli_num_rows($Query);
    }
    private function get_page_hits(){
        $url = $_GET['page_url'];
        $channel_id = $this->channel_id();
        $Query = mysqli_query($this->conn,"SELECT SUM(hits) FROM ".$this->pages."
        INNER JOIN ".$this->visitorsinfo." ON ".$this->pages.".info_id=".$this->visitorsinfo.".id
        INNER JOIN ".$this->visitors." ON ".$this->visitorsinfo.".visitor_id=".$this->visitors.".id WHERE ".$this->visitors.".cid='$channel_id' and ".$this->pages.".url='$url'");
        return mysqli_fetch_row($Query)[0];
    }
    private function get_page_visitors(){
        $url = $_GET['page_url'];
        $channel_id = $this->channel_id();
        $Query = mysqli_query($this->conn,"SELECT * FROM ".$this->visitors."
        INNER JOIN ".$this->visitorsinfo." ON ".$this->visitors.".id=".$this->visitorsinfo.".visitor_id
        INNER JOIN ".$this->pages." ON ".$this->visitorsinfo.".id=".$this->pages.".info_id WHERE ".$this->visitors.".cid='$channel_id'");
        return mysqli_num_rows($Query);
    }
    
*/    
    
    
    
    private function get_statistics(){
        $array = array(
            'Total_onlines'=>$this->get_total_onlines(),
            'Total_hits'=>$this->get_total_hits(),
            'Total_visitors'=>$this->get_total_visitors(),
            
            //'Page_onlines'=>$this->get_page_onlines(),
            //'Page_hits'=>$this->get_page_hits(),
            //'Page_visitors'=>$this->get_page_visitors(),
            
            //'Program_hits'=>$Program_hits,
            //'Program_visitors'=>$Program_visitors
        );
        return $array;
    }
    
    
    private function get_livestream_info(){
        $url = "https://api.aparat.com/fa/v2/live/live/get_stream/username/".$this->channel_name();
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        $data = json_decode($contents, true);
        $live_status = $data['data']['attributes']['live_status'];
        $stream_line = $data['data']['attributes']['stream_line'];
        return array('live_status'=>$live_status, 'stream_line'=>$stream_line);
    }
    
    
    public function get_comments(){
        $cid = $this->channel_id();
        $comments=$this->FetchData($this->comments,"name,text","cid='$cid' and confirm=1 ORDER BY `date` DESC");
        return $comments;
    }
    
    
    public function get_channel(){
        $channel = $this->channel_definer();
        if($channel['result']) $results = array('channel'=>$channel, 'playing'=>$this->get_program(), 'session'=>$this->record_page_visited(), 'statistics'=>$this->get_statistics(), 'schedule'=>$this->get_schedule(), 'livestream'=>$this->get_livestream_info());
        else $results = array('channel'=>$channel);
        return $results;
    }
    
    
    public function check(){
        return array('session'=>$this->get_session(), 'statistics'=>$this->get_statistics(), 'playing'=>$this->get_program(), 'livestream'=>$this->get_livestream_info());
    }
    
    public function comment(){
        $date = time();
        $info = $this->get_visitor_information(); $info_id = $info['info_id'];
        $cid = $this->channel_id();
        $text = $_GET['comment'];
        $phone = $_GET['phone'] ?: null;
        $name = $_GET['visitor_name'] ?: null;
        
        if(!$info['ban']){
            $this->InsertData($this->comments,"cid,info_id,name,phone,text,date","'$cid','$info_id','$name','$phone','$text','$date'");
            return array('result'=>true);
        }
        else{
            return array('result'=>false);
        }
    }
}



class Jalali_Date{

    public static function jdate($format,$timestamp='',$none='',$tr_num='en'){
    
     $T_sec=0;/* <= رفع خطاي زمان سرور ، با اعداد '+' و '-' بر حسب ثانيه */
    
     
     $ts=$T_sec+(($timestamp==='')?time():self::tr_num($timestamp));
     $date=explode('_',date('H_i_j_n_O_P_s_w_Y',$ts));
     list($j_y,$j_m,$j_d)=self::gregorian_to_jalali($date[8],$date[3],$date[2]);
     $doy=($j_m<7)?(($j_m-1)*31)+$j_d-1:(($j_m-7)*30)+$j_d+185;
     $kab=(((($j_y%33)%4)-1)==((int)(($j_y%33)*0.05)))?1:0;
     $sl=strlen($format);
     $out='';
     for($i=0; $i<$sl; $i++){
      $sub=substr($format,$i,1);
      if($sub=='\\'){
    	$out.=substr($format,++$i,1);
    	continue;
      }
      switch($sub){
    
    	case'E':case'R':case'x':case'X':
    	$out.='http://jdf.scr.ir';
    	break;
    
    	case'B':case'e':case'g':
    	case'G':case'h':case'I':
    	case'T':case'u':case'Z':
    	$out.=date($sub,$ts);
    	break;
    
    	case'a':
    	$out.=($date[0]<12)?'ق.ظ':'ب.ظ';
    	break;
    
    	case'A':
    	$out.=($date[0]<12)?'قبل از ظهر':'بعد از ظهر';
    	break;
    
    	case'b':
    	$out.=(int)($j_m/3.1)+1;
    	break;
    
    	case'c':
    	$out.=$j_y.'/'.$j_m.'/'.$j_d.' ،'.$date[0].':'.$date[1].':'.$date[6].' '.$date[5];
    	break;
    
    	case'C':
    	$out.=(int)(($j_y+99)/100);
    	break;
    
    	case'd':
    	$out.=($j_d<10)?'0'.$j_d:$j_d;
    	break;
    
    	case'D':
    	$out.=self::jdate_words(array('kh'=>$date[7]),' ');
    	break;
    
    	case'f':
    	$out.=self::jdate_words(array('ff'=>$j_m),' ');
    	break;
    
    	case'F':
    	$out.=self::jdate_words(array('mm'=>$j_m),' ');
    	break;
    
    	case'H':
    	$out.=$date[0];
    	break;
    
    	case'i':
    	$out.=$date[1];
    	break;
    
    	case'j':
    	$out.=$j_d;
    	break;
    
    	case'J':
    	$out.=self::jdate_words(array('rr'=>$j_d),' ');
    	break;
    
    	case'k';
    	$out.=self::tr_num(100-(int)($doy/($kab+365)*1000)/10,$tr_num);
    	break;
    
    	case'K':
    	$out.=self::tr_num((int)($doy/($kab+365)*1000)/10,$tr_num);
    	break;
    
    	case'l':
    	$out.=self::jdate_words(array('rh'=>$date[7]),' ');
    	break;
    
    	case'L':
    	$out.=$kab;
    	break;
    
    	case'm':
    	$out.=($j_m>9)?$j_m:'0'.$j_m;
    	break;
    
    	case'M':
    	$out.=self::jdate_words(array('km'=>$j_m),' ');
    	break;
    
    	case'n':
    	$out.=$j_m;
    	break;
    
    	case'N':
    	$out.=$date[7]+1;
    	break;
    
    	case'o':
    	$jdw=($date[7]==6)?0:$date[7]+1;
    	$dny=364+$kab-$doy;
    	$out.=($jdw>($doy+3) and $doy<3)?$j_y-1:(((3-$dny)>$jdw and $dny<3)?$j_y+1:$j_y);
    	break;
    
    	case'O':
    	$out.=$date[4];
    	break;
    
    	case'p':
    	$out.=self::jdate_words(array('mb'=>$j_m),' ');
    	break;
    
    	case'P':
    	$out.=$date[5];
    	break;
    
    	case'q':
    	$out.=self::jdate_words(array('sh'=>$j_y),' ');
    	break;
    
    	case'Q':
    	$out.=$kab+364-$doy;
    	break;
    
    	case'r':
    	$key=self::jdate_words(array('rh'=>$date[7],'mm'=>$j_m));
    	$out.=$date[0].':'.$date[1].':'.$date[6].' '.$date[4].' '.$key['rh'].'، '.$j_d.' '.$key['mm'].' '.$j_y;
    	break;
    
    	case's':
    	$out.=$date[6];
    	break;
    
    	case'S':
    	$out.='ام';
    	break;
    
    	case't':
    	$out.=($j_m!=12)?(31-(int)($j_m/6.5)):($kab+29);
    	break;
    
    	case'U':
    	$out.=$ts;
    	break;
    
    	case'v':
    	 $out.=self::jdate_words(array('ss'=>($j_y%100)),' ');
    	break;
    
    	case'V':
    	$out.=self::jdate_words(array('ss'=>$j_y),' ');
    	break;
    
    	case'w':
    	$out.=($date[7]==6)?0:$date[7]+1;
    	break;
    
    	case'W':
    	$avs=(($date[7]==6)?0:$date[7]+1)-($doy%7);
    	if($avs<0)$avs+=7;
    	$num=(int)(($doy+$avs)/7);
    	if($avs<4){
    	 $num++;
    	}elseif($num<1){
    	 $num=($avs==4 or $avs==((((($j_y%33)%4)-2)==((int)(($j_y%33)*0.05)))?5:4))?53:52;
    	}
    	$aks=$avs+$kab;
    	if($aks==7)$aks=0;
    	$out.=(($kab+363-$doy)<$aks and $aks<3)?'01':(($num<10)?'0'.$num:$num);
    	break;
    
    	case'y':
    	$out.=substr($j_y,2,2);
    	break;
    
    	case'Y':
    	$out.=$j_y;
    	break;
    
    	case'z':
    	$out.=$doy;
    	break;
    
    	default:$out.=$sub;
      }
     }
     return($tr_num!='en')?self::tr_num($out,'fa','.'):$out;
    }
    
    /*	F	*/
    public static function jstrftime($format,$timestamp='',$none='',$tr_num='en'){
    
     $T_sec=0;/* <= رفع خطاي زمان سرور ، با اعداد '+' و '-' بر حسب ثانيه */
     
     $ts=$T_sec+(($timestamp==='')?time():self::tr_num($timestamp));
     $date=explode('_',date('h_H_i_j_n_s_w_Y',$ts));
     list($j_y,$j_m,$j_d)=self::gregorian_to_jalali($date[7],$date[4],$date[3]);
     $doy=($j_m<7)?(($j_m-1)*31)+$j_d-1:(($j_m-7)*30)+$j_d+185;
     $kab=(((($j_y%33)%4)-1)==((int)(($j_y%33)*0.05)))?1:0;
     $sl=strlen($format);
     $out='';
     for($i=0; $i<$sl; $i++){
      $sub=substr($format,$i,1);
      if($sub=='%'){
    	$sub=substr($format,++$i,1);
      }else{
    	$out.=$sub;
    	continue;
      }
      switch($sub){
    
    	/* Day */
    	case'a':
    	$out.=self::jdate_words(array('kh'=>$date[6]),' ');
    	break;
    
    	case'A':
    	$out.=self::jdate_words(array('rh'=>$date[6]),' ');
    	break;
    
    	case'd':
    	$out.=($j_d<10)?'0'.$j_d:$j_d;
    	break;
    
    	case'e':
    	$out.=($j_d<10)?' '.$j_d:$j_d;
    	break;
    
    	case'j':
    	$out.=str_pad($doy+1,3,0,STR_PAD_LEFT);
    	break;
    
    	case'u':
    	$out.=$date[6]+1;
    	break;
    
    	case'w':
    	$out.=($date[6]==6)?0:$date[6]+1;
    	break;
    
    	/* Week */
    	case'U':
    	$avs=(($date[6]<5)?$date[6]+2:$date[6]-5)-($doy%7);
    	if($avs<0)$avs+=7;
    	$num=(int)(($doy+$avs)/7)+1;
    	if($avs>3 or $avs==1)$num--;
    	$out.=($num<10)?'0'.$num:$num;
    	break;
    
    	case'V':
    	$avs=(($date[6]==6)?0:$date[6]+1)-($doy%7);
    	if($avs<0)$avs+=7;
    	$num=(int)(($doy+$avs)/7);
    	if($avs<4){
    	 $num++;
    	}elseif($num<1){
    	 $num=($avs==4 or $avs==((((($j_y%33)%4)-2)==((int)(($j_y%33)*0.05)))?5:4))?53:52;
    	}
    	$aks=$avs+$kab;
    	if($aks==7)$aks=0;
    	$out.=(($kab+363-$doy)<$aks and $aks<3)?'01':(($num<10)?'0'.$num:$num);
    	break;
    
    	case'W':
    	$avs=(($date[6]==6)?0:$date[6]+1)-($doy%7);
    	if($avs<0)$avs+=7;
    	$num=(int)(($doy+$avs)/7)+1;
    	if($avs>3)$num--;
    	$out.=($num<10)?'0'.$num:$num;
    	break;
    
    	/* Month */
    	case'b':
    	case'h':
    	$out.=self::jdate_words(array('km'=>$j_m),' ');
    	break;
    
    	case'B':
    	$out.=self::jdate_words(array('mm'=>$j_m),' ');
    	break;
    
    	case'm':
    	$out.=($j_m>9)?$j_m:'0'.$j_m;
    	break;
    
    	/* Year */
    	case'C':
    	$tmp=(int)($j_y/100);
    	$out.=($tmp>9)?$tmp:'0'.$tmp;
    	break;
    
    	case'g':
    	$jdw=($date[6]==6)?0:$date[6]+1;
    	$dny=364+$kab-$doy;
    	$out.=substr(($jdw>($doy+3) and $doy<3)?$j_y-1:(((3-$dny)>$jdw and $dny<3)?$j_y+1:$j_y),2,2);
    	break;
    
    	case'G':
    	$jdw=($date[6]==6)?0:$date[6]+1;
    	$dny=364+$kab-$doy;
    	$out.=($jdw>($doy+3) and $doy<3)?$j_y-1:(((3-$dny)>$jdw and $dny<3)?$j_y+1:$j_y);
    	break;
    
    	case'y':
    	$out.=substr($j_y,2,2);
    	break;
    
    	case'Y':
    	$out.=$j_y;
    	break;
    
    	/* Time */
    	case'H':
    	$out.=$date[1];
    	break;
    
    	case'I':
    	$out.=$date[0];
    	break;
    
    	case'l':
    	$out.=($date[0]>9)?$date[0]:' '.(int)$date[0];
    	break;
    
    	case'M':
    	$out.=$date[2];
    	break;
    
    	case'p':
    	$out.=($date[1]<12)?'قبل از ظهر':'بعد از ظهر';
    	break;
    
    	case'P':
    	$out.=($date[1]<12)?'ق.ظ':'ب.ظ';
    	break;
    
    	case'r':
    	$out.=$date[0].':'.$date[2].':'.$date[5].' '.(($date[1]<12)?'قبل از ظهر':'بعد از ظهر');
    	break;
    
    	case'R':
    	$out.=$date[1].':'.$date[2];
    	break;
    
    	case'S':
    	$out.=$date[5];
    	break;
    
    	case'T':
    	$out.=$date[1].':'.$date[2].':'.$date[5];
    	break;
    
    	case'X':
    	$out.=$date[0].':'.$date[2].':'.$date[5];
    	break;
    
    	case'z':
    	$out.=date('O',$ts);
    	break;
    
    	case'Z':
    	$out.=date('T',$ts);
    	break;
    
    	/* Time and Date Stamps */
    	case'c':
    	$key=self::jdate_words(array('rh'=>$date[6],'mm'=>$j_m));
    	$out.=$date[1].':'.$date[2].':'.$date[5].' '.date('P',$ts).' '.$key['rh'].'، '.$j_d.' '.$key['mm'].' '.$j_y;
    	break;
    
    	case'D':
    	$out.=substr($j_y,2,2).'/'.(($j_m>9)?$j_m:'0'.$j_m).'/'.(($j_d<10)?'0'.$j_d:$j_d);
    	break;
    
    	case'F':
    	$out.=$j_y.'-'.(($j_m>9)?$j_m:'0'.$j_m).'-'.(($j_d<10)?'0'.$j_d:$j_d);
    	break;
    
    	case's':
    	$out.=$ts;
    	break;
    
    	case'x':
    	$out.=substr($j_y,2,2).'/'.(($j_m>9)?$j_m:'0'.$j_m).'/'.(($j_d<10)?'0'.$j_d:$j_d);
    	break;
    
    	/* Miscellaneous */
    	case'n':
    	$out.="\n";
    	break;
    
    	case't':
    	$out.="\t";
    	break;
    
    	case'%':
    	$out.='%';
    	break;
    
    	default:$out.=$sub;
      }
     }
     return($tr_num!='en')?self::tr_num($out,'fa','.'):$out;
    }
    
    /*	F	*/
    public static function jmktime($h='',$m='',$s='',$jm='',$jd='',$jy='',$none=''){
     if($h===''){
      return time();
     }else{
        list($h,$m,$s,$jm,$jd,$jy)=explode('_',self::tr_num($h.'_'.$m.'_'.$s.'_'.$jm.'_'.$jd.'_'.$jy));
      if($m===''){
       return mktime($h);
      }else{
       if($s===''){
        return mktime($h,$m);
       }else{
        if($jm===''){
         return mktime($h,$m,$s);
        }else{
         $jdate=explode('_',self::jdate('Y_j','','','en'));
         if($jd===''){
          list($gy,$gm,$gd)=self::jalali_to_gregorian($jdate[0],$jm,$jdate[1]);
          return mktime($h,$m,$s,$gm);
         }else{
          if($jy===''){
           list($gy,$gm,$gd)=self::jalali_to_gregorian($jdate[0],$jm,$jd);
           return mktime($h,$m,$s,$gm,$gd);
          }else{
           list($gy,$gm,$gd)=self::jalali_to_gregorian($jy,$jm,$jd);
           return mktime($h,$m,$s,$gm,$gd,$gy);
          }
         }
        }
       }
      }
     }
    }
    
    /*	F	*/
    public static function jgetdate($timestamp='',$none='',$tn='en'){
     $ts=($timestamp==='')?time():self::tr_num($timestamp);
     $jdate=explode('_',self::jdate('F_G_i_j_l_n_s_w_Y_z',$ts,'',$tn));
     return array(
    	'seconds'=>self::tr_num((int)self::tr_num($jdate[6]),$tn),
    	'minutes'=>self::tr_num((int)self::tr_num($jdate[2]),$tn),
    	'hours'=>$jdate[1],
    	'mday'=>$jdate[3],
    	'wday'=>$jdate[7],
    	'mon'=>$jdate[5],
    	'year'=>$jdate[8],
    	'yday'=>$jdate[9],
    	'weekday'=>$jdate[4],
    	'month'=>$jdate[0],
    	0=>tr_num($ts,$tn)
     );
    }
    
    /*	F	*/
    public static function jcheckdate($jm,$jd,$jy){
     list($jm,$jd,$jy)=explode('_',self::tr_num($jm.'_'.$jd.'_'.$jy));
     $l_d=($jm==12)?((((($jy%33)%4)-1)==((int)(($jy%33)*0.05)))?30:29):31-(int)($jm/6.5);
     return($jm>12 or $jd>$l_d or $jm<1 or $jd<1 or $jy<1)?false:true;
    }
    
    /*	F	*/
    public static function tr_num($str,$mod='en',$mf='٫'){
     $num_a=array('0','1','2','3','4','5','6','7','8','9','.');
     $key_a=array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹',$mf);
     return($mod=='fa')?str_replace($num_a,$key_a,$str):str_replace($key_a,$num_a,$str);
    }
    
    /*	F	*/
    public static function jdate_words($array,$mod=''){
     foreach($array as $type=>$num){
      $num=(int)self::tr_num($num);
      switch($type){
    
    	case'ss':
    	$sl=strlen($num);
    	$xy3=substr($num,2-$sl,1);
    	$h3=$h34=$h4='';
    	if($xy3==1){
    	 $p34='';
    	 $k34=array('ده','یازده','دوازده','سیزده','چهارده','پانزده','شانزده','هفده','هجده','نوزده');
    	 $h34=$k34[substr($num,2-$sl,2)-10];
    	}else{
    	 $xy4=substr($num,3-$sl,1);
    	 $p34=($xy3==0 or $xy4==0)?'':' و ';
    	 $k3=array('','','بیست','سی','چهل','پنجاه','شصت','هفتاد','هشتاد','نود');
    	 $h3=$k3[$xy3];
    	 $k4=array('','یک','دو','سه','چهار','پنج','شش','هفت','هشت','نه');
    	 $h4=$k4[$xy4];
    	}
    	$array[$type]=(($num>99)?str_replace(array('12','13','14','19','20')
     ,array('هزار و دویست','هزار و سیصد','هزار و چهارصد','هزار و نهصد','دوهزار')
     ,substr($num,0,2)).((substr($num,2,2)=='00')?'':' و '):'').$h3.$p34.$h34.$h4;
    	break;
    
    	case'mm':
    	$key=array('فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند');
    	$array[$type]=$key[$num-1];
    	break;
    
    	case'rr':
    	$key=array('یک','دو','سه','چهار','پنج','شش','هفت','هشت','نه','ده','یازده','دوازده','سیزده'
     ,'چهارده','پانزده','شانزده','هفده','هجده','نوزده','بیست','بیست و یک','بیست و دو','بیست و سه'
     ,'بیست و چهار','بیست و پنج','بیست و شش','بیست و هفت','بیست و هشت','بیست و نه','سی','سی و یک');
    	$array[$type]=$key[$num-1];
    	break;
    
    	case'rh':
    	$key=array('یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنجشنبه','جمعه','شنبه');
    	$array[$type]=$key[$num];
    	break;
    
    	case'sh':
    	$key=array('مار','اسب','گوسفند','میمون','مرغ','سگ','خوک','موش','گاو','پلنگ','خرگوش','نهنگ');
    	$array[$type]=$key[$num%12];
    	break;
    
    	case'mb':
    	$key=array('حمل','ثور','جوزا','سرطان','اسد','سنبله','میزان','عقرب','قوس','جدی','دلو','حوت');
    	$array[$type]=$key[$num-1];
    	break;
    
    	case'ff':
    	$key=array('بهار','تابستان','پاییز','زمستان');
    	$array[$type]=$key[(int)($num/3.1)];
    	break;
    
    	case'km':
    	$key=array('فر','ار','خر','تی‍','مر','شه‍','مه‍','آب‍','آذ','دی','به‍','اس‍');
    	$array[$type]=$key[$num-1];
    	break;
    
    	case'kh':
    	$key=array('ی','د','س','چ','پ','ج','ش');
    	$array[$type]=$key[$num];
    	break;
    
    	default:$array[$type]=$num;
      }
     }
     return($mod==='')?$array:implode($mod,$array);
    }
    
    
    /** Gregorian & Jalali (Hijri_Shamsi,Solar) date converter Functions
    Author: JDF.SCR.IR =>> Download Full Version : http://jdf.scr.ir/jdf
    License: GNU/LGPL _ Open Source & Free _ Version: 2.70 : [2017=1395]
    --------------------------------------------------------------------
    1461 = 365*4 + 4/4   &  146097 = 365*400 + 400/4 - 400/100 + 400/400
    12053 = 365*33 + 32/4    &    36524 = 365*100 + 100/4 - 100/100   */
    
    /*	F	*/
    public static function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
    	list($gy,$gm,$gd)=explode('_',self::tr_num($gy.'_'.$gm.'_'.$gd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
     $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
     if($gy > 1600){
      $jy=979;
      $gy-=1600;
     }else{
      $jy=0;
      $gy-=621;
     }
     $gy2=($gm > 2)?($gy+1):$gy;
     $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
     $jy+=33*((int)($days/12053));
     $days%=12053;
     $jy+=4*((int)($days/1461));
     $days%=1461;
     $jy+=(int)(($days-1)/365);
     if($days > 365)$days=($days-1)%365;
     if($days < 186){
      $jm=1+(int)($days/31);
      $jd=1+($days%31);
     }else{
      $jm=7+(int)(($days-186)/30);
      $jd=1+(($days-186)%30);
     }
     return($mod==='')?array($jy,$jm,$jd):$jy .$mod .$jm .$mod .$jd;
    }
    
    /*	F	*/
    public static function jalali_to_gregorian($jy,$jm,$jd,$mod=''){
    	list($jy,$jm,$jd)=explode('_',self::tr_num($jy.'_'.$jm.'_'.$jd));/* <= Extra :اين سطر ، جزء تابع اصلي نيست */
     if($jy > 979){
      $gy=1600;
      $jy-=979;
     }else{
      $gy=621;
     }
     $days=(365*$jy) +(((int)($jy/33))*8) +((int)((($jy%33)+3)/4)) +78 +$jd +(($jm<7)?($jm-1)*31:(($jm-7)*30)+186);
     $gy+=400*((int)($days/146097));
     $days%=146097;
     if($days > 36524){
      $gy+=100*((int)(--$days/36524));
      $days%=36524;
      if($days >= 365)$days++;
     }
     $gy+=4*((int)(($days)/1461));
     $days%=1461;
     $gy+=(int)(($days-1)/365);
     if($days > 365)$days=($days-1)%365;
     $gd=$days+1;
     foreach(array(0,31,((($gy%4==0) and ($gy%100!=0)) or ($gy%400==0))?29:28 ,31,30,31,30,31,31,30,31,30,31) as $gm=>$v){
      if($gd <= $v)break;
      $gd-=$v;
     }
     return($mod==='')?array($gy,$gm,$gd):$gy .$mod .$gm .$mod .$gd;
    }    
    
}


?>