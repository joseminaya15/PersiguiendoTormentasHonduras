<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
		$this->load->model('M_Datos');
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
	}

	public function index()
	{
		$this->load->view('v_home');
	}

	function register(){
		$data['error'] = EXIT_ERROR;
      	$data['msj']   = null;
		try {
			$name           = $this->input->post('Name');
			$surname 		= $this->input->post('Surname');
			$correo 		= $this->input->post('Email');
			$telefono	    = $this->input->post('Phone');
			$empresa 		= $this->input->post('Company');
			$cargo 		    = $this->input->post('Position');
			$existe         = $this->M_Datos->existCorreo($correo);
			$fecha          = date('Y-m-d');
			if(count($existe) != 0) {
				$data['msj']   = 'Correo ya registrado';
			}
			else{
				$insertParticipante = array('nombre'    => $name,
										   'apellido'   => $surname,
										   'email' 	    => $correo,
										   'telefono' 	=> $telefono,
										   'empresa'    => $empresa,
										   'cargo'      => $cargo,
										   'fecha'      => $fecha);
				$datoInsert  = $this->M_Datos->insertarDatos($insertParticipante,'contact');
				$this->sendConfirmation($correo);
	          	$data['msj']   = $datoInsert['msj'];
	          	$data['error'] = $datoInsert['error'];
	          }
		} catch(Exception $ex) {
			$data['msj'] = $ex->getMessage();
		}
      	echo json_encode($data);
	}
	function sendConfirmation($correo){
		$data['error'] = EXIT_ERROR;
		$data['msj']   = null;
		try {  
			$this->load->library("email");
			$configGmail = array('protocol'  => 'smtp',
			                     'smtp_host' => 'mail.iradianty.com',
			                     'smtp_port' => 587,
			                     'smtp_user' => 'info@iradianty.com',
			                     'smtp_pass' => 'EduardoBenavides2019!',
			                     'mailtype'  => 'html',
			                     'charset'   => 'utf-8',
			                     'newline'   => "\r\n");    
			$this->email->initialize($configGmail);
			$this->email->from('info@iradianty.com');
			$this->email->to($correo);
			// $this->email->to('jose.minayac15@gmail.com');
			$this->email->subject('Invitación HPE Persiguiendo tormentas.');
			$texto = '<!DOCTYPE html>
			                <html>
			                    <body>
			                        <table width="500" cellpadding="0" cellspacing="0" align="center" style="border: solid 1px #ccc;">
			                            <tr>
			                                <td style="background-color: #415564;width:100%;border-bottom: 1px solid #CCCCCC;"">
			                                    <table width="500" cellspacing="0" cellpadding="0" border="0" style="background-color: #FFFFFF;padding: 10px 20px;width: 100%;">
			                                        <tr>
														<td><a href="#"><img src="http://iradianty.com/HPE/events/microsite/persiguiendotormentas/Honduras/public/img/logo/avaya.png" width="125" alt="alternative text" border="0" style="display: block;"></a></td>
			                                        </tr>
			                                    </table>
			                                </td>
			                            </tr>
			                            <tr>
			                                <td>
			                                    <table width="400" cellspacing="0" cellpadding="0" border="0" align="center" style="padding: 30px 10px">
			                                        <tr>
			                                            <td style="text-align: center;padding: 0;margin: 0;padding-bottom: 10px"><font style="font-family: arial;color: #000000;font-size: 18px;font-weight: 600">Muchas gracias.<br> Su registro ha sido realizado con éxito.</font></td>
													</tr>
													<tr>
			                                            <td style="text-align: center;padding: 0;margin: 0;padding-bottom: 10px"><font style="font-family: arial;color: #01a982;font-size: 14px;font-weight: 600">Un evento de</font></td>
													</tr>
													<tr>
														<td><img src="http://iradianty.com/HPE/events/microsite/persiguiendotormentas/Honduras/public/img/logo/logo-orbe.png" width="100" height="140" style="display: block;margin:auto;margin-bottom: 10px;"></td>
													</tr>
			                                        <tr>
			                                            <td style="text-align: center;"><font style="font-family: arial;color: #757575;font-size: 12px;">&copy;2019 Avaya Inc.</font></td>
			                                        </tr>
			                                    </table>
			                                </td>
			                            </tr>
			                        </table>
			                    </body>
			                </html>';
			$this->email->message($texto);
			$this->email->send();
			$data['error'] = EXIT_SUCCESS;
		}catch (Exception $e){
			$data['msj'] = $e->getMessage();
		}
		return json_encode(array_map('utf8_encode', $data));
	}
}
