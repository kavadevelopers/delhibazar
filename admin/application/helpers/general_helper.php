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


function get_setting()
{
	$CI=&get_instance();
	return $CI->db->get_where('setting',['id' => '1'])->result_array()[0];
}
?>