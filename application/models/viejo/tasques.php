<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
 class Tasques  extends CI_Model  {

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function inserttasques($client, $tasca){
		
		$query = $this->db->query("INSERT INTO tasca (client,tasca) VALUES ('".$client."','".$tasca."');");
		return $query;
	}
	
	function llistatFeina(){

		$query = $this->db->query("Select * FROM tasca ORDER BY id ASC");
		return $query->result();
	}
	
	function llistaUna($id){
		
		$query = $this->db->get_where('tasca', array('id' => $id));
		return $query->result();
	}
	
	function Clients(){
	
		$query = $this->db->query("Select * FROM clients ORDER BY id ASC");
		return $query->result();
	}
	
	function deletetasques($id,$nom,$tasca){
		$data = array(
			'client' => $nom,
			'tasca' => $tasca
		);
		
		$this->db->where('id', $id);
		
		if($this->db->delete('tasca', $data)) return true;
		else return false;
		
	}
	
	function updatetasques($id, $nom, $tasca){
		$data = array(
				'client' => $nom,
				'tasca' => $tasca
		);
		
		$this->db->where('id', $id);
		
		if($this->db->update('tasca', $data)) return true;
		else return false;
		
	}
	
 }
?>