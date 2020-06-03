<?php

class Template extends MX_Controller
{
	public function __construct()
	{
		parent ::__construct();
        date_default_timezone_set('Asia/Kolkata'); 
		$this->load->model('Template_model','_templates',TRUE);
		$this->load->model('Web_model','_webtemplates',TRUE);
		$this->load->model('adminportal/Menu_model','_menuModel',TRUE);
		$this->load->model('Auth_model', '_authModel',TRUE);
	}
	public function web_template($data = NULL)
	{
		$data['menufor'] = "DIST";
		$data["webmenu"] =  $this->_templates->getWebMenusByLang('web_menu_master',"DIST");
		$data['headerinfo'] = $this->_webtemplates->getHeaderHomePageSetting();
	 	$this->load->view('template/web_template', $data);
	}
	
	public function admin_template($data = NULL)
	{
		if($this->_authModel->is_logged_in()) {
			$loogedinuser = $this->_authModel->logged_user_info();
			if($loogedinuser['user_role'] == "developer") {
				$data['usermenus'] = $this->_menuModel->getDeveloperMenu();
			}
			else {
				$data['usermenus'] = $this->_menuModel->getDashboardMenuForUsers($loogedinuser['userid']);
			}
			//pre($data['usermenus']);exit;
			$this->load->view('template/admin_template', $data);
		}
		else{
            redirect_login();
        }
	}

	public function block_template($data = NULL)
	{

		$block_slug_url = $this->uri->segment(2);
		$data['selected_block'] = $block_slug_url;
		$data['menufor'] = "BLOCK";
		$data["webmenu"] =  $this->_templates->getWebMenusByLang('web_menu_master',"BLOCK");
		$data["block_detail"] =  $this->_commonQueryModel->getSingleRowByWhereCls('blocks',$where=["block_slug_url"=>$block_slug_url]);
		$data["block_name"] = $data["block_detail"]->block_name;

		$this->load->view('template/block_template', $data);
	}



}