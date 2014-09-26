<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intranet extends CI_Controller {
	
	
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
			$uri = uri_string();
			for($i=0;$i<strlen($uri);$i++)
				if($uri[$i] == '/')
						$uri[$i] = '_';
						redirect('/login/' . $uri);
		}
	}

	public function index($pag=null)
	{
		//elementos que siempre se tienen que declarar
		$data['title']='lanparty - iesebre - intranet';
		
		//elementos que se pueden declarar opcionalmente
		// $data['css'] = array('nombre del archivo sin la terminacion ".css"','otro archivo mas');
		// $data['js'] = array('nombre del archivo sin la terminacion ".js"');
		
		$data['css'] = array('intranet');
		
		$this->load->view('intranet/header', $data);
		$this->load->view('intranet/home');
		$this->load->view('intranet/footer');
		
	}
}

/* End of file intranet.php */
/* Location: ./application/controllers/intranet.php */