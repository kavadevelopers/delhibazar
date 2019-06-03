<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function pre_print($array)
{   
    echo count($array);
    echo "<pre>";
    print_r($array);
}


function _vdatetime($datetime)
{
	return date('d-m-Y h:i A',strtotime($datetime));
}

function _now_dt()
{
	return date('Y-m-d H:i:s');
}

function cut_string($string,$length,$replace_str)
{
	if(strlen($string) > $length)
	{
		return substr($string, 0, $length).$replace_str;
	}
	else{
		return $string;
	}
}

?>