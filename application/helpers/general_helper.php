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

function rating_dollar($rating){
	
	if($rating <= 0.5)
	{
		return  '<span></span>$$$$$';

	}
	elseif($rating > 0.5 && $rating <= 1.5)
	{
		return  '<span>$</span>$$$$';
	}
	elseif($rating > 1.5 && $rating <= 2.5)
	{
		return  '<span>$$</span>$$$';
	}
	elseif($rating > 2.5 && $rating <= 3.5)
	{
		return  '<span>$$$</span>$$';
	}
	elseif($rating > 3.5 && $rating <= 4.5)
	{
		return  '<span>$$$$</span>$';
	}
	elseif($rating > 4.5)
	{
		return  '<span>$$$$$</span>';
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

function social_icons()
{
	$CI=&get_instance();
	return $CI->db->get('social_icon')->result_array();

}

function get_setting()
{
	$CI=&get_instance();
	return $CI->db->get_where('setting',['id' => '1'])->result_array()[0];
}

/*************************************************************
					PRODUCT RATING
*************************************************************/

function product_rating_star($rating){
	
	if($rating > 0.5 && $rating <= 1.5)
	{
		return  '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	}
	elseif($rating > 1.5 && $rating <= 2.5)
	{
		return  '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	}
	elseif($rating > 2.5 && $rating <= 3.5)
	{
		return  '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>';
	}
	elseif($rating > 3.5 && $rating <= 4.5)
	{
		return  '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>';
	}
	elseif($rating > 4.5)
	{
		return  '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
	}
}


function _get_shop_img($name)
{
    $CI     =&  get_instance();
    if($name == '')
    {
         return $CI->config->config['admin_url']."uploads/no-image.png";
    }
    else
    {
        $url    =   $CI->config->config['admin_url']."uploads/shop/".$name;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if(curl_exec($ch)!==FALSE)
        {
            return $CI->config->config['admin_url']."uploads/shop/".$name;
        }
        else
        {
            return $CI->config->config['admin_url']."uploads/no-image.png";
        }
    }
    

}

function get_product_images($product_id)
{
	$CI     =&  get_instance();
	$image =  $CI->db->get_where('product_images',['p_id' => $product_id])->result_array();
    $url = [];
    if($image)
    {
        foreach ($image as $key => $value) {
            $url[] = $CI->config->config['admin_url']."uploads/product/".$value['image'];
        }

        return $url;
    }
    else
    {
        return $url[] = $CI->config->config['admin_url']."uploads/no-image.png";
    }
}

?>