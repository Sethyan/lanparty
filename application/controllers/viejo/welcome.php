<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		$this->load->view('principal/header');
		$this->load->view('principal/home');
		$this->load->view('principal/footer');
		
	}
	
	public function llistar($id = null)
	{
		$this->load->model('tasques');
		/*
		if($id == null)
			$data['llistat'] = $this->tasques->llistatFeina();
		else
			$data['llistat'] = $this->tasques->llistaUna($id);
		*/
		
		$tasca = new Tasca();
		
		if($id != null)
			$tasca->where(array('id'=>$id));
		
		$data['llistat'] = $tasca->get();
		
		$this->load->view('header');
		$this->load->view('llista', $data);
		$this->load->view('footer');
	}
	
	public function insert(){
		$this->load->database();
		$this->load->model('tasques');
		$this->tasques->inserttasques($_POST["client"],  $_POST["tasca"]);
		echo $_POST["client"];
		echo $_POST["tasca"];
		$fecha = getdate();
		print_r($fecha);
	}
	
	public function delete($id=null){
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('tasques');
		
		if($id == null)
			$data['llistat'] = $this->tasques->llistatFeina();
		else
			$data['llistat'] = $this->tasques->llistaUna($id);
		
		$rules = array(
				'field'   => 'id',
				'label'   => 'id',
				'rules'   => 'required|numeric|integer');
		
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>');
		$this->form_validation->set_message('required', 'Requerit %s');
		$this->form_validation->set_message('integer', '%s t� que ser enter');
		$this->form_validation->set_message('numeric', '%s t� que ser un numero');
		
		if ($this->form_validation->run() == FALSE){
			$data['id']['input']=array('name'=>'id');
				
			$data['id']['value']=$this->form_validation->set_value('id');
				
			$this->load->view('header');
			$this->load->view('delete',$data);
			$this->load->view('footer');
		}else{
			
			//$this->tasques->deletetasques($id);
		
			$this->load->view('header');
			$this->load->view('formsuccess');
			$this->load->view('footer');
		}
		
	}
	
	public function update($id=null){
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('tasques');
		
		$rules = array(
			/*array('field'   => 'id',
                     'label'   => 'id',
                     'rules'   => 'required|numeric|integer'),*/
			array('field'   => 'client',
					'label'   => 'Client',
					'rules'   => 'required|alpha_numeric'),
			array('field'   => 'tasca',
					'label'   => 'Tasca',
					'rules'   => 'required|alpha_numeric'),
		);
		
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>');
		$this->form_validation->set_message('required', 'Requerit %s');
		$this->form_validation->set_message('alpha_numeric', '%s pel que sigue alfanumeric');
		$this->form_validation->set_message('valid_email', '%s pel que sigue un email');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['client']['input']=array('name'=>'client');
			$data['tasca']['input']=array('name'=>'tasca');
			
			if($this->input->post('formulari')){
				
				$data['client']['value']=$this->form_validation->set_value('client');
				$data['tasca']['value']=$this->form_validation->set_value('tasca');
				
			} else {
				if($id != null)
				{
					$tasca = new Tasca();
					//$tasca = $this->tasques->llistaUna($id);
					$tasca->get_by_id($id);
					$data['client']['value']=$tasca->client;
					$data['tasca']['value']=$tasca->tasca;
					$data['id']=$id;
				}
			}
			
			$this->load->view('header');
			$this->load->view('update',$data);
			$this->load->view('footer');
		}
		else
		{
			$tasca = new Tasca();
			
			if($id ==null){
				
				$tasca->client = $this->input->post('client');
				$tasca->tasca =	$this->input->post('tasca');
				
				$tasca->save();
				
				//$this->tasques->inserttasques($this->input->post('client'), $this->input->post('tasca'));
				
			} else {
				
				$tasca->get_by_id($id);
				
				$tasca->client = $this->input->post('client');
				$tasca->tasca =	$this->input->post('tasca');
				
				$tasca->save();
				//$this->tasques->updatetasques($id,$this->input->post('client'), $this->input->post('tasca'));
				
			}
			$this->load->view('header');
			$this->load->view('formsuccess');
			$this->load->view('footer');
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */