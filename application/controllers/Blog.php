<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');

	}

	public function index()
	{
		$this->layout->view('index');
	}

	public function registro()
	{
		$this->layout->view('registro');
	}

	public function login()
	{
		$this->layout->view('login');
	}


	
	public function guardar(){

		if($this->input->post())
		{
				$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|maxlength[60]',
				array(
					'required' => 'No has rellenado %s.',
				)
				);

				$this->form_validation->set_rules('surname', 'Surname', 'required|min_length[3]|maxlength[60]',
				array(
					'required' => 'No has rellenado %s.',
					'min_length' => 'El apellido tiene que tener más de 3 letras',
					'maxlength' => 'El apellido tiene que tener menos de 60 letras'
				)
				);
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[usuarios.email]',
				array(
					'required' => 'No has rellenado %s',
					'valid_email' => 'Formato no válido',
					'is_unique' => 'email repetido'
				)
				);
				$this->form_validation->set_rules('password1', 'Password', 'required|min_length[7]',
				array(
					'required' => 'No has rellenado %s',
					'min_length' => 'La contraseña tiene que tener más de 7 letras',
				));
				$this->form_validation->set_rules('password2', 'Password Confirmation', 'required| min_length[7] | matches[password1]',
				array(
					'required' => 'No has rellenado %s',
					'min_lenght' => 'Mínimo 7 letras',
					'matches' => 'Las contraseñas no coinciden'
				));


				if( !$this->form_validation->run() ){
					echo json_encode( array(
									  'error' => true,
									  'mensaje' => validation_errors()) 
									);
					
					exit();
				} else {

					$contraseña2 = $this->input->post('password2');
					unset($contraseña2);

					 
					$_POST['password1'] = password_hash($contraseña, PASSWORD_DEFAULT);
					

					if($this->usuario_model->create_usuario($_POST)){
						echo json_encode( array('error' => false,
										 	    'mensaje'=> 'Se ha creado el usuario correctamente'
										));
					} else {
						echo json_encode( array('error' => true,
										 	    'mensaje'=> 'El usuario no pudo ser registrado'
										));
					}
				}


			

		}
	}
}
