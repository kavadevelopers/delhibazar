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

function rating_dot($rating){
	switch ($rating) {
		case '1':
			return '<span></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span>';
			break;
		case '2':
			return '<span></span><span></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span>';
			break;
		case '3':
			return '<span></span><span></span><span></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span>';
			break;
		case '4':
			return '<span></span><span></span><span></span><span></span><span class="round-icon-blank"></span>';
			break;
		case '5':
			return '<span></span><span></span><span></span><span></span><span></span>';
			break;
		
		default:
			return '<span class="round-icon-blank"></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span><span class="round-icon-blank"></span>';
			break;
	}
}

function diff_date($date)
{
	$startTimeStamp = strtotime(date('Y-m-d',strtotime($date)));
	$endTimeStamp = strtotime(date('Y-m-d'));
	$timeDiff = abs($endTimeStamp - $startTimeStamp);
	$numberDays = $timeDiff/86400;
	$numberDays = intval($numberDays);
	if($numberDays == 0)
	{
		return 'Today';
	}
	else if($numberDays == 1){
		return 'Yesterday';
	}
	else{
		return 'Reviewed '.$numberDays.' days ago';
	}
}

?>