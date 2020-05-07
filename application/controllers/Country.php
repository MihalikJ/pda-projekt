<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		//totoooooo
		$this->load->model('Country_model');
	}

	public function index(){
		$data = array();

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['country'] = $this->Country_model->ShowCountries();
		//???????
		$data['nazov'] = 'Zoznam študentov';
		//nahratie zoznamu studentov
		$this->load->view('templates/header', $data);
		$this->load->view('studenti/index', $data);
		$this->load->view('templates/footer');
	}

	// pridanie zaznamu o studentovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('country', 'Pole priezvisko', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'country' => $this->input->post('country')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Studenti_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o študentovi bol úspešne vložený');
					redirect('/country');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať študenta';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('country/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Country_model->ShowCountries($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('country', 'Zadajte meno', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'country' => $this->input->post('country')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Country_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o študentovi bol aktualizovaný.');
					redirect('/country');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}

		//$data['users'] = $this->Temperatures_model->get_users_dropdown();
		//	$data['users_selected'] = $postData['user'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('country/add-edit', $data);
		$this->load->view('templates/footer');
	}


	// Zobrazenie detailu o studentovi
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['country'] = $this->Country_model->ShowCountries($id);
			//$data['title'] = $data['country']. ' ' . $data['studenti']['meno'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('country/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/country');
		}
	}

	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Country_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/country');
	}
}
