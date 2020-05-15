<?php defined('BASEPATH') OR exit('No direct script access allowed');

class League_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}


	function ShowLeague($id=""){
		if(!empty($id)){
			$this->db->select('idleague, name, country, country_idcountry')
				->from('country')
				->join('league', 'country.idcountry = league.country_idcountry')
				->where('league.idleague',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('idleague, name, country, country_idcountry')
				->from('country')
				->join('league', 'country.idcountry = league.country_idcountry');
			$query = $this->db->get();
			return $query->result_array();
		}

	}

	//  naplnenie selectu z tabulky studenti
	public function NaplnDropdownCountry($idcountry = ""){
		$this->db->order_by('country')
			->select('idcountry, country')
			->from('country');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->idcountry] = $dropdown->country;
			}
			$dropdownlist[''] = 'Select a league';
			return $dropdownlist;
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('league', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('league', $data, array('idleague'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('league',array('idleague'=>$id));
		return $delete?true:false;
	}

}
