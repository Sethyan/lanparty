<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Treballadors extends CI_Controller {
	
	
	function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}

	public function index()	{
		
		$this->load->view('header');
		$this->load->view('treballadors');
		$this->load->view('footer');
		
	}
	
	public function update($id=null){
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	
		$rules = array(
				array('field'   => 'treballadors',
						'label'   => 'Treballadors',
						'rules'   => 'required|alpha_numeric'),
				/*array('field'   => 'tasca',
						'label'   => 'Tasca',
						'rules'   => 'required|integer|numeric'),*/
		);
	
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>');
		$this->form_validation->set_message('required', 'Requerit %s');
		$this->form_validation->set_message('alpha_numeric', '%s pel que sigue alfanumeric');
		/*$this->form_validation->set_message('integer', '%s tŽ que ser un numero enter');
		$this->form_validation->set_message('numeric', '%s tŽ que ser un numero');*/
	
		if ($this->form_validation->run() == FALSE)	{
			
			$data['treballador']['input']=array('name'=>'treballador');
				
			if($this->input->post('formulari')){
	
				$data['treballador']['value']=$this->form_validation->set_value('treballador');
	
			} else {
				if($id != null)
				{
					$treball = new Treballador();
					
					$treball->get_by_id($id);
					$data['treballador']['value']=$treball->nom;
					$data['id']=$id;
				}
			}
				
			$this->load->view('header');
			$this->load->view('treballadors',$data);
			$this->load->view('footer');
		}else{
			$treball = new Treballador();
			
			if($id == null){
	
				$treball->nom = $this->input->post('treballador');
				$treball->save();
	
			} else {
	
				$treball->get_by_id($id);
	
				$treball->nom = $this->input->post('treballador');
				$treball->save();
			}
			
			
			$this->load->view('header');
			$this->load->view('formsuccess');
			$this->load->view('footer');
		}
	}
	
	
}