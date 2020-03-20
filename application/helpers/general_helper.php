<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function pre_print($array)
{   
    echo count($array);
    echo "<pre>";
    print_r($array);
    exit;
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

function selected_filter_listing($val){
	$CI=&get_instance();

	if($CI->session->userdata('listing_filter')){

		if($CI->session->userdata('listing_filter') == $val){
			return "selected";
		}

	}
	else{
		return "";
	}
}

function selected_filter_offers($val){
	$CI=&get_instance();

	if($CI->session->userdata('_offer_order')){

		if($CI->session->userdata('_offer_order') == $val){
			return "selected";
		}

	}
	else{
		return "";
	}
}

function selected_category_offers($val){
	$CI=&get_instance();

	if($CI->session->userdata('_offer_category')){

		if($CI->session->userdata('_offer_category') == $val){
			return "selected";
		}

	}
	else{
		return "";
	}
}

function selected_area_offers($val){
	$CI=&get_instance();

	if($CI->session->userdata('_offer_area')){

		if($CI->session->userdata('_offer_area') == $val){
			return "selected";
		}

	}
	else{
		return "";
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
    	if($name == 'no-image.png'){
			return $CI->config->config['admin_url']."uploads/no-image.png";
		}
		else{
	        $url    =   $CI->config->config['admin_url']."uploads/shop/".$name;
	        
	        if(getimagesize($url))
	        {
	            return $CI->config->config['admin_url']."uploads/shop/".$name;
	        }
	        else
	        {
	            return $CI->config->config['admin_url']."uploads/no-image.png";
	        }
	    }
    }

}

function get_product_images($product_id)
{
	$CI     =&  get_instance();
	$images =  $CI->db->get_where('product_images',['p_id' => $product_id])->result_array();
    $photos = [];
    
    foreach ($images as $key => $value) {
    	$url = $CI->config->config['admin_url']."uploads/product/".$value['image'];
    	if(getimagesize($url)){
        	$photos[] = $CI->config->config['admin_url']."uploads/product/".$value['image'];
        }else{
        	$photos[] = $CI->config->config['admin_url']."uploads/product/banner/no-image.png";
        }

    }
    
    return $photos;
}


function _product_banner($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('product',['id' => $id])->result_array()[0];
	$image = '';
	if($product['bannner'] == 'no-image.png'){
		$image = $CI->config->config['admin_url']."uploads/product/banner/no-image.png";
	}
	else{
		if($product['bannner'] == ''){
			$image = $CI->config->config['admin_url']."uploads/product/banner/no-image.png";
		}
		else{
			$url    =   $CI->config->config['admin_url']."uploads/product/banner/".$product['bannner'];
	       
	        if(getimagesize($url))
	        {
	            $image = $CI->config->config['admin_url']."uploads/product/banner/".$product['bannner'];
	        }
	        else
	        {
	            $image = $CI->config->config['admin_url']."uploads/product/banner/no-image.png";
	        }

	      
		}
	}

	return $image;
}


function SizeChart($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('product',['id' => $id])->result_array()[0];
	$image = '';
	if($product['chart'] == ''){
		$image = "";
	}
	else{
		
		$url    =   $CI->config->config['admin_url']."uploads/product/sizechart/".$product['chart'];
       
        if(getimagesize($url))
        {
            $image = $url;
        }
        else
        {
            $image = "";
        }    
		
	}

	return $image;
}



function get_category_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('main_category',['id' => $id])->result_array()[0];
	$image = '';
	if($product['banner'] == 'no-image.png'){
		$image = $CI->config->config['admin_url']."uploads/category/no-image.png";
	}
	else{
		$url    =   $CI->config->config['admin_url']."uploads/category/".$product['banner'];
		if($product['banner'] == ''){
			$image = $CI->config->config['admin_url']."uploads/category/no-image.png";
		}
		else if(getimagesize($url)){
			$image = $url;
		}
		else{
			$image = $CI->config->config['admin_url']."uploads/category/no-image.png";
		}
	}

	return $image;
}

function get_subcategory_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('category',['id' => $id])->result_array()[0];
	$image = '';
	if($product['banner'] == 'no-image.png'){
		$image = $CI->config->config['admin_url']."uploads/category/no-image.png";
	}
	else{
		$url    =   $CI->config->config['admin_url']."uploads/category/".$product['banner'];
		if($product['banner'] == ''){
			$image = $CI->config->config['admin_url']."uploads/category/no-image.png";
		}
		else if(getimagesize($url)){
			$image = $url;
		}
		else{
			$image = $CI->config->config['admin_url']."uploads/category/no-image.png";
		}
	}

	return $image;
}

function get_home_banners(){
	$CI=&get_instance();
	$CI->db->order_by('order','ASC');
	$banners = $CI->db->get_where('home_banner')->result_array();
	$image = [];
	foreach ($banners as $key => $value) {
		$url    =   $CI->config->config['admin_url']."uploads/home_banners/".$value['name'];

		if(getimagesize($url)){
			$image[] = $url;
		}
	}


	return $image;
}

function get_offer_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('offers',['id' => $id])->result_array()[0];
	$image = '';
	if($product['image'] == 'no-image.png'){
		$image = $CI->config->config['admin_url']."uploads/offer/no-image.png";
	}
	else{
		$url    =   $CI->config->config['admin_url']."uploads/offer/".$product['image'];
		if($product['image'] == ''){
			$image = $CI->config->config['admin_url']."uploads/offer/no-image.png";
		}
		else if(getimagesize($url)){
			$image = $url;
		}
		else{
			$image = $CI->config->config['admin_url']."uploads/offer/no-image.png";
		}
	}

	return $image;
}

function get_card_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('cards',['id' => $id])->result_array()[0];
	$image = '';
	if($product['image'] == 'no-image.png'){
		$image = $CI->config->config['admin_url']."uploads/virtual_card/no-image.png";
	}
	else{
		$url    =   $CI->config->config['admin_url']."uploads/virtual_card/".$product['image'];
		if($product['image'] == ''){
			$image = $CI->config->config['admin_url']."uploads/virtual_card/no-image.png";
		}
		else if(getimagesize($url)){
			$image = $url;
		}
		else{
			$image = $CI->config->config['admin_url']."uploads/virtual_card/no-image.png";
		}
	}

	return $image;
}

function get_apphome_banner($name){
	$CI=&get_instance();
	$image = '';
	if($name == ''){
		$image = "";
	}
	else{
		$url    =   $CI->config->config['admin_url']."uploads/app/".$name;
		if(getimagesize($url)){
			$image = $url;
		}
		else{
			$image = "";
		}
	}

	return $image;
}

function qr($id)
{
	$CI=&get_instance();
	$card = $CI->db->get_where('card_purchase',['id' => $id])->row_array();
	$CI->load->library('ciqrcode');
    $config['size']         = 256;
    $CI->ciqrcode->initialize($config);
    $params['data'] = json_encode(['card' => $card['id'],'user' => $card['user']]);
    $params['level'] = 'H';
    $params['savename'] = FCPATH.'/uploads/qr/'.$card['id'].'-'.$card['user'].'.png';
    if(!file_exists($params['savename'])){
    	$CI->ciqrcode->generate($params);
    }
    return $card['id'].'-'.$card['user'].'.png';
}

function get_validity($date,$days)
{
	
	$plus_days = strtotime(date('Y-m-d' , strtotime($date . '+ '.$days.' day')));
	$today = strtotime(date('Y-m-d'));
    if($plus_days < $today){
    	return "Expired";
    }
    else{
    	$start = strtotime(date('Y-m-d'));
		$end = strtotime(date('Y-m-d' , strtotime($date . '+ '.$days.' day')));
    	return ceil(abs($end - $start) / 86400).' Days Remaining';
    }
}

function get_usage($card,$total_count)
{
	$CI=&get_instance();
	$count = $CI->db->get_where('card_usage',['card' => $card,'user' => $CI->session->userdata('id')])->num_rows();
	if($count < $total_count){
		return $total_count - $count . ' Left' ;
	}
	else{
		return "0 Left";
	}
}

function get_usage_api($card,$total_count,$user)
{
	$CI=&get_instance();
	$count = $CI->db->get_where('card_usage',['card' => $card,'user' => $user])->num_rows();
	if($count < $total_count){
		return $total_count - $count . ' Left' ;
	}
	else{
		return "0 Left";
	}
}

function get_validity2($date,$days)
{
    $plus_days = strtotime(date('Y-m-d' , strtotime($date . '+ '.$days.' day')));
	$today = strtotime(date('Y-m-d'));
    if($plus_days < $today){
    	return false;
    }
    else{
    	$start = strtotime(date('Y-m-d'));
		$end = strtotime(date('Y-m-d' , strtotime($date . '+ '.$days.' day')));
    	return true;
    }
}

function get_usage_api2($card,$total_count,$user)
{
	$CI=&get_instance();
	$count = $CI->db->get_where('card_usage',['card' => $card,'user' => $user])->num_rows();
	if($count < $total_count){
		return true;
	}
	else{
		return false;
	}
}



?>