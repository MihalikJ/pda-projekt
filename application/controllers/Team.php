<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Team_model');
	}
	public function index(){
		$data = array();
		$data['title'] = 'Teams';

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		//$data['znamky'] = $this->Znamky_model->ZobrazZnamky();
		$data['team'] = $this->Team_model->ShowTeam();
		$data['nazov'] = 'Zoznam známok';
		//nahratie zoznamu studentov
		$this->load->view('templates/header', $data);
		$this->load->view('team/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o znamke
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			//$data['znamky'] = $this->Znamky_model->ZobrazZnamky($id);
			$data['team'] = $this->Team_model->ShowTeam($id);
			$data['title'] = 'Team details';

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('team/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/team');
		}
	}

	// pridanie zaznamu o znamke
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			//$this->form_validation->set_rules('znamka', 'Pole znamka', 'required');
			//$this->form_validation->set_rules('datum', 'Pole datum', 'required');
			$this->form_validation->set_rules('name', 'Pole name', 'required');
			$this->form_validation->set_rules('alias', 'Pole alias', 'required');
			$this->form_validation->set_rules('establishment', 'Pole establishment', 'required');
			$this->form_validation->set_rules('stadium', 'Pole stadium', 'required');
			$this->form_validation->set_rules('league_idleague', 'Pole league', 'required');
			$this->form_validation->set_rules('city_idcity', 'Pole city', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				//'znamka' => $this->input->post('znamka'),
				//'datum' => $this->input->post('datum'),
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'establishment' => $this->input->post('establishment'),
				'stadium' => $this->input->post('stadium'),
				'league_idleague' => $this->input->post('league_idleague'),
				'city_idcity' => $this->input->post('city_idcity'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Team_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'League record successfully inserted.');
					redirect('/team');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['league'] = $this->Team_model->NaplnDropdownLeague();
		$data['vybrana_liga'] = '';
		$data['city'] = $this->Team_model->NaplnDropdownCity();
		$data['vybrane_mesto'] = '';
		$data['post'] = $postData;
		$data['title'] = 'Add new league';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('team/add-edit-correct', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o znamke
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		//$postData = $this->Znamky_model->ZobrazZnamky($id);
		$postData = $this->League_model->ShowLeague($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('name', 'Pole name', 'required');
			$this->form_validation->set_rules('alias', 'Pole alias', 'required');
			$this->form_validation->set_rules('establishment', 'Pole establishment', 'required');
			$this->form_validation->set_rules('stadium', 'Pole stadium', 'required');
			$this->form_validation->set_rules('league_idleague', 'Pole league', 'required');
			$this->form_validation->set_rules('city_idcity', 'Pole city', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'name' => $this->input->post('name'),
				'alias' => $this->input->post('alias'),
				'establishment' => $this->input->post('establishment'),
				'stadium' => $this->input->post('stadium'),
				'league_idleague' => $this->input->post('league_idleague'),
				'city_idcity' => $this->input->post('city_idcity'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->League_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'League record was updated.');
					redirect('/team');
				}else{
					$data['error_msg'] = 'Oooopsie.';
				}
			}
		}

		$data['league'] = $this->Team_model->NaplnDropdownLeague();
		$data['vybrana_liga'] = $postData['league_idleague'];
		$data['city'] = $this->Team_model->NaplnDropdownCity();
		$data['vybrane_mesto'] = $postData['city_idcity'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('team/add-edit-correct', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o znamke
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Team_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'League record was deleted.');
			}else{
				$this->session->set_userdata('error_msg', 'The record could not be deleted.');
			}
		}

		redirect('/team');
	}
}

