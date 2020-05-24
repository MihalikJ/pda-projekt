<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Multigrid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('templates/header');
		$this->load->view('multigrid.php',(array)$output);
		$this->load->view('templates/footer');
	}


	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}




	function multigrids()
	{
		$this->config->load('grocery_crud');
		$this->config->set_item('grocery_crud_dialog_forms',true);
		$this->config->set_item('grocery_crud_default_per_page',10);

		$output1 = $this->countryTable();

		$output2 = $this->leagueTable();

		$output3 = $this->teamTable();

		$output4 = $this->cityTable();

		$output5 = $this->cityMatches();

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files + $output4->js_files + $output5->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files + $output4->css_files + $output5->css_files;
		$output = "<h1>Table Country</h1>".$output1->output."<h1>Table League</h1>".$output2->output."<h1>Table Team</h1>".$output3->output."<h1>Table City</h1>".$output4->output."<h1>Table Matches</h1>".$output5->output;

		$this->_example_output((object)array(
			'js_files' => $js_files,
			'css_files' => $css_files,
			'output'	=> $output
		));
	}

	public function countryTable()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('country');
		$crud->set_subject('Country');
		$crud->required_fields('country','capital_city');
		$crud->set_relation('capital_city_id','city','city');
		$crud->display_as('capital_city_id','Capital city');
		$crud->unset_columns('capital_city_id');

		$crud->set_field_upload('flag','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function teamTable()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('team');
		$crud->set_relation('league_idleague','league','name');
		$crud->display_as('league_idleague','League');
		$crud->set_relation('city_idcity','city','city');
		$crud->display_as('city_idcity','City');
		//$crud->display_as('officeCode','Office City');
		$crud->set_subject('Team');

		$crud->required_fields('name','alias','establishment','stadium','league_idleague','city_idcity');

		$crud->set_field_upload('logo','assets/uploads/files');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function leagueTable()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_relation('country_idcountry','country','{country}');
		$crud->display_as('country_idcountry','Country');
		$crud->set_table('league');
		$crud->set_subject('league');
		$crud->required_fields('name','country_idcountry');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function cityTable()
	{
		$crud = new grocery_CRUD();

		$crud->set_theme('tablestrap');
		$crud->set_table('city');
		$crud->set_subject('city');
		$crud->set_relation('country_idcountry','country','country');
		$crud->display_as('country_idcountry','Country');
		$crud->required_fields('city','country_idcountry');

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}

	public function cityMatches(){

		$crud = new grocery_CRUD();
		//$crud->set_table_title('Teams');

		$crud->set_theme('tablestrap');
		$crud->set_table('match');
		$crud->set_relation('home_team_id','team','name');
		$crud->display_as('home_team_id','Home Team');
		$crud->set_relation('away_team_id','team','name');
		$crud->display_as('away_team_id','Away Team');
		//$crud->display_as('officeCode','Office City');

		$crud->required_fields('home_team_id','away_team_id','result','attendance');

		//$crud->set_field_upload('logo','assets/uploads/files');
		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}

	}


}
