<?php
/**
*
*/
class admin extends My_Controller
{

	public function __construct()
	{
		parent::__construct();
		
		/*if(! $this->session->userdata('id'))
			return redirect('admin/login');*/

	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('admin/login');
	}
	
	
	public function login()
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
				echo "Not matched";
			}
		}
		else
		{
			$this->load->view('Admin/Login');
		}
	}
	public function welcome()
	{
		if(! $this->session->userdata('id'))
			return redirect('admin/login');
		$this->load->model('loginmodel' , 'ar');
		$articles = $this->ar->articleList();
		$this->load->view('admin/dashboard' , ['articles' => $articles]);
	}
	public function register()
	{
		$this->load->view('admin/register');
	}
public function sendemail()
{
$this->form_validation->set_rules('username','User Name','required|alpha');
$this->form_validation->set_rules('password','Password','required|max_length[12]');
$this->form_validation->set_rules('firstname','First Name','required|alpha');
$this->form_validation->set_rules('lastname','last Name','required|alpha');
$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
if($this->form_validation->run())
{
$this->load->library('email');
$this->email->from(set_value('email'),set_value('fname'));
$this->email->to("zain.san.su.152@gmail.com");
$this->email->subject("Registratiion Greeting..");
$this->email->message("Thank  You for Registratiion");
$this->email->set_newline("\r\n");
$this->email->send();
if (!$this->email->send()) {
show_error($this->email->print_debugger()); }
else {
echo "Your e-mail has been sent!";
}
}
else
{
$this->load->view('Admin/register');
}
}
}
?>