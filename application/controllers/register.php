<?php
/**
*
*/
class register extends My_Controller
{
	
	public function index()
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
	$post = $this->input->post();
	$this->load->model('loginmodel');
	if($this->loginmodel->add_user($post))
	{
		$this->session->set_flashdata('user_success' , 'Suucessfully Registered');
		return redirect('login');
	}
	else
	{
		$this->session->set_flashdata('user_error' , 'Suucessfully Registered');
		return redirect('register');
	}
/*$this->load->library('email');
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
}*/


}
else
{
$this->load->view('Admin/register');
}
}
}
?>