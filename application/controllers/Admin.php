<?php
/**
*
*/
class admin extends My_Controller
{
	
	
	public function index()
	{
		$this->load->library('form_validation');
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
		$this->load->view('admin/dashboard');
	}
}
?>