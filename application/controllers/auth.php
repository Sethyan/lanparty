<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		//probar get
		//http://localhost/codeigniterhelloworld/index.php/simpatic/grettings2?nom=pepito&cognom=ricote&cognom2=lajusticia
	}
	
	public function login($pag=null){
		//elementos que siempre se tienen que declarar
		$data['title'] = 'lanparty - iesebre - login';
		
		//elementos que se pueden declarar opcionalmente
		// $data['css'] = array('nombre del archivo sin la terminacion ".css"','otro archivo mas');
		// $data['js'] = array('nombre del archivo sin la terminacion ".js"');
		
		$data['css'] = array('auth');
		
		$rules = array(
				array(
						'field'   => 'nickname',
						'label'   => 'nickname',
						'rules'   => 'required|max_length[50]|xss_clean'),
				array(
						'field'   => 'password',
						'label'   => 'password',
						'rules'   => 'required|md5')
		);
		
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>');
		//$this->form_validation->set_message('required', 'Requerit %s');
		
		if ($this->form_validation->run() == FALSE){
			
			$data['nickname']['input']=array('name'=>'nickname',
					'value'=>($this->form_validation->set_value('nickname'))? $this->form_validation->set_value('nickname') : '' ,
					'id'=>'nickname',
			);
			
			$data['password']['input']=array('name'=>'password',
					'value'=>'' ,
					'id'=>'password',
			);
			
			$data['pagina']=array('pagina' => ($this->input->post('pagina') != null)? $this->input->post('pagina') : $pag);
			
			$this->load->view('principal/header', $data);
			$this->load->view('auth/login');
			$this->load->view('principal/footer');
				
		}else{
			$user = new User();
			
			$user->where('email', $this->input->post('nickname'));
			
			$user->or_where('nickname', $this->input->post('nickname'))->get();
			
			if($user->id == '' || $user->contrasenya != $this->input->post('password')){
				$data['errorlogin'] = 'El nickname el email o la contraseña esta mal escrito o no existe';
				
				$data['nickname']['input']=array('name'=>'nickname',
						'value'=>($this->form_validation->set_value('nickname'))? $this->form_validation->set_value('nickname') : '' ,
						'id'=>'nickname',
				);
				
				$data['password']['input']=array('name'=>'password',
						'value'=>'' ,
						'id'=>'password',
				);
				
				$data['pagina']=array('pagina' => ($this->input->post('pagina') != null)? $this->input->post('pagina') : $pag);
				
				$this->load->view('principal/header', $data);
				$this->load->view('auth/login');
				$this->load->view('principal/footer');
			}else{
				
				$infouser = array(
					'nickname' => $user->nickname,
					'nombre' => $user->nombre,
					'apellidos'=> $user->apellidos,
					'email' => $user->email,
					'login' => '1',
					'active' => $user->activo
				);
				
				$this->session->set_userdata($infouser);
				
				$pag = $this->input->post('pagina');
				
				if($pag == null)
					redirect('/');
				else{
					for($i=0;$i<strlen($pag);$i++)
						if($pag[$i] == '_')
							$pag[$i] = '/';
					redirect('/' . $pag);
				}
			}
		}
	}
	
	public function salir($pag=null){
		
		$this->session->sess_destroy();
		if($pag == null)
			redirect('/');
		else{
			for($i=0;$i<strlen($pag);$i++)
				if($pag[$i] == '_')
					$pag[$i] = '/';
			redirect('/' . $pag);
		}
	}
	
	public function dni_check($str){
		$str = strtoupper($str);
		$num = 'TRWAGMYFPDXBNJZSQVHLCKE';
		
		$numero = substr($str, 0, -1);
		$letra = substr($str, -1, 1);
		
		echo $num[$numero%23] == $letra;
		
		if($num[$numero%23] == $letra){
			return true;
		}else{
			$this->form_validation->set_message('dni_check','El DNI %s introducido es incorrecto');
			return false;
		}
	}
	
	public function dni_check2($str){
		$user = new User();
	
		$user->get_by_dni($str);
	
		if($user->dni == '')
			return true;
		else{
			$this->form_validation->set_message('nickname_check','El dni %s ya esta introducido');
			return false;
		}
	}
	
	public function nickname_check($str){
		$user = new User();
		
		$user->get_by_nickname($str);
		
		if($user->nickname == '')
			return true;
		else{
			$this->form_validation->set_message('nickname_check','El nickname %s ya esta introducido');
			return false;
		}
	}

	public function email_check($str){
		$user = new User();
		
		$user->get_by_email($str);
		
		if($user->email == '')
			return true;
		else{
			$this->form_validation->set_message('email_check','El DNI %s ya esta introducido');
			return false;
		}
	}
	
	public function registrarse($pag=null){
		
		$data['title']='lanparty - iesebre - registrarse';
		
		$rules = array(
				array(
					'field'   => 'nombre',
					'label'   => 'nombre',
					'rules'   => 'required|max_length[30]|xss_clean'),
				array(
					'field'   => 'apellidos',
					'label'   => 'apellidos',
					'rules'   => 'required|max_length[70]|xss_clean'),
				array(
					'field'   => 'email',
					'label'   => 'email',
					'rules'   => 'required|min_length[6]|max_length[50]|valid_email|matches[email2]|callback_email_check|xss_clean'),
				array(
					'field'   => 'email2',
					'label'   => 'email2',
					'rules'   => 'required|min_length[6]|max_length[50]|valid_email|xss_clean'),
				array(
					'field'   => 'nickname',
					'label'   => 'nickname',
					'rules'   => 'required|max_length[30]|callback_nickname_check|xss_clean'),
				array(
					'field'   => 'dni',
					'label'   => 'dni',
					'rules'   => 'required|min_length[9]|max_length[9]|callback_dni_check|callback_dni_check2|xss_clean'),
				array(
					'field'   => 'password',
					'label'   => 'password',
					'rules'   => 'required|min_length[6]|matches[password2]|md5'),
				array(
					'field'   => 'password2',
					'label'   => 'password2',
					'rules'   => 'required|min_length[6]'),
		);
		
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>');
		//$this->form_validation->set_message('required', 'Requerit %s');
		
		if ($this->form_validation->run() == FALSE){

			$data['nombre']['input']=array('name'=>'nombre',
					'value'=>($this->form_validation->set_value('nombre'))? $this->form_validation->set_value('nombre') : '' ,
					'id'=>'nombre',
			);
			$data['apellidos']['input']=array('name'=>'apellidos',
					'value'=>($this->form_validation->set_value('apellidos'))? $this->form_validation->set_value('apellidos') : '' ,
					'id'=>'apellidos',
			);
			$data['email']['input']=array('name'=>'email',
					'value'=>($this->form_validation->set_value('email'))? $this->form_validation->set_value('email') : '' ,
					'id'=>'email',
			);
			$data['email2']['input']=array('name'=>'email2',
					'value'=>($this->form_validation->set_value('email2'))? $this->form_validation->set_value('email2') : '' ,
					'id'=>'email2',
			);
			$data['nickname']['input']=array('name'=>'nickname',
					'value'=>($this->form_validation->set_value('nickname'))? $this->form_validation->set_value('nickname') : '' ,
					'id'=>'nickname',
			);
			$data['dni']['input']=array('name'=>'dni',
					'value'=>($this->form_validation->set_value('dni'))? $this->form_validation->set_value('dni') : '' ,
					'id'=>'dni',
			);
			$data['password']['input']=array('name'=>'password',
					'value'=>'' ,
					'id'=>'password',
			);
			$data['password2']['input']=array('name'=>'password2',
					'value'=>'' ,
					'id'=>'password2',
			);
			
			$data['pagina']=array('pagina' => ($this->input->post('pagina') != null)? $this->input->post('pagina') : $pag);
			
			$this->load->view('principal/header', $data);
			$this->load->view('auth/registrarse');
			$this->load->view('principal/footer');
			
		}else{
			$user = new User();
			
			$user->nombre = $this->input->post('nombre');
			$user->apellidos = $this->input->post('apellidos');
			$user->email = $this->input->post('email');
			$user->nickname = $this->input->post('nickname');
			$user->dni = $this->input->post('dni');
			$user->contrasenya = $this->input->post('password');
			$user->active = 1;
			
			//crea perfil
			$perfil = new Perfil();
			$perfil->nickname = $this->input->post('nickname');
			$perfil->save();
			
			//carga el perfil
			$perfil = new Perfil();
			$perfil->get_by_nickname($this->input->post('nickname'));
			
			//carga grupo
			$grupo = new Grupo();
			$grupo->get_by_id('3');
			
			//guarda todo
			$user->save(array($grupo, $perfil));
			
			$perfil = new Perfil();
			//vuelve a cargar el perfil
			$perfil->get_by_nickname($this->input->post('nickname'));
			//carga el usuario
			$user = new User();
			$user->get_by_email($this->input->post('email'));
			
			$perfil->save($user);
			
			$user = new User();
			$user->get_by_email($this->input->post('email'));

			$infouser = array(
					'nickname' => $user->nickname,
					'nombre' => $user->nombre,
					'apellidos'=> $user->apellidos,
					'email' => $user->email,
					'login' => '1',
					'active' => $user->activo
			);
			
			$this->session->set_userdata($infouser);
			
			$pag = $this->input->post('pagina');
			
			if($pag == null)
				redirect('/');
			else{
				for($i=0;$i<strlen($pag);$i++)
					if($pag[$i] == '_')
						$pag[$i] = '/';
				redirect('/' . $pag);
			}
		}
	}
	
	public function registrarse2($pag=null){
	
		$data['title']='lanparty - iesebre - registrarse';
	
		$rules = array(
				array(
						'field'   => 'nombre',
						'label'   => 'nombre',
						'rules'   => 'required|max_length[30]|xss_clean'),
				array(
						'field'   => 'apellidos',
						'label'   => 'apellidos',
						'rules'   => 'required|max_length[70]|xss_clean'),
				array(
						'field'   => 'email',
						'label'   => 'email',
						'rules'   => 'required|min_length[6]|max_length[50]|valid_email|matches[email2]|callback_email_check|xss_clean'),
				array(
						'field'   => 'email2',
						'label'   => 'email2',
						'rules'   => 'required|min_length[6]|max_length[50]|valid_email|xss_clean'),
				array(
						'field'   => 'nickname',
						'label'   => 'nickname',
						'rules'   => 'required|max_length[30]|callback_nickname_check|xss_clean'),
				array(
						'field'   => 'password',
						'label'   => 'password',
						'rules'   => 'required|min_length[6]|matches[password2]|md5'),
				array(
						'field'   => 'password2',
						'label'   => 'password2',
						'rules'   => 'required|min_length[6]'),
		);
	
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>');
		//$this->form_validation->set_message('required', 'Requerit %s');
	
		if ($this->form_validation->run() == FALSE){
	
			$data['nombre']['input']=array('name'=>'nombre',
					'value'=>($this->form_validation->set_value('nombre'))? $this->form_validation->set_value('nombre') : '' ,
					'id'=>'nombre',
			);
			$data['apellidos']['input']=array('name'=>'apellidos',
					'value'=>($this->form_validation->set_value('apellidos'))? $this->form_validation->set_value('apellidos') : '' ,
					'id'=>'apellidos',
			);
			$data['email']['input']=array('name'=>'email',
					'value'=>($this->form_validation->set_value('email'))? $this->form_validation->set_value('email') : '' ,
					'id'=>'email',
			);
			$data['email2']['input']=array('name'=>'email2',
					'value'=>($this->form_validation->set_value('email2'))? $this->form_validation->set_value('email2') : '' ,
					'id'=>'email2',
			);
			$data['nickname']['input']=array('name'=>'nickname',
					'value'=>($this->form_validation->set_value('nickname'))? $this->form_validation->set_value('nickname') : '' ,
					'id'=>'nickname',
			);
			$data['password']['input']=array('name'=>'password',
					'value'=>'' ,
					'id'=>'password',
			);
			$data['password2']['input']=array('name'=>'password2',
					'value'=>'' ,
					'id'=>'password2',
			);
				
			$data['pagina']=array('pagina' => ($this->input->post('pagina') != null)? $this->input->post('pagina') : $pag);
				
			$this->load->view('principal/header', $data);
			$this->load->view('auth/registrarse2');
			$this->load->view('principal/footer');
				
		}else{
			$user = new User();
				
			$user->nombre = $this->input->post('nombre');
			$user->apellidos = $this->input->post('apellidos');
			$user->email = $this->input->post('email');
			$user->nickname = $this->input->post('nickname');
			$user->dni = 'ESPECIAL';
			$user->contrasenya = $this->input->post('password');
			$user->activo = 2;
			
			//crea perfil
			$perfil = new Perfil();
			$perfil->nickname = $this->input->post('nickname');
			$perfil->save();
			
			//carga el perfil
			$perfil = new Perfil();
			$perfil->get_by_nickname($this->input->post('nickname'));
			
			$pagos = new Pago();
			$pagos->anyo = date("Y");
			$pagos->confirmado = 0;
			$pagos->nickname = $this->input->post('nickname');
			$pagos->save();
			
			$pagos = new Pago();
			$pagos->get_by_nickname($this->input->post('nickname'));
			
			//carga grupo
			$grupo = new Grupo();
			$grupo->get_by_id('3');
			
			$logros = new Logros();
			$logros->get_by_id('1');
			
			//guarda todo
			$user->save(array($grupo, $perfil, $pagos, $logros));
			
			$perfil = new Perfil();
			//vuelve a cargar el perfil
			$perfil->get_by_nickname($this->input->post('nickname'));
			
			//crea el usuario
			$user = new User();
			$user->get_by_email($this->input->post('email'));
			
			$perfil->save($user);
			
			$user = new User();
			$user->get_by_email($this->input->post('email'));
			
			$infouser = array(
					'nickname' => $user->nickname,
					'nombre' => $user->nombre,
					'apellidos'=> $user->apellidos,
					'email' => $user->email,
					'login' => '1',
					'active' => $user->activo
			);
				
			$this->session->set_userdata($infouser);
				
			$pag = $this->input->post('pagina');
				
			if($pag == null)
				redirect('/');
			else{
				for($i=0;$i<strlen($pag);$i++)
					if($pag[$i] == '_')
							$pag[$i] = '/';
							redirect('/' . $pag);
			}
		}
	}
	
}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */