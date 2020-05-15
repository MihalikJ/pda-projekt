<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Country_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ShowCountries($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('country', array('idcountry' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('country');
			return $query->result_array();
		}

	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('country', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('country', $data, array('idcountry'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('country',array('idcountry'=>$id));
		return $delete?true:false;
	}

}
