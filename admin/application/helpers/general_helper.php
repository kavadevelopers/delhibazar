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
?>