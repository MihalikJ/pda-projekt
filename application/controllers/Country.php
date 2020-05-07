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
		$this->load->view('country/index', $data);
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
				$insert = $this->Country_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Country record successfully inserted');
					redirect('/country');
				}else{
					$data['error_msg'] = 'Oooopsie.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Add country';
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
					$this->session->set_userdata('success_msg', 'Country record was updated');
					redirect('/country');
				}else{
					$data['error_msg'] = 'Oooopsie.';
				}
			}
		}

		//$data['users'] = $this->Temperatures_model->get_users_dropdown();
		//	$data['users_selected'] = $postData['user'];
		$data['post'] = $postData;
		$data['title'] = 'Update data';
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
			$data['title'] = $data['country']['country'];
			//priklad zretazenia
			//$data['title'] = $data['studenti']['priezvisko'] . ' ' . $data['studenti']['meno'];

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
				$this->session->set_userdata('success_msg', 'The record was deleted.');
			}else{
				$this->session->set_userdata('error_msg', 'The record could not be deleted.');
			}
		}

		redirect('/country');
	}
}
