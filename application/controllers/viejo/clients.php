<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {
	
	
	function __construct() {
		
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
	}
	
	public function index()	{
		
		$this->load->view('header');
		$this->load->view('clients');
		$this->load->view('footer');
		
	}
	
	public function update($id=null){
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	
		$rules = array(
				array('field'   => 'client',
						'label'   => 'Client',
						'rules'   => 'required|alpha_numeric'),
				/*array('field'   => 'tasca',
						'label'   => 'Tasca',
						'rules'   => 'required|alpha_numeric'),
				array('field'   => 'treballador',
						'label'   => 'Treballador',
						'rules'   => 'required|alpha_numeric'),*/
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
			$data['treballador']['input']=array('name'=>'treballador');
				
			if($this->input->post('formulari')){
	
				$data['client']['value']=$this->form_validation->set_value('client');
				/*$data['tasca']['value']=$this->form_validation->set_value('tasca');
				$data['treballador']['value']=$this->form_validation->set_value('treballador');*/
	
			} else {
				if($id != null)
				{
					$client = new Client();
					
					$client->get_by_id($id);
					$data['client']['value']=$client->client;
					/*$data['tasca']['value']=$tasca->tasca;
					$data['tasca']['value']=$tasca->treballador;*/
					$data['id']=$id;
				}
			}
				
			$this->load->view('header');
			$this->load->view('clients',$data);
			$this->load->view('footer');
		}
		else
		{
			$client = new Client();
			
			if($id ==null){
				
				/*$tasca->client = $this->input->post('client');
				$tasca->tasca =	$this->input->post('tasca');
				$existe = $client->where('client', $client)->get();
				if(empty($existe)){
					
					$client->nom = $this->input->post('client');
					$client->save();
					$client = new Client();
				}
				$client->get_where(array('nom' => $client), $id);
				
				$tasca->id = $this->input->post('id_client');
				$tasca->save();*/
				$client->client = $this->input->post('client');
				/*$tasca->tasca =	$this->input->post('tasca');
				$tasca->treballador = $this->input->post('treballador');*/
				
				$client->save();
				
			} else {
				
				/*$tasca->get_by_id($id);
	
				$tasca->client = $this->input->post('client');
				$tasca->tasca =	$this->input->post('tasca');
				
				$client->get_where(array('nom' => $client), $id);
				
				$tasca->id = $this->input->post('id_client');
				$tasca->save();*/
				
				$client->get_by_id($id);
				$client->client = $this->input->post('client');
				/*$tasca->tasca =	$this->input->post('tasca');
				$tasca->treballador = $this->input->post('treballador');*/
				$client->save();
	
			}
			$this->load->view('header');
			$this->load->view('formsuccess');
			$this->load->view('footer');
		}
	}
	
}