<?php
/*
	functions 1.29
	http://www.ezgenerator.com
	Copyright (c) 2004-2008 Image-line
*/
error_reporting(E_ALL);
if(get_magic_quotes_runtime()==1) {set_magic_quotes_runtime(0);}
$f_ca_db_fname='documents/centraladmin.ezg.php';
$f_sitemap_fname='sitemap.php';
$f_ca_settings_fname=(isset($rel_path) && $rel_path=='' || isset($rel_p) && $rel_p==''? '':'../').'documents/centraladmin_conf.ezg.php';
$f_template_source='documents/template_source.html';
$f_max_chars=25000;
$f_mail_type="mail";
$f_SMTP_HOST='%SMTP_HOST%';
$f_SMTP_PORT='%SMTP_PORT%';
$f_SMTP_HELLO='%SMTP_HELLO%';
$f_SMTP_AUTH=('%SMTP_AUTH%'=='TRUE');
$f_SMTP_AUTH_USR='%SMTP_AUTH_USR%';

$f_SMTP_AUTH_PWD='%SMTP_AUTH_PWD%';
$f_return_path=''; // for servers with trusted users
$f_sendmail_from=''; // for servers with sendfrom_email not defined
if(isset($_SERVER['SERVER_SOFTWARE']))$f_use_linefeed=strpos($_SERVER['SERVER_SOFTWARE'],'Microsoft')!==false;
else $f_use_linefeed=false;
$f_lf=($f_use_linefeed? "\r\n": "\n");
$f_xhtml_on=false;
$f_ct=($f_xhtml_on? " />": ">");  
$f_br="<br".$f_ct;
$f_hr="<hr".$f_ct; 
$f_js_st=($f_xhtml_on? "/* <![CDATA[ */": "<!--");
$f_js_end=($f_xhtml_on? "/* ]]> */": "//-->");
$f_tzone_offset=f_read_tagged_data($f_ca_settings_fname,'tzoneoffset');
$f_names_lang_sets=array('BG'=>'Bulgarian', 'CA'=>'Catalan', 'CS'=>'Czech', 'DA'=>'Danish', 'NL'=>'Dutch', 'EN'=>'English', 'ET'=>'Estonian', 'FI'=>'Finnish', 'FR'=>'French', 'DE'=>'German', 'EL'=>'Greek', 'HU'=>'Hungarian', 'IS'=>'Icelandic', 'NO'=>'Norwegian', 'PT'=>'Portuguese', 'RO'=>'Romanian', 'RU'=>'Russian', 'SL'=>'Slovenian', 'ES'=>'Spain', 'SV'=>'Swedish');
$f_day_names=array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
$f_month_names=array("January","February","March","April","May","June","July","August","September","October","November","December");
$f_max_rec_on_admin=20;
$f_demo_mode=false;
$captcha_img_type=strtolower('gif');

function f_countries($first_item)
{
$res=array('Select'=>$first_item
,'AF'=>'Afghanistan'
,'AL'=>'Albania'
,'DZ'=>'Algeria'
,'AS'=>'America Samoa'
,'AD'=>'Andorra'
,'AO'=>'Angol'
,'AI'=>'Anguila'
,'AQ'=>'Antartica'
,'AG'=>'Antigua And Barbuda'
,'AR'=>'Argentina'
,'AM'=>'Armenia'
,'AW'=>'Aruba'
,'AU'=>'Australia'
,'AT'=>'Austria'
,'AZ'=>'Azerbaijan'
,'BS'=>'Bahamas, The'
,'BH'=>'Bahrain'
,'BD'=>'Bangladesh'
,'BB'=>'Barbados'
,'BY'=>'Belarus'
,'BE'=>'Belgium'
,'BZ'=>'Belize'
,'BJ'=>'Benin'
,'BM'=>'Bermuda'
,'BT'=>'Bhutan'
,'BO'=>'Bolivia'
,'BA'=>'Bosnia and Herzegovina'
,'BW'=>'Botswana'
,'BV'=>'Bouvet Island'
,'BR'=>'Brazil'
,'IO'=>'British Indian Ocean Territory'
,'BN'=>'Brunei'
,'BG'=>'Bulgaria'
,'BF'=>'Burkina Faso'
,'BI'=>'Burundi'
,'KH'=>'Cambodia'
,'CM'=>'Cameroon'
,'CA'=>'Canada'
,'CV'=>'Cape Verde'
,'KY'=>'Cayman Islands'
,'CF'=>'Central African Republic'
,'TD'=>'Chad'
,'CL'=>'Chile'
,'CN'=>'China'
,'CX'=>'Christmas Island'
,'CC'=>'Cocos (Keeling) Islands'
,'CO'=>'Colombia'
,'KM'=>'Comoros'
,'CG'=>'Congo'
,'CD'=>'Congo, Democractic Republic of the ' 
,'CK'=>'Cook Islands'
,'CR'=>'Costa Rica'
,'CI'=>'Cote DIvoire (Ivory Coast)'
,'HR'=>'Croatia (Hrvatska)'
,'CU'=>'Cuba'
,'CY'=>'Cyprus'
,'CZ'=>'Czech Republic'
,'DK'=>'Denmark'
,'DJ'=>'Djibouti'
,'DM'=>'Dominica'
,'DO'=>'Dominican Republic'
,'EC'=>'Ecuador'
,'EG'=>'Egypt'
,'SV'=>'El Salvador'
,'GQ'=>'Equatorial Guinea'
,'ER'=>'Eritrea'
,'EE'=>'Estonia'
,'ET'=>'Ethiopia'
,'FK'=>'Falkland Islands (Islas Malvinas)'
,'FO'=>'Faroe Islands'
,'FJ'=>'Fiji Islands'
,'FI'=>'Finland'
,'FR'=>'France'
,'GF'=>'French Guiana'
,'PF'=>'French Polynesia'
,'TF'=>'French Southern Territories'
,'GA'=>'Gabon, The'
,'GE'=>'Georgia'
,'DE'=>'Germany'
,'GH'=>'Ghana'
,'GI'=>'Gibraltar'
,'GR'=>'Greece'
,'GL'=>'Greenland'
,'GD'=>'Grenada'
,'GP'=>'Guadeloupe'
,'GU'=>'Guam'
,'GT'=>'Guatemala'
,'GN'=>'Guinea'
,'GW'=>'Guinea-Bissau'
,'GY'=>'Guyana'
,'HT'=>'Haiti'
,'HM'=>'Heard and McDonald Islands'
,'HN'=>'Honduras'
,'HU'=>'Hungary'
,'HK'=>'Hong Kong S.A.R.'
,'IS'=>'Iceland'
,'IN'=>'India'
,'ID'=>'Indonesia'
,'IR'=>'Iran'
,'IQ'=>'Iraq'
,'IE'=>'Ireland'
,'IL'=>'Israel'
,'IT'=>'Italy'
,'JM'=>'Jamaica'
,'JP'=>'Japan'
,'JO'=>'Jordan'
,'KZ'=>'Kazakhstan'
,'KE'=>'Kenya'
,'KI'=>'Kiribati'
,'KR'=>'Korea'
,'KP'=>'Korea, North' 
,'KW'=>'Kuwait'
,'KG'=>'Kyrgyzstan'
,'LA'=>'Laos'
,'LV'=>'Latvia'
,'LB'=>'Lebanon'
,'LS'=>'Lesotho'
,'LR'=>'Liberia'
,'LY'=>'Libya'
,'LI'=>'Liechtenstein'
,'LU'=>'Luxembourg'
,'MO'=>'Macau S.A.R.'
,'MK'=>'Macedonia'
,'MG'=>'Madagascar'
,'MW'=>'Malawi'
,'MY'=>'Malaysia'
,'MV'=>'Maldives'
,'ML'=>'Mali'
,'MT'=>'Malta'
,'MH'=>'Marshall Islands'
,'MR'=>'Mauritania'
,'MU'=>'Mauritius'
,'YT'=>'Mayotte'
,'MX'=>'Mexico'
,'FM'=>'Micronesia'
,'MD'=>'Moldova'
,'MC'=>'Monaco'
,'MN'=>'Mongolia'
,'MS'=>'Montserrat'
,'MA'=>'Morocco'
,'MZ'=>'Mozambique'
,'MM'=>'Myanmar'
,'NA'=>'Namibia'
,'NR'=>'Nauru'
,'NP'=>'Nepal'
,'AN'=>'Netherlands Antilles'
,'NL'=>'Netherlands, The'
,'NC'=>'New Caledonia'
,'NZ'=>'New Zealand'
,'NI'=>'Nicaragua'
,'NE'=>'Niger'
,'NG'=>'Nigeria'
,'NU'=>'Niue'
,'NF'=>'Norfolk Island'
,'MP'=>'Northern Mariana Islands'
,'NO'=>'Norway'
,'OM'=>'Oman'
,'PK'=>'Pakistan'
,'PW'=>'Palau'
,'PA'=>'Panama'
,'PG'=>'Papua new Guinea'
,'PE'=>'Peru'
,'PH'=>'Philippines'
,'PN'=>'Pitcairn Island'
,'PL'=>'Poland'
,'PT'=>'Portugal'
,'PR'=>'Puerto Rico'
,'QA'=>'Qatar'
,'RE'=>'Reunion'
,'RO'=>'Romania'
,'RU'=>'Russia'
,'RW'=>'Rwanda'
,'SH'=>'Saint Helena'
,'KN'=>'Saint Kitts And Nevis'
,'LC'=>'Saint Lucia'
,'PM'=>'Saint Pierre and Miquelon'
,'VC'=>'Saint Vincent And The Grenadines'
,'WS'=>'Samoa'
,'SM'=>'San Marino'
,'ST'=>'Sao Tome and Principe'
,'SA'=>'Saudi Arabia'
,'SN'=>'Senegal'
,'SC'=>'Seychelles'
,'SL'=>'Sierra Leone'
,'SG'=>'Singapore'
,'SK'=>'Slovakia'
,'SI'=>'Slovenia'
,'SB'=>'Solomon Islands'
,'SO'=>'Somalia'
,'ZA'=>'South Africa'
,'GS'=>'South Georgia'
,'ES'=>'Spain'
,'LK'=>'Sri Lanka'
,'SD'=>'Sudan'
,'SR'=>'Suriname'
,'SJ'=>'Svalbard And Jan Mayen Islands'
,'SZ'=>'Swaziland'
,'SE'=>'Sweden'
,'CH'=>'Switzerland'
,'SY'=>'Syria'
,'TW'=>'Taiwan'
,'TJ'=>'Tajikistan'
,'TZ'=>'Tanzania'
,'TH'=>'Thailand'
,'TG'=>'Togo'
,'TK'=>'Tokelau'
,'TO'=>'Tonga'
,'TT'=>'Trinidad And Tobago'
,'TN'=>'Tunisia'
,'TR'=>'Turkey'
,'TM'=>'Turkmenistan'
,'TC'=>'Turks And Caicos Islands'
,'TV'=>'Tuvalu'
,'UG'=>'Uganda'
,'UA'=>'Ukraine'
,'AE'=>'United Arab Emirates'
,'UK'=>'United Kingdom'
,'US'=>'United States'
,'UM'=>'United States Minor Outlying Islands'
,'UY'=>'Uruguay'
,'UZ'=>'Uzbekistan'
,'VU'=>'Vanuatu'
,'VA'=>'Vatican City State (Holy See)'
,'VE'=>'Venezuela'
,'VN'=>'Vietnam'
,'VG'=>'Virgin Islands (British)'
,'VI'=>'Virgin Islands (US)'
,'WF'=>'Wallis And Futuna Islands'
,'YE'=>'Yemen'
,'YU'=>'Yugoslavia'
,'ZM'=>'Zambia'
,'ZW'=>'Zimbabwe');
return $res;
}

function f_int_start_session($flag='')
{
 $ssp='';  
 if(($ssp!='')&&(strpos($ssp,'%SESSIONS_')===false)) session_save_path($ssp);  
 session_start();
 if($flag='private') header("Cache-control: private");
}

function f_regenerate_session_id(){if(function_exists('session_regenerate_id') && version_compare(phpversion(),"4.3.3",">=") ) session_regenerate_id();}

function f_get_session_var($Var) {return (isset($_SESSION[$Var])? $_SESSION[$Var]: "");}

function f_set_session_var($Var,$varValue) {$_SESSION[$Var]=$varValue;}

function f_is_logged($Var) {return (""!=f_get_session_var($Var));}

function f_unset_session()
{
  $_SESSION=array();
	if(isset($_COOKIE[session_name()])) setcookie(session_name(),'',time()-42000,'/');
	session_destroy();
}

function f_url_redirect($url,$temp_redirect_on,$close_tg='')
{
	global $f_ct;
	if(false) echo '<meta http-equiv="refresh" content="0;url='.$url.'"'.$f_ct;
	else {if($temp_redirect_on) header("HTTP/1.0 307 Temporary redirect"); header("Location: $url");}
}

function f_GFS($src,$start,$stop)
{
 if($start=='')$res=$src;
 else if(strpos($src,$start)===false){$res='';return $res;}
 else $res=substr($src,strpos($src,$start)+strlen($start));
 if(($stop!='')&&(strpos($res,$stop)!==false))$res=substr($res,0,strpos($res,$stop));
 return $res;
}

function f_GFSAbi($src,$start,$stop){$res2=f_GFS($src,$start,$stop);return $start.$res2.$stop;}

function f_my_substr($string,$start,$stop,$utf_date_flag=false)
{
  $c=$string;
	$nb=$stop;
	if(ord($c{0})>=0 && ord($c{0})<=127)	$nb=$stop;
	if(ord($c{0})>=192 && ord($c{0})<=223 && !$utf_date_flag)	$nb=$stop;
	if(ord($c{0})>=192 && ord($c{0})<=223 && $utf_date_flag)	$nb=$stop*2;
	if(ord($c{0})>=224 && ord($c{0})<=239)	$nb=$stop*3;
	if(ord($c{0})>=240 && ord($c{0})<=247)	$nb=$stop*4;
	if(ord($c{0})>=248 && ord($c{0})<=251)	$nb=$stop*5;
	if(ord($c{0})>=252 && ord($c{0})<=253)	$nb=$stop*6;
	return substr($string,$start,$nb);
}

function f_str_replace_once($needle,$replace,$haystack)
{
  $pos=strpos($haystack,$needle);if($pos===false) return $haystack;
  $result=substr_replace($haystack,$replace,$pos,strlen($needle));
  return $result;
}

function f_validate_email($email)
{
  if(!strlen($email)) return false;
  if(!preg_match('/^[0-9a-zA-Z\.\-\_]+\@[0-9a-zA-Z\.\-]+$/',$email)) return false;
  if(preg_match('/^[^0-9a-zA-Z]|[^0-9a-zA-Z]$/',$email)) return false;
  if(!preg_match('/([0-9a-zA-Z_]{1})\@./',$email)) return false;
  if(!preg_match('/.\@([0-9a-zA-Z_]{1})/',$email)) return false;
  if(preg_match('/.\.\-.|.\-\..|.\.\..|.\-\-./',$email)) return false;
  if(preg_match('/.\.\_.|.\-\_.|.\_\..|.\_\-.|.\_\_./',$email)) return false;
  if(!preg_match('/\.([a-zA-Z]{2,5})$/',$email)) return false;
  return true;
}

function f_color_picker($edit,$root_path='../') 
{
  global $f_ct;
  $hex=array('00','33','66','99','cc','ff');  
  $area='<area href="javascript:void(0);" onclick="javascript:tS'.$edit.'(\''.$edit.'\', \'#%s\');" coords="%s,%s,%s,%s" alt="" shape="rect"'.$f_ct;
  $result='<img alt="Color Picker" usemap="#cp1'.$edit.'" src="'.$root_path.'ezg_data/colorpicker.png"'.$f_ct;  
  $result.='<map name="cp1'.$edit.'">';
  for($i=0;$i<6;$i++)
    for($k=0;$k<6;$k++) 
      for($j=0;$j<6;$j++){$l=($i*72)+($j*12)+1;$t=($k*12)+1;$color=$hex[$i].$hex[$k].$hex[$j];$result.=sprintf($area,$color,$l,$t,$l+12,$t+12);}
  $result.='</map>';
  $result.='<script type="text/javascript">function tS'.$edit.'(element,color){document.getElementById(element).value=color; document.getElementById(element).style.background=color; } </script>';
  return $result;
}

function f_draw_captcha($captcha)
{
	global $captcha_img_type;
  $im=imagecreate(105,18);
  $bg=imagecolorallocate($im,255,255,255);

  for($i=0;$i<100;$i++){$clr2=imagecolorallocate($im,rand(110,255),rand(110,255),rand(110,255));$x=rand(0,105);$y=rand(0,18);imageline($im,$x,$y,$x+rand(0,3),$y+2,$clr2);}
  for($i=0;$i<10;$i++){$x=rand(0,120);$y=rand(0,18);$xs=rand(180,255);$clr2=imagecolorallocate($im,$xs,$xs,$xs);imagearc($im,$x,$y,rand(15,30),rand(15,30),rand(0,360),rand(180,360),$clr2);}
  $clr1=imagecolorallocate($im,120,120,120);
  imagerectangle($im,0,0,104,17,$clr1);
  $result='';
  for($i=0;$i<strlen($captcha);$i++){$char=substr($captcha,$i,1);$result .= $char." ";}
  $tekst2=explode(" ",$result);
  $aantal=count($tekst2);
  $xas2=10;$xaz=25;
  for($i=0;$i<$aantal;$i++){$xas2=rand(5,14);$yas2=rand(-1,3);$clr=imagecolorallocate($im,rand(0,110),rand(0,110),rand(0,110));imagestring($im,5,$i*$xaz+$xas2,$yas2,$tekst2[$i],$clr);}
  
  $img_type=(function_exists("image".$captcha_img_type))?$captcha_img_type:((function_exists("imagegif"))?'gif':(function_exists("imagejpeg"))?'jpeg':((function_exists("imagepng")))?'png':'');
  if($img_type!='')
  {
   header("Content-type: image/$img_type");
	 if($img_type=='gif') imagegif($im);elseif($img_type=='jpeg') imagejpeg($im);elseif($img_type=='png') imagepng($im);
	}
  imagedestroy($im);
}

function f_generate_captcha_code()
{
	if(!isset($_SESSION)) f_int_start_session();
	$str="";
	for($i=0;$i<4;$i++) $str.=chr(rand(97,122));
	return $str;
}

function f_generate_captcha_code2(){$str=strtoupper(f_generate_captcha_code());$_SESSION['CAPTCHA_CODE']=md5($str);return $str;}
function f_draw_captcha2() {$code=f_generate_captcha_code2();f_draw_captcha($code);}

function f_is_able_build_img()
{
	if(function_exists('imagecreate') && (function_exists('imagegif') || function_exists('imagejpeg') || function_exists('imagepng'))) return true;
	else return false;
}

function f_get_fields()
{
 $vars=$_REQUEST;
 foreach($vars as $k=>$v)
 {
  $v=strtolower(urldecode(trim($v)));
  if((strpos($v,'mime-version')!==false)||(strpos($v,'content-type:')!==false)) die("Why ?? :(");
 }
 return $vars;
}

function f_DecodeDate($days,&$Year,&$Month,&$Day)
{
  $D1=365;$D4=($D1*4)+1;$D100=($D4*25)-1;$D400=($D100*4)+1;
  $MonthDays=array(array(31,28,31,30,31,30,31,31,30,31,30,31),array(31,29,31,30,31,30,31,31,30,31,30,31));  
  $days+=693594;$days--;$Y=1;
  while($days >= $D400){$days-=$D400;$Y+=400;}
  DivMod($days,$D100,$I,$D);
  if($I==4){$I++;$D+=$D100;}
  $Y+=$I*100;DivMod($D,$D4,$I,$D);$Y+=$I*4;DivMod($D,$D1,$I,$D);
  if($I==4){$I--;$D+=$D1;}
  $Y+=$I;   
  $leap=($Y % 4 == 0)&&(($Y % 100 <> 0)||($Y % 400 == 0));
  $DayTable=$MonthDays[$leap];$M=1;
  while(true) {$I=$DayTable[$M-1];if($D<$I) break;$D-=$I;$M++;}
  $Year=$Y;$Month=$M;$Day=$D+1;
}

function f_define_os($agent)
{
	$result='';	
	if(strpos($agent,'Win')!==false)	
	{
		if(strpos($agent,'Win32')!==false || strpos($agent,'Windows NT 5.1')!==false)	$result='WinXP';
		elseif(strpos($agent,'Windows NT 6.0')!==false)	$result='WinVista';
		elseif(strpos($agent,'Windows NT 5.2')!==false)	$result='W2003';
		elseif(strpos($agent,'Windows NT 5.0')!==false)	$result='W2000';
		elseif(strpos($agent,'Windows NT')!==false)		$result='WinNT';
		elseif(strpos($agent,'Windows 98')!==false)		$result='Win98';
		elseif(strpos($agent,'Windows 95')!==false)		$result='Win95';
		else $result='Windows';
	}	
	elseif(strpos($agent,'Linux')!==false || strpos($agent,'FreeBSD')!==false)	$result='Linux';	
	elseif(strpos($agent,'Debian')!==false || strpos($agent,'Ubuntu')!==false)	$result='Linux';			
	elseif(strpos($agent,'Mac_PowerPC')!==false || strpos($agent,'Macintosh')!==false)	$result='Mac';
	elseif(strpos($agent,'Mac')!==false) $result='Mac';		
	return $result;
}

function xtract($text,$num) 
{  
	if(preg_match_all('/\s+/',$text,$junk) <= $num) return $text;
	$text=preg_replace_callback('/(<\/?[^>]+\s+[^>]*>)/','_abstractProtect',$text);  
	$words=0;
	$out=array();
	$stack=array();
	$tok=strtok($text,"\n\t ");  
	while($tok!==false and strlen($tok)) 
	{   
		if(preg_match_all('/<(\/?[^\x01>]+)([^>]*)>/',$tok,$matches,PREG_SET_ORDER)) 
			{foreach($matches as $tag) _recordTag($stack,$tag[1],$tag[2]);}   
		$out[]=$tok;
		if(! preg_match('/^(<[^>]+>)+$/', $tok)) ++$words;
		if($words==$num) break;
		$tok=strtok("\n\t ");  
	}  
	$result=_abstractRestore(implode(' ', $out));  
	$stack=array_reverse($stack); // galina
	if($words==$num) $result.=' ...';
	foreach($stack as $tag) {$result.="</$tag>";} 
	return $result; 
} 
function _abstractProtect($match) {return preg_replace('/\s/',"\x01",$match[0]);} 
function _abstractRestore($strings){return preg_replace('/\x01/',' ',$strings);} 
function _recordTag(&$stack, $tag, $args) 
{  
	if(strlen($args) && $args[strlen($args)-1]=='/') return;  
	elseif($tag[0]=='/') 
	{    
		$tag=substr($tag,1);    
		for($i=count($stack)-1;$i>=0;$i--){if($stack[$i]==$tag){array_splice($stack,$i,1);return;}}    
		return;  
	}  
	elseif(in_array(strtolower($tag),array('p','li','ul','ol','div','span','a','strong','b','i','u','em','blockquote','font','h','td','tr','tbody','table'))) $stack[]=$tag;
} 

function f_split_html_content($string, $max_chr) {return xtract($string,$max_chr/4);}
function f_un_esc($s) {return str_replace(array('\\\\','\\\'','\"'), array( '\\','\'','"'), $s);}
function f_esc($s) {return (get_magic_quotes_gpc()? $s: str_replace(array('\\','\'','"'), array('\\\\','\\\'','\"'), $s));}
function f_sth($s) {return htmlspecialchars(str_replace(array('\\\\','\\\'','\"',"%2C"),array('\\','\'','"',","),$s), ENT_QUOTES);}
function f_sth_2($s) {return str_replace(array('\\\\','\\\'','\"',"%2C",'<?','?>'),array('\\','\'','"',",",'&lt;?','?&gt;'),$s);}

/* ------------------ read/write db files functions ------------------- */
function f_read_file($filename)
{	
	$contents=''; 
	clearstatcache();
	if(file_exists($filename))
	{	
		$fsize=filesize($filename);
		if($fsize>0) {$fp=fopen($filename,'r');$contents=fread($fp,$fsize);fclose($fp);}
	}
	if(get_magic_quotes_runtime()) $contents=stripslashes($contents);
	return $contents;
}

function f_read_tagged_data($file,$tag)
{	
  $file_contents=f_read_file($file);
	$setting=f_GFS($file_contents,'<'.$tag.'>','</'.$tag.'>');
	return $setting;
}

function f_read_tagged_data_a($file,$tag)
{	
  $file_contents=f_read_file($file);
  $setting=array();
  foreach($tag as $k=>$v) $setting[$v]=f_GFS($file_contents,'<'.$v.'>','</'.$v.'>');
	return $setting;
}

function f_read_lang_set($lang_set_file, $selected_lang_set, $page_type, $period_list=array())
{
	global $f_day_names,$f_month_names; 
	
	$result=array();
	if(file_exists($lang_set_file) && (filesize($lang_set_file)>0))
	{	
		$read_f=false;
		$fp=fopen($lang_set_file,'r');
		while($data=fgetcsv($fp,25000,'|')) 
		{	
			if(isset($data[0]) && !empty($data[0]))
			{			
				if(strpos($data[0],'[END]')!==false && $read_f) break;
				elseif($read_f)	
				{
					$label=explode('=',$data[0]); 
					if(in_array($page_type,array('blog','podcast','photoblog','calendar','guestbook'))) 
					{
						if(in_array($label[0],$f_day_names)) $new_day_name[]=$label[1];
						elseif(in_array($label[0],$f_month_names)) $new_month_name[]=$label[1];
						if($page_type=='calendar')
						{
							if(in_array($label[0],$period_list)) $new_period_list[]=$label[1];
							elseif(in_array($label[0],array('year','month','week'))) $new_repeatPeriod_list[]=ucfirst($label[1]);
						}
					}	
					if(in_array($page_type,array('calendar','subscribe','ca'))) $new_lang_l["{$label[0]}"]=$label[1];
				}	
				if(strpos($data[0],'['.strtoupper($selected_lang_set).']')!==false) $read_f=true;
			}
		}
		fclose($fp);
		if(isset($new_lang_l)) $result['lang_l']=$new_lang_l; 
		if(isset($new_day_name)) $result['day_name']=$new_day_name; 
		if(isset($new_month_name)) $result['month_name']=$new_month_name;	
		if(isset($new_period_list)) $result['period_list']=$new_period_list;
		if(isset($new_repeatPeriod_list)) $result['repeatPeriod_list']=$new_repeatPeriod_list;
	} 
	return $result;
}

function f_write_tagged_data($tags,$newset,$db_settings_file,$template_fname)  
{
	$file_contents='<?php echo "hi"; exit; /* */ ?>';  
	if(!file_exists($db_settings_file)) {print f_fmt_in_template($template_fname,f_fmt_error_msg('MISSING_DBFILE',$db_settings_file));exit;}
	elseif(!$fp=fopen($db_settings_file,'r+')) {print f_fmt_in_template($template_fname,f_fmt_error_msg('DBFILE_NEEDCHMOD',$db_settings_file));exit;}
	else 
	{
		flock($fp,LOCK_EX);
		$fsize=filesize($db_settings_file);
		if($fsize>0) $file_contents=fread($fp,$fsize);
		
		if(!is_array($tags)) {$tags_arr=array($tags); $newset_arr=array($newset);}
		else {$tags_arr=$tags;$newset_arr=$newset;}

		foreach($tags_arr as $k=>$type)
		{
			if(strpos($file_contents, "<$type>")!==false)
			{
				$oldsettings=f_GFS($file_contents, "<$type>", "</$type>");
				$file_contents=str_replace("<$type>".$oldsettings."</$type>", "<$type>".$newset_arr[$k]."</$type>",$file_contents);
			}
			else $file_contents=str_replace("*/ ?>", "<$type>".$newset_arr[$k]."</$type>*/ ?>",$file_contents);
		}
		ftruncate($fp,0);fseek($fp,0);	
		if(fwrite($fp,$file_contents)===FALSE) {print "Cannot write to file";exit;}
		flock($fp,LOCK_UN);fclose($fp);
		return true;
	} 
}

/* ------------------ central admin functions ------------------- */
function f_get_sitemap($root_path)
{
	global $f_sitemap_fname;
  $result=array();	
	
	$filename=(strpos($root_path,'sitemap.php')!==false)?$root_path:$root_path.$f_sitemap_fname;
	if(file_exists($filename))
	{
		$fsize=filesize($filename);
		if($fsize>0)
		{
			$fp=fopen($filename,'r');$content=fread($fp,$fsize);fclose($fp);
			$lines_a=split("\n",$content);$count=count($lines_a);
			for($i=1;$i<$count;$i++) {if(strpos($lines_a[$i],'<id>')!==false) $result[]=split("[|]",trim($lines_a[$i]));}
		}
	}
	return $result;
}

function f_get_page_params($id,$root_path='../')
{
  $result='';
  $all_pages=f_get_sitemap($root_path);
  foreach($all_pages as $k=>$v) {if($v[10]=='<id>'.$id) {$result=$v;break;}}
  return $result;
}

function f_format_users($users)
{
 $users_array=array();$details_arr=array();$i=1;

 while(strpos($users,'<user id="')!==false)
 {
  $i=f_GFS($users,'<user id="','" ');
  $all='<user id="'.$i.'" '.f_GFS($users,'<user id="'.$i.'" ','</user>');
  $basic=f_GFS($all,'<user id="'.$i.'" ','>').' ';
  $details=f_GFS($all,'<details ','></details>').' ';
  $access=f_GFS($all,'<access_data>','</access_data>').' ';
  $news = f_GFS($all,'<news_data>','</news_data>').' '; // event manager

  list($username,$password)=explode(' ',$basic);
  $details_arr['email']=f_GFS($details,'email="','"');
  $details_arr['name']=f_GFS($details,'name="','"');
  $details_arr['sirname']=f_GFS($details,'sirname="','"');
  $details_arr['creation_date']=f_GFS($details,'date="','"');
  $details_arr['sr']=f_GFS($details,'sr="','"'); //self-registration flag
  
  $access_arr=array(); $j=1;
  while(strpos($access, '<access id="'.$j.'" ')!==false)
  {
    $access_full=f_GFSAbi($access,'<access id="'.$j.'" ','</access>');
    $page_access_arr=array(); $m=1;
    while(strpos($access_full,'<p id="'.$m.'" ')!==false) 
    {
		  $page_access_str=f_GFSAbi($access_full,'<p id="'.$m.'" ','>');
		  $page_access_arr []=array('page'=>f_GFS($page_access_str,'page="','"'), 'type'=>f_GFS($page_access_str,'type="','"'));
		  $m++;
    } 
    $access_str=f_GFS($access_full,'<access id="'.$j.'" ','>');
    list($section,$type)=explode(' ',$access_str);
    $access_arr[]=array(substr($section,0,strpos($section,'='))=>f_GFS($section,'="','"'),substr($type,0,strpos($type,'='))=>f_GFS($type,'="','"'),'page_access'=>$page_access_arr);
    $j++;
  }
  $news_arr=array();$j=1; // event manager
  while(strpos($news,'<news id="'.$j.'" ')!==false) 
  {
		$news_str=f_GFS($news,'<news id="'.$j.'" ','>');
		list($page,$cat)=explode(' ',$news_str);
		$news_arr []=array(substr($page,0,strpos($page,'='))=>f_GFS($page,'="','"'), substr($cat,0,strpos($cat,'='))=>f_GFS($cat,'="','"'));
		$j++;
  }
  $users_array[]=array('id'=>$i,'username'=>f_GFS($username,'="','"'),'password'=>f_GFS($password,'="','"'),'access'=>$access_arr,'details'=>$details_arr, 'news'=>$news_arr);
  $users=str_replace($all,'',$users);
 }
 return $users_array;
}

function f_get_all_users($root_path)
{ 
	global $f_ca_db_fname;
	$users_arr=array(); 
	$filename=(strpos($root_path,'centraladmin.ezg.php')!==false)?$root_path:$root_path.$f_ca_db_fname; 
	$src=f_read_file($filename);
	$users=f_GFS($src,'<users>','</users>');
	if($users!='') $users_arr=f_format_users($users);
	return $users_arr;	
}

function f_get_user($username,$root_path)
{ 
	$specific_user=array();
	$users_arr=f_get_all_users($root_path);
	if(!empty($users_arr)){foreach($users_arr as $k=>$v){if(array_search($username,$v)!==false) {$specific_user=$v;break;}}}
	return $specific_user;	
}

function f_get_users_pg($page_id,$root_path)
{
	global $f_ca_db_fname,$f_sitemap_fname;

	$result=array();
	$all_users=f_get_all_users($root_path.$f_ca_db_fname);
	$page_info=f_get_page_params($page_id,$root_path.$f_sitemap_fname);	
	foreach($all_users as $key=>$user)
	{
		if($user['access'][0]['section']=='ALL') $result[]=$user['username'];
		else
		{
			foreach($user['access'] as $k=>$v)
			{
				if($page_info[7]==$v['section'])
				{
					if($v['type']!='2')	$result[]=$user['username'];
					elseif(isset($v['page_access'])) 
					{
						foreach($v['page_access'] as $kk=>$vv) {if($page_id==$vv['page']) {$result[]=$user['username']; break;} }
					} 
				}
			}
		}
    }
	$result=array_unique($result); 
	return $result;
}

function f_has_write_access($user,$page_info,$root_path='../') 
{
	global $f_ca_db_fname;

	$result=false; $page_id=str_replace('<id>','',$page_info[10]);
	$user_account=f_get_user($user,$root_path.$f_ca_db_fname);

  if(isset($page_info[7]) && $page_info[7]!='' && !empty($user_account)) 
	{ 
		if($user_account['access'][0]['section']!='ALL' && $user_account['username']==$user) 
		{
			foreach($user_account['access'] as $k=>$v)
			{
				if($page_info[7]==$v['section']) 
				{											
					if($v['type']=='1')	$result=true; 
					elseif($v['type']=='2' && isset($v['page_access'])) 
					{
						foreach($v['page_access'] as $key=>$val)
						{
							if($page_id==$val['page'] && $val['type']=='1') {$result=true;break;}
						}
					} 
					break;
				}
			}							
		}
		elseif($user_account['username']==$user) {if($user_account['access'][0]['type']=='1')	$result=true;}
  }
  return $result;
}

# ------------ functions generating HTML ----------------- 
# builds logged user menu (logout, change pass, edit profile), represented in EZG with %LOGGED_INFO% macro 
function f_build_logged_info($content,$page_id,$root_path,$script_path,$lg='') 
{
	$code="<?php if(function_exists('user_navigation'))";
	if(!isset($_SESSION)) f_int_start_session();
	$logged_as_caadmin=isset($_SESSION['SID_ADMIN']);
	$logged_as_causer=isset($_SESSION['cur_user']);
	if($logged_as_caadmin || $logged_as_causer)
	{
		if($logged_as_caadmin) $logged_user=$_SESSION['SID_ADMIN'];
		else $logged_user=$_SESSION['cur_user'];
		while(strpos($content,$code)!==false)
		{
			$params_raw=f_GFSAbi($content,$code,"?>");	
			if($params_raw!='')
			{
				$logged_info='';
				$params=explode(',',str_replace("'",'',f_GFS($params_raw,'user_navigation(',')')));						
				if(strtolower(implode('',$params))=="username") $logged_info=$logged_user;
				else
				{	
					$captions=array();$urls=array(); 
					if(strpos($root_path,'documents')===false) $ca_url=$root_path.'documents/centraladmin.php?';
					else $ca_url=$root_path.'centraladmin.php?';	 				
					
					if($logged_as_caadmin)
					{
						$captions[]=$params[1];$urls[]=$ca_url.'process=index&amp;'.$lg;
						$captions[]=$params[2];$urls[]=$ca_url.'process=logoutadmin&amp;pageid='.$page_id.'&amp;'.$lg;			
					}
					elseif($logged_as_causer) 
					{
					  $captions[]=$params[0].' ['.$logged_user.']'; $urls[]='';
						$ca_expanded_url=$ca_url.'&amp;username='.$logged_user.'&amp;pageid='.$page_id.'&amp;ref_url='.urlencode($script_path).'&amp;process=';
						$captions[]=$params[3]; $urls[]=$ca_expanded_url.'changepass&amp;'.$lg;
						$captions[]=(isset($params[4])?$params[4]:'edit profile'); $urls[]=$ca_expanded_url.'editprofile&amp;'.$lg;	
						$captions[]=$params[2]; $urls[]=$ca_url.'process=logout&amp;pageid='.$page_id.'&amp;'.$lg;			
					}
					$logged_info=f_admin_navigation($captions,$urls);
				}
				$content=str_replace($params_raw,$logged_info,$content);
			}
		}
	}
	return $content;
}

# builds admin screen navigation menu ("selected" is index number)
function f_admin_navigation($captions, $urls, $selected='') 
{
	$output='<div style="padding:2px;text-align:center;">';	
	foreach($captions as $k=>$v)
	{
		$format_user='';$value=$v; 
		if(empty($urls[$k])) $output.=' <span class="rvts8">'.$value.'</span> ::';
		elseif($k==$selected) $output.=' <a class="rvts8" href="'.$urls[$k].'">'.$value.'</a> ::';	
		else
		{
			if(strpos($v,'[')!==false) 
				{ $user=f_GFSAbi($v,'[',']');$format_user=' <span class="rvts8">'.$user.'</span>'; $value=str_replace($user,'',$v);} 
			if(!empty($v) && $v!=' ') $output.=' <a class="rvts12" href="'.$urls[$k].'">'.$value.'</a>'.$format_user.' ::';
		}
	}
	$output.='<!--end_ca_header--></div>';
	return $output;
}

# formats admin screen output
function f_fmt_admin_screen($content,$menu='')
{
	global $f_br;
	$output="<div style='padding:3px;margin-left:auto;margin-right:auto;text-align:center;'>";
	if(!empty($menu)) $output.=$menu.$f_br;
	$output.=$content.'</div>';
	return $output;
}

# formats admin screen title 
function f_fmt_admin_title($title) {return '<span class="rvts8" style="font-variant:small-caps"><b>'.$title.'</b></span>';}
# formats page output in template 
function f_fmt_in_template($filename,$page_output,$css='',$bg_tag='',$include_menu=true,$include_counter=false)
{
	global $f_template_source;
	
	if((strpos($filename,'../')!==false) &&(strpos($f_template_source,'../')===false)) $f_template_source='../'.$f_template_source;
	if(file_exists($f_template_source)) $filename=$f_template_source;

	$contents=f_read_file($filename);
	if(strpos($filename,'template_source.html')!==false && strpos($contents,'%CONTENT%')!==false) $pattern='%CONTENT%';
	elseif(strpos($contents,'<!--page-->')!==false && $include_menu) $pattern=f_GFSAbi($contents,'<!--page-->','<!--/page-->');
	else
	{
		$contents=str_replace(array('<BODY','</BODY'),array('<body','</body'),$contents);
		$pattern=f_GFSAbi($contents,'<body','</body>');	
		$body_part=substr($pattern, 0, strpos($pattern,'>')+1); 
		if($bg_tag!=='') $body_part=str_replace('<body','<body style="'.$bg_tag.'"',$body_part);
		$page_output=$body_part.$page_output.'</body>';		
	}	
	$contents=str_replace($pattern,$page_output,$contents);
	if($include_counter==false) $contents=str_replace(f_GFS($contents,'<!--counter-->','<!--/counter-->'),'',$contents);
	if(!empty($css)) $contents=str_replace('<!--scripts-->','<!--scripts-->'.$css, $contents);
	return $contents;
}

function f_format_err_msg($msg){ global $f_br;return "<span class='rvts8'><em style='color:red;'>".$msg."</em></span>".$f_br;}

function f_fmt_error_msg($error_index, $affected_file='', $page_type='')
{
	global $f_br;
	$error_messages=array('MISSING_DBFILE'=>'Database file '.$affected_file.' is missing on server.',
		'READFILE_FAILED'=>'Can\'t read database file '.$affected_file.'.',
		'DBFILE_NEEDCHMOD'=>'Database file '.$affected_file.' doesn\'t have WRITE permissions.',
		'EMAIL_NOTSET'=>'YOU HAVEN\'T DEFINED YOUR E-MAIL YET!!!',
		'MAIL_FAILED'=>'Missing mail settings');

	$output=$f_br."<span class='rvts4'><em style='color: red;'>";
	if($error_index=='MAIL_FAILED') $output.='Email FAILED'; 
	elseif($error_index!='EMAIL_NOTSET') $output.='Operation FAILED!'; 
	else $output.='Page WILL NOT WORK!'; 
	$output.="</em>"; 

	$output.=$f_br.$f_br."REASON: ".$error_messages[$error_index];
	if($error_index=='MISSING_DBFILE')
		$output.=$f_br.$f_br."To SOLVE the problem, go to <em style='color: red;'>EZGenerator >> Project Settings >> Upload tab >></em>, press <em style='color: red;'>Re-upload Data</em> button and then run <em style='color: red;'>Upload</em>.";
	elseif($error_index=='DBFILE_NEEDCHMOD')
		$output.=$f_br.$f_br."To SOLVE the problem, connect to your server and set file permissions manually. If server is <em style='color: red;'>LINUX</em>, set <em style='color: red;'>CHMOD 666</em>. If server is <em style='color: red;'>Windows</em>, set <em style='color: red;'>WRITE permission</em>.";
	elseif($error_index=='EMAIL_NOTSET')
		$output.=$f_br.$f_br."To SOLVE the problem, go to <em style='color: red;'>EZGenerator >> ".strtoupper($page_type)." SETTINGS panel</em> and type your email address in <em style='color: red;'>E-MAIL</em> box.";
	elseif($error_index=='MAIL_FAILED')
		$output.=$f_br.$f_br."To SOLVE the problem, check with your host provider if your server uses MAIL or SMTP for sending mails. $f_br If SMTP is used, get the smtp settings from your host provider, go to <em style='color: red;'>EZGenerator >> Project Settings >> PHP tab >></em> and set the smtp settings. $f_br If MAIL is used, check with your host provider if mail settings are correctly set.";
	$output.="</span>";

	return $output;
}

function f_rss_line($tag, $rss_setting)
{
	global $f_lf;
	return "<$tag>".f_sth($rss_settings)."</$tag>".$f_lf;
}

function f_build_rss_header($rss_settings,$page_charset,$script_url,$publish_date,$rss_header='') 
{ 	
	global $f_lf;
	$rss_output='<?xml version="1.0" encoding="'.$page_charset.'"?>'.$f_lf;
	$rss_output.=(empty($rss_header)? '<rss version="2.0">': $rss_header).$f_lf.'<channel>'.$f_lf
	.'<title>'.(empty($rss_settings['Title'])? 'My site': $rss_settings['Title']).'</title>'.$f_lf
	.'<link>'.$script_url."</link>".$f_lf
	.'<description>'.(empty($rss_settings['Description'])? 'This is my ...': $rss_settings['Description'])."</description>".$f_lf;	
	if(!empty($rss_settings['Copyright'])) $rss_output.='<copyright>'.f_sth($rss_settings['Copyright']).'</copyright>'.$f_lf;
	
	$rss_output.='<language>'.$rss_settings['Language'].'</language>'.$f_lf
	.'<pubDate>'.date('r',$publish_date)."</pubDate>".$f_lf
	.'<lastBuildDate>'.date('r',$publish_date)."</lastBuildDate>".$f_lf
	.'<docs>http://blogs.law.harvard.edu/tech/rss</docs>'.$f_lf
	.'<generator>EzGenerator</generator>'.$f_lf;
	
	if(isset($rss_settings['Managing editor']) && $rss_settings['Managing editor']!='') 
		$rss_output.='<managingEditor>'.f_sth($rss_settings['Managing editor']).'</managingEditor>'.$f_lf;
	if(isset($rss_settings['Webmaster']) && $rss_settings['Webmaster']!='') 
		$rss_output.='<webMaster>'.f_sth($rss_settings['Webmaster']).'</webMaster>'.$f_lf;		
	if(!empty($rss_settings['Category domain']) && !empty($rss_settings['Category'])) 	
		$rss_output.='<category domain="'.$rss_settings['Category domain'].'">'.$rss_settings['Category'].'</category>'.$f_lf;
	elseif (!empty($rss_settings['Category'])) $rss_output.='<category>'.f_sth($rss_settings['Category']).'</category>'.$f_lf;	
	if(!empty($rss_settings['TTL']) && $rss_settings['TTL']!=0) $rss_output.='<ttl>'.$rss_settings['TTL'].'</ttl>'.$f_lf;
	if(!empty($rss_settings['Cloud domain'])) 
	{ 						
		$rss_output.='<cloud domain="'.$rss_settings['Cloud domain'].'" port="'.$rss_settings['Cloud port'].'" path="'.$rss_settings['Cloud path'].'" registerProcedure="'.$rss_settings['Cloud reg proc'].'" protocol="'.$rss_settings['Cloud protocol'].'"/>'.$f_lf;
	}
	if(!empty($rss_settings['Image'])) $rss_output.='<image>'.$rss_settings['Image'].'</image>'.$f_lf;
	if(!empty($rss_settings['Rating'])) $rss_output.='<rating>'.$rss_settings['Rating'].'</rating>'.$f_lf; 
	if(!empty($rss_settings['Text input title'])) 
	{ 
		$rss_output.='<textInput title="'.$rss_settings['Text input title'].' " description="'.$rss_settings['Text input description']
			.'" name="'.$rss_settings['Text input name'].'" link="'.$rss_settings['Text input link'].'"></textInput>'.$f_lf;
	}
	if(!empty($rss_settings['Skip hours'])) $rss_output.='<skipHours>'.$rss_settings['Skip hours'].'</skipHours>'.$f_lf; 
	if(!empty($rss_settings['Skip days']))  $rss_output.='<skipDays>'.$rss_settings['Skip days'].'</skipDays>'.$f_lf; 

	return $rss_output;
}

# builds page navigation ( 1, 2, 3..) when records exceed certain max limit
function f_page_navigation($num_records, $page_url, $max, $page=1, $of_label='of', $style="class='rvts12'", $labels=array('first'=>'first', 'prev'=>'prev', 'next'=>'next', 'last'=>'last')) 
{	
	$output='<table width="100%"><tr>';
	if($max>0) 
	{ 
		if($num_records>$max)
		{
			$output.='<td style="text-align:left">';
			$n_pages=($num_records%$max==0? $num_records/$max: ceil($num_records/$max)); settype($n_pages, "integer");

			if($page>1)	$output.='<a '.$style.' href="'.$page_url.'&amp;page=1">['.strtoupper($labels['first']).']</a>&nbsp;&nbsp;';
			if(($page-1)>0)	$output.='<a '.$style.' href="'.$page_url.'&amp;page='.($page-1).'">['.strtoupper($labels['prev']).']</a>&nbsp;&nbsp;';	
			
			if($page>2 && $num_records>$max*$max) $output.='<span class="rvts8">... </span>';

			if($num_records>$max*$max) 
			{
				if($page==2) $st=$page-1;
				elseif($page>2)	$st=$page-2;
				else $st=$page;
			}
			else $st=1;

			for($i=$st;$i<=($num_records>$max*$max?($st+5):$n_pages);$i++) 
			{
				if($i==$page)	$output.='<span class="rvts8">['.$i.']</span>';
				elseif($i<=$n_pages) $output.=' <a '.$style.' href="'.$page_url.'&amp;page='.$i.'">'.$i.'</a> ';
			} 
			if($num_records>$max*$max && $page<$n_pages) $output.='<span class="rvts8"> ...</span>'; 
			if($page<$n_pages)	$output.='&nbsp;&nbsp;<a '.$style.' href="'.$page_url.'&amp;page='.($page+1).'">['.strtoupper($labels['next']).']</a>';
			if($page!=$n_pages) $output.='&nbsp;&nbsp;<a '.$style.' href="'.$page_url.'&amp;page='.($n_pages).'">['.strtoupper($labels['last']).']</a>';

			$output.='</td>';
		}
		if($num_records>0) {$output.='<td style="text-align:right"><span class="rvts8">'.(($page-1)*$max+1).' - '
			.($max*$page>$num_records? $num_records: $max*$page).' '.$of_label.' '.$num_records.'</span></td>';}			
	}
	else $output.='<td style="text-align:right"><span class="rvts8">1 - '.$num_records.' '.$of_label.' '.$num_records.'</span></td>';
	$output.='</tr></table>';
	return $output;
}

function f_build_input($name,$value,$style='',$max_len='',$type='text',$misc='')
{
	global $f_ct;
	$output='<input class="input1" type="'.$type.'" name="'.$name.'" value="'.$value.'" ';
	if(!empty($style)) $output.='style="'.$style.'" ';
	if(!empty($max_len)) $output.='maxlength="'.$max_len.'" ';
	if(!empty($misc)) $output.=$misc.' ';
	$output.=$f_ct;
	return $output;
}

function f_build_select($name,&$data,$selected,$style='',$mode='key',$jstring='') 
{
	$r='';
	if(is_array($data) && !empty($data)) 
	{
		$r='<select class="input1" '.$jstring.' '.$style.' id="'.$name.'" name="'.$name."\">\n";
		foreach($data as $k=>$v) 
		{
			$k=($mode=='value'?$v:$k); 
			$r.='<option value="'.$k.'"';
			if($k==$selected) $r.=' selected="selected"';
			$r.=">".$v."</option>\n";
		}
		$r.="</select>";
	}
	return $r;
}

$f_fmt_caption='<span class="rvts8" style="font-size:10px;font-weight:bolder;line-height:16px;">%s</span>';
$f_fmt_span8='<span class="rvts8">%s</span>';
$f_fmt_span8em='<span class="rvts8"><em style="color:red;">%s</em></span>';
$f_fmt_span8em_br=$f_br.$f_br.$f_fmt_span8em;;
$f_fmt_star='<em style="color:red;">*</em>';
$f_fmt_hidden='<input type="hidden" name="%s" value="%s">';
$f_fmt_a='<a class="rvts12" href="%s">%s</a>';
$f_open_table_tag='<table cellspacing="2" cellpadding="4" align="center">';

function f_build_tag_cloud($script_path,$all_records,$view_all_label='[view all tags]',$show_all=false)
{
 $output=''; $append_link_to_full='';
 $tags_list=array();
 $max_font_size=200; // max font size in %
 $min_font_size=80; // min font size in %
 $max_tags=50;

 foreach($all_records as $k=>$v) 
 { 
  $tags_per_record=explode(',',(urldecode($v['Keywords'])));
	foreach($tags_per_record as $kk=>$tag) 
	{$tr_tag=trim($tag); if($tr_tag!=='' && array_key_exists($tr_tag, $tags_list)) $tags_list[$tr_tag]=$tags_list[$tr_tag]+1; else $tags_list[$tr_tag]=1; }
 }
 if(!empty($tags_list))
 {		
	if((count($tags_list)>$max_tags))
	{ 	
		arsort($tags_list);
		$tags_count=0; $new_tags_list=array();
    
		foreach($tags_list as $k=>$v)
		{
			$new_tags_list[$k]=$v;
			$tags_count++;
			if($max_tags<$tags_count)break;
		}
		$tags_list=$new_tags_list;
	} 
	$max_freq=max(array_values($tags_list));
	$min_freq=min(array_values($tags_list));
	$diff=$max_freq-$min_freq;
	if($diff==0) $diff=1;
	ksort($tags_list);

	$step=($max_font_size-$min_font_size)/$diff;

	$output='';
	foreach($tags_list as $k=>$v)
	{
		if($k!=='')
		{
			$size=round($min_font_size + (($v - $min_freq) * $step));
			$uns=urlencode(stripslashes(urldecode($k)));
			$output.='<li style="display:inline;"><a href="'.$script_path."tag=".urlencode($k).'" style="white-space:nowrap;margin-right:8px;font-size:'.$size.'%;">'.stripslashes($k).'</a> </li>';
    }
	}
	$output.=$append_link_to_full;
  } 
  return '<div><ul style="font-size:12px;list-style-type:none;padding:0;margin:0;">'.$output.'</ul></div><div style="clear:left"></div>';
}

function f_tzone_date($date, $offset='')
{
	global $f_tzone_offset;

	if(empty($offset) || !empty($f_tzone_offset)) $offset=$f_tzone_offset;
	$fixed_date=$date;
	if(!empty($offset)) $fixed_date=$date+$offset*60*60;
	return $fixed_date;
}

function f_format_date($timestamp,$params,$month_name,$day_name,$mode) # mode --> short, long
{	
	$res='';
	$ts=f_tzone_date($timestamp);
	if(!empty($params))
	{
		$params=str_replace(array('dddd','ddd','dd','d','mmmm','mmm','mm','m','yyyy','yy'), array('XX3','XX4','d','j','XX2','XX1','m','n','Y','y'),$params);
		$res=date("$params",$ts);
		$res=str_replace('XX1',f_my_substr($month_name[date('n',$ts)-1],0,3),$res);
		$res=str_replace('XX2',$month_name[date('n',$ts)-1],$res);
		$res=str_replace('XX4',f_my_substr($day_name[date('w',$ts)],0,3),$res);
		$res=str_replace('XX3',$day_name[date('w',$ts)],$res);	
	}
	else $res=($mode=='short')?$month_name[date('n', $ts)-1].date(', Y', $ts):$month_name[date('n', $ts)-1].date(' d, Y', $ts);
	return $res;
}

function f_format_time($timestamp,$time_format,$mode='short') # mode --> short, long
{	
	$ts=f_tzone_date($timestamp);
	$res=($mode=='short')?($time_format==12? date(' g:i A',$ts): date(' G:i',$ts)):($time_format==12? date(' d, Y g:i A',$ts): date(' d, Y G:i',$ts));
	return $res;
}

function f_checksourcepage($data,$id)
{
  $fname='';
  if(strpos($data[1],'http:')===false && strpos($data[1],'https:')===false)
  { 
    $sub_pref='';	
    if(($data[15]=='0') && ($data[3]=='1'))	$sub_pref='SUB_';  // FRAMES and SUBPAGE
    if(in_array($data[4],array('136','137','138','143','144','20'))) //Special pages
    {
		  $f_dir=(strpos($data[1],'../')===false)?'':'../'.f_GFS($data[1],'../','/').'/';													
		  $fname=$f_dir.$sub_pref.$id.($data[6]=='TRUE'? '.php': '.html');
    }			
    elseif(in_array($data[4],array('21','130','140','18')))    //shop, lister and request pages
    { 
      $f_dir=(strpos($data[1],'../')===false)?'':'../'.f_GFS($data[1],'../','/').'/';
      $fname=$f_dir.$sub_pref.($data[4]=='18'? ($id+1):$id).'.html';								
    }
    elseif($data[6]=='FALSE' && $data[4]=='0' || strpos($data[1],'.html')!==false) $fname=$data[1];  //normal page
  }
  return $fname; 
}

function f_define_source_page($root='../') 
{
	global $f_sitemap_fname,$f_template_source,$f_max_chars;
	
	$result='';
	$f_template_source=$root.$f_template_source;
	
	if(file_exists($f_template_source)) $result=$f_template_source;
	elseif(file_exists($root.$f_sitemap_fname) && filesize($root.$f_sitemap_fname)>0) 
	{
		if(isset($_REQUEST['id'])) $id=$_REQUEST['id'];
		$fp=fopen($root.$f_sitemap_fname,'r');
		if(isset($id)) //getting current page 
		{
      while(($data=fgetcsv($fp,$f_max_chars,'|'))&&($result=='')) if(isset($data[10]) && ($data[10]=='<id>'.$id)) $result=f_checksourcepage($data,$id);
    }
		if($result=='') //getting any page
		{			
			fseek($fp,0);
			while(($data=fgetcsv($fp,$f_max_chars,'|'))&&($result=='')) if(isset($data[10])) $result=f_checksourcepage($data,str_replace('<id>','',$data[10]));
		}
		fclose($fp);						
	}		 
	return $result;
} 

function f_multi_unique($array)
{
	$new=array();$new1=array();

	foreach($array as $k=>$na) $new[$k]=serialize($na);
	$uniq=array_unique($new);
	foreach($uniq as $k=>$ser) $new1[$k]=unserialize($ser);
	return $new1;
}

function f_eval_php_code($output) 
{
	$output='?'.'>'.trim($output);
	$output=preg_replace("'<\?xml(.*?)/>'si",'',$output);
	eval($output);
}

function f_obj_div_replacing($object, $replace_in)
{
	$replace_in=str_replace("<p>$object</p>", "<div>$object</div>", $replace_in);
	$replace_in=str_replace('<p class="rvps1">'.$object.'</p>','<div align="center">'.$object.'</div>', $replace_in);
	$replace_in=str_replace('<p class="rvps2">'.$object.'</p>','<div align="right">'.$object.'</div>', $replace_in);
	return $replace_in;
}

function f_obj_clearing($object, $replace_in)
{
	$replace_in=str_replace("%".$object."(</p>","%".$object."(", $replace_in);
	$replace_in=str_replace("%".$object."(</span>","%".$object."(", $replace_in);
	$replace_in=str_replace("<span>)%",")%", $replace_in);
	$replace_in=str_replace('<p class="rvps1">)%',")%", $replace_in);
	$replace_in=str_replace('<p class="rvps2">)%',")%", $replace_in);
	return $replace_in;
}

function f_p_tag_clearing($replace_in)
{
	$pos_p=strpos($replace_in,'<p');
	$pos_cp=strpos($replace_in,'</p>');
	if($pos_cp<$pos_p || $pos_cp!==false && $pos_p===false) 
	{
		$temp1=substr($replace_in,0,$pos_cp);
		$temp2=substr($replace_in,$pos_cp+4);
		$replace_in=$temp1.$temp2;
	}
	return $replace_in;
}

?>
