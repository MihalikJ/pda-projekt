<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		//totoooooo
		$this->load->model('City_model');
	}


	public function index(){
		$data = array();
		$data['title'] = 'Cities';

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['city'] = $this->City_model->ShowCity();
		//???????
		$data['nazov'] = 'Zoznam študentov';
		//nahratie zoznamu studentov
		$this->load->view('templates/header', $data);
		$this->load->view('city/index', $data);
		$this->load->view('templates/footer');
	}

	// pridanie zaznamu o studentovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			//$this->form_validation->set_rules('znamka', 'Pole znamka', 'required');
			//$this->form_validation->set_rules('datum', 'Pole datum', 'required');
			$this->form_validation->set_rules('city', 'Pole predmet', 'required');
			$this->form_validation->set_rules('country_idcountry', 'Pole student', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				//'znamka' => $this->input->post('znamka'),
				//'datum' => $this->input->post('datum'),
				'city' => $this->input->post('city'),
				'country_idcountry' => $this->input->post('country_idcountry'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->City_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'City record successfully inserted.');
					redirect('/city');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['country'] = $this->City_model->NaplnDropdownCountry();
		$data['vybrana_krajina'] = '';
		$data['title'] = 'Add new city';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('city/add-edit-correct', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->City_model->ShowCity($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('city', 'Zadajte mesto', 'required');
			$this->form_validation->set_rules('country_idcountry', 'Pole student', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'city' => $this->input->post('city')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->City_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Country record was updated');
					redirect('/city');
				}else{
					$data['error_msg'] = 'Oooopsie.';
				}
			}
		}

		//$data['users'] = $this->Temperatures_model->get_users_dropdown();
		//	$data['users_selected'] = $postData['user'];
		$data['country'] = $this->City_model->NaplnDropdownCountry();
		$data['vybrana_krajina'] = $postData['country_idcountry'];
		$data['post'] = $postData;
		$data['title'] = 'Update data';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('city/add-edit-correct', $data);
		$this->load->view('templates/footer');
	}


	// Zobrazenie detailu o studentovi
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['city'] = $this->City_model->ShowCity($id);
			$data['title'] = $data['city']['city'];
			//priklad zretazenia
			//$data['title'] = $data['studenti']['priezvisko'] . ' ' . $data['studenti']['meno'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('city/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/city');
		}
	}

	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->City_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'The record was deleted.');
			}else{
				$this->session->set_userdata('error_msg', 'The record could not be deleted.');
			}
		}

		redirect('/city');
	}

}
