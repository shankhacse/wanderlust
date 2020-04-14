<?php
/**
** Site SEO helper for all Site SEO related data
**/

function getpageTitle($page_id){
	$CI =& get_instance();
	$CI->load->model('site_seo/Site_seo_model');
	return $result = $CI->Site_seo_model->getPagetitle($page_id);
}

function getmetaTitle($page_id){
	$CI =& get_instance();
	$CI->load->model('site_seo/Site_seo_model');
	return $result = $CI->Site_seo_model->getMetatitle($page_id);
}

function getmetaKeyword($page_id){
	$CI =& get_instance();
	$CI->load->model('site_seo/Site_seo_model');
	return $result = $CI->Site_seo_model->getMetakeyword($page_id);
}

function getmetaDesccription($page_id){
	$CI =& get_instance();
	$CI->load->model('site_seo/Site_seo_model');
	return $result = $CI->Site_seo_model->getMetadesccription($page_id);
}

function getogImage($page_id){
	$CI =& get_instance();
	$CI->load->model('site_seo/Site_seo_model');
	return $result = $CI->Site_seo_model->getOgimage($page_id);
}