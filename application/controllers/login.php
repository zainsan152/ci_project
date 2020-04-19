
<?php
class login extends MY_Controller
{
public function __construct()
{
parent::__construct();
if( $this->session->userdata('id') )
return redirect('admin/welcome');

}

public function index()
	{
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('uname' , 'User Name' , 'required|alpha');
		$this->form_validation->set_rules('pass' , 'Password' , 'required|max_length[12]');
		$this->form_validation->set_error_delimiters('<div class = "text-danger">' , '</div>');
		if ($this->form_validation->run())
		{
			$name = $this->input->post('uname');
			$password = $this->input->post('pass');
			$this->load->model('loginmodel');
			$id = $this->loginmodel->isvalidate($name , $password);
			//echo $id;
			if($id)
			{
				$this->session->set_userdata('id' , $id);
				/*$this->load->view('admin/dashboard');*/
				return redirect('admin/welcome');
			}
			else
			{
				//echo "Not matched";
				$this->session->set_flashdata('Login_failed' , 'invalid username/password');
				return redirect('login');
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}

	


}

	  ?>