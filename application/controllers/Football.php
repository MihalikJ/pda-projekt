<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Football extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('football.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}


	public function showTeam()
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

			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function showCountry()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('tablestrap');
			$crud->set_table('country');
			$crud->columns('country');
			$crud->set_subject('country');
			//$crud->set_relation('salesRepEmployeeNumber','employees','lastName');

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function showLeague()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('tablestrap');
			$crud->set_relation('country_idcountry','country','{country}');
			$crud->display_as('country_idcountry','Country');
			$crud->set_table('league');
			$crud->set_subject('league');
			//$crud->unset_add();
			//$crud->unset_delete();

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function showCity()
	{
			$crud = new grocery_CRUD();

			$crud->set_theme('tablestrap');
			$crud->set_table('city');
			$crud->set_subject('city');
			$crud->set_relation('country_idcountry','country','country');
			$crud->display_as('country_idcountry','Country');
			//moze sa zist niekedy -funkcia pod tym
			//$crud->callback_column('buyPrice',array($this,'valueToEuro'));

			$output = $crud->render();

			$this->_example_output($output);
	}

	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
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

		$js_files = $output1->js_files + $output2->js_files + $output3->js_files + $output4->js_files;
		$css_files = $output1->css_files + $output2->css_files + $output3->css_files + $output4->css_files;
		$output = "<h1>Table Country</h1>".$output1->output."<h1>Table League</h1>".$output2->output."<h1>Table Team</h1>".$output3->output."<h1>Table City</h1>".$output4->output;

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

		$crud->set_field_upload('file_url','assets/uploads/files');

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

		$crud->set_crud_url_path(site_url(strtolower(__CLASS__."/".__FUNCTION__)),site_url(strtolower(__CLASS__."/multigrids")));

		$output = $crud->render();

		if($crud->getState() != 'list') {
			$this->_example_output($output);
		} else {
			return $output;
		}
	}


}
