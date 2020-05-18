<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}


	function ShowTeam($id=""){
		if(!empty($id)){
			$this->db->select('idteam, team.name AS tname, alias, establishment, stadium, league.name AS lname, league_idleague, city, city_idcity')
				->from('team')
				->join('city', 'team.city_idcity = city.idcity')
				->join('league', 'league_idleague = league.idleague')
				->where('team.idteam',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('idteam, team.name AS tname, alias, establishment, stadium, league.name AS lname, league_idleague, city, city_idcity')
				->from('team')
				->join('city', 'team.city_idcity = city.idcity')
				->join('league', 'league_idleague = league.idleague');
			$query = $this->db->get();
			return $query->result_array();
		}

	}

	//  naplnenie selectu z tabulky studenti
	public function NaplnDropdownLeague($idleague = ""){
		$this->db->order_by('name')
			->select('idleague, name')
			->from('league');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->idleague] = $dropdown->name;
			}
			$dropdownlist[''] = 'Select a league';
			return $dropdownlist;
		}
	}

	public function NaplnDropdownCity($idcity = ""){
		$this->db->order_by('city')
			->select('idcity, city')
			->from('city');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->idcity] = $dropdown->city;
			}
			$dropdownlist[''] = 'Select a city';
			return $dropdownlist;
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('team', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('team', $data, array('idteam'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('team',array('idteam'=>$id));
		return $delete?true:false;
	}

}
