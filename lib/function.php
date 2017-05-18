<?php
// ������� �������� ������ � �����������
function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    #$header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/html; charset=utf-8\r\n";
    $header .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        echo "mail send ... OK"."<br/>"; // or use booleans here
    } else {
        echo "mail send ... ERROR!";
    }
}

// ������� ��������� �������� ������
function generateString($length = 8){
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
}

 // ������� ������� ������ � ��������� � ���������
function encodestring($string){
    $table = array(
                '�' => 'A',
                '�' => 'B',
                '�' => 'V',
                '�' => 'G',
                '�' => 'D',
                '�' => 'E',
                '�' => 'Yo',
                '�' => 'Zh',
                '�' => 'Z',
                '�' => 'I',
                '�' => 'J',
                '�' => 'K',
                '�' => 'L',
                '�' => 'M',
                '�' => 'N',
                '�' => 'O',
                '�' => 'P',
                '�' => 'R',
                '�' => 'S',
                '�' => 'T',
                '�' => 'U',
                '�' => 'F',
                '�' => 'H',
                '�' => 'C',
                '�' => 'Ch',
                '�' => 'Sh',
                '�' => 'Csh',
                '�' => '',
                '�' => 'Y',
                '�' => '',
                '�' => 'E',
                '�' => 'Yu',
                '�' => 'Ya',

                '�' => 'a',
                '�' => 'b',
                '�' => 'v',
                '�' => 'g',
                '�' => 'd',
                '�' => 'e',
                '�' => 'yo',
                '�' => 'zh',
                '�' => 'z',
                '�' => 'i',
                '�' => 'j',
                '�' => 'k',
                '�' => 'l',
                '�' => 'm',
                '�' => 'n',
                '�' => 'o',
                '�' => 'p',
                '�' => 'r',
                '�' => 's',
                '�' => 't',
                '�' => 'u',
                '�' => 'f',
                '�' => 'h',
                '�' => 'c',
                '�' => 'ch',
                '�' => 'sh',
                '�' => 'csh',
                '�' => '',
                '�' => 'y',
                '�' => '',
                '�' => 'e',
                '�' => 'yu',
                '�' => 'ya',
    );

    $output = str_replace(
        array_keys($table),
        array_values($table),$string
    );

    return $output;
} 

function calculate_time_difference($timestampl, $timestamp2, $time_unit)  { 
// ���������� ������� ����� ����� ������ 
$timestampl = intval($timestampl); 
$timestamp2 = intval($timestamp2); 
if ($timestampl && $timestamp2)  {
$time_lapse = $timestamp2 - $timestampl;

$seconds_in_unit = array(
�second => 1,
�minute� => 60,
�hour� => 3600,
�day� => 86400,
�week� => 604800,
);

if ($seconds_in_unit[$time_unit])  {
return floor($time_lapse/$seconds_in_unit[$time_unit]);
}
}
return false; 
}

// ��������� �������
function generatePass(){
$chars="qazxswedcvfrtgbnhyujmkiolp1234567890";

// ���������� �������� � ������.

$max=8;

// ���������� ���������� �������� � $chars
$size=StrLen($chars)-1;

// ���������� ������ ����������, � ������� � ����� ���������� �������.

$password=null;

// ������ ������.
while($max--)
	$password.=$chars[rand(0,$size)]; 
	
return $password;
}

function className2fileName($name){
    # ������ �������� ��� �����
    $fromSimple = array('_A','_B','_C','_D','_E','_F','_G','_H',
                        '_I','_J','_K','_L','_M','_N','_O','_P',
                        '_Q','_R','_S','_T','_U','_V','_W','_X',
                        '_Y','_Z');
    $fromCompound = array('A','B','C','D','E','F','G','H',
                        'I','J','K','L','M','N','O','P',
                        'Q','R','S','T','U','V','W','X',
                        'Y','Z','1','2','3','4','5','6','7','8','9','0');
    $toSimple = array(DS.'a',DS.'b',DS.'c',DS.'d',DS.'e',DS.'f',DS.'g',DS.'h',
        DS.'i',DS.'j',DS.'k',DS.'l',DS.'m',DS.'n',DS.'o',DS.'p',DS.'q',DS.'r',
        DS.'s',DS.'t',DS.'u',DS.'v',DS.'w',DS.'x',DS.'y',DS.'z');
   $toCompound = array('_a','_b','_c','_d','_e','_f','_g','_h',
        '_i','_j','_k','_l','_m','_n','_o','_p','_q','_r',
        '_s','_t','_u','_v','_w','_x','_y','_z','_1','_2','_3','_4',
       '_5','_6','_7','_8','_9','_0'); 
   $from = array_merge($fromSimple,$fromCompound);
   $to = array_merge($toSimple,$toCompound);
   $fileName = ltrim(str_replace($from, $to, $name),'_');
   return $fileName; # ����������� ���������� ����
}

function _strtolower($string){
    $small = array('�','�','�','�','�','�','�','�','�','�','�',
                   '�','�','�','�','�','�','�','�','�','�','�',
                   '�','�','�','�','�','�','�','�','�','�','�',
                   '�', '�', '�');
    $large = array('�','�','�','�','�','�','�','�','�','�','�',
                   '�','�','�','�','�','�','�','�','�','�','�',
                   '�','�','�','�','�','�','�','�','�','�','�',
                   '�', '�', '�');
    return str_replace($large, $small, $string); 
}

function errorPath($text){
		$controllerClass = 'Controller_Pages';
        $refl = new ReflectionClass($controllerClass);
        $controller = $refl->newInstance(); # ������ ��������� ������ $refl
        $action = $refl->getMethod('error'); # � ���������� $action
                                            //���������� ������ ������ ReflectionMethod() 
        $action->invokeArgs($controller, array($text));
		exit();
}

function UpText($text){
	return str_replace("\n","<br/>",str_replace(array("\r\n", "\n\r"), "\n", str_replace(">", "&gt;", str_replace("<", "&lt;", $text))));
}

function UpText2($text){
	return str_replace("<br/>","</p><p>",$text);
}

// ����������� ����� � ������� ��� HTML
function WordInCol($text)
{
	$otvet="";
	for($i=0;$i<mb_strlen($text,"utf-8");$i++)
	{
		$otvet .=  mb_substr($text,$i,1,"utf-8")."<br/>";
	}
	return $otvet;
}

function dispatch($route){
   #echo "<pre>"; echo var_dump($route); echo "</pre>";

    if(empty($route)){
	errorPath('�������� � ����� ������� �� ����������. <br /> <br /> ��� ������ 4343 - Enter false rout.'); 
	# ���� � �������� ����� ������ false, �� ������� ��������� �
    //�������������� �������� �� ����� � ��������� ���������� ���������� ��������
        //exit('Error 404 - �������� �� ����������.');
    }

    $controllerClass = 'Controller_'.$route['controller']; # ��������� ��� �����������
                                                            //���������� �  ���������� $controllerClass

    if(class_exists($controllerClass)) # ���� ����� ��������, ������ ������ $refl
        $refl = new ReflectionClass($controllerClass);
    else
        errorPath('�������� � ����� ������� �� ����������. <br /> <br /> ��� ������ 4332 - Class not found.');

    if ($refl->hasMethod($route['action'])){ # ���� ���� ����� �������� � ������ �� ��������� ������
                                             // ����� ���������� ������ ��������
        $controller = $refl->newInstance(); # ������ ��������� ������ $refl
        $action = $refl->getMethod($route['action']); # � ���������� $action
                                                        //���������� ������ ������ ReflectionMethod()

        if($action->getNumberOfRequiredParameters() > count($route['action'])) # �������� �� ���������� ����������      
			errorPath('�������� � ����� ������� �� ����������. <br /> <br /> ��� ������ 4321 -  Erroneous number of parameters.');  # ����������� ��������
        else{
			#echo "<pre>"; echo var_dump($controller, $action); echo "</pre>";
			$action->invokeArgs($controller,$route['params']);
		} # �������� ������� ����������
    }else{
		errorPath('�������� � ����� ������� �� ����������. <br /> <br /> ��� ������ 4310 -  Error load controller and action.'); 
	}
        
}

/*
*	������� ��������� ������
*/
/*��������� �������� ���������
dev_mode, ���� �������� ����������� 1, �� ��� ������ ���������� �������
ini_set() ������������� �������� ���
display_errors = On, � ��� log_errors = Off, �.�.
���� ������� ����� �������, �� �������� 
����������� ������ �� ������ � ��������� ������� ���-������. 
���� �������� ����� ���������� (�������� dev_mode ���������� = 0),
�� ������ (�� ����������� ������, ��������������) �� �������
�� ����� � ������������� ������� ��� �������� ���-������ (� ����� ������ ��� app/temp/logs).
������ �� ��������� ��� ����� ���������� � ��������� �����, ��� ����� � ����� ����� ���������
������� ����.

� ����� app/config/app_conf.php ���������� �������� ���������
dev_mode = 0, � ��������� errors_in_files = 1. ��� ������ (�� ��������������)
������ ����� ���������� �� ��
������, � ������������ � ���-����.
*/
function errorReporting(){
if (Config::instance()->get('dev_mode') == 1) {
    ini_set('display_errors', 'On');
    ini_set('log_errors' , 'Off') ;
} else {
ini_set('display_errors', 'Off' );
ini_set('error_log' , LOGS_ROOT.DS.'errors_'.date("Y_m-d").'.log');

    if (Config::instance()->get('errors_in_files') == 1){
        ini_set('log_errors','On');
    } else {
        ini_set('log_errors', 'Off');
    }
}
}

function databaseErrorHandler($message,$info){
    if(!errorReporting()) return;
    
    echo "SQL Error: $message<br /><pre>";
    print_r($info);
    echo "</pre>";
    exit();
}