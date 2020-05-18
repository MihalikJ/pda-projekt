<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}


	function ShowTeam($id=""){
		if(!empty($id)){
			$this->db->select('idteam, team.name, alias, establishment, stadium, league_idleague, city_idcity')
				->from('league')
				->join('team', 'league.idleague = team.league_idleague')
				->where('team.league_idleague',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('idteam, team.name, alias, establishment, stadium, league_idleague, city_idcity')
				->from('league')
				->join('team', 'league.idleague = team.league_idleague');
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
