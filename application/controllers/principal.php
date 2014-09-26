<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		//elementos que siempre se tienen que declarar
		$data['title']='lanparty - iesebre';
		//elementos que se pueden declarar opcionalmente
		// $data['css'] = array('nombre del archivo sin la terminacion ".css"','otro archivo mas');
		// $data['js'] = array('nombre del archivo sin la terminacion ".js"');
		
		$data['css'] = array('principal');
		
		$this->load->view('principal/header', $data);
		$this->load->view('principal/home');
		$this->load->view('principal/footer');
		
	}
	
	public function perfil($nickname){
		//elementos que siempre se tienen que declarar
		$data['title']='lanparty - iesebre - perfil de ' . $nickname;
		//elementos que se pueden declarar opcionalmente
		// $data['css'] = array('nombre del archivo sin la terminacion ".css"','otro archivo mas');
		// $data['js'] = array('nombre del archivo sin la terminacion ".js"');
		
		$data['css'] = array('principal');
		
		
		
		
		$this->load->view('principal/header', $data);
		$this->load->view('principal/home');
		$this->load->view('principal/footer');
	
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */