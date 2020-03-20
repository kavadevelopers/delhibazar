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

function _ddate($date)
{
	return date('Y-m-d' ,strtotime($date));
}

function _vdate($date)
{
	return date('d-m-Y' ,strtotime($date));
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

function _now_dt()
{
	return date('Y-m-d H:i:s');
}


function get_setting()
{
	$CI=&get_instance();
	return $CI->db->get_where('setting',['id' => '1'])->result_array()[0];
}


function _p_banner_img($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('product',['id' => $id])->result_array()[0];
	$image = '';
	if($product['bannner'] == 'no-image.png'){
		$image = "no-image.png";
	}
	else{
		if($product['bannner'] == ''){
			$image = "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/product/banner/'.$product['bannner'])){
			$image = $product['bannner'];
		}
		else{
			$image = "no-image.png";
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
		if(file_exists(FCPATH.'uploads/product/sizechart/'.$product['chart'])){
			$image = $product['chart'];
		}
		else{
			$image = "";
		}
	}

	return $image;
}


function get_product_images($id){
	$CI=&get_instance();
	$CI->db->order_by('id','ASC');
	$row_images = $CI->db->get_where('product_images',['p_id' => $id])->result_array();

	$images = [];

	foreach ($row_images as $key => $value) {
		if(file_exists(FCPATH.'uploads/product/'.$value['image'])){
			$images[] = [$value['image'],$value['id']];
		}
		else{
			$images[] = ["banner/no-image.png",$value['id']];
		}
	}

	return $images;
}


function get_category_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('main_category',['id' => $id])->result_array()[0];
	$image = '';
	if($product['banner'] == 'no-image.png'){
		$image = "no-image.png";
	}
	else{
		if($product['banner'] == ''){
			$image = "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/category/'.$product['banner'])){
			$image = $product['banner'];
		}
		else{
			$image = "no-image.png";
		}
	}

	return $image;
}

function get_subcategory_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('category',['id' => $id])->result_array()[0];
	$image = '';
	if($product['banner'] == 'no-image.png'){
		$image = "no-image.png";
	}
	else{
		if($product['banner'] == ''){
			$image = "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/category/'.$product['banner'])){
			$image = $product['banner'];
		}
		else{
			$image = "no-image.png";
		}
	}

	return $image;
}


function get_home_banners()
{
	$CI=&get_instance();
    $banners = $CI->db->order_by('order','ASC')->get_where('home_banner')->result_array();
    $images = [];
    foreach ($banners as $key => $value) {
		if(file_exists(FCPATH.'uploads/home_banners/'.$value['name'])){
			$images[] = [$value['name'],$value['id'],$value['order']];
		}
		else{
			$images[] = ["no-image.png",$value['id'],$value['order']];
		}
	}

	return $images;
}

function _s_banner_img($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('shop',['id' => $id])->result_array()[0];
	$image = '';
	if($product['photo'] == 'no-image.png'){
		$image = "no-image.png";
	}
	else{
		if($product['photo'] == ''){
			$image = "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/shop/'.$product['photo'])){
			$image = $product['photo'];
		}
		else{
			$image = "no-image.png";
		}
	}

	return $image;
}

function get_offer_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('offers',['id' => $id])->result_array()[0];
	$image = '';
	if($product['image'] == 'no-image.png'){
		$image = "no-image.png";
	}
	else{
		if($product['image'] == ''){
			$image = "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/offer/'.$product['image'])){
			$image = $product['image'];
		}
		else{
			$image = "no-image.png";
		}
	}

	return $image;
}

function get_card_image($id){
	$CI=&get_instance();
	$product = $CI->db->get_where('cards',['id' => $id])->result_array()[0];
	$image = '';
	if($product['image'] == 'no-image.png'){
		$image = "no-image.png";
	}
	else{
		if($product['image'] == ''){
			$image = "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/virtual_card/'.$product['image'])){
			$image = $product['image'];
		}
		else{
			$image = "no-image.png";
		}
	}

	return $image;
}

function beetween_boolean($from,$to)
{
	$now = date('Y-m-d');
	$now = strtotime($now);
	$DateBegin 	= strtotime($from);
	$DateEnd 	= strtotime($to);

	if (($now >= $DateBegin) && ($now <= $DateEnd)){
	    return true;
	}else{
	    return false;
	}
}

function get_app_image($name){
	$CI=&get_instance();
	
	$image = base_url('uploads/app/');
	if($name == 'no-image.png'){
		$image .= "no-image.png";
	}
	else{
		if($name == ''){
			$image .= "no-image.png";
		}
		else if(file_exists(FCPATH.'uploads/app/'.$name)){
			$image .= $name;
		}
		else{
			$image .= "no-image.png";
		}
	}

	return $image;
}


function get_user($id)
{
	$CI=&get_instance();
	return $CI->db->get_where("social_user",['id' => $id])->row_array();
}
?>